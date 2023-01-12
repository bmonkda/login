<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategorias = [
            [
                'name' => 'Actualización Sistema',
                'category_id' => 1
            ],
            [
                'name' => 'Configuración Servicio Proxy e Internet',
                'category_id' => 1
            ],
            [
                'name' => 'Desarrollo de Nuevas Aplicaciones',
                'category_id' => 1
            ],
            [
                'name' => 'Fallas en Procesos Automatizados Actividad Comercial',
                'category_id' => 1
            ],
            [
                'name' => 'Investigación y Desarrollo/Sistemas',
                'category_id' => 1
            ],
            

            [
                'name' => 'Actualización de Usuarios',
                'category_id' => 2
            ],
            [
                'name' => 'Adiestramiento de Aplicaciones',
                'category_id' => 2
            ],
            [
                'name' => 'Asignación de Permisología Nuevos Usuarios de Sistema',
                'category_id' => 2
            ],
            [
                'name' => 'Eliminación de Usuario',
                'category_id' => 2
            ],
            [
                'name' => 'Soporte Carnetización',
                'category_id' => 2
            ],
            [
                'name' => 'Soporte Gestión Presidencial',
                'category_id' => 2
            ],
            [
                'name' => 'Soporte Intranet',
                'category_id' => 2
            ],
            [
                'name' => 'Soporte Merú Acceso',
                'category_id' => 2
            ],
            [
                'name' => 'Soporte Merú Administrativo',
                'category_id' => 2
            ],
            [
                'name' => 'Soporte Merú Autogestionado de Salud',
                'category_id' => 2
            ],
            [
                'name' => 'Soporte Merú Comercial',
                'category_id' => 2
            ],
            [
                'name' => 'Soporte Merú RRHH',
                'category_id' => 2
            ],
            [
                'name' => 'Soporte Página Web',
                'category_id' => 2
            ],
            [
                'name' => 'Soporte Reportes de Aplicaciones',
                'category_id' => 2
            ],
            [
                'name' => 'Soporte SIGH',
                'category_id' => 2
            ],


            [
                'name' => 'Aplicativos de Grupos de Trabajo',
                'category_id' => 3
            ],
            [
                'name' => 'Asignación de Equipos de Computación/Equipos Electrónicos',
                'category_id' => 3
            ],
            [
                'name' => 'Asignación de Radio Móvil',
                'category_id' => 3
            ],
            [
                'name' => 'Asignación de Radio Portátil',
                'category_id' => 3
            ],
            [
                'name' => 'Asignación de Teléfono Fijo',
                'category_id' => 3
            ],
            [
                'name' => 'Asignación de Teléfono Móvil',
                'category_id' => 3
            ],
            [
                'name' => 'Problemas con Servicios de Datos',
                'category_id' => 3
            ],
            [
                'name' => 'Problemas de Red',
                'category_id' => 3
            ],


            [
                'name' => 'Adiestramiento',
                'category_id' => 4
            ],
            [
                'name' => 'Asesoría de Software',
                'category_id' => 4
            ],
            [
                'name' => 'Configuración estación de trabajo',
                'category_id' => 4
            ],
            [
                'name' => 'Falla con periférico de equipos de computación',
                'category_id' => 4
            ],
            [
                'name' => 'Instalación de Software',
                'category_id' => 4
            ],
            [
                'name' => 'Problemas Servicio Internet',
                'category_id' => 4
            ],
            [
                'name' => 'Revisión de Estación de Trabajo',
                'category_id' => 4
            ],
            [
                'name' => 'Servicio de Correo',
                'category_id' => 4
            ],
            [
                'name' => 'Servicio de Impresión',
                'category_id' => 4
            ],
            [
                'name' => 'Solicitud de Equipos Computación',
                'category_id' => 4
            ],
            [
                'name' => 'Solicitud de Toner / Consumible',
                'category_id' => 4
            ],
            [
                'name' => 'Traslado de Equipos de Computación',
                'category_id' => 4
            ],
            [
                'name' => 'Reparación de Equipos de Computación',
                'category_id' => 4
            ],


            [
                'name' => 'Servidor de Aplicaciones',
                'category_id' => 5
            ],
            [
                'name' => 'Servidor de Autenticación',
                'category_id' => 5
            ],
            [
                'name' => 'Servidor de Base de Datos',
                'category_id' => 5
            ],
            [
                'name' => 'Servidor de Correo Electrónico',
                'category_id' => 5
            ],
            [
                'name' => 'Servicio de Telefónica Fija',
                'category_id' => 5
            ],
        ];

        DB::table('subcategories')->insert($subcategorias);

    }
}
