<?php

namespace App\Http\Controllers\Administracion;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(): \Inertia\Response
    {
        $user = auth()->user();

       
      
        return Inertia::render('administracion/user/Index', [
            'users' => User::all(),
            'allRoles' => Role::all(['name']),
            'userPermissions' => $user->getAllPermissions()->pluck('name'),
          
        ]);
    }

    public function create()
    {
        return Inertia::render('administracion/user/Created');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return Inertia::render('administracion/user/Edit', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->roles->pluck('name')->map(fn ($name) => ['name' => $name]),
            ],
            'allRoles' => Role::all(['name']),
        ]);
    }
    

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string|exists:roles,name',
        ]);
    
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);
    
        $user->syncRoles([$validated['role']]);
        $user->assignRole($validated['role']); // Asigna el rol admin

        $rol = Role::firstOrCreate(['name' => $validated['role']]);
        $user->syncRoles([$rol->name]);
        $user->syncPermissions([]); // Elimina permisos existentes
        // Asigna todos los permisos al usuario
        // Puedes ajustar esto según tus necesidades
        $user->syncPermissions($rol->permissions);
        $user->givePermissionTo($rol->permissions);

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
