<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // USERS
        Schema::create('users_007', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'customer']);
            $table->timestamps();
        });

        // PRODUCTS
        Schema::create('products_007', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->timestamps();
        });

        // KURIRS
        Schema::create('kurirs_007', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('ekspedisi');
            $table->timestamps();
        });

        // ORDERS
        Schema::create('orders_007', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users_007')->onDelete('cascade');
            $table->foreignId('kurir_id')->nullable()->constrained('kurirs_007')->onDelete('set null');
            $table->date('order_date');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered'])->default('pending');
            $table->timestamps();
        });

        // ORDER ITEMS
        Schema::create('order_items_007', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders_007')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products_007')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items_007');
        Schema::dropIfExists('orders_007');
        Schema::dropIfExists('kurirs_007');
        Schema::dropIfExists('products_007');
        Schema::dropIfExists('users_007');
    }
};
