<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control text-uppercase" placeholder="Ingrese el nombre de incidencia">
    </div>
    
    @if ($incidencias->count())

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Prioridad</th>
                        <th>Estatu</th>
                        {{-- <th>Creación incidencia</th> --}}
                        {{-- <th>Última modificación</th> --}}
                        {{-- <th>Asignado</th> --}}
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach ($incidencias as $incidencia)
                        <tr>
                            <td>{{ $incidencia->id }}</td>
                            <td>{{ $incidencia->user }}</td>
                            {{-- <td>{{ $incidencia->crea->name }}</td> --}}
                            <td>{{ Str::upper($incidencia->titulo) }}</td>
                            <td>{{ $incidencia->subcategory->category->name }}</td>
                            {{-- <td>{{ $incidencia->emergency->name }}</td> --}}
                            <td class="project-state"><span class="badge badge-{{ $incidencia->emergency->color }}">{{ $incidencia->emergency->name }}</span></td>

                            {{-- <td>{{ $incidencia->estatu->name }}</td> --}}
                            <td class="project-state"><span class="badge badge-{{ $incidencia->estatu->color }}">{{ $incidencia->estatu->name }}</span></td>

                            {{-- <td>{{ $incidencia->created_at }}</td> --}}
                            {{-- <td>{{ $incidencia->updated_at }}</td> --}}
                            {{-- <td> Sin asignar </td> --}}

                            <td width="10 px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.incidencias.show', $incidencia) }}" title="Ver">
                                    <i class="fas fa-eye" ></i>
                                    <!-- Ver -->
                                </a>
                            </td>
                            <td width="10 px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.incidencias.edit', $incidencia) }}" title="Editar">
                                    <i class="fas fa-pencil-alt" ></i>
                                    <!-- Editar -->
                                </a>

                               {{--  <a class="btn btn-danger ml-2">

                                    <i class="fas fa-trash"></i>

                                </a> --}}

                            </td>
                            <td width="10 px">
                                <form class="form-eliminar" action="{{ route('admin.incidencias.destroy', $incidencia) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                        <!--Eliminar-->
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $incidencias->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro...</strong>
        </div>
    @endif

</div>
