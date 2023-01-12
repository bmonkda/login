@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @can('admin.cargas.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.cargas.create') }}">Subir documento</a>
    @endcan

    <h1>Lista de Documentos (Planillas)</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{ session('info') }} </strong>
        </div> 
    @endif

    {{-- @livewire('admin.cargas-index') --}}
    {{-- todo este código se puede llevar a un componente  de aquí--}}
    <div class="card">

        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre">
        </div>
        
        @if ($cargas->count())
    
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Archivo a descargar </th>

                            <th colspan="2"></th>
                        </tr>
                    </thead>
    
                    <tbody>
                        
                        @foreach ($cargas as $carga)
                            <tr>
                                <td>{{ $carga->id }}</td>
                                <td>{{ $carga->nombre }}</td>
                                {{-- <td>{{ $carga->documento }}</td> --}}
                                <td>{{Str::substr($carga->documento, 15, Str::length($carga->documento))}}</td>
    
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.cargas.download', $carga) }}" title="Descargar">
                                        <i class="fas fa-download" >
                                        </i>
                                        {{-- Descargar --}}
                                    </a>
                                </td>

                                @can('admin.cargas.edit')

                                    <td width="10px">
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.cargas.edit', $carga) }}" title="Editar">
                                            <i class="fas fa-pencil-alt" >
                                            </i>
                                            {{-- Editar --}}
                                        </a>
                                    </td>
                                
                                @endcan

                                @can('admin.cargas.destroy')
                                    
                                <td width="10px">
                                    <form class="form-eliminar" action="{{ route('admin.cargas.destroy', $carga->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                            <i class="fas fa-trash">
                                            </i>
                                            {{-- Eliminar --}}
                                        </button>
                                    </form>
                                </td>

                                @endcan

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div class="card-footer">
                {{-- {{ $cargas->links() }} --}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro...</strong>
            </div>
        @endif
    
    </div>
    {{-- hasta aqui --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if (session('info') == 'Documento se eliminó con éxito' )
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Documento se eliminó con éxito.',
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