<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i=0; $i <50 ; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->unique()->realTextBetween(5, 20);
            $newPost->slug = Str::slug($newPost->title);
            $newPost->author = $faker->name();
            $newPost->content = $faker->realTextBetween(600, 800);
            $newPost->post_date = $faker->dateTimeThisYear();
            $newPost->image =$faker->unique()->imageUrl();
            $newPost->save();
        }
    }
}
