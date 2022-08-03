<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'content'=>$this->faker->paragraphs(4,true), 
        ];
    }

    public function SingleBlogPost()
    {
        return $this->state(
             [
                'title'=>'A new title post',
                'content'=>'A new text content',
            ]
        );
    }
}
