<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = new \App\User();
        $owner->username = 'system';
        $owner->name = 'System Owner';
        $owner->email = 'system@example.com';
        $owner->password = bcrypt('system');
        $owner->active = true;
        $owner->confirmed = true;
        $owner->referred_by = 'system';
        $owner->save();
        $owner->assign('admin');
    }
}
