<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'D4Blog User',
            'email' => 'user@d4blog.local',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);

        $this->command->info('User table seeded!');
    }
}
