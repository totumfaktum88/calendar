<?php

namespace Database\Factories\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween("2023-07-01 08:00", "2023-10-01 17:00");
        return [
            "first_name" => $this->faker->firstName(),
            "last_name" => $this->faker->lastName(),
            "start" => $start,
            "end" => $start->add(new \DateInterval("PT".$this->faker->numberBetween(1, 3)."H"))
                ->format("Y-m-d H:i:s"),
        ];
    }
}
