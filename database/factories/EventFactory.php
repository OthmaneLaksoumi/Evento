<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories_id = Category::pluck('id')->toArray();
        $organizeres_id = User::pluck('id')->toArray();
        $seats = fake()->numberBetween(10, 200);

        return [
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'start_date' => fake()->dateTime(),
            'end_date' => fake()->dateTime(),
            'location' => fake()->address(),
            'category_id' => fake()->randomElement($categories_id),
            'organizer_id' => fake()->randomElement($organizeres_id),
            'available_seats' => $seats,
            'total_seats' => $seats,
            'auto_acceptance' => fake()->randomElement([0, 1]),
        ];
    }
}
