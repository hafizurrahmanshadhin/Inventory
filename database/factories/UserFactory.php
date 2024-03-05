<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory {
    protected static ?string $password;
    public function definition(): array {
        return [
            'firstName' => fake()->name(),
            'lastName'  => fake()->name(),
            'email'     => fake()->unique()->safeEmail(),
            'mobile'    => fake()->phoneNumber(),
            'password'  => fake()->password(),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
