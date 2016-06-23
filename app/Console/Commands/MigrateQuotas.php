<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateQuotas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:quotas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate all user quotas to users table `num_quotas` field';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = \App\User::all();

        foreach ($users as $key => $user)
        {
            $user->num_quotas = $user->quotas()->count();
            $user->save();

            $users->forget($key);
        }

        $this->info('User quotas migrated: ' . \App\User::count());
    }
}
