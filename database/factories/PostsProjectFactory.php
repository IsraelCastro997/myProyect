<?php

namespace Database\Factories;

use App\Models\Career;
use App\Models\PostsProject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostsProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostsProject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'user_id' => User::all()->random()->id,
            'career_id' => Career::all()->random()->id,
            'tags' => json_encode(["key" => $this->faker->randomNumber()]),
            'document' => $this->faker->word(),
            'division' => $this->faker->randomElement(['ciencias basicas', 'ingenierias', 'divec']),
            'priority' => $this->faker->randomElement(['alta', 'media', 'baja']),
            'schedule' => $this->faker->randomElement(['matutino', 'vespertino', 'mixto']),
            'experience' => $this->faker->paragraph(),
            'area' => $this->faker->title(),
            'notes' => $this->faker->paragraph(),
            'likes' => $this->faker->randomNumber()
        ];
    }
}
