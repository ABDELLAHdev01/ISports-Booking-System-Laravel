<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\food>
 */
class foodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>fake()->word(),
            'image'=>fake()->imageUrl(640, 480, 'animals', true),
            'type'=>fake()->word(),
            'description'=>fake()->paragraph(),
            'price'=>fake()->numberBetween(35, 100),
            
        ];
    }
}
