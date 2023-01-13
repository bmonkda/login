@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tablero</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

            {{-- <h3>{{ Auth::user()->name }}</h3> --}}
            <h3>{{ Auth::user() }}</h3>
            <h5>Bienvenido al sistema</h5>

        </div>
        
        
        <div class="card-body">
            
            @if (Auth::user()/* ->hasRole('Admin') */)

                <div class="row">

                    <div class="col-lg-3 col-6">
                        
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $incidencias->count() }}</h3>
                                <p>Incidencias</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('admin.incidencias.index')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-lg-3 col-6">
                    
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $incidencias->where('estatu_id', 1)->count() }} ({{ round($incidencias->where('estatu_id', 1)->count() * 100 / $incidencias->count() ,1) }}<sup style="font-size: 20px">%</sup>)</h3>
                                <p>{{ $estatus->where('id', 1)->first()->name }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                    
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>{{ $incidencias->where('estatu_id', 2)->count() }} ({{ round($incidencias->where('estatu_id', 2)->count() * 100 / $incidencias->count() ,1) }}<sup style="font-size: 20px">%</sup>)</h3>
                                <p>{{ $estatus->where('id', 2)->first()->name }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                    
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $incidencias->where('estatu_id', 3)->count() }} ({{ round($incidencias->where('estatu_id', 3)->count() * 100 / $incidencias->count() ,1) }}<sup style="font-size: 20px">%</sup>)</h3>
                                <p>{{ $estatus->where('id', 3)->first()->name }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                    
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $incidencias->where('estatu_id', 4)->count() }} ({{ round($incidencias->where('estatu_id', 4)->count() * 100 / $incidencias->count() ,1) }}<sup style="font-size: 20px">%</sup>)</h3>
                                <p>{{ $estatus->where('id', 4)->first()->name }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    
                </div>

            @endif

        </div>
        
        {{-- <div>
            <h5>Incidencias asignadas</h5>
            
        </div> --}}
    </div>   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop