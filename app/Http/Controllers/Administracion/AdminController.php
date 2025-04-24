<?php

namespace App\Http\Controllers\Administracion;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(): \Inertia\Response
    {
       
        return Inertia::render('Admin', [
            'menus' => "hola",
        ]);
    }
}
