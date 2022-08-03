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

    public function testStoreValid()
    {
        $params = [
            'title' => 'valid title',
            'content' => 'valid content',
        ];

        $this->post('/post',$params)
             ->assertStatus(302)
             ->assertSessionHas('status');
        
        $this->assertEquals(session('status'),'Blog Post Added Successfully');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x'
        ];

        $this->post('/post',$params)
             ->assertStatus(302)
             ->assertSessionHas('errors');

        $message = session('errors')->getBags()['default']->messages();
        $this->assertEquals($message['title'][0],'The title must be at least 5 characters.');
        $this->assertEquals($message['content'][0],'The content must be at least 5 characters.');

    }

    public function testUpdateValid()
    {
        $post = new BlogPost;
        $post->title = 'I am new title';
        $post->content = 'I am new content';
        $post->save();

        $this->assertDatabaseHas('blog_posts', $post->toArray());

        $params = [
            'title' => 'I am new title changed',
            'content' => 'I am new content changed',
        ];

        $this->put('/post/' . $post->id, $params)
             ->assertStatus(302)
             ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog Post Updated Successfully');
        $this->assertDatabaseHas('blog_posts', $params);
        $this->assertDatabaseMissing('blog_posts', $post->toArray());
    }
}
