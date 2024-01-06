<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            [
                'nama_user' => 'Gojo Satoru',
                'email' => 'gojo@gmail.com',
                'password' => Hash::make('gojo'),
                'level'=>2,
            ],
            [
                'nama_user' => 'Nanami Kento',
                'email' => 'nanami@gmail.com',
                'password' => Hash::make('nanami'),
                'level'=>1,
            ],
            [
                'nama_user' => 'Itadori Yuji',
                'email' => 'yuji@gmail.com',
                'password' => Hash::make('yuji'),
                'level'=>1,
            ],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
