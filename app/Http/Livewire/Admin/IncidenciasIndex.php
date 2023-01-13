<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Incidencia;

use Livewire\WithPagination;
use Illuminate\Support\Str;

class IncidenciasIndex extends Component
{

    use WithPagination;

    public $search;

    // para que la paginación funcione con los estilos de boostrap
    protected $paginationTheme = 'bootstrap';

    //Se activa unicamente cuando el valor de la propiedad search cambia y resetea la paginación
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        // $myincidencias = Incidencia::where('crea_id', auth()->user()->id)
        $myincidencias = Incidencia::where('user_id', 4381/* auth()->user()->idusuario */)
                        // ->where('name', 'LIKE', '%' . $this->search . '%')
                        ->where('titulo', 'LIKE', '%' . Str::upper($this->search) . '%')
                        ->latest('id')
                        ->paginate(10);
        
        //todas las incidencias

        // $incidencias = Incidencia::where('status', 2)
        //                 ->where('name', 'LIKE', '%' . $this->search . '%')
        //                 ->latest('id')
        //                 ->paginate();

        // $incidencias = Incidencia::latest('id')->paginate(8);

        $allincidencias = Incidencia::with([/*'crea',*/ 'subcategory', 'category', 'emergency', 'estatu'])
        // ->where('name', 'LIKE', '%' . $this->search . '%')
        // (Str::lower('titulo'), 'LIKE', '%' . Str::lower($this->search) . '%')
        ->where('titulo', 'LIKE', '%' . $this->search . '%')
        ->orWhere('titulo', 'LIKE', '%' . Str::ucfirst($this->search) . '%')
        ->orWhere('titulo', 'LIKE', '%' . Str::lower($this->search) . '%')
        ->orWhere('titulo', 'LIKE', '%' . Str::upper($this->search) . '%')
        ->latest('id')
        ->paginate(10);

        //codigo condicional para mostrar las incidencias del usuario cuando el id es Admin o gestor
        // if(auth()->user()->hasRole('Admin')){
            $incidencias = $allincidencias;
        // }else{
        //     $incidencias = $myincidencias;
        // }
        return view('livewire.admin.incidencias-index', compact('incidencias'));
    }
}
