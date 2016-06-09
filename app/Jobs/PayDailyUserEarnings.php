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
            $num_quotas = $user->quotas()->count();
            $amount     = $num_quotas * $this->quotaValue;

            $user->earnings()->create([
                'type' => 'quotavalue',
                'amount' => $amount,
                'description' => sprintf('Ganho Por Cota; Cotas: %d', $num_quotas),
            ]);

            // Check if earnings was expired
            $user->expiredQuotas();

            $users->forget($key);
        }
    }
}
