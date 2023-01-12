<?php

namespace App\Http\Controllers;

use App\Models\Estatu;
use App\Http\Requests\StoreEstatuRequest;
use App\Http\Requests\UpdateEstatuRequest;
use App\Models\Statu;
use Illuminate\Support\Facades\Request;

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
        $status = Estatu::all();
        // return $status;
        return view('admin.status.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return 'crear estatus';
        return view('admin.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstatuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstatuRequest $request)
    {
        //
        $request->validate([
            'name' => 'required',
            // 'color' => 'required|unique:categories'
        ]);

        $statu = Estatu::create($request->all());
        return redirect()->route('admin.status.edit', $statu)->with('info', 'El estatu se creó con éxito');
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
    public function edit(Estatu $estatu)
    {
        return view('admin.status.edit', compact('estatu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstatuRequest  $request
     * @param  \App\Models\Estatu  $estatu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estatu $estatu)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $estatu->update($request->all());
        
        return redirect()->route('admin.status.edit', $estatu)->with('info', 'El estatu se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estatu  $estatu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estatu $estatu)
    {
        //
    }
}
