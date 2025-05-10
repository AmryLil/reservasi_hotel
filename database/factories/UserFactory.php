<?php

namespace Database\Factories;

use App\Models\User;
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
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_222320'     => $this->faker->name(),
            'email_222320'    => $this->faker->unique()->safeEmail(),
            'phone_222320'    => $this->faker->phoneNumber(),
            'alamat_222320'   => $this->faker->address(),
            'gender_222320'   => $this->faker->randomElement(['L', 'P']),
            'password_222320' => Hash::make('password'),  // password
            'role_222320'     => 'user',
        ];
    }
}
