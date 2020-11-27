<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vacation;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'from' => $this->faker->dateTimeBetween('now','+30 days'),
            'to' => $this->faker->date('+30 days','+300 days'),
            'user_id' => User::inRandomOrder()->get('id')
        ];
    }
}
