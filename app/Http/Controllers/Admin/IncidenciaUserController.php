<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IncidenciaUser;
use Illuminate\Http\Request;

class IncidenciaUserController extends Controller
{

    public function index()
    {
        
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        
        $incidencia_user = new IncidenciaUser();
        $incidencia_user->user_id = $request->input('user_id');
        $incidencia_user->incidencia_id = $request->input('incidencia_id');
        $incidencia_user->asignado_id = $request->input('asignado_id');
        $incidencia_user->saveOrFail();

        return back();
        
    }


    public function show(UserController $carga)
    {
        //
    }


    public function update(Request $request, UserController $carga)
    {
        
    }


    public function destroy(UserController $carga)
    {
        
    }
}
