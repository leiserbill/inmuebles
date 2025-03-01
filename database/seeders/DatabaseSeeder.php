<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Inmueble;
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
        User::factory(5)->create();
        $this->call(CategoriaSeeder::class);
        $this->call(PrecioSeeder::class);
        Inmueble::factory(10)->create(); 
      

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
