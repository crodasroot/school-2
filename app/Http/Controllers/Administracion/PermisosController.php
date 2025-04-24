<?php

namespace App\Http\Controllers\Administracion;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;


class PermisosController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('administracion/permision/Index', [
            'permisions' => Permission::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('administracion/permision/Created');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
          
        ]);

      
        Permission::create($data);

        return redirect()->route('permision.index');
    }

    public function edit(Permission $permision)
    {
        return Inertia::render('administracion/permision/Edit', [
            'permision' => $permision
        ]);
    }

    public function update(Request $request, Permission $permision)
    {
        $data = $request->validate([
            'name' => 'required',
            'guard_name' => "required",
        ]);

        $permision->update($data);

        return redirect()->route('permision.index');
    }

    public function destroy(Permission $permision)
    {
        $permision->delete();

        return redirect()->route('permision.index');
    }
}
