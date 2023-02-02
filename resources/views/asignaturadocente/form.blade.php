<table class="table table-responsive table-dark">
    <thead class="thead-light">
        <tr>
            <th>Asignatura</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                <div class="form-group">
                    <select class="form-control @error('asignatura_id') is-invalid @enderror" name="asignatura_id"
                        id="asignatura">
                        <option value="" selected disabled>--Seleccione--</option>

                        @isset($asignaturas)
                            @foreach ($asignaturas as $asignatura)
                                <option value="{{ $asignatura->id }}"
                                    {{ old('asignatura_id') == $asignatura->id ? 'selected' : '' }}>
                                    {{ $asignatura->descripcion }}</option>
                            @endforeach
                        @endisset

                </div>
            </th>
        </tr>
    </tbody>
    <thead class="thead-light">
        <tr>
            <th>Docente</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                <div class="form-group">
                    
                    <select class="form-control @error('empleado_id') is-invalid @enderror" name="empleado_id"
                        id="empleado">

                        <option value="" selected disabled>--Seleccione--</option>
                        @isset($empleados)
                            @foreach ($empleados as $empleado)
                                <option value="{{ $empleado->id }}"
                                    {{ old('empleado_id') == $empleado->id ? 'selected' : '' }}>{{ $empleado->nombres }}
                                </option>
                            @endforeach
                        @endisset

                </div>
            </th>
        </tr>
    </tbody>
    <thead class="thead-light">
        <tr>
            <th>Grupo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                <div class="form-group">
                    <label for="descripcion">
                        <h5>Grupo</h5>
                    </label><br>
                    <select name="grupo_id" class="buscar-grupos col-12">
                    </select>
                </div>
            </th>
        </tr>
    </tbody>

</table>

<input type="submit" value="Guardar" class="btn btn-success">
<button type="button" class="btn btn-secondary"><a href="{{ url('asignaturadocente/') }}"> Regresar </a></button>

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.buscar-grupos').select2({
            ajax: {
                url: '/buscar-grupos',
                dataType: 'json',
                delay: 250,
                processResults: function (data, params) {
                    let results = [];
                    if (data) {
                        results = data.data.map(item => {
                            return {
                                id: item.id,
                                text: item.descripcion
                            }
                        })
                    }
    
                    console.log(results);
    
                    return {
                        results: results
                    };
                },
            }
        });
    });
    </script>
@endsection