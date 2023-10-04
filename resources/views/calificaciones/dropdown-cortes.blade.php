@foreach ($cortes as $corte)

        <form
        class="dropdown-item"
            action="{{ route('generar-acta', ['grupoId' => $curso->grupo_id, 'asignaturaId' => $curso->asignatura_id, 'corteId' => $corte->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <input type="submit" value="{{ $corte->descripcion }}" class="btn btn-warning  btn-block" data-toggle="modal"
                data-target="#miModal" />
        </form>

@endforeach
