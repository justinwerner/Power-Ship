<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\ShipmentEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address_1' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => 'MO',
            'zip' => $this->faker->numberBetween(00000, 99999),
            'type' => $this->faker->randomElement(['TRUCK', 'PLANE']),
            'expected' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'user_id' => 1,
        ];
    }

    /**
     * Create multiple events
     *
     * @return $this
     */
    public function withEvents(): static
    {
        return $this->has(
            ShipmentEvent::factory()->count(2),
            'events'
        );
    }

    /**
     * Create multiple packages
     *
     * @return $this
     */
    public function withPackages(): static
    {
        return $this->has(
            Package::factory()->count(3),
            'packages'
        );
    }
}
