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
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $categories = Category::with('subcategories')->get();

        
        // $subcategories = Subcategory::all();
        $subcategories = Subcategory::with('category')->get();

        // $categories = Category::pluck('name', 'id');
        // $subcategories = Subcategory::pluck('name', 'id');
        $emergencies = Emergency::pluck('name', 'id');
        $estatus = Estatu::pluck('name', 'id');
        
        // return $categories;
        
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
    public function store(Request $request)
    {

        // return $request;
        // $incidencia = new Incidencia();

        // return $incidencia;


        $rules = [
            'titulo' => 'required|min:5',
            'slug' => 'required',
            'descripcion' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            // 'subcategory_id' => 'required|exists:categories,id',
            'emergency_id' => 'required|exists:categories,id',
        ];

        $messages = [
            'titulo.required' => 'Es necesario ingresar un título para la incidencia',
            'titulo.min' => 'El título debe contener al menos 5 caracteres',
            'descripcion.required' => 'Es necesario ingresar una descripcion para la incidencia',
            'descripcion.min' => 'El descripcion debe contener al menos 10 caracteres',
            'category_id.required' => 'Es necesario seleccionar una categoría',
            // 'subcategory_id.required' => 'Es necesario seleccionar una subcategoría',
            'emergency_id.required' => 'Es necesario seleccionar tipo urgencia',
            
        ];
        
        $this->validate($request, $rules, $messages);


        // $request->validate([
        //     'titulo' => 'required',
        //     'slug' => 'required',
        //     'descripcion' => 'required',
        //     'subcategory_id' => 'required',
        //     'emergency_id' => 'required',
        //     // 'estatu_id' => 'required',
        //     // 'user_id' => 'required',
            
        // ]);
        // return $request->all();
        
        // $incidencia = new Incidencia($request->input());
        $incidencia = new Incidencia();

        // return $incidencia;
        // $incidencia->titulo = $request->titulo;
        // $incidencia->slug = $request->slug;
        // $incidencia->descripcion = $request->descripcion;
        // $incidencia->category_id = $request->category_id;
        // $incidencia->subcategory_id = $request->subcategory_id;
        // $incidencia->emergency_id = $request->emergency_id;
        // $incidencia->estatu_id = $request->estatu_id;
        $incidencia->titulo = $request->input('titulo');
        $incidencia->slug = $request->input('slug');
        $incidencia->descripcion = $request->input('descripcion');
        $incidencia->category_id = $request->input('category_id');
        $incidencia->subcategory_id = $request->input('subcategory_id');
        $incidencia->emergency_id = $request->input('emergency_id');
        
        // $incidencia->crea_id = auth()->user()->id;
        $incidencia->user_id = auth()->user()->id;
        // return $incidencia;
        $incidencia->saveOrFail();
        
        // $incidencia = Incidencia::create($request->all());



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
     * Display the specified resource.
     *
     * @param  Incidencia $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencia $incidencia)
    {
        // $incidencia = Incidencia::findOrFail($incidencia);
        /* $categories = Category::pluck('name', 'id');
        $subcategories = Category::pluck('name', 'id'); */
        $messages = $incidencia->messages;
        /* $emergencies = Emergency::pluck('name', 'id');
        $estatus = Estatu::pluck('name', 'id'); */

        // return [$incidencia,$messages];

        // $users = User::where('name', 'Soporte Técnico')->pluck('name', 'id');

        // deje para probar de otra manera
        // users = DB::select('SELECT idusuario, idempleado, nombre, idgerencia, idunidadestructura, desgerencia, idstatus, idsede, dessede FROM rrhh.vis_exp_datos_empleado WHERE idstatus = 1 AND idgerencia = 901 ORDER BY idsede, idusuario, idficha', [1])->get();


        // $sql = "SELECT idusuario, idempleado, nombre, idgerencia, idunidadestructura, desgerencia, idstatus, idsede, dessede 
        //         FROM rrhh.vis_exp_datos_empleado 
        //         WHERE idstatus = ? AND idgerencia = ?";
        //         // -- WHERE estado=? AND edad<?";
        // DB::select($sql,array(1,20));


        // DB::table('users')  



        // $users = DB::connection('rrhh')->table('rrhh.vis_exp_datos_empleado')

        //     ->where('idgerencia', 901)
        //     ->where('idstatus', 1)
        //     ->orderBy('nombre', 'ASC')
        //     // ->latest('nombre')
        //     ->pluck('nombre', 'idempleado');
        //     // ->get();


        // @if (Auth::user()->hasRole('Admin'))
        $users = User::all()->pluck('name', 'id');

        // (hasRole('Admin'))->get();


            // ->whereExists(function($q){
            //     $q->DB::select('select * from users where idunidadestructura = 901', [1])
            // })

            // ->whereExists(function ($query) {
            //     $query->select(DB::raw(10))
            //         // ->from('orders')
            //         ->from('usuarios')
            //         ->whereRaw('usuarios.idusuario = idusuario-');
            // })
            // ->pluck('nombre', 'idempleado');
            // ->get();


        // $users = Usuario::join("rrhh.vis_exp_datos_empleado","usuarios.idusuario","=","idusuario")
        //             ->where('usuarios.idstatus','=',1)
        //             // ->where('idunidadestructura','=',901)
                    
        //             ->get();


        // $users = Usuario::where('idstatus',1)->get()/* where('name', 'Soporte Técnico')->pluck('name', 'id') */;
        
        
        // $query="SELECT idusuario, idempleado, nombre, idgerencia, idunidadestructura, desgerencia, idstatus, idsede, dessede
        // FROM rrhh.vis_exp_datos_empleado
        // WHERE idstatus = 1 AND idgerencia = 901
        // ORDER BY idsede, idusuario, idficha";
        // $users = DB::connection('rrhh')->select($query);

        
        //  return $users;

        return view('admin.incidencias.show', compact('incidencia', 'messages', 'users' /* 'categories', 'subcategories', 'emergencies', 'estatus', */ ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $incidencia)
    {
        // $this->authorize('author', $incidencia);
        // return [$incidencia];
        $categories = Category::pluck('name', 'id');
        $subcategories = Subcategory::where('category_id', $incidencia->category_id )->pluck('name', 'id');
        // $categories = Category::all();
        // $subcategories = Category::all();

        // return [$incidencia, $categories, $subcategories];
        


        // $messages = $incidencia->messages;
        // return $messages;
        
        $users = User::where('id','<',7)->pluck('name', 'id');
        // $users = User::where('name', 'like', 'Soporte Técnico%')->pluck('name', 'id');
        // $users = User::where('name', 'like', 'Soporte Técnico%')->get();

        // $users2 = DB::connection('rrhh')->table('rrhh.vis_exp_datos_empleado')

        //     ->where('idgerencia', 901)
        //     ->where('idstatus', 1)
        //     ->orderBy('nombre', 'ASC')
        //     // ->latest('nombre')
        //     ->pluck('nombre', 'idempleado');
        //     // ->get();

        // return $users; 

        $emergencies = Emergency::pluck('name', 'id');
        $estatus = Estatu::pluck('name', 'id');
        
        return view('admin.incidencias.edit', compact('incidencia', 'categories', 'subcategories', 'emergencies', 'estatus', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\IncidenciaRequest  $request
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        // $this->authorize('author', $incidencia);

        //  $incidencia->update($request->all());
        
        if (!$incidencia->estatu_id) {
            
            return $incidencia->estatu_id;
            $incidencia->estatu_id = $request->estatu_id;
        
        } else {

            $incidencia->titulo = $request->titulo;
            $incidencia->slug = $request->slug;
            $incidencia->descripcion = $request->descripcion;
            $incidencia->category_id = $request->category_id;
            $incidencia->subcategory_id = $request->subcategory_id;
            $incidencia->emergency_id = $request->emergency_id;
            $incidencia->estatu_id = $request->estatu_id;
            // $incidencia->user_id = $request->user_id;
            
            if ($request->asignado_id) {
                $incidencia->asignado_id = $request->asignado_id;
                $incidencia->asigna_id = Auth::user()->id;
            }
            
            // $incidencia->asigna_id = auth()->user()->id;
            
            $incidencia->saveOrFail();


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

        }
        // return  [$incidencia, $request->all()];
        // return  ;

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
        // $this->authorize('author', $incidencia);

        // return $incidencia;
        
        $incidencia->delete();

        return redirect()->route('admin.incidencias.index')->with('info', 'Incidencia se eliminó con éxito');
    }


    public function atender(Incidencia $incidencia)
    {
        $user = Auth::user();

        // if (!$user->adminlte_desc() === 'Admin') {
        //     return back();
        // }

        // $incidencia = Incidencia::findOrFail($incidencia);
        
        // $incidencia_user = IncidenciaUser::where('incidencia_id', $incidencia);

        $incidencia->asignado_por = $user->id;
        $incidencia->asignado_a = 3333;

    }

    public function resolver(Incidencia $incidencia)
    {
        $incidencia->estatu_id = 3;
    }

    public function asignar( Incidencia $incidencia)
    {
        return $incidencia;

        // $users = User::where('id','<',7)->pluck('name', 'id');
        $users = User::all()->pluck('name', 'id');

        $incidencia->create([
            // 'asignar_id' => $url
            'asignar_id' => 111
        ]);
        // $incidencia->category_id = $request->input('category_id');
        // $incidencia->asignado_id = 123;

        // return $incidencia;
        return back();
        // return view('admin.incidencias.asignar', compact('incidencia', 'users'));
    }

}
