<?php

namespace Database\Factories;

use App\Models\Career;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id'=> User::factory(),
            'career_id'=> Career::all()->random()->id,
            'name_student'=>$this->faker->unique()->name(),
            'paternal_surname_student' => $this->faker->unique()->name(),
            'maternal_surname_student' => $this->faker->unique()->name(),
            'phone_student' => $this->faker->randomNumber(9),
            'code_student' => $this->faker->randomNumber(9)
        ];
    }
}
