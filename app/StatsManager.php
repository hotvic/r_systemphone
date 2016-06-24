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
        return User::sum('num_quotas');
    }

    public static function getActiveQuotas()
    {
        return User::sum('num_quotas');
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
        return User::sum('num_quotas') * config('app.site.quota_price');
    }

    public static function getWithdrawableBalance()
    {
        $total = self::getTotalBalance();

        return $total - User::sum('balance');
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