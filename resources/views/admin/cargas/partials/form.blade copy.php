<div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" class="form-control-file">

    @error('nombre')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label>Adjuntar</label>
    <input type="file" class="form-control form-control-file" name="documento">

    {{-- @error('documento')
        <small class="text-danger">{{ $message }}</small>
    @enderror --}}
</div>




{{-- <div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del documento']) !!}

    @error('nombre')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="col">
    <div class="form-group">
        {!! Form::label('file', 'Imagen que se mostrará') !!}
        {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

        @error('file')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <p>Seleccione archivo ...</p>
</div> --}}
