<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Str;

class UsersIndex extends Component
{
    use WithPagination;

    public $search;
    
    protected $paginationTheme = 'bootstrap'; 

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // $users = DB::table('acceso.usuarios')->get();
        // $users = DB::table('acceso.usuarios')->paginate();
        
        // $users = User::where('name', 'LIKE', '%' . $this->search . '%')
        //             ->orwhere('email', 'LIKE', '%' . $this->search . '%')
        //             ->paginate();
        
        // $users = Usuario::where('idstatus', 1)
        
        //             ->where('nombre', 'LIKE', '%' . "$this->search" . '%')
                    
        //             ->orWhere('nombre', 'LIKE', '%' . Str::upper($this->search) . '%')
        //             ->orwhere('correo', 'LIKE', '%' . $this->search . '%')

        //             ->paginate();
        
        
        // $users = Usuario::where('idstatus', 1)
        $users = User::where('idstatus', 1)
            // ->orderBy('idusuario', 'desc')
            ->latest('idusuario');
            // ->paginate();

        if ($this->search){
            $users = $users->where('nombre','LIKE',"%$this->search%")
            ->orWhere('nombre', 'LIKE', '%' . Str::upper($this->search) . '%')
            ->orwhere('correo', 'LIKE', '%' . $this->search . '%')
            ->orwhere('idusuario', 'LIKE', '%' . $this->search . '%');
        }
        $users = $users->paginate();
        
            // $users = $users->where('nombre', 'LIKE', '%' . "$this->search" . '%');
            
    
        //             ->where('nombre', 'LIKE', '%' . "$this->search" . '%')
                    
        //             ->orWhere('nombre', 'LIKE', '%' . Str::upper($this->search) . '%')
        //             ->orwhere('correo', 'LIKE', '%' . $this->search . '%')

                    // ->paginate();

                   


        // $users = Usuario::from('acceso.usuarios as a')
        //     ->where(function ($query) use ($this->search) {
        //         // $query = $query->orWhere('a.nombre','like','%' . "$this->search" . '%');
        //         $query = $query->orWhere('a.nombre','like',"%$this->search%");
        //         $query = $query->orWhere('a.correo','like',"%$this->search%");
        //         $query = $query->orWhere('a.idusuario','like',"%$this->search%");
        //     });
        // $users = $users->where('a.idstatus','=',1)->get();
        
        // $users = Usuario::
        //     // ->where(function ($query) use ($this->search) {
        //         // where('nombre','like','%' . "$this->search" . '%');
        //         where('nombre','like',"%$this->search%")
        //         ->orWhere('correo','like',"%$this->search%")
        //         ->orWhere('idusuario','like',"%$this->search%")->orderBy('asc');
        //     // });
        // $users = $users->orwhere('idstatus',1)->paginate();

        return view('livewire.admin.users-index', compact('users'));
    }
}
