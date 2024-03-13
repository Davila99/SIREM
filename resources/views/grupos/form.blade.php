<fieldset class="border p-4">
    <div class="form-group">
        <div class="form-group">
            <label for="anio_lectivo">
                <h5>Año Lectivo:</h5>
            </label>
            <select class="form-control @error('anio_lectivo') is-invalid @enderror" name="anio_lectivo">
                <option value="" selected disabled>--Seleccione--</option>

                @php
                    $anio_actual = date('Y');
                @endphp

                @for ($anio = 2000; $anio <= 2100; $anio++)
                    <option value="{{ $anio }}"
                        @if (!empty($datos->anio_lectivo)) {{ $datos->anio_lectivo == $anio ? 'selected' : '' }}
                        @else {{ old('anio_lectivo') == $anio ? 'selected' : '' }} @endif>
                        {{ $anio }}
                    </option>
                @endfor
            </select>

            @error('anio_lectivo')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
        <label for="seccion">
            <h5>Grado:</h5>
        </label>
        <select class="form-control @error('grado_id') is-invalid @enderror" name="grado_id" id="grados">

            <option value="" selected disabled>--Seleccione--</option>

            @isset($grados)
                @foreach ($grados as $grado)
                    <option value="{{ $grado->id }}"
                        @if (!empty($datos->grado_id)) {{ $datos->grado_id == $grado->id ? 'selected' : '' }} @else {{ old('grado_id') == $grado->id ? 'selected' : '' }} @endif>
                        {{ $grado->descripcion }} </option>
                @endforeach
            @endisset
        </select>
        @error('grado_id')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror

    </div>

    <div class="form-group">
        <label for="descripcion">
            <h5>Empleados</h5>
        </label><br>
        <select name="empleado_id" class="buscador-empleados col-12 @error('empleado_id') is-invalid @enderror">
        </select>
        @error('empleado_id')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="seccion">
            <h5>Sección:</h5>
        </label>
        <select class="form-control @error('seccion_id') is-invalid @enderror" name="seccion_id" id="seccion">
            <option value="" selected disabled>--Seleccione--</option>
            @isset($secciones)
                @foreach ($secciones as $seccion)
                    <option value="{{ $seccion->id }}"
                        @if (!empty($datos->seccion_id)) {{ $datos->seccion_id == $seccion->id ? 'selected' : '' }} @else {{ old('seccion_id') == $seccion->id ? 'selected' : '' }} @endif>
                        {{ $seccion->descripcion }} </option>
                @endforeach
            @endisset
        </select>
        @error('seccion_id')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror

    </div>

    <div class="form-group">
        <label for="turno">
            <h5>Turno:</h5>
        </label>
        <select class="form-control @error('turno_id') is-invalid @enderror" name="turno_id" id="turno">
            <option value="" selected disabled>--Seleccione--</option>
            @isset($turnos)
                @foreach ($turnos as $turno)
                    <option value="{{ $turno->id }}"
                        @if (!empty($datos->turno_id)) {{ $datos->turno_id == $turno->id ? 'selected' : '' }} @else {{ old('turno_id') == $turno->id ? 'selected' : '' }} @endif>
                        {{ $turno->descripcion }} </option>
                @endforeach
            @endisset
        </select>
        @error('turno_id')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror
    </div>
</fieldset>
<div class=" d-grid mt-1 col-sm-1">
    <input type="submit" value="Guardar" class="btn btn-success">
</div>

<div class="d-grid mt-1 col-sm-1">
    <a type="button" class="btn btn-primary" href="{{ url('grupos/') }}"> Regresar </a>
</div>
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.buscador-empleados').select2({
                ajax: {
                    url: '/buscar-empleados',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data, params) {
                        let results = [];
                        if (data) {
                            results = data.data.map(item => {
                                return {
                                    id: item.id,
                                    text: item.nombres + ' ' + item.apellidos
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
    @if (Session::has('mensaje-error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'No pueden existir dos grupos con el mismo grado del mismo año lectivo',
            })
        </script>
    @endif
@endsection
