@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mostar rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title"> Hola mundo</h1>
        </div>

        <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aspernatur eos expedita voluptate at soluta ipsam deserunt incidunt? Labore neque ipsa debitis optio illo corrupti unde cum nostrum minima aut.</p>
        </div>
    </div>   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop