<?php

namespace App;

use DB;

use App\User;
use App\Quota;
use App\QuotaRequest;
use App\Earning;
use App\Withdrawal;

use Symfony\Component\HttpFoundation\ParameterBag;

class StatsManager
{
    public static function getTotalUsers()
    {
        return User::all()->count();
    }

    public static function getActiveUsers()
    {
        return User::where('active', true)->count();
    }

    public static function getTotalQuotas()
    {
        $quotas = Quota::all()->count();
        $pquotas = QuotaRequest::where('status', 0)->count();

        return $quotas + $pquotas;
    }

    public static function getActiveQuotas()
    {
        return Quota::all()->count();
    }

    public static function getTotalEarnings()
    {
        return Earning::all()->count();
    }

    public static function getTotalWithdrawals()
    {
        return Withdrawal::all()->count();
    }

    public static function getTotalBalance()
    {
        return DB::table('quota_user')->join('quotas', 'quota_user.quota_id', '=', 'quotas.id')->sum('amount');
    }

    public static function getWithdrawableBalance()
    {
        $total = self::getTotalBalance();

        return $total - Earning::sum('amount');
    }

    public static function getStatsBag()
    {
        $bag = new ParameterBag();

        $bag->set('total.users', self::getTotalUsers());
        $bag->set('total.quotas', self::getTotalQuotas());
        $bag->set('total.earnings', self::getTotalEarnings());
        $bag->set('total.withdrawals', self::getTotalWithdrawals());

        $bag->set('active.users', self::getActiveUsers());
        $bag->set('active.quotas', self::getActiveQuotas());

        $bag->set('balance.total', self::getTotalBalance());
        $bag->set('balance.withdrawable', self::getWithdrawableBalance());

        return $bag;
    }
}