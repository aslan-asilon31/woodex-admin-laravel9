<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'roles' => 'admin'
        ]);

        // User::create([
        //     'name' => 'User',
        //     'email' => 'user@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('password'),
        // ]);

        // Category::create([
        //     'name' => 'Meja',
        //     'slug' => 'meja'
        // ]);

        // Category::create([
        //     'name' => 'Dekorasi',
        //     'slug' => 'dekorasi'
        // ]);

        // Category::create([
        //     'name' => 'Bangku',
        //     'slug' => 'bangku'
        // ]);

        // Product::factory(16)->create();
    }
}
