<div class="mt-5 row justify-content-center">
    <fieldset class="border p-4">
        <div class="form-group">
            <label for="nombres">Nombres:</label><br>
            <input type="text" class="form-control" id="nombres" name="nombres"
                value="{{ isset($datos->nombres) ? $datos->nombres : old('nombres') }}"><br>
            @error('nombres')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos:</label><br>
            <input type="text" class="form-control" id="apellidos" name="apellidos"
                value="{{ isset($datos->apellidos) ? $datos->apellidos : old('apellidos') }}"><br>
            @error('apellidos')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label><br>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                value="{{ isset($datos->fecha_nacimiento) ? $datos->fecha_nacimiento : old('fecha_nacimiento') }}"><br>
            @error('fecha_nacimiento')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="direccion">Direccion:</label><br>
            <input type="text" class="form-control" id="direccion" name="direccion"
                value="{{ isset($datos->direccion) ? $datos->direccion : old('direccion') }}"><br>
            @error('direccion')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tutor">
                <h5>Tutor:</h5>
            </label>
            <select class="form-select @error('tutor_id') is-invalid @enderror" name="tutor_id" id="tutor">
                <option value="" selected disabled>--Seleccione--</option>

                @isset($tutores)
                    @foreach ($tutores as $tutor)
                        <option value="{{ $tutor->id }}"
                            @if (!empty($datos->tutor_id)) {{ $datos->tutor_id == $tutor->id ? 'selected' : '' }} @endif>
                            {{ $tutor->nombre }} </option>
                    @endforeach
                @endisset

            </select>
            @error('tutor_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="sexo">
                <h5>Sexo:</h5>
            </label>
            <select class="form-select @error('sexo_id') is-invalid @enderror" name="sexo_id" id="sexo">
                <option value="" selected disabled>--Seleccione--</option>

                @isset($sexos)
                    @foreach ($sexos as $sexo)
                        <option value="{{ $sexo->id }}"
                            @if (!empty($datos->sexo_id)) {{ $datos->sexo_id == $sexo->id ? 'selected' : '' }} @endif>
                            {{ $sexo->descripcion }} </option>
                    @endforeach
                @endisset

            </select>
            @error('sexo_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>

    </fieldset>


    <div class="d-grid mt-2 col-sm-4">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>

    <div class="d-grid mt-2 col-sm-4">
        <a type="button" class="btn btn-primary" href="{{ url('estudiantes/') }}"> Regresar </a>
    </div>

</div>
