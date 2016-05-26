<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'confirmation_code', 'referred_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function admin()
    {
        return self::whereHas('roles', function ($query) {
            $query->where('role_id', 1);
        })->first();
    }

    public function quotas()
    {
        return $this->belongsToMany('\App\Quota');
    }

    public function quota_requests()
    {
        return $this->hasMany('\App\QuotaRequest');
    }

    public function earnings()
    {
        return $this->hasMany('\App\Earning');
    }

    public function withdrawals()
    {
        return $this->hasMany('\App\Withdrawal');
    }

    public function withdrawal_requests()
    {
        return $this->hasMany('\App\WithdrawalRequest');
    }

    public function excerpts()
    {
        return $this->hasMany('\App\Excerpt');
    }

    public function referrer()
    {
        return self::where('username', $this->referred_by)->first();
    }

    public function getBalance()
    {
        return $this->earnings()->sum('amount') - $this->withdrawals()->sum('amount');
    }

    public function payBonusToReferrer($quota)
    {
        if ($this->username === 'system') return;

        $value = ($quota->amount * .10);

        $this->referrer()->earnings()->create([
            'amount' => $value,
            'description' => 'Indicado Direto Comprou Cota',
        ]);
    }

    /**
     * Calculate percentage between earnings and quotas amounts.
     *
     * @return int
     */
    protected function earningsQuotasPercentage()
    {
        $quotas_amount   = $this->quotas()->sum('amount');
        $earnings_amount = $this->earnings()->where('type', '<>', 'oldbalance')->sum('amount');

        return (100 * $earnings_amount) / $quotas_amount;
    }

    public function expiredQuotas()
    {
        if ($this->earningsQuotasPercentage() < 200) return;

        $oldBalance = $this->getBalance();

        // Move to excerpts the expired quotas
        foreach ($this->quotas as $quota)
        {
            $this->excerpts()->create([
                'type' => 'quota',
                'amount' => $quota->amount,
                'description' => $quota->text,
                'created_at' => $quota->created_at
            ]);

            $this->quotas()->detach($quota);
        }

        // Move to excerpts the old earnings
        foreach ($this->earnings() as $earning)
        {
            $this->excerpts()->create([
                'type' => 'earning',
                'amount' => $earning->amount,
                'description' => $earning->description,
                'created_at' => $earning->created_at
            ]);

            $earning->delete();
        }

        // Move to excerpts the old withdrawals
        foreach ($this->withdrawals() as $withdrawal)
        {
            $this->excerpts()->create([
                'type' => 'withdrawal',
                'amount' => $withdrawal->amount,
                'description' => $withdrawal->description,
                'created_at' => $withdrawal->created_at
            ]);

            $withdrawal->delete();
        }

        // Add balance back to account
        $user->earnings()->create([
            'type' => 'oldbalance',
            'amount' => $oldBalance,
            'description' => 'Saldo Antigo'
        ]);
    }
}
