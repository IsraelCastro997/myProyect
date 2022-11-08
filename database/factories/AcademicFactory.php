<?php

namespace Database\Factories;

use App\Models\Academic;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class AcademicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Academic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> User::factory(),
            'name_academic'=>$this->faker->unique()->name(),
            'paternal_surname_academic' => $this->faker->unique()->name(),
            'maternal_surname_academic' => $this->faker->unique()->name(),
            'phone_academic' => $this->faker->randomNumber(9),
            'code_academic' => $this->faker->randomNumber(9)
        ];
    }
}
