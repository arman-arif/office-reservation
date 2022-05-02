<?php

namespace Database\Factories;

use App\Models\Office;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startDay = rand(1, 5);
        return [
            'user_id' => User::factory(),
            'office_id' => Office::factory(),
            'price' => $this->faker->numberBetween(500, 5000),
            'status' => 1,
            'start_date' => now()->addDay($startDay)->format('Y-m-d'),
            'end_date' => now()->addDay($startDay + rand(1, 30))->format('Y-m-d'),
        ];
    }
}
