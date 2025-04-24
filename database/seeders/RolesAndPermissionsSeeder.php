<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         // Desactiva restricciones de clave foránea para truncar
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Vacía tablas relacionadas con roles y permisos
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

       // Reset cache
       app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

       // Crear permisos
       $permissions = [
           'ver alumnos',
           'crear alumnos',
           'editar alumnos',
           'eliminar alumnos',
           'ver profesores',
           'crear profesores',
           'editar profesores',
           'eliminar profesores',
           'ver cursos',
           'Menu horarios',
           'Menu configuracion',
           'Menu usuarios',
       ];

       foreach ($permissions as $perm) {
           Permission::firstOrCreate(['name' => $perm]);
       }

       // Crear roles y asignar permisos
       $admin = Role::firstOrCreate(['name' => 'admin']);
       $admin->syncPermissions(Permission::all());

       $profesor = Role::firstOrCreate(['name' => 'profesor']);
       $profesor->syncPermissions([
           'ver alumnos',
           'ver cursos',
           'Menu horarios',
       ]);

       $alumno = Role::firstOrCreate(['name' => 'alumno']);
       $alumno->syncPermissions([
           'ver cursos',
       ]);


       $user = User::find(1); // Encuentra al usuario con ID 1
       if ($user) {
           $user->assignRole('admin'); // Asigna el rol admin
           $user->givePermissionTo(Permission::all());
       }
       
    }
}
