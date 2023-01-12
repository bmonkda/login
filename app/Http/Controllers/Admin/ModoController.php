<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modo;
use Illuminate\Http\Request;

class ModoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.modos.index')->only('index');
        $this->middleware('can:admin.modos.create')->only('create', 'store');
        $this->middleware('can:admin.modos.edit')->only('edit', 'update');
        $this->middleware('can:admin.modos.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modos = Modo::all();
        return view('admin.modos.index', compact('modos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colores =[
            'red' => 'Rojo',
            'indigo' => 'Indigo',
        ];

        return view('admin.modos.create', compact('colores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:modos',
            'color' => 'required',
        ]);
        
        $modo = Modo::create($request->all());

        return redirect()->route('admin.modos.edit', $modo)->with('info', 'La modalidad se creó con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Modo  $modo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modo $modo)
    {
        $colores =[
            'red' => 'Rojo',
            'indigo' => 'Indigo',
        ];

        return view('admin.modos.edit', compact('modo', 'colores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Modo  $modo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modo $modo)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:modos,slug,$modo->id",
            'color' => 'required',
        ]);

        $modo->update($request->all());
        
        return redirect()->route('admin.modos.edit', $modo)->with('info', 'La modalidad se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Modo  $modo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modo $modo)
    {
        $modo->delete();
        return redirect()->route('admin.modos.index')->with('info', 'La modalidad se eliminó con éxito');
    }
}
