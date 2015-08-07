<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubredditTest extends TestCase
{

    protected $response;

    public function testAbleToCreate()
    {
        $test_data = $this->getTestData();
        $this->post('/api/subreddit', $test_data)
            ->assertResponseOk();
    }

    public function testCreateWithNoData()
    {
        $test_data = $this->getTestData();
        $this->post('/api/subreddit', [])
            ->assertResponseStatus(500);
    }

    public function testUpdateAllData()
    {
        $post = factory('App\Subreddit')->create();
        
        $test_data = $this->getTestData();
        $this->patch("/api/subreddit/$post->id", $test_data)
            ->assertResponseOk();
    }

    public function testUpdateWithPartialData()
    {
        $post = factory('App\Subreddit')->create();
        
        $test_data = $this->getPartialTestData();
        $this->patch("/api/subreddit/$post->id", $test_data)
            ->assertResponseOk();
    }

    public function getTestData()
    {
        Session::start();
        $faker = Faker\Factory::create();
        return [
            'name'  => $faker->company,
            'description' => $faker->catchPhrase,
            '_token' => csrf_token()
            ];
    }

    public function getPartialTestData()
    {
        Session::start();
        $faker = Faker\Factory::create();
        return [
            'name'  => $faker->company,
            '_token' => csrf_token()
            ];
    }

}
