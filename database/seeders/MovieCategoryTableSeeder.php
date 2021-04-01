<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MovieCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $categoryName = 'Без категории';
        $categories[] = [
            'title' => $categoryName,
            'slug' => Str::slug($categoryName),
        ];
        for ($i = 1; $i <= 10; $i++) {
            $categoryName = 'Категория #' . $i;

            $categories[] = [
                'title' => $categoryName,
                'slug' => Str::slug($categoryName),
            ];
        }
        \DB::table('movie_categories')->insert($categories);
    }
}
