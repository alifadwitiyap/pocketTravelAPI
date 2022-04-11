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
                'https://upload.wikimedia.org/wikipedia/en/thumb/0/05/Flag_of_Brazil.svg/720px-Flag_of_Brazil.svg.png',
                'https://eu4.paradoxwikis.com/images/6/6a/Hungary.png',
                'https://eu4.paradoxwikis.com/images/e/e1/Venice.png',
            ],
            'caption' => $this->faker->bs(),
            'date' => $this->faker->date(DATE_W3C),
        ];
    }
}
