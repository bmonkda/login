<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Incidencia;
use App\Models\Estatu;
use App\Models\Modo;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{

    public function index()
    {
        // $incidencias  = Incidencia::where('status',2)->latest('id')->paginate(8);
        $incidencias = Incidencia::latest('id')->paginate(8);

        // return $incidencias;

        return view('incidencias.index',compact('incidencias'));
    }

    public function show(Incidencia $incidencia){
        // $this->authorize('published', $incidencia);

        $similares = Incidencia::with(['subcategory'])
                            ->where('subcategory_id', $incidencia->subcategory_id)
                            ->where('id','!=',$incidencia->id)
                            // ->where('status',2)
                            ->latest('id')
                            ->take(4)
                            ->get();
        

        return view('incidencias.show',compact('incidencia', 'similares'));
    }

    // public function category(Category $category){
    public function category(Category $category){
        // $incidencias = Incidencia::where('category_id', $category->id)
        $incidencias = Incidencia::where('subcategory_id', $category->id)
                        // ->where('status', 2)
                        ->latest('id') 
                        ->paginate(5);
        return view('incidencias.category',compact('incidencias', 'category'));
    }

    public function modo(Modo $modo){
        
        $incidencias = $modo->incidencias()->where('status', 2)->latest('id')->paginate(5);
        return view('incidencias.modo',compact('incidencias', 'modo'));
    }
    

    // public function estatu(Estatu $estatu){
        
    //     $incidencias = $estatu->incidencias()
    //                 // ->where('status', 2)
    //                 ->latest('id')
    //                 ->paginate(5);
    //     return view('incidencias.modo',compact('incidencias', 'modo'));
    // }

}
