<?php

namespace App\Http\Controllers\Menu;


use Inertia\Inertia;
use App\Models\Menu\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index(): \Inertia\Response
    {
        $menus = Menu::whereNull('parent_id')->with('children')->orderBy('order')->get();

        return Inertia::render('Configuracion', [
            'menus' => $menus,
        ]);
    }


    public function getParentMenu()
    {
        $menus = Menu::whereNull('parent_id')->orderBy('order')->get();
        return response()->json($menus); // Esta puedes dejarla como API si solo se usa para select options
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string',
            'icon' => 'nullable|string',
            'parent_id' => 'nullable|exists:menus,id',
            'url' => 'nullable|string'
        ]);

        $maxOrder = Menu::where('parent_id', $request->parent_id)->max('order') ?? 0;
        
        $menuData = $request->all();
        $menuData['order'] = $maxOrder + 1;

        $menu = Menu::create($menuData);

        return redirect()->back()->with('success', 'Menú creado exitosamente');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'label' => 'sometimes|required|string',
            'icon' => 'sometimes|nullable|string',
            'parent_id' => 'sometimes|nullable|exists:menus,id',
            'url' => 'sometimes|nullable|string',
            'order' => 'sometimes|integer'
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return redirect()->back()->with('success', 'Menú actualizado');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        
        Menu::where('parent_id', $menu->parent_id)
            ->where('order', '>', $menu->order)
            ->decrement('order');

        return redirect()->back()->with('success', 'Menú eliminado correctamente');
    }

    public function updateOrder(Request $request)
    {
        try {
            DB::beginTransaction();
    
            // Validar que items venga como array
            $items = $request->input('items', []);
            if (!is_array($items)) {
                throw new \Exception("Formato de datos inválido");
            }
    
            $this->processMenuOrder($items);
            DB::commit();
    
            return redirect()->back()->with('success', 'Orden de menús actualizado correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al actualizar orden de menús: ' . $e->getMessage());
    
            return redirect()->back()->with('error', 'Error al actualizar el orden');
        }
    }
    

    protected function processMenuOrder(array $items, $parentId = null)
    {
        foreach ($items as $index => $item) {
            if (!isset($item['id'])) {
                throw new \Exception("Falta el ID en uno de los elementos");
            }
    
            Menu::where('id', $item['id'])->update([
                'order' => $index + 1,
                'parent_id' => $parentId
            ]);
    
            if (!empty($item['children'])) {
                $this->processMenuOrder($item['children'], $item['id']);
            }
        }
    }
    
}