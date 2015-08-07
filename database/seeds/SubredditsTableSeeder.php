<?php

use Illuminate\Database\Seeder;
use App\Subreddit;

class SubredditsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subreddit::truncate();
        factory('App\Subreddit')->times(20)->create();
    }
}
