<div class="form-group">
    {!! Form::label('titulo', 'Título:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título de la incidencia']) !!}

    @error('titulo')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


{{-- <div class="form-group">
    {!! Form::label('titulo', 'Título*:') !!}
    {!! Form::textarea('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título de la incidencia']) !!}
   
    @error('titulo')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div> --}}



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


@livewire('admin.select-component2')


<div class="form-group">
    {!! Form::label('emergency_id', 'Urgencia*:') !!}
    {!! Form::select('emergency_id', $emergencies, null, ['class' => 'form-control', 'id' => 'emergency_id', 'placeholder' => 'Selecione una opción']) !!}

    @error('emergency_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>





{{-- probando sin select-component --}}

{{-- ------------------------------------------------------------------------------------ --}}
{{-- ------------------------------------------------------------------------------------ --}}

{{-- <select class="form-control" name="category">
    <option value=""> Selecciona una categoría </option> 
        @foreach ($categories as $category)
           <option value="{{ $category->id }}"> {{ $category->name }} </option> 
        @endforeach
</select>
<select class="form-control" name="subcategory">
    <option value=""> Selecciona una subcategoría </option> 
</select> --}}


{{-- ------------------------------------------------------------------------------------ --}}
{{-- ------------------------------------------------------------------------------------ --}}



{{-- <div class="form-group">
    {!! Form::label('category_id', 'Categoría*:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una categoría']) !!}
    
    @error('category_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div> --}}


{{-- <div class="form-group">
    <label>Categoría*</label>
    <select class="form-control" wire:model="category">
        
        <option value="">Seleccione una categoría</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div> --}}


    
{{-- <div class="form-group">
    {!! Form::label('subcategory_id', 'Subcategoría*:') !!}
    {!! Form::select('subcategory_id', $subcategories, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una subcategoría']) !!}
    
    @error('subcategory_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div> --}}


{{-- <div class="form-group">
    <label>Subcategoría*</label>
    <select class="form-control" wire:model="category">
        
        <option value="">Seleccione una categoría</option>
        @foreach ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div> --}}






