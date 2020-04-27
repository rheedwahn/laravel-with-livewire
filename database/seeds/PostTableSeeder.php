<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\models\Post::class, 5)->create([
            'user_id' => \App\User::first()->id
        ]);
    }
}
