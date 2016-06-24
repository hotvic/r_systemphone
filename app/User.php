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
        'username', 'name', 'email', 'cpf', 'password', 'confirmation_code', 'active', 'confirmed', 'referred_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['profile_picture_url'];

    public static function admin()
    {
        return self::whereHas('roles', function ($query) {
            $query->where('role_id', 1);
        })->first();
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

    public function payBonusToReferrer($num_quotas)
    {
        $referrer = $this->referrer();

        if ($referrer->username === 'system') return;

        $value = (config('app.site.quota_price') * .10) * $num_quotas;

        $referrer->earnings()->create([
            'type' => 'bydirectbonus',
            'amount' => $value,
            'description' => sprintf('Indicado Direto Comprou Cotas: %d', $num_quotas),
        ]);
    }

    /**
     * Calculate percentage between earnings and quotas amounts.
     *
     * @return int
     */
    protected function earningsQuotasPercentage()
    {
        $quotas_amount   = $this->num_quotas * config('app.site.quota_price');
        $earnings_amount = $this->earnings()->sum('amount');

        if ($quotas_amount == 0 or $earnings_amount == 0) return 0;

        return (100 * $earnings_amount) / $quotas_amount;
    }

    public function expiredQuotas()
    {
        if ($this->earningsQuotasPercentage() < 200) return;

        // Move to excerpts the expired quotas
        $this->excerpts()->create([
            'type' => 'quotas',
            'amount' => $this->num_quotas,
            'description' => 'Quantidade de cotas antigas antes de atingir os 200%'
        ]);
        $this->num_quotas = 0;

        // Move to excerpts the old earnings
        foreach ($this->earnings as $earning)
        {
            $this->excerpts()->create([
                'type' => 'earning',
                'amount' => $earning->amount,
                'description' => $earning->description,
                'created_at' => $earning->created_at
            ]);

            \App\Earning::destroy($earning->id);
        }

        // Move to excerpts the old withdrawals
        foreach ($this->withdrawals as $withdrawal)
        {
            $this->excerpts()->create([
                'type' => 'withdrawal',
                'amount' => $withdrawal->amount,
                'description' => $withdrawal->description,
                'created_at' => $withdrawal->created_at
            ]);

            \App\Withdrawal::destroy($withdrawal->id);
        }

        $this->save();
    }

    public function getProfilePictureUrlAttribute()
    {
        if ($this->profile_picture_path)
        {
            return url('/pictures/profile/' . $this->profile_picture_path);
        }

        return url('/images/avatars/profile_avatar.jpg');
    }
}
