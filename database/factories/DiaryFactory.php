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
            'user_id' => 'user-'.substr($this->faker->md5(), 0, 16),
            'user' => $this->faker->name(),
            'country' => $this->faker->countryCode(),
            'location' => $this->faker->city(),
            'image' => 'https://loremflickr.com/640/320/travel?random='.$this->faker->randomNumber(6, true),
            'caption' => $this->faker->realTextBetween($minNbChars = 360, $maxNbChars = 640, $indexSize = 3),
            'isPublic' => $this->faker->boolean(),
        ];
    }
}
