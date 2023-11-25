<div class="container">
    <fieldset class="border p-4">
    
        <div class="form-group">
            <label for="professions">
                <h5>Tipo Matricula:</h5>
            </label>
            <select class="form-control @error('tipo_matricula_id') is-invalid @enderror" name="tipo_matricula_id"
                id="professions">
                <option value="" selected disabled>--Seleccione--</option>
    
                @isset($tipoMatriculas)
                    @foreach ($tipoMatriculas as $tipoMatricula)
                        <option value="{{ $tipoMatricula->id }}"
                            @if (!empty($datos->tipo_matricula_id)) {{ $datos->tipo_matricula_id == $tipoMatricula->id ? 'selected' : '' }} @else {{ old('tipo_matricula_id') == $tipoMatricula->id ? 'selected' : '' }} @endif>
                            {{ $tipoMatricula->descripcion }} </option>
                    @endforeach
                @endisset
            </select>
            @error('tipo_matricula_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="professions">
                <h5>Grupo:</h5>
            </label>
            <select class="form-control @error('grupo_id') is-invalid @enderror" name="grupo_id"
                id="grupos">
                <option value="" selected disabled>--Seleccione--</option>
    
                @isset($grupos)
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id }}"
                            @if (!empty($datos->grupo_id)) {{ $datos->grupo_id == $grupo->id ? 'selected' : '' }} @else {{ old('grupo_id') == $grupo->id ? 'selected' : '' }} @endif>
                            {{ $grupo->grado->descripcion }} </option>
                    @endforeach
                @endisset
            </select>
            @error('grupo_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="partida_nacimiento"  value="1" name="partida_nacimiento" {{ isset($datos->partida_nacimiento) && $datos->partida_nacimiento ? 'checked' : '' }}>
            <label class="form-check-label" for="partida_nacimiento">
                Partida de Nacimiento
            </label>
        </div>
    
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="tarjeta_vacuna"  value="1" name="tarjeta_vacuna" {{ isset($datos->tarjeta_vacuna) && $datos->tarjeta_vacuna ? 'checked' : '' }}>
            <label class="form-check-label" for="tarjeta_vacuna">
                Tarjeta de Vacuna
            </label>
        </div>
    
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="diploma_prescolar"  value="1" name="diploma_prescolar" {{ isset($datos->diploma_prescolar) && $datos->diploma_prescolar ? 'checked' : '' }}>
            <label class="form-check-label" for="diploma_prescolar">
                Diploma de Preescolar
            </label>
        </div>
    
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="cedula_padres"  value="1" name="cedula_padres" {{ isset($datos->cedula_padres) && $datos->cedula_padres ? 'checked' : '' }}>
            <label class="form-check-label" for="cedula_padres">
                Cédula de los Padres
            </label>
        </div>
    
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="hoja_traslado"  value="1" name="hoja_traslado" {{ isset($datos->hoja_traslado) && $datos->hoja_traslado ? 'checked' : '' }}>
            <label class="form-check-label" for="hoja_traslado">
                Hoja de Traslado
            </label>
        </div>
    
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="diploma_secundaria"  value="1" name="diploma_secundaria" {{ isset($datos->diploma_secundaria) && $datos->diploma_secundaria ? 'checked' : '' }}>
            <label class="form-check-label" for="diploma_secundaria">
                Diploma de Secundaria
            </label>
        </div>
        <br>


    </fieldset>

    <div class="mt-2 row justify-content-center ">
        <div class=" d-grid mt-2 col-sm-4">
            <input type="submit" value="Guardar" class="btn btn-success">
        </div>
    
        <div class="d-grid mt-2 col-sm-4">
            <a type="button" class="btn btn-primary mt-2" href="{{ url('matriculas/') }}">Regresar</a>
    </div>
    
</div>

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.buscador-estudiantes').select2({
                ajax: {
                    url: '/buscar-estudiantes',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data, params) {
                        let results = [];
                        if (data) {
                            results = data.data.map(item => {
                                return {
                                    id: item.id,
                                    text: item.nombre
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
