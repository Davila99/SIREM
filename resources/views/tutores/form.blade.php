<div class="mt-5 row justify-content-center ">
    <fieldset class="border p-4">
        <div class="form-group">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre"class="form-control @error('nombre') is-invalid @enderror"
                placeholder="Nombre" value="{{ isset($datos->nombre) ? $datos->nombre : old('nombre') }}"><br>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label><br>
            <input type="text" id="apellido" name="apellido"
                class="form-control @error('descripcion') is-invalid @enderror" placeholder="Cargo"
                value="{{ isset($datos->apellido) ? $datos->apellido : old('apellido') }}"><br>
        </div>

        <div class="form-group">
            <label for="cedula">Cedula:</label><br>
            <input type="text" id="cedula" name="cedula"
                class="form-control @error('descripcion') is-invalid @enderror" placeholder="Cargo"
                value="{{ isset($datos->cedula) ? $datos->cedula : old('cedula') }}"><br>
        </div>
        <div class="form-group">
            <label for="telefono">Telefono:</label><br>
            <input type="text" id="telefono" name="telefono"
                class="form-control @error('descripcion') is-invalid @enderror" placeholder="Cargo"
                value="{{ isset($datos->telefono) ? $datos->telefono : old('telefono') }}"><br>
        </div>

        <div class="form-group">
            <label for="professions">Profesion:</label>
            <br>
            <select class="form-select @error('professions_id') is-invalid @enderror" name="professions_id"
                id="professions">
                <option value="" selected disabled>--Seleccione--</option>

                @isset($professions)
                    @foreach ($professions as $profession)
                        <option value="{{ $profession->id }}"
                            {{ old('professions_id') == $profession->id ? 'selected' : '' }}>{{ $profession->descripcion }}
                        </option>
                    @endforeach
                @endisset
            </select>

        </div>

    </fieldset>

    <div class=" d-grid mt-2 col-sm-4">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>

    <div class="d-grid mt-2 col-sm-4">
        <a type="button" class="btn btn-primary" href="{{ url('tutores/') }}"> Regresar </a>
    </div>

</div>
