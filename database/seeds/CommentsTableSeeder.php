<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();
        // We don't use times(), because comment has a recurisve relation to itself
        foreach (range(1, 1000) as $i) {
            factory('App\Comment')->create();
        }
    }
}
