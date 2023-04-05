
    <fieldset class="border p-4">
        <div class="form-group">
            <label for="nombre">
                <h5>Nombre:</h5>
            </label>
            <input type="text" id="nombre" name="nombre"class="form-control @error('nombre') is-invalid @enderror"
                placeholder="Nombres " value="{{ isset($datos->nombre) ? $datos->nombre : old('nombre') }}">
            @error('nombre')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="apellido">
                <h5>Apellido:</h5>
            </label>
            <input type="text" id="apellido" name="apellido"
                class="form-control @error('apellido') is-invalid @enderror" placeholder="Apellidos"
                value="{{ isset($datos->apellido) ? $datos->apellido : old('apellido') }}">
            @error('apellido')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cedula">
                <h5>Cédula:</h5>
            </label>
            <input type="text" id="cedula" name="cedula"
                class="form-control @error('cedula') is-invalid @enderror" placeholder=" Numero de Cédula"
                value="{{ isset($datos->cedula) ? $datos->cedula : old('cedula') }}">
            @error('cedula')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="telefono">
                <h5>Telefono:</h5>
            </label>
            <input type="text" id="telefono" name="telefono"
                class="form-control @error('telefono') is-invalid @enderror" placeholder="Numero de Telefono"
                value="{{ isset($datos->telefono) ? $datos->telefono : old('telefono') }}">
            @error('telefono')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="professions">
                <h5>Profesion:</h5>
            </label>
            <select class="form-control @error('professions_id') is-invalid @enderror" name="professions_id"
                id="professions">
                <option value="" selected disabled>--Seleccione--</option>

                @isset($professions)
                    @foreach ($professions as $profession)
                        <option value="{{ $profession->id }}"
                            @if (!empty($datos->professions_id)) {{ $datos->professions_id == $profession->id ? 'selected' : '' }} @else {{ old('professions_id') == $profession->id ? 'selected' : '' }} @endif>
                            {{ $profession->descripcion }} </option>
                    @endforeach
                @endisset
            </select>
            @error('professions_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>

    </fieldset>
    <div class="mt-2 row justify-content-center">
        <div class=" d-grid mt-1 col-sm-1">
            <input type="submit" value="Guardar" class="btn btn-success">
        </div>
        
        <div class="d-grid mt-1 col-sm-10">
            <a type="button" class="btn btn-primary" href="{{ url('tutores/') }}"> Regresar </a>
        </div>
    </div>
