<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    /**
    * @group formatted-date
    * @return [type] [description]
    */
    public function testCanGetCreatedAtFormattedDate()
    {
        //arrange
        $post = Post::create([
            'title' => 'A simple title',
            'body' => 'A simply body'
        ]); 

        //action
        $formattedDate = $post->createdAt();

        //assert
        $this->assertEquals($post->created_at->toFormattedDateString(), $formattedDate);
    }
}
