<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewABlogPostTest extends TestCase
{
    use DatabaseMigrations;
    public function testCanViewABlogPost()
    {
        //Arrangement
        //creating a blog post
        $post = Post::create([
            'title' => 'A simple title',
            'body' => 'A simply body'
        ]);

        //Action
        //visiting a route
        $resp = $this->get("/post/{$post->id}");

        //Assert
        $resp->assertStatus(200);
        $resp->assertSee($post->title);
        $resp->assertSee($post->body);
        $resp->assertSee($post->created_at->toFormattedDateString());

    }

    /**
    * @group post-not-found
    * @return [type] [description]
    */
    public function testViewsA404PageWhenPostIsNotFound()
    {
        //action
        $resp = $this->get('post/INVALID_ID');

        //assert
        $resp->assertStatus(404);
        $resp->assertSee("The page you are looking for could not be found");
    }
}
