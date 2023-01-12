<?php

namespace Database\Seeders;

use App\Models\Emergency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmergencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emergency = Emergency::create([
            'name' => 'BAJA',
            'color' => 'warning',
        ]);

        $emergency = Emergency::create([
            'name' => 'MEDIA',
            'color' => 'secondary',
        ]);

        $emergency = Emergency::create([
            'name' => 'ALTA',
            'color' => 'danger',
        ]);
    }
}
