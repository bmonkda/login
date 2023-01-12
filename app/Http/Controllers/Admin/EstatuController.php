<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estatu;
use App\Http\Requests\StoreEstatuRequest;
use App\Http\Requests\UpdateEstatuRequest;
use Illuminate\Http\Request;

class EstatuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estatus = Estatu::all();
        return view('admin.estatus.index', compact('estatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return 'hola';
        return view('admin.estatus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstatuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'color' => 'required|unique:categories'
        ]);

        $estatus = Estatu::create($request->all());
        return redirect()->route('admin.estatus.edit', $estatus)->with('info', 'El estatus se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estatu  $estatu
     * @return \Illuminate\Http\Response
     */
    public function show(Estatu $estatu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estatu  $estatu
     * @return \Illuminate\Http\Response
     */
    public function edit(Estatu $estatus)
    {
        return view('admin.estatus.edit', compact('estatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstatuRequest  $request
     * @param  \App\Models\Estatu  $estatu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estatu $estatus)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $estatus->update($request->all());
        // return $estatus;
        return redirect()->route('admin.estatus.edit', $estatus)->with('info', 'El estatus se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estatu  $estatu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estatu $estatus)
    {
        $estatus->delete();
        return redirect()->route('admin.estatus.index')->with('info', 'El estatus se eliminó con éxito');
    }
}
