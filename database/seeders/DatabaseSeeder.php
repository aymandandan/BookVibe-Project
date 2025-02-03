<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //->create() || ::create() both henne same as insert operation
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'adminTest@example.com',
            'password' => bcrypt('admin@ccount'),
            'type' => 'admin'
        ]);

        Category::factory(5)->create();
        Author::factory(5)->create();
        Book::factory(30)->create();
    }
}
