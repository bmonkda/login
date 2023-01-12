@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @can('admin.categories.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.categories.create') }}"> Agregar categoría</a>
    @endcan
    <h1>Lista de categoría</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">
            <strong> {{ session('info') }} </strong>
        </div>   
    @endif --}}

    <div class="card">

        <div class="card-body">
            
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px">
                                @can('admin.categories.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.categories.destroy')
                                    <form class="form-eliminar" action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if (session('info') )
        <script>
            Swal.fire(
                '¡Eliminado!',
                'La categoría ha sido eliminada.',
                'success'
            )
        </script>
    @endif


    <script>

        $('.form-eliminar').submit(function(e){

            e.preventDefault();
            
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrá revertir esta operación!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, bórralo!',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        /* Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        ) */

                        this.submit();
                    }
                })

        })


    </script>

@stop