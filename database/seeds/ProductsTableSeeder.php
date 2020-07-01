<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'MacBook Pro',
            'slug' => 'macbook-pro',
            'description' => 'MackBook Pro',
            'price' => 2499.99,
            'image_path' => 'product.png',
            'status' => 1,
        ]);

        Product::create([
            'name' => 'Airpad',
            'slug' => 'airpad',
            'description' => 'Airpad',
            'price' => 2499.99,
            'image_path' => 'product.png',
            'status' => 1,
        ]);

        Product::create([
            'name' => 'Laptop HP',
            'slug' => 'laptop-hp',
            'description' => 'Laptop HP',
            'price' => 2499.99,
            'image_path' => 'product.png',
            'status' => 1,
        ]);

        Product::create([
            'name' => 'Iphone XS',
            'slug' => 'iphone-xs',
            'description' => 'Iphone XS',
            'price' => 2499.99,
            'image_path' => 'product.png',
            'status' => 1,
        ]);
    }
}
