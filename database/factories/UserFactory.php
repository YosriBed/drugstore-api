<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "yosri",
            'last_name' => "bedoui",
            'email' => "random.mail@example.com",
            'phone' => '(+216)52043841',
            'gender' => 'Apache Attack Helicopter',
            'password' => 'password',
        ];
    }
}
