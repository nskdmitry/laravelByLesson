<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUser()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->get('/users/'.$user->id);
        $response->assertStatus('200')->assertSee($user->name);

        $postsAll = \App\Post::all()->count();
        $postFrom = $user->publish(factory(\App\User::class)->create());
        $this->assertCount(\App\Post::all()->count(), $postsAll + 1);
        $this->assertEquals($postFrom->user_id, $user->id);
    }
}
