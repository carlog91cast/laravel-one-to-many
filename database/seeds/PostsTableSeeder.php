<?php

use App\Models\Admin\Posts as AdminPosts;
use App\Models\posts;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = user::all();
        for ($i=0; $i < 50; $i++) { 
            $newPost = new Posts();
            $newPost->user_id = $faker->userId();
            $newPost->title = $faker->realText(35);
            $newPost->author = $faker->userName();
            $newPost->post_date = $faker->dateTimeThisYear();
            $newPost->post_image = $faker->imageUrl();
            $newPost->post_content = $faker->paragraph(5, false);
            $newPost->save();
        }
    }
 }
