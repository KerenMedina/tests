<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreatePostsTest extends TestCase
{
    use DatabaseMigrations;

    /**
    * @group create-post
    * @return [type] [description]
    */
    public function testCanCreatePost()
    {
        //action
        $resp = $this->post('/store-post', [
            'title' => 'new post title',
            'body' => 'new post body'
        ]);

        //assert
        $this->assertDatabaseHas('posts',[
            'title' => 'new post title',
            'body' => 'new post body'
        ]);

        $post = Post::find(1);

        $this->assertEquals('new post title', $post->title);
        $this->assertEquals('new post body', $post->body);
    }

    /**
    * @group title-req
    * @return [type] [description]
    */
    public function testTitleIsRequiredToCreatePost()
    {
        $resp = $this->post('/store-post', [
            'title' => null,
            'body' => 'new post body'
        ]);

        $resp->assertSessionHasErrors('title');
    }

    /**
    * @group body-req
    * @return [type] [description]
    */
    public function testBodyIsRequiredToCreatePost()
    {
        $resp = $this->post('/store-post', [
            'title' => 'new post title',
            'body' => null
        ]);

        $resp->assertSessionHasErrors('body');
    }
}
