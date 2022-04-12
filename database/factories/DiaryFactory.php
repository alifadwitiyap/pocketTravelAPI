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
            'user_id' => $this->faker->name(),
            'country' => $this->faker->country(),
            'location' => $this->faker->city(),
            'image' => [
                'https://eu4.paradoxwikis.com/images/a/ad/Bosnia.png',
                'https://eu4.paradoxwikis.com/images/6/6a/Hungary.png',
                'https://eu4.paradoxwikis.com/images/e/e1/Venice.png',
            ],
            'caption' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'date' => $this->faker->date(DATE_W3C),
        ];
    }
}
