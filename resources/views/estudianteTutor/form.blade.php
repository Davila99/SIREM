<div class="mt-5 row justify-content-center">

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Estudiante</th>
            <th>Tutor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                <div class="form-group">
                    <select class="form-control @error('estudiante_id') is-invalid @enderror" name="estudiante_id"
                    id="estudiante">
                    <option value="" selected disabled>--Seleccione--</option>

                    @isset($estudiantes)
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}"
                                @if (!empty($datos->estudiante_id)) {{ $datos->estudiante_id == $estudiante->id ? 'selected' : '' }} @else {{ old('estudiante_id') == $estudiante->id ? 'selected' : '' }} @endif>
                                {{ $estudiante->nombres }} </option>
                        @endforeach
                    @endisset

                </select>
                @error('estudiante_id')
                    <div class="invalid-feedback">
                        <h5> {{ $message }}</h5>
                    </div>
                @enderror
                </div>
            </th>
            <th>
                <div class="form-group">
                    <select class="form-control @error('tutores_id') is-invalid @enderror" name="tutores_id"
                    id="tutores">
                    <option value="" selected disabled>--Seleccione--</option>

                    @isset($tutores)
                        @foreach ($tutores as $tutor)
                            <option value="{{ $tutor->id }}"
                                @if (!empty($datos->tutores_id)) {{ $datos->tutores_id == $tutor->id ? 'selected' : '' }} @else {{ old('tutores_id') == $tutor->id ? 'selected' : '' }} @endif>
                                {{ $tutor->nombre }} </option>
                        @endforeach
                    @endisset

                </select>
                @error('tutores_id')
                    <div class="invalid-feedback">
                        <h5> {{ $message }}</h5>
                    </div>
                @enderror
                </div>
            </th>
        </tr>
    </tbody>

</table>
<div class="d-grid mt-1 col-sm-1">
    <input type="submit" value="Guardar" class="btn btn-success">
</div>

<div class="d-grid mt-1 col-sm-10">
    <a type="button" class="btn btn-primary" href="{{ url('tutorestudiante/') }}"> Regresar </a>
</div>
</div>