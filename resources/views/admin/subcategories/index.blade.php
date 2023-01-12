@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @can('admin.subcategories.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.subcategories.create') }}"> Agregar subcategoría</a>
    @endcan
    <h1>Lista de subcategoría</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{ session('info') }} </strong>
        </div>   
    @endif

    <div class="card">

        <div class="card-body">
            
            {{-- <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoría</th>
                        <th>Subcategoría</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{$subcategory->id}}</td>
                            <td>{{$subcategory->category->name}}</td>
                            <td>{{$subcategory->name}}</td>
                            <td width="10px">
                                @can('admin.subcategories.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.subcategories.edit', $subcategory) }}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.subcategories.destroy')
                                    <form action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table> --}}


            <div class="form-group">
                <label>Categoría</label>
                {{-- <select name="" id=""></select> --}}
                <select class="form-control" wire:model="category" name="category_id">
                    {{-- <option selected>Seleccione una categoría</option> --}}
                    <option value="">Seleccione una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
        
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            @foreach ($categories as $category)
                <h1 class="text-2xl font-bold">{{ $category->name }}</h1>

                @foreach ($category->subcategories as $subcategory)
                    <h1 class="text-lg">{{ $subcategory->name }}</h1>
    
                @endforeach
            @endforeach
            
        </div>
    </div> 
@stop