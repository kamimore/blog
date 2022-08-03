<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testWhenThereIsBlogWithNoComment()
    {
        $post = $this->CreateDummyBlogPost();

        $response = $this->get('/post');
        $response->assertSeeText('No Comments yet!');

        $this->assertDatabaseHas('blog_posts', $post->toArray());
    }

    public function testWhenThereIsBlogWithOneComment()
    {
        $post = $this->CreateDummyBlogPost();
        $comment = new Comment();
        $comment->content = 'I am new comment';
        $comment->blog_post_id = $post->id;
        $comment->save();

        $response = $this->get('/post');
        $response->assertSeeText('1 comment present');
        $this->assertDatabaseHas('comments', $comment->toArray());
    }

    public function testWhenThereIsBlogWithXComments()
    {
        $post = $this->CreateDummyBlogPost();
        Comment::factory()->count(4)->create(['blog_post_id' => $post->id]);

        $response = $this->get('/post');
        $response->assertSeeText('4 comment present');
    }

    public function testNoBlogPostWhenNothingInDB()
    {
        $response = $this->get('/post');
        $response->assertSeeText('No Posts found!');
    }

    public function testWhenOneSingleBlogPostIsPresent()
    {
        //Arrange
        $post = $this->CreateDummyBlogPost();
        //Act
        $response = $this->get('/post');

        //Assert
        $response->assertSeeText('A new title post');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'A new title post',
        ]);
    }

    public function testStoreValid()
    {
        $params = [
            'title' => 'valid title',
            'content' => 'valid content',
        ];

        $this->post('/post', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog Post Added Successfully');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x',
        ];

        $this->post('/post', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $message = session('errors')->getBags()['default']->messages();
        $this->assertEquals($message['title'][0], 'The title must be at least 5 characters.');
        $this->assertEquals($message['content'][0], 'The content must be at least 5 characters.');

    }

    public function testUpdateValid()
    {
        $post = $this->CreateDummyBlogPost();

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

    public function testDelete()
    {
        $post = $this->CreateDummyBlogPost();

        $this->assertDatabaseHas('blog_posts', $post->toArray());

        $this->delete('/post/' . $post->id)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog Post Deleted Successfully');

        $this->assertDatabaseMissing('blog_posts', $post->toArray());
    }

    private function CreateDummyBlogPost(): BlogPost
    {
        // $post = new BlogPost();
        // $post->title = 'First Title';
        // $post->content = 'First Title Content';
        // $post->save();

        return BlogPost::factory()->SingleBlogPost()->create();

    }
    
}
