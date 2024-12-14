<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = User::pluck('id')->toArray(); // Récupérer les auteurs existants

        // Données d'articles réels pour certaines catégories
        $articlesData = [
            'Technology' => [
                'The Future of AI',
                '5G Networks: What You Need to Know',
                'Top Programming Languages in 2024',
                'The Rise of Quantum Computing',
                'Cybersecurity Trends',
                'Blockchain and Cryptocurrencies',
                'Cloud Computing Basics',
                'The Internet of Things (IoT)',
                'Wearable Tech Innovations',
                'The Role of Big Data',
            ],
            'Health & Wellness' => [
                'Healthy Eating Habits',
                'Mental Health Awareness',
                'Fitness Tips for Busy People',
                'The Benefits of Meditation',
                'Understanding Nutrition Labels',
                'The Importance of Sleep',
                'Yoga for Beginners',
                'Managing Stress Effectively',
                'Holistic Health Approaches',
                'Top Superfoods',
            ],
        ];

        // Remplir chaque catégorie avec au moins 10 articles
        $categories = Category::all();

        foreach ($categories as $category) {
            $titles = $articlesData[$category->name] ?? [];

            // Compléter les titres manquants pour atteindre 10 articles
            while (count($titles) < 10) {
                $titles[] = $category->name . ' Article ' . (count($titles) + 1);
            }

            foreach ($titles as $title) {
                Article::create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'image' => 'default.jpg', // Image par défaut
                    'sub_category' => null,
                    'content' => 'This is a detailed article about ' . strtolower($title),
                    'isActive' => true,
                    'isComment' => true,
                    'isShare' => true,
                    'category_id' => $category->id,
                    'author_id' => $authors[array_rand($authors)], // Auteur aléatoire
                ]);
            }
        }
    }
}
