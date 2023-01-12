<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Gestor']);
        $role3 = Role::create(['name' => 'Soporte']);

        Permission::create(['name' => 'admin.home',
                            'description' => 'Ver el dashboard'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Ver listado de usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Asignar un rol'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.categories.index',
                            // 'description' => 'Ver listado de categorías'])->syncRoles([$role1, $role2]);
                            'description' => 'Ver listado de categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.create',
                            'description' => 'Crear categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit',
                            'description' => 'Editar categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy',
                            'description' => 'Eliminar categorías'])->syncRoles([$role1]);
        

        Permission::create(['name' => 'admin.subcategories.index',
                            // 'description' => 'Ver listado de subcategorías'])->syncRoles([$role1, $role2]);
                            'description' => 'Ver listado de subcategorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.subcategories.create',
                            'description' => 'Crear subcategorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.subcategories.edit',
                            'description' => 'Editar subcategorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.subcategories.destroy',
                            'description' => 'Eliminar subcategorías'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.estatus.index',
                            // 'description' => 'Ver listado de estados'])->syncRoles([$role1, $role2]);
                            'description' => 'Ver listado de estados'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.estatus.create',
                            'description' => 'Crear estado'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.estatus.edit',
                            'description' => 'Editar estado'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.estatus.destroy',
                            'description' => 'Eliminar estado'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.incidencias.index',
                            // 'description' => 'Ver listado de incidencias'])->syncRoles([$role1, $role2, $role3]);
                            'description' => 'Ver listado de incidencias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.incidencias.create',
                            'description' => 'Crear incidencias'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.incidencias.edit',
                            'description' => 'Editar incidencias'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.incidencias.destroy',
                            'description' => 'Eliminar incidencias'])->syncRoles([$role1/* , $role2 */]);

        Permission::create(['name' => 'admin.mis-incidencias.index',
                            'description' => 'Ver listado de mis-incidencias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.mis-incidencias.create',
                            'description' => 'Crear mis-incidencias'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.mis-incidencias.edit',
                            'description' => 'Editar mis-incidencias'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.mis-incidencias.destroy',
                            'description' => 'Eliminar mis-incidencias'])->syncRoles([$role1/* , $role2 */]);
        

        Permission::create(['name' => 'admin.cargas.index',
                            'description' => 'Ver listado de archivos'])->syncRoles([$role1, $role2, $role3]);
        
        Permission::create(['name' => 'admin.cargas.create',
                            'description' => 'Cargar archivo'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.cargas.store',
                            'description' => 'Subir archivo'])->syncRoles([$role1, $role3]);
        
        Permission::create(['name' => 'admin.cargas.edit',
                            'description' => 'Editar descarga'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.cargas.update',
                            'description' => 'Actualizar descarga'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.cargas.destroy',
                            'description' => 'Eliminar descarga'])->syncRoles([$role1/* , $role2 */]);

        Permission::create(['name' => 'admin.cargas.download',
                            'description' => 'Descargar doccumento'])->syncRoles([$role1, $role2, $role3]);

    }
}
