<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Facility;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'user_id' => User::all()->random(),
        'group_member' => $this->faker->numberBetween(1, 10),
        'reservation_date' => $this->faker->date(), 
        'facility_id' => Facility::all()->random(),
        ];
    }
}
