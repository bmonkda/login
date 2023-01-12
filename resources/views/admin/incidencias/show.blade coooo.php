@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalles</h1>
@stop

@section('content')
    <div class="card">
        
        <div class="card-body">

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Subcategoría</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{ $incidencia->id }}</td>
                        <td>{{ $incidencia->titulo }}</td>
                        <td>{!! $incidencia->descripcion !!}</td>
                        <td> CATEGORIA </td>
                        <td>{{ $incidencia->subcategory->name }}</td>
                    </tr>

                </tbody>
                
                

                <thead>
                    <tr>
                        <th>Urgencia</th>
                        <th>Estado</th>
                        <th>Asignado a</th>
                        <th>Fecha de envío</th>
                    </tr>

                </thead>
                

                <tbody>
                    <tr>
                        <td>{{ $incidencia->emergency->name }}</td>
                        <td class="project-state"><span class="badge badge-{{ $incidencia->estatu->color }}">{{ $incidencia->estatu->name }}</span></td>
                        <td>SOPORTE TÉCNICO</td>
                        <td>{{ $incidencia->created_at }}</td>
                    </tr>

                </tbody>

            </table>
            
        </div>
        @livewire('chat-incidencias', ['incidencia' => $incidencia])
        
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready( function() {
            $("#titulo").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        // ClassicEditor
        // .create( document.querySelector( '#titulo' ) )
        // .catch( error => {
        //     console.error( error );
        // } );

        ClassicEditor
        .create( document.querySelector( '#descripcion' ) )
        .catch( error => {
            console.error( error );
        } );

        // Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById("picture").setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
        
    </script>
@endsection