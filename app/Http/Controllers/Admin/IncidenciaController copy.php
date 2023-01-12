<?php

namespace App\Http\Controllers\Admin;

use App\Events\IncidenciaEvent;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\Modo;
use App\Http\Requests\IncidenciaRequest;
use App\Models\Emergency;
use App\Models\Estatu;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\StoreIncidenciaRequest;

class IncidenciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.incidencias.index')->only('index');
        $this->middleware('can:admin.incidencias.create')->only('create', 'store');
        $this->middleware('can:admin.incidencias.edit')->only('edit', 'update');
        $this->middleware('can:admin.incidencias.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.incidencias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $categories = Category::all();
        // $subcategories = Subcategory::all();
        $categories = Category::pluck('name', 'id');
        $subcategories = Subcategory::pluck('name', 'id');
        $emergencies = Emergency::pluck('name', 'id');
        $estatus = Estatu::pluck('name', 'id');
        
        
        // return [
        //     'categories' => $categories,
        //     'subcategories' => $subcategories,
        //     'emergencies' => $emergencies,
        //     'estatus' => $estatus,
        // ];
        

        return view('admin.incidencias.create', compact('categories', 'subcategories', 'emergencies', 'estatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\IncidenciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(IncidenciaRequest $request)
    public function store(StoreIncidenciaRequest $request)
    {

        $request->validate([
            'titulo' => 'required',
            'slug' => 'required',
            'descripcion' => 'required',
            'user_id' => 'required',

            // 'category_id' => 'required',
            
            'subcategory_id' => 'required',
            'emergency_id' => 'required',
            'estatu_id' => 'required',


        ]);

        $incidencia = Incidencia::create($request->all());

        // if ($request->file('file')) {
        //     $url = Storage::put('incidencias', $request->file('file'));

        //     $incidencia->image()->create([
        //         'url' => $url
        //     ]);
        // }
        

        // esto es para el evento de crear una incidencia
        // event(new IncidenciaEvent($incidencia));

        return redirect()->route('admin.incidencias.edit', $incidencia)->with('info', 'Incidencia creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $incidencia)
    {
        $this->authorize('author', $incidencia);

        $categories = Category::pluck('name', 'id');
        $subcategories = Category::pluck('name', 'id');
        // $categories = Category::all();
        // $subcategories = Category::all();

        $emergencies = Emergency::pluck('name', 'id');
        $estatus = Estatu::pluck('name', 'id');

        return view('admin.incidencias.edit', compact('incidencia', 'categories', 'subcategories', 'emergencies', 'estatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\IncidenciaRequest  $request
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(StoreIncidenciaRequest $request, Incidencia $incidencia)
    {
        $this->authorize('author', $incidencia);

        $incidencia->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('incidencias', $request->file('file'));
        
            if ($incidencia->image) {
                Storage::delete($incidencia->image->url);

                $incidencia->image()->update([
                    'url' => $url
                ]);
            } else {
                $incidencia->image()->create([
                    'url' => $url
                ]);
            }
        }

        // if ($request->modos) {
        //     $incidencia->modos()->sync($request->modos);
        // }

        return redirect()->route('admin.incidencias.edit', $incidencia)->with('info', 'Incidencia actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencia $incidencia)
    {
        $this->authorize('author', $incidencia);
        
        $incidencia->delete();

        return redirect()->route('admin.incidencias.index')->with('info', 'Incidencia se eliminó con éxito');
    }
}
