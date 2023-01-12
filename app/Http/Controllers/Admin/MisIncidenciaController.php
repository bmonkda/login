<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Incidencia;

class MisIncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $incidencias = Incidencia::where('crea_id', auth()->user()->id)->get();
        $incidencias = Incidencia::where('user_id', auth()->user()->id)->get();
        return view('admin.mis-incidencias.index', compact('incidencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Incidencia $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencia $incidencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Incidencia $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $incidencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Incidencia $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Incidencia $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencia $incidencia)
    {
        // $this->authorize('author', $incidencia);
        
        // return $incidencia;

        $incidencia->delete();

        return redirect()->route('admin.mis-incidencias.index')->with('info', 'Incidencia se eliminó con éxito');
    }
}
