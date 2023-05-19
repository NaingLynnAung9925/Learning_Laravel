<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = new Post;
        $post = Post::firstOrCreate([
            'title' => 'second Seeder',
            'body' => 'testing second seeder',
            'image' => '/images/1659065014_Screenshot (10).png',
        ]);
        
        Category::firstOrCreate([
            'name' => 'default'  
        ]);
        $category = Category::firstOrCreate(['name'=> 'default']);
        $post->categories()->attach($category);
    }
}
