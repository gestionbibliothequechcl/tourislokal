<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Technology',
            'Health & Wellness',
            'Fashion',
            'Travel',
            'Food & Drinks',
            'Education',
            'Entertainment',
            'Business',
            'Finance',
            'Sports',
            'Home & Garden',
            'Automotive',
            'Real Estate',
            'Lifestyle',
            'Parenting',
            'Science',
            'Art & Culture',
            'Politics',
            'Gaming',
            'Environment',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'sub_category' => null, // Peut être personnalisé si nécessaire
                'slug' => Str::slug($category),
                'description' => 'This is the description for ' . $category,
                'isActive' => rand(0, 1), // Actif ou non-actif de manière aléatoire
            ]);
        }
    }
}
