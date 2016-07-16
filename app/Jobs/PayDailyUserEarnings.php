<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PayDailyUserEarnings extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $quotaValue = 0.0;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->quotaValue = $value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = \App\User::where('active', true)->where('username', '<>', 'system')->get();

        foreach ($users as $key => $user)
        {
            if ($user->num_quotas > 0)
            {
                $amount = $user->num_quotas * $this->quotaValue;

                $user->earnings()->create([
                    'type' => 'quotavalue',
                    'amount' => $amount,
                    'description' => sprintf('Ganho Por Cota (%s); Cotas: %d', format_money($this->quotaValue), $user->num_quotas),
                ]);
            }

            $users->forget($key);
        }
    }
}
