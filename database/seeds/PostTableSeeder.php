<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i<20; $i++){
            $newPost = new Post();
            $newPost->title = $faker->words(3, 5);
            $newPost->slug = Str::of($newPost->title)->slug('-');
            $newPost->content = $faker->text();
            $newPost->save();
        }
    }
}
