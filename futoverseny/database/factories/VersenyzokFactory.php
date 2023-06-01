<?php

namespace Database\Factories;

use App\Models\Tavok;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Versenyzok>
 */
class VersenyzokFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rajtszam' => $this->faker->unique()->randomNumber(4, false),
            'nev' => $this->faker->name(),
            'szuldatum' => $this->faker->dateTimeThisCentury(),
            'nem' => $this->faker->randomElement(['férfi', "nő"]),
            'tavokId' => Tavok::all()->random()->id,
            'korosztaly' => $this->faker->randomElement(['junior', 'senior'])
        ];
    }
}
