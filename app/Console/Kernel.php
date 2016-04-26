<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $users = \App\User::where('active', true)->get()->all();

            foreach ($users as $user)
            {
                if ($user->investments->count() == 0) continue;

                $last_earning = \App\LastEarning::where(['user_id' => $user->id, 'type' => '18p'])->orderBy('created_at', 'desc')->first();

                if (!$last_earning) $last_payment = $user;

                $weeks = (time() - $last_payment->created_at->getTimestamp()) / 604800; // result divided by one week

                $earn = \App\Investment::all()->sum('amount') * 0.18; // fixed 18% earning over investments

                $earn = $earn * floor($weeks);

                if ($earn > 0)
                {
                    $earning = $user->earnings()->create([
                        'amount' => $earn,
                        'description' => '[SISTEMA] Ganho Semanal 18%'
                    ]);

                    $last_earning = new \App\LastEarning();
                    $last_earning->user_id = $user->id;
                    $last_earning->earning_id = $earning->id;
                    $last_earning->type = '18p';

                    $user->last_earnings()->save($last_earning);

                    echo sprintf("[%d:%d:%d] E-Mail: %s | Weeks: %d | Total: $ %f\n",
                                 $user->id,
                                 $earning->id,
                                 $last_earning->id,
                                 $user->email,
                                 $weeks, $earn);
                }
            }
        })
            ->name('weekly.earning')
            ->mondays()
            ->withoutOverlapping();
    }
}
