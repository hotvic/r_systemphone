<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:balance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate all user balance to users table `balance` field';

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
            $user->balance = $user->getBalance();
            $user->save();

            $users->forget($key);
        }

        $this->info('User balances migrated: ' . \App\User::count());
    }
}
