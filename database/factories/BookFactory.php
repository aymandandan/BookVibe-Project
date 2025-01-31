<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'category_id' => fake()->randomElement(Category::pluck('id')->toArray()),
            'author_id' => fake()->randomElement(Author::pluck('id')->toArray()),
            'type' => fake()->randomElement(['hard_book', 'e_book']),
            'page_nb' => fake()->numberBetween(10, 999),
            'price' => fake()->randomFloat(2, 0, 50),
            'publish_date' => fake()->date(),
            'publisher' => fake()->name(),
            'language' => 'English',
            'cover_img' => fake()->imageUrl(),
        ];
    }
}
