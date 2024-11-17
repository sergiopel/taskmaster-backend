<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Trabalho',
                'color' => 'bg-blue-500'
            ],
            [
                'name' => 'Pessoal',
                'color' => 'bg-green-500'
            ],
            [
                'name' => 'Estudos',
                'color' => 'bg-purple-500'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
