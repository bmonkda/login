<?php

namespace Database\Seeders;

use App\Models\Estatu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estatu = Estatu::create([
            'name' => 'EN ESPERA',
            // 'color' => '#ffc107',
            // 'color' => 'red-600',
            'color' => 'warning',
        ]);

        $estatu = Estatu::create([
            'name' => 'ASIGNADA',
            // 'color' => '#28a745',
            // 'color' => 'gray-500',
            'color' => 'primary',
        ]);

        $estatu = Estatu::create([
            'name' => 'CERRADA (RESUELTA)',
            // 'color' => '#dc3545',
            // 'color' => 'indigo-600',
            'color' => 'success',
        ]);
        
        $estatu = Estatu::create([
            'name' => 'CERRADA (NO RESUELTA)',
            // 'color' => '#dc3545',
            // 'color' => 'gray-800',
            'color' => 'danger',
        ]);
    }
}
