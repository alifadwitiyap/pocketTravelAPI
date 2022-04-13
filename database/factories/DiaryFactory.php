<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diary>
 */
class DiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 'user-'.substr($this->faker->name(), 0, 16),
            'country' => $this->faker->countryCode(),
            'location' => $this->faker->city(),
            'image' => 'https://picsum.photos/640/360',
            'caption' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'isPublic' => $this->faker->boolean(),
        ];
    }
}
