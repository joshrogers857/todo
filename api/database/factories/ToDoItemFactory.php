<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ToDoItem;
use App\Models\ToDoList;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToDoItem>
 */
class ToDoItemFactory extends Factory
{
    protected $model = ToDoItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'to_do_list_id' => ToDoList::factory(),
            'content' => fake()->realText(30),
            'is_complete' => false,
        ];
    }
}
