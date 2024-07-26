<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ToDoList;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToDoList>
 */
class ToDoListFactory extends Factory
{
    protected $model = ToDoList::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => fake()->sentence(6),
        ];
    }
}
