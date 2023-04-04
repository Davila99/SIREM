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
                                    {{ old('estudiante_id') == $estudiante->id ? 'selected' : '' }}>
                                    {{ $estudiante->nombres }}</option>
                            @endforeach
                        @endisset

                </div>
            </th>
            <th>

                <div class="form-group">
                    <select class="form-control @error('tutores_id') is-invalid @enderror" name="tutores_id"
                        id="tutor">

                        <option value="" selected disabled>--Seleccione--</option>

                        @isset($tutores)
                            @foreach ($tutores as $tutore)
                                <option value="{{ $tutore->id }}"
                                    {{ old('tutores_id') == $tutore->id ? 'selected' : '' }}>{{ $tutore->nombre }}</option>
                            @endforeach
                        @endisset

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