<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estatu;
use App\Models\Incidencia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // incidencias
        $incidencias = Incidencia::with('estatu')->get();
        $estatus = Estatu::all();
        // return $incidencias;
        return view('admin.index', compact('incidencias', 'estatus'));
    }
}