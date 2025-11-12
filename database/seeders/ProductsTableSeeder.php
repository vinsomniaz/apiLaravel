<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Caramel Macchiato',
                'description' => 'Rich espresso with caramel drizzle and milk foam.',
                'image_url' => 'https://drive.google.com/file/d/19UUKZ8Oo-Ft36Uyuk5OcsV14z7ongzK8/view?usp=drive_link',
                'price' => 4.00,
                'category' => 'hot_drink',
                'is_new' => true,
                'extras' => json_encode([
                    'groups' => [
                        [
                            'name' => 'Milk',
                            'pick' => 1,
                            'options' => [
                                ['label' => 'Full-fat milk', 'priceDelta' => 0],
                                ['label' => 'Oat milk', 'priceDelta' => 0.7],
                            ]
                        ],
                        [
                            'name' => 'Whipped Cream',
                            'pick' => 1,
                            'options' => [
                                ['label' => 'Without', 'priceDelta' => 0],
                                ['label' => 'With', 'priceDelta' => 0.5],
                            ]
                        ]
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vanilla Latte',
                'description' => 'Delicate espresso with vanilla syrup and milk foam.',
                'image_url' => 'https://drive.google.com/file/d/1zE0iAihzlS_w00CiG2w_A2UgU5yfwKNe/view?usp=drive_link',
                'price' => 3.00,
                'category' => 'hot_drink',
                'is_new' => true,
                'extras' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
