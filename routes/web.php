<?php

use Inertia\Inertia;
use App\Models\Menu\Menu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Administracion\RoleController;
use App\Http\Controllers\Administracion\UserController;
use App\Http\Controllers\Configuracion\AlumnoController;



Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
   
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Rutas protegidas por roles
Route::middleware('role:admin')->group(function () {
    Route::get('/admin/dashboard', fn () => 'Solo para admins')->name('admin.dashboard');
});

// Rutas para configuración con permisos específicos
Route::middleware(['permission:Menu administracion'])->group(function () {
    Route::prefix('administracion')->group(function () {
        Route::get('/menu', [MenuController::class, 'index'])->name('menus.index');
        Route::post('/menu', [MenuController::class, 'store'])->name('menus.store');
        Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menus.update');
        Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
        Route::post('/menu/orden', [MenuController::class, 'updateOrder'])->name('menus.updateOrder');
        Route::get('/menu/parents', [MenuController::class, 'getParentMenu'])->name('menus.parents');
        Route::middleware(['permission:ver permisos	'])->group(function () {
            Route::resource('/permision', PermisosController::class)->names('permision');
        });
        Route::resource('/user', UserController::class)->names('user');
        Route::resource('/role', RoleController::class)->names('role');
    
    });
});



// Rutas para configuración con permisos específicos
Route::middleware(['permission:Menu configuracion'])->group(function () {
    Route::prefix('configuracion')->group(function () {
     
        Route::resource('/alumno', AlumnoController::class)->names('alumno');
      
    });
});

// Rutas solo accesibles por permisos específicos (por ejemplo, 'ver usuarios')
Route::middleware('permission:ver usuarios')->group(function () {
   // Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
});

// O puedes tener rutas que exijan tanto un rol como un permiso
Route::middleware(['role:admin', 'permission:gestionar usuarios'])->group(function () {
    //Route::get('/admin/usuarios', [UserController::class, 'adminIndex'])->name('admin.usuarios.index');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
