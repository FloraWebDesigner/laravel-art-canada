<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'provider_name' => $this->faker->company,  
            'dataset' => $this->faker->word,  
            'territory' => $this->faker->randomElement(['Toronto', 'British Columbia']),
            'link' => $this->faker->url,
            'last_updated' => $this->faker->date,
        ];
    }
}
