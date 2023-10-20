<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminPassword'),
            'role' => 2
        ]);

        $category = Category::factory()->create([
            'name' => 'food'
        ]);

        $location = Location::factory()->create([
            'street' => 'Kvetinkova',
            'number' => '22',
            'city' => 'Brno',
            'zip' => '60200'
        ]);

        Event::factory(6)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'location_id' => $location->id
        ]);
    }
}
