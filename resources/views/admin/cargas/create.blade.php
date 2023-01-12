@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>Subir Archivos (Planillas)</h1>

@stop

@section('content')
    <div class="card">
            
        <div class="card-body">

            {{-- {!! Form::open(['route' => 'admin.cargas.store', 'autocomplete' => 'off', 'files' => true]) !!} --}}
            
            <form action="{{route('admin.cargas.store')}}" method="POST" enctype="multipart/form-data">

                @csrf

                {{-- @include('admin.cargas.partials.form') --}}
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control form-control-file" name="nombre" autocomplete="off" value="">
                
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Adjuntar</label>
                    <input type="file" class="form-control form-control-file" name="documento">
                
                    @error('documento')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <input type="submit" value="Guardar" class="btn btn-primary">

            </form>


            {{-- {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!} --}}
            {{-- {!! Form::close() !!} --}}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop