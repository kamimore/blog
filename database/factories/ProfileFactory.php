<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function(Profile $profile){
            $profile->Author()->associate(Author::create())->save();
        });
    }
}
