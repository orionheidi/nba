<?php

use Illuminate\Database\Seeder;
use App\News;
use App\User;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(News::class,100)->create()
        ->each(function($news){
            $user = User::inRandomOrder()->first();
            $news->user_id = $user->id;
            $news->save();
        });
    }
}
