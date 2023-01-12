@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar incidencias</h1>
@stop

@section('content')

    @if ( session('info') )
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($incidencia, ['route' => ['admin.incidencias.update', $incidencia], 'autocomplete' => 'off', 'files' => true, 'method' => 'PUT']) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                {{-- @include('admin.incidencias.partials.form') --}}

                <!--------------------------------------------------------------------------------------->
                <!--------------------------------------------------------------------------------------->

                <div class="form-group">
                    {!! Form::label('titulo', 'Título:') !!}
                    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título de la incidencia']) !!}
                
                    @error('titulo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                {{-- Para ver el slug del título --}}
                
                <div class="form-group">
                    {!! Form::label('slug', 'Slug:') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}
                
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripción*:') !!}
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción de la incidencia']) !!}
                    
                    @error('descripcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                
                <div class="row mb-3">
                    <div class="col">
                        <div class="image-wrapper">
                            @isset ($incidencia->image)
                                <img id="picture" src="{{ Storage::url($incidencia->image->url) }}" alt="">
                            @else
                                <img id="picture" src="https://cdn.pixabay.com/photo/2021/08/04/13/06/software-developer-6521720_960_720.jpg" alt="">
                            @endisset
                        </div>
                    </div>
                
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Imagen que se mostrará') !!}
                            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <p>Puede seleccionar una imagen alusiva a la incidencia o dejar la imagen predeterminada</p>
                    </div>
                </div>
                
                {{-- @livewire('admin.select-component', ['incidencia' => $incidencia]) --}}
                
                {{-- probando sin select-component --}}
                
                {{-- ------------------------------------------------------------------------------------ --}}
                {{-- ------------------------------------------------------------------------------------ --}}
                
                <div class="form-group">
                    {!! Form::label('category_id', 'Categoría*:') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'category_id', 'placeholder' => 'Selecione una opción']) !!}
                
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    {!! Form::label('subcategory_id', 'Subategoría*:') !!}
                    {!! Form::select('subcategory_id', $subcategories, null, ['class' => 'form-control', 'id' => 'subcategory_id', 'placeholder' => 'Selecione una opción']) !!}
                
                    @error('subcategory_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <label>Categoría*</label> {{$incidencia->category->name}}
                {{-- <select class="form-control" name="category"> --}}
                <select class="form-control" id="category_id" name="category_id" value="{{ $incidencia->category_id }}">
                    <option value=""> Selecciona una categoría</option> 
                        @foreach ($categories as $category)
                           {{-- <option value="{{ $category }}"> {{ $category }} </option>  --}}
                           <option value="{{ $category }}" {{ ($incidencia->category_id === $category) ? "selected" : "" }}>{{ $category }} </option> 
                        @endforeach
                </select>
                
                
                {{-- <select class="form-control" name="subcategory">
                    <option value=""> Selecciona una subcategoría </option> 
                </select> --}}
                
                
                {{-- ------------------------------------------------------------------------------------ --}}
                {{-- ------------------------------------------------------------------------------------ --}}
                
                
                <div class="form-group">
                    {!! Form::label('emergency_id', 'Urgencia*:') !!}
                    {!! Form::select('emergency_id', $emergencies, null, ['class' => 'form-control', 'id' => 'emergency_id', 'placeholder' => 'Selecione una opción']) !!}
                
                    @error('emergency_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                

                <!--------------------------------------------------------------------------------------->
                <!--------------------------------------------------------------------------------------->


                @if (auth()->user()->hasRole('Admin'))
                
                    <div class="form-group">
                        {!! Form::label('estatu_id', 'Estado*:') !!}
                        {!! Form::select('estatu_id', $estatus, null, ['class' => 'form-control', 'id' => 'estatu_id', 'placeholder' => 'Selecione una opción']) !!}
                    
                        @error('estatu_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('user_id', 'Asignado a:') !!}
                        {!! Form::select('user_id', $users, null, ['class' => 'form-control', 'id' => 'user_id', 'placeholder' => 'Selecione una opción']) !!}
                    
                        @error('estatu_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                
                @endif


                {!! Form::submit('Actualizar incidencia', ['class' => 'btn btn-primary mb-4']) !!}

            {!! Form::close() !!}

        </div>
    </div>
    <div>
        {{-- ----------------------------------------------------------------- --}}
        {{-- ----------------   aqui es para probar el chat   ---------------- --}}
        {{-- ----------------------------------------------------------------- --}}

        {{-- @livewire('chat-incidencias', ['incidencia' => $incidencia/* , 'messages' => $messages */]/* , key($messages->id) */) --}}
        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}

        {{-- ----------------------------------------------------------------- --}}
        {{-- ----------------      hasta aqui es el chat      ---------------- --}}
        {{-- ----------------------------------------------------------------- --}}
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