<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'Teszt 1';
        DB::table('tags')->insert([
            'name' => $name,
            'url' => Str::slug($name)
        ]);

        $this->command->info('Tag table seeded!');
    }
}
