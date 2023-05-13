<?php

namespace Database\Factories;

use File;
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
        return mt_rand(0, 10);
    }

    private function cover()
    {
        $filepath = storage_path('app/public/covers');

        if(!File::exists($filepath)){
            File::makeDirectory($filepath);
        }

        return 'covers/' . fake()->image(storage_path('app/public/covers'),640,480, null, false);
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
