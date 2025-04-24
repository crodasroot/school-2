<?php

namespace Database\Seeders;


use App\Models\Menu\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configMenu = Menu::create([
            'label' => 'Configuración',
            'icon' => 'settings',
            'url' => '/configuracion',
            'order' => 1,
            'parent_id' => null
        ]);

        // Crear submenús dentro de "Configuración"
        Menu::create([
            'label' => 'Usuarios',
            'icon' => 'users',
            'url' => '/configuracion/usuarios',
            'order' => 1,
            'parent_id' => $configMenu->id
        ]);

        Menu::create([
            'label' => 'Menus',
            'icon' => 'key',
            'url' => '/configuracion/menus',
            'order' => 2,
            'parent_id' => $configMenu->id
        ]);


        Menu::create([
            'label' => 'Permisos',
            'icon' => 'key',
            'url' => '/configuracion/permisos',
            'order' => 2,
            'parent_id' => $configMenu->id
        ]);

        Menu::create([
            'label' => 'Roles',
            'icon' => 'shield',
            'url' => '/configuracion/roles',
            'order' => 3,
            'parent_id' => $configMenu->id
        ]);
    }
}
