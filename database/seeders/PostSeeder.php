<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing posts before seeding
        DB::table('posts')->truncate();

        $components = [
            [
                'name' => 'Button',
                'quantity' => 12,
                'description' => 'Modern, customizable button components with various styles and states.',
            ],
            [
                'name' => 'Nav Bar',
                'quantity' => 5,
                'description' => 'Responsive navigation bars with dropdown support and mobile-friendly layouts.',
            ],
            [
                'name' => 'Badge',
                'quantity' => 8,
                'description' => 'Small count and labeling components with multiple color variations.',
            ],
            [
                'name' => 'Pagination',
                'quantity' => 3,
                'description' => 'Pagination controls for navigating through multi-page content.',
            ],
            [
                'name' => 'Card',
                'quantity' => 7,
                'description' => 'Flexible content containers with headers, footers, and various content layouts.',
            ],
            [
                'name' => 'Modal',
                'quantity' => 4,
                'description' => 'Dialog windows that can be used for user notifications and form inputs.',
            ],
            [
                'name' => 'Alert',
                'quantity' => 6,
                'description' => 'Contextual feedback messages for typical user actions.',
            ],
            [
                'name' => 'Dropdown',
                'quantity' => 5,
                'description' => 'Toggle contextual overlays for displaying lists of links and actions.',
            ]
        ];

        foreach ($components as $component) {
            Post::create([
                'title' => $component['name'] . ' Component',
                'slug' => Str::slug($component['name'] . '-component'),
                'excerpt' => "A collection of {$component['quantity']} customizable {$component['name']} components for your projects.",
                'published_at' => now()->subDays(rand(1, 30)),
                'quantity' => $component['quantity'],
            ]);
        }
    }
}