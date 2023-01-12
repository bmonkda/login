@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.incidencias.create') }}">Nueva incidencia</a>

    <h1>Incidencias para Mi</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{ session('info') }} </strong>
        </div> 
    @endif

    @livewire('admin.mis-asignadas' )
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    {{-- <script src="sweetalert2.all.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if (session('info'))
        <script>
            Swal.fire(
                '¡Eliminado!',
                'La incidencia ha sido eliminada.',
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
                confirmButtonText: 'Sí, bórralo!'
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



    {{-- <script>
        
        Livewire.on('borrarIncidencia', incidId => {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('admin.mis-incidencias-index', 'borrar', incidId)

                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });

    </script> --}}

@stop