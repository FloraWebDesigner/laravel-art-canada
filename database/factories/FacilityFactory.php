<?php

namespace Database\Factories;


use App\Models\Type;
use App\Models\Provider;
use App\Models\Province;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facility>
 */
class FacilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'facility_name' => $this->faker->company,  
            'source_facility_type' => $this->faker->word,  
            'type_id' => Type::all()->random(), 
            'provider_id' => Provider::all()->random(),
            'street_no' => $this->faker->buildingNumber, 
            'street_name' => $this->faker->streetName,  
            'postal_code' => $this->faker->postcode, 
            'city' => $this->faker->city, 
            'province_id' => Province::all()->random(),
            'source_format_address' => $this->faker->address,  
            'CSD_name' => $this->faker->companySuffix, 
            'latitude' => $this->faker->latitude, 
            'longitude' => $this->faker->longitude,  
            'status' => $this->faker->randomElement(['open', 'close']), 
        ];
    }
}
