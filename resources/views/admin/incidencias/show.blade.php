@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalles</h1>
    <script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>
@stop

@section('content')

    @if ( session('info') )
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

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
                        <td>{{ $incidencia->category->name }} </td>
                        <td>{{ $incidencia->subcategory->name }}</td>
                    </tr>

                </tbody>
                
                

                <thead>
                    <tr>
                        <th>Urgencia</th>
                        <th>Estado</th>
                        <th>Asignado a</th>
                        <th>Fecha de envío</th>
                        <th>Última actualización</th>
                    </tr>

                </thead>
                

                <tbody>
                    <tr>
                        {{-- <td>{{ $incidencia->emergency->name }}</td> --}}
                        <td class="project-state"><span class="badge badge-{{ $incidencia->emergency->color }}">{{ $incidencia->emergency->name }}</span></td>
                        <td class="project-state"><span class="badge badge-{{ $incidencia->estatu->color }}">{{ $incidencia->estatu->name }}</span></td>
                        <td>{{ $incidencia->asignado_id != null ? $incidencia->asignado->name : 'Sin asignar' }}</td>
                        <td>{{ $incidencia->created_at }}</td>
                        <td>{{ $incidencia->updated_at }}</td>
                    </tr>

                </tbody>

            </table>

        </div>

        
    </div>
    
    {{-- Usuario al que se va asinar la incidencia --}}
    {{-- @if (Auth::user()->hasRole('Admin')) --}}

    
        {{-- <div class="form-group"> --}}
            {{-- {!! Form::label('asignado_id', 'Asignado a:') !!} --}}
            {{-- {!! Form::select('asignado_id', $users, null, ['class' => 'form-control', 'id' => 'asignado_id', 'placeholder' => 'Selecione una opción']) !!} --}}
            {{-- {!! Form::select('size', array('L' => 'Large', 'S' => 'Small')) !!} --}}
            {{-- @error('asignado_id') --}}
                {{-- <small class="text-danger">{{ $message }}</small> --}}
            {{-- @enderror --}}
        {{-- </div> --}}
    
       
        {{-- <form method="POST" action="{{ url("notas/###") }}">
            @csrf
            @method('PUT')
            <!-- ... -->
            <input type="text" name="title" value="{{ old('title', 'Titulo actual') }}">
            <!-- ... -->
            <textarea name="content">{{ old('content', 'Contenido actual') }}</textarea>
            <!-- ... -->
            <button type="submit" class="btn btn-primary">Actualizar nota</button>
        </form> --}}


    {{-- @endif --}}

    {{-- {!! Form::model($incidencia, ['route' => ['admin.incidencias.update', $incidencia], 'autocomplete' => 'off', /*'files' => true,*/ 'method' => 'PUT']) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}

    {!! Form::submit('Asignar incidencia', ['class' => 'btn btn-primary mb-4']) !!} --}}



    <div>
        {{-- ----------------------------------------------------------------- --}}
        {{-- ----------------   aqui es para probar el chat   ---------------- --}}
        {{-- ----------------------------------------------------------------- --}}

        
        @livewire('chat-incidencias', ['incidencia' => $incidencia/* , 'messages' => $messages */]/* , key($messages->id) */)

        {{-- ----------------------------------------------------------------- --}}
        {{-- ----------------      hasta aqui es el chat      ---------------- --}}
        {{-- ----------------------------------------------------------------- --}}


        {{-- <script src="https://js.pusher.com/7.2.0/pusher.min.js"></script> --}}

        <script>

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
        
            var pusher = new Pusher('cfcd21aee3bb5901b977', {
              cluster: 'sa1'
            });
        
            var channel = pusher.subscribe('chat-channel');
            channel.bind('chat-event', function(data) {
            //   alert(JSON.stringify(data));
                window.livewire.emit('mensajeRecibido');
            });
    
        </script>

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
    
    {{-- <script src="https://js.pusher.com/7.2.0/pusher.min.js"></script> --}}
    
@endsection