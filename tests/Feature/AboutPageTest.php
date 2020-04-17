<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AboutPageTest extends TestCase
{
    public function testCanViewAboutPage()
    {
        $resp = $this->get('/about');

        $resp->assertStatus(200);
        $resp->assertSee("About Us");
    }
}
