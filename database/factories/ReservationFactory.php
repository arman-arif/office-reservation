<?php

namespace Database\Factories;

use App\Models\Office;
use App\Models\Reservation;
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
            'status' => Reservation::STATUS_ACTIVE, // 1 = active, 2 = cancelled
            'start_date' => now()->addDay($startDay)->format('Y-m-d'),
            'end_date' => now()->addDay($startDay + rand(1, 30))->format('Y-m-d'),
        ];
    }
}
