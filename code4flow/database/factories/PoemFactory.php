<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PoemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,50),
            'title' => $this->faker->text(15),
            'text' => $this->faker->realText(50),
            'status' => $this->faker->randomElement(['APPROVED', 'DECLINED', 'WAITING']),
            'category_id' => $this->faker->numberBetween(1,6)
        ];
    }
}
