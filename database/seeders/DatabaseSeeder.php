<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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


        // borrado y creación del directorio storage/app/public/incidencias
        Storage::deleteDirectory('incidencias');
        Storage::makeDirectory('incidencias');

        // $this->call(RoleSeeder::class);

        // \App\Models\User::factory(10)->create();
        // $this->call(UserSeeder::class);

        // Category::factory(4)->create();
        $this->call(CategorySeeder::class);
        
        // Modo::factory(4)->create();

        // Subcategory::factory(12)->create();
        $this->call(SubcategorySeeder::class);

        $this->call(EmergencySeeder::class);

        $this->call(EstatuSeeder::class);
        
        $this->call(IncidenciaSeeder::class);

    }
}
