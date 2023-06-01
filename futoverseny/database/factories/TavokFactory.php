<?php

namespace Database\Factories;

use App\Models\Tavok;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tavok>
 */
class TavokFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tavelnevezes' => $this->faker->unique()->randomElement(['5km', "10km", "félmaraton", "maraton"])
        ];
    }

    // public function preset()
    // {
    //     return $this->state(function (array $attributes) {
    //         $tav = Tavok::factory()->create([
    //             'name' => '5km'
    //         ]);
    //         $tav2 = Tavok::factory()->create([
    //             'name' => '10km'
    //         ]);
    //         $tav3 = Tavok::factory()->create([
    //             'name' => 'félmaraton'
    //         ]);
    //         $tav4 = Tavok::factory()->create([
    //             'name' => 'maraton'
    //         ]);
    //         return [
    //             'meal_items' => [
    //                 ['meal_id' => $tav->id],
    //                 ['meal_id' => $tav2->id],
    //                 ['meal_id' => $tav3->id],
    //                 ['meal_id' => $tav4->id]
    //             ],
    //         ];
    //     });
    // }
}
