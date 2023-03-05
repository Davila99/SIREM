<div class="mt-5 row justify-content-center ">
    <fieldset class="border p-4">
        <div class="form-group">
            <label for="asignaturaasignatura">
                <h5>Organización Academica:</h5>
            </label>
            <select class="form-control @error('organizacion_academica_id') is-invalid @enderror"
                name="organizacion_academica_id" id="organizacion_academica">
                <option value="" selected disabled>--Seleccione--</option>
                @isset($organizacion_academicas)
                    @foreach ($organizacion_academicas as $organizacion_academica)
                        <option value="{{ $organizacion_academica->id }}"
                            @if (!empty($datos->organizacion_academica_id)) {{ $datos->organizacion_academica_id == $organizacion_academica->id ? 'selected' : '' }} @else {{ old('organizacion_academica_id') == $organizacion_academica->id ? 'selected' : '' }} @endif>
                            {{ $organizacion_academica->descripcion }} </option>
                    @endforeach
                @endisset
            </select>
            @error('organizacion_academica_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror

        </div>
        <div class="form-group">
            <label for="asignaturaasignatura">
                <h5>Asignatura:</h5>
            </label>
            <select class="form-control @error('asignatura_id') is-invalid @enderror" name="asignatura_id"
                id="asignatura">
                <option value="" selected disabled>--Seleccione--</option>
                @isset($asignaturas)
                    @foreach ($asignaturas as $asignatura)
                        <option value="{{ $asignatura->id }}"
                            @if (!empty($datos->asignatura_id)) {{ $datos->asignatura_id == $asignatura->id ? 'selected' : '' }} @else {{ old('asignatura_id') == $asignatura->id ? 'selected' : '' }} @endif>
                            {{ $asignatura->descripcion }} </option>
                    @endforeach
                @endisset
            </select>
            @error('asignatura_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror

        </div>

        <div class="form-group">
            <label for="empleado_id">
                <h5>Empleado:</h5>
            </label>
            <select class="form-control @error('empleado_id') is-invalid @enderror" name="empleado_id" id="empleado">

                <option value="" selected disabled>--Seleccione--</option>

                @isset($empleados)
                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id }}"
                            @if (!empty($datos->empleado_id)) {{ $datos->empleado_id == $empleado->id ? 'selected' : '' }} @else {{ old('empleado_id') == $empleado->id ? 'selected' : '' }} @endif>
                            {{ $empleado->nombres }} </option>
                    @endforeach
                @endisset
            </select>
            @error('empleado_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror

        </div>

        <div class="form-group">
            <label for="grupo_id">
                <h5>Grupo:</h5>
            </label>
            <select name="grupo_id" class="buscar-grupos col-12 @error('grupo_id') is-invalid @enderror">
            </select>
            @error('grupo_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
    </fieldset>
    <div class=" d-grid mt-2 col-sm-4">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>

    <div class="d-grid mt-2 col-sm-4">
        <a type="button" class="btn btn-primary" href="{{ url('asignaturadocente/') }}"> Regresar </a>
    </div>

</div>

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.buscar-grupos').select2({
                ajax: {
                    url: '/buscar-grupos',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data, params) {
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
