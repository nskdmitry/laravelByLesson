<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NavigationCompletenessTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testForms()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response = $this->get('/home');
        $response->assertStatus(200);
        $response = $this->get('/about');
        $response->assertStatus(200);

        $response = $this->get('/login');
        $response->assertStatus(200);
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response = $this->get('/users/1');
        $response->assertStatus(404);
        $response = $this->get('/users/3');
        $response->assertStatus(200);
        $response = $this->get('/users/1/remove');
        $response->assertStatus(404);
        $response = $this->get('/users/4/remove');
        $response->assertStatus(200);
        $response = $this->get('/users/1/help');
        $response->assertStatus(404);
        $response = $this->get('/users/4/help');
        $response->assertStatus(200);
        $response = $this->get('/users/1/profile');
        $response->assertStatus(404);
        $response = $this->get('/users/4/profile');
        $response->assertStatus(200);

        $response = $this->get('/tasks');
        $response->assertStatus(200);
        $response = $this->get('/tasks/completed');
        $response->assertStatus(200);
        $response = $this->get('/tasks/create');
        $response->assertStatus(200);
        $response = $this->get('/tasks/1');
        $response->assertStatus(200);
        $response = $this->get('/tasks/1000');
        $response->assertStatus(404);
        $response = $this->get('/tasks/1/edit');
        $response->assertStatus(200);
        $response = $this->get('/tasks/1000/edit');
        $response->assertStatus(404);

        $response = $this->get('/posts');
        $response->assertStatus(200);
        $response = $this->get('/posts/create');
        $response->assertStatus(200);
        $response = $this->get('/posts/1');
        $response->assertStatus(200);
        $response = $this->get('/posts/rob');
        $response->assertStatus(404);
        $response = $this->get('/posts/1/edit');
        $response->assertStatus(200);
        $response = $this->get('/posts/rob/edit');
        $response->assertStatus(200);
        $response = $this->get('/posts/tags/*');
        $response->assertStatus(200);
        $response = $this->get('/posts/tags/12.09.17');
        $response->assertStatus(404);
    }
}
