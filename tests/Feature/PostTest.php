<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\BlogPost;

class PostTest extends TestCase
{
    use  RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNoBlogPostWhenNothingInDB()
    {
        $response = $this->get('/post');
        $response->assertSeeText('No Posts found!');
    }
    
    public function testWhenOneSingleBlogPostIsPresent()
    {
        //Arrange
        $post = new BlogPost();
        $post->title = 'First Title';
        $post->content = 'First Title Content';
        $post->save();

        //Act
        $response = $this->get('/post');

        //Assert
        $response->assertSeeText('First Title');

        $this->assertDatabaseHas('blog_posts',[
            'title'=>'First Title',
        ]);
    }
}
