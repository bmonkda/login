<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CargaController extends Controller
{

    private $disk = 'public';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $cargas = [];

    //     foreach (Storage::disk($this->disk)->files() as $archivo) {
    //         $nombre = /* str_replace('$this->disk/', '', $archivo) */ $archivo;
    //     }

    //     $downloadLink = route('admin.cargas.index', $nombre);

    //     $cargas[] = [
    //         'nombre' => $nombre, 
    //         'link' => $downloadLink, 
    //         'size' => Storage::disk($this->disk)->size($nombre), 
    //     ];

    //     return view('admin.cargas.index', compact('cargas'));
    // }

    public function index()
    {
        $cargas = Carga::all();
        return view('admin.cargas.index', compact('cargas'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cargas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
    {
        // Storage::put('prueba.txt', 'hola');

        if ($request->isMethod('POST')) {

            $nombre = $request->input('nombre');
            $archivo = $request->file('documento');

            $archivo->storeAs('', $nombre . '.' . $archivo->extension(), $this->disk);

        }

        return redirect()->route('admin.cargas.index');
    } */
    
/*     public function store(Request $request)
    {
        $carga = $request->all();

    //     $carga['uuid'] = (string) Str::uuid();

        if($request->hasFile('documento')){ */
            /**
             * 01 documentation way
            */
            // $carga['documento'] = $request->file('documento')->store('documentos');
    //         /**
    //          * 02 save just with the name
    //          */
            // $carga['documento'] = $request->file('documento')->getClientOriginalName();
            // $request->file('documento')->storeAs('documentos', $carga['documento']);
    //         /**
    //          * 03 save with time ahead and original name
    //          */
            // $carga['documento'] = date('dmYHis') . '-' . $request->file('documento')->getClientOriginalName();
            // $request->file('documento')->storeAs('documentos', $carga['documento']);
    //         /**
    //          * 04 save in a folder with the id of the user
    //          */
    //         $carga['documento'] = time() . '_' . $request->file('documento')->getClientOriginalName();
    //         $request->file('documento')
    //             ->storeAs('book_folder/' . auth()->id(), $carga['documento']);
/*         }

        Carga::create($carga);

        return redirect()->route('admin.cargas.index');
    }
 */




    public function store(Request $request)
    {

        //  dd($request->all());

        $carga = Carga::create([
            // 'uuid' => (string) Str::orderedUuid(),
            'nombre' => $request->nombre,
        ]);

        if($request->hasFile('documento'))
        {
            $doc = date('dmYHis') . '-' . $request->file('documento')->getClientOriginalName();
            $request->file('documento')
                // ->storeAs('subfolder/' . $carga->id, $doc);
                ->storeAs('documentos', $doc);
            $carga->update(['documento' => $doc]);
        }


        // if ($request->file('file')) {
        //     $url = Storage::put('incidencias', $request->file('file'));

        //     $incidencia->image()->create([
        //         'url' => $url
        //     ]);
        // }
        

        return redirect()->route('admin.cargas.index')->with('info', 'Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function show(Carga $carga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function edit(Carga $carga)
    {
        // dd($carga);
        return view('admin.cargas.edit', compact('carga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carga $carga)
    {
        $carga->update($request->only(['nombre']));
        if($request->hasFile('documento'))
        {
            $doc = $request->file('documento')->getClientOriginalName();
            $request->file('documento')
                // ->storeAs('subfolder/' . $carga->id, $image);
                ->storeAs('documentos/', $doc);

            if($carga->documento != '')
            {
                unlink(storage_path('app/public/subfolder/' . $carga->id . '/' . $carga->documento));
            }
            $carga->update(['documento' => $doc]);
        }
        return redirect()->route('admin.cargas.index')->with('info', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carga $carga)
    {
        $carga->delete();

        return redirect()->route('admin.cargas.index')->with('info', 'Documento se eliminó con éxito');
    }

    /* posible a eliminar */
    public function upload(Request $request)
    {
        $path = 'uploads/' . date('Y/m/d');
        $nombre_original = $request->file('nombre')->getClientOriginalName();

        $nombre_slug = Str::slug($request->file('nombre')->getClientOriginalName() . '-' . time() . '.' . trim($request->file('nombre')->getClientOriginalExtension()) );
        if ($request->file->storeAs($path, $nombre_slug, 'uploads')) {
            return redirect(url('/' . $path . '/' . $nombre_slug));
        }

    }

    public function download(Carga $carga)
    {
        // dd($carga->all());

        // $carga = Carga::where('uuid', $uuid)->firstOrFail();
        $carga = Carga::where('id', $carga->id)->firstOrFail();
        // $pathToFile = storage_path("app/public/subfolder/$carga->id/" . $carga->documento);
        $pathToFile = storage_path("app/public/documentos/" . $carga->documento);
        // return response()->download($pathToFile);
        return response()->file($pathToFile);
    }

}
