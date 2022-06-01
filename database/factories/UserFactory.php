<?php

namespace Database\Factories;

use App\Models\includes\UserConst;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => 'admin@connecto.com',
            'password' => 'admin',
            'role_id' => UserConst::ADMIN,
            'first_name' => 'Bob',
            'last_name' => 'Eponge',
            'is_active' => 1,
        ];
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => UserConst::ADMIN,
            ];
        });
    }
}
