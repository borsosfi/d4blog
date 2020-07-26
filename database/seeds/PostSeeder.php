<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $title = $faker->sentence(8);
        DB::table('posts')->insert([
            'title' => $title,
            'excerpt' => $faker->text(200),
            'content' => $faker->paragraph(25),
            'created_at' => now(),
            'user_id' => 1,
            'url' => Str::slug($title)
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 1,
            'tag_id' => 1
        ]);

        $this->command->info('Post table seeded!');
    }
}
