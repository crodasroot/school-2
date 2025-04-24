<?php

namespace App\Http\Controllers\Administracion;


use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('administracion/role/Index', [
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('administracion/role/Created');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create($data);

        return redirect()->route('role.index');
    }

    public function edit(Role $role)
    {
        return Inertia::render('administracion/role/Edit', [
            'role' => [
                'id' => $role->id,
                'name' => $role->name,
                'permissions' => $role->permissions->pluck('name')->map(fn ($name) => ['name' => $name]),
            ],
            'allPermissions' => Permission::all(['name']),
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        $role->update([
            'name' => $request->name,
        ]);
       
        // Reemplaza los permisos existentes por los nuevos (o vacíos si vienen null)
        $role->syncPermissions($request->permissions ?? []);

        $allUserRol = User::all();
        foreach ($allUserRol as $user) {
            if ($user->hasRole($role->name)) {
                $user->givePermissionTo($request->permissions);
                $user->syncPermissions($request->permissions ?? []);
            }
        }
   
        return redirect()->route('role.index')->with('success', 'Rol actualizado correctamente.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('role.index');
    }
}
