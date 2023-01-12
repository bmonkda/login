<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categorias = [
            [
                'name' => 'Investigación y desarrollo',
                'slug' => Str::slug('Investigación y desarrollo')
            ],
            [
                'name' => 'Sistemas',
                'slug' => Str::slug('Sistemas')
            ],
            [
                'name' => 'Telecomunicaciones e Infraestructura',
                'slug' => Str::slug('Telecomunicaciones e Infraestructura')
            ],
            [
                'name' => 'Soporte Técnico',
                'slug' => Str::slug('Soporte Técnico')
            ],
            [
                'name' => 'Data Center',
                'slug' => Str::slug('Data Center')
            ],
        ];

        DB::table('categories')->insert($categorias);
    }
}
