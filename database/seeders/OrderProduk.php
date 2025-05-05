<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderProduk extends Seeder
{
    public function run(): void
    {
        // USERS
        DB::table('users_007')->insert([
            [
                'name' => 'Admin Skincare',
                'email' => 'admin@skincare.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nayla Customer',
                'email' => 'nayla@skincare.com',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // PRODUCTS
        DB::table('products_007')->insert([
            [
                'name' => 'Facial Wash',
                'description' => 'Sabun wajah untuk kulit sensitif',
                'price' => 55000,
                'stock' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Night Cream',
                'description' => 'Krim malam untuk mencerahkan wajah',
                'price' => 75000,
                'stock' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // KURIRS
        DB::table('kurirs_007')->insert([
            [
                'name' => 'Kurir A',
                'phone' => '081234567890',
                'ekspedisi' => 'JNE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kurir B',
                'phone' => '089876543210',
                'ekspedisi' => 'SiCepat',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // ORDERS
        DB::table('orders_007')->insert([
            [
                'user_id' => 2, // Customer Nayla
                'kurir_id' => 1, // Kurir A
                'order_date' => now(),
                'total_price' => 130000,
                'status' => 'processing',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // ORDER ITEMS
        DB::table('order_items_007')->insert([
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'price' => 55000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
                'price' => 75000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
