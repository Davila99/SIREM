
    <fieldset class="border p-4">
        <div class="form-group">
            <label for="nombres">
                <h5>Nombre:</h5>
            </label><br>
            <input id="nombres" name="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror"
                placeholder="Nombres" value="{{ isset($datos->nombres) ? $datos->nombres : old('nombres') }}"><br>
            @error('nombres')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="apellidos">
                <h5>Apellido:</h5>
            </label><br>
            <input id="apellidos" name="apellidos" type="text"
                class="form-control @error('apellidos') is-invalid @enderror" placeholder="Apellidos"
                value="{{ isset($datos->apellidos) ? $datos->apellidos : old('apellidos') }}"><br>
            @error('apellidos')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="telefono">
                <h5>Telefono:</h5>
            </label><br>
            <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                placeholder="Numero de Telefono" id="telefono" name="telefono"
                value="{{ isset($datos->telefono) ? $datos->telefono : old('telefono') }}"><br>
            @error('telefono')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cedula">
                <h5>Cedula:</h5>
            </label><br>
            <input type="text" id="cedula" name="cedula"
                class="form-control @error('cedula') is-invalid @enderror" placeholder="Numero de cedula"
                value="{{ isset($datos->cedula) ? $datos->cedula : old('cedula') }}"><br>
            @error('cedula')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">
                <h5>Fecha Nacimiento:</h5>
            </label><br>
            <input id="fecha_nacimiento" name="fecha_nacimiento" type="date"
                class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                value="{{ isset($datos->fecha_nacimiento) ? $datos->fecha_nacimiento : old('fecha_nacimiento') }}"><br>
            @error('fecha_nacimiento')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="nivel_academico_id">
                <h5>Nivel Academico:</h5>
            </label>
            <select class="form-control @error('nivel_academico_id') is-invalid @enderror" name="nivel_academico_id"
                id="professions">
                <option value="" selected disabled>--Seleccione--</option>

                @isset($niveles_academicos)
                    @foreach ($niveles_academicos as $nivelacademico)
                        <option value="{{ $nivelacademico->id }}"
                            @if (!empty($datos->nivel_academico_id)) {{ $datos->nivel_academico_id == $nivelacademico->id ? 'selected' : '' }}  @else {{ old('nivel_academico_id') == $nivelacademico->id ? 'selected' : '' }} @endif>
                            {{ $nivelacademico->descripcion }} </option>
                    @endforeach
                @endisset
            </select><br>
            @error('nivel_academico_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>

        <div class="form-group">

            <label for="direccion">
                <h5>Direccion:</h5>
            </label>
            <input type="text" id="direccion" name="direccion"
                class="form-control @error('direccion') is-invalid @enderror" placeholder="Dirección"
                value="{{ isset($datos->direccion) ? $datos->direccion : old('direccion') }}"><br>
            @error('direccion')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-group" for="email">
                <h5>Email:</h5>
            </label>
            <input id="email" name="email" type="email"
                class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                value="{{ isset($datos->email) ? $datos->email : old('email') }}"><br>
            @error('email')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_ingreso">
                <h5>Fecha ingreso:</h5>
            </label>
            <input id="fecha_ingreso" name="fecha_ingreso" type="date"
                class="form-control @error('fecha_ingreso') is-invalid @enderror"
                value="{{ isset($datos->fecha_ingreso) ? $datos->fecha_ingreso : old('fecha_ingreso') }}"><br>
            @error('fecha_ingreso')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror

        </div>
        <div class="form-group">
            <label for="cargos">
                <h5>Cargo:</h5>
            </label>
            <select class="form-control @error('cargos_id') is-invalid @enderror" name="cargos_id" id="cargo">
                <option value="" selected disabled>--Seleccione--</option>

                @isset($cargos)
                    @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id }}"
                            @if (!empty($datos->cargos_id)) {{ $datos->cargos_id == $cargo->id ? 'selected' : '' }}  @else {{ old('cargos_id') == $cargo->id ? 'selected' : '' }} @endif>
                            {{ $cargo->descripcion }} </option>
                    @endforeach
                @endisset
            </select><br>
                @error('cargos_id')
                    <div class="invalid-feedback">
                        <h5> {{ $message }}</h5>
                    </div>
                @enderror

        </div>
    </fieldset>
    <div class="mt-2 row justify-content-center ">
    <div class=" d-grid mt-2 col-sm-4">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>

    <div class="d-grid mt-2 col-sm-4">
        <a type="button" class="btn btn-primary" href="{{ url('empleados/') }}"> Regresar </a>
    </div>
</div>
