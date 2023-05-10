<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{

    private function title()
    {
         return fake()->words(mt_rand(1, 5), true);
    }

    private function slug()
    {
        return fake()->slug;
    }

    private function author()
    {
        return fake()->name;
    }

    private function description()
    {
        return fake()->sentences(3, true);
    }

    private function rating()
    {
        return mt_rand(0, 100);
    }

    private function cover()
    {
        return fake()->sentence;
    }

    private function category_id()
    {
        return 1;
    }

    public function definition(): array
    {
        return [
            'title' => $this->title(),
            'slug' => $this->slug(),
            'author' => $this->author(),
            'description' => $this->description(),
            'rating' => $this->rating(),
            'cover' => $this->cover(),
        ];
    }
}
