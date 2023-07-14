<fieldset class="border p-4">
    <div class="form-group">
        <label for="nombres">
            <h5>Nombres:</h5>
        </label>
        <input id="nombres" name="nombres" type="text" placeholder="Nombres"
            class="form-control @error('nombres') is-invalid @enderror"
            value="{{ isset($datos->nombres) ? $datos->nombres : old('nombres') }}">
        @error('nombres')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="apellidos">
            <h5>Apellidos:</h5>
        </label>
        <input id="apellidos" name="apellidos" type="text" placeholder="Apellidos"
            class="form-control @error('apellidos') is-invalid @enderror"
            value="{{ isset($datos->apellidos) ? $datos->apellidos : old('apellidos') }}">
        @error('apellidos')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="fecha_nacimiento">
            <h5>Fecha de Nacimiento:</h5>
        </label>
        <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento"
            class="form-control @error('fecha_nacimiento') is-invalid @enderror"
            value="{{ isset($datos->fecha_nacimiento) ? $datos->fecha_nacimiento : old('fecha_nacimiento') }}">
        @error('fecha_nacimiento')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="direccion">
            <h5>Direccion:</h5>
        </label>
        <input id="direccion" name="direccion" type="text"
            class="form-control @error('direccion') is-invalid @enderror" placeholder="Direccón"
            value="{{ isset($datos->direccion) ? $datos->direccion : old('direccion') }}">
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
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <select class="form-control @error('tutor_id') is-invalid @enderror" name="tutor_id" id="tutor">
                    <option value="" selected disabled>--Seleccione--</option>

                    @isset($tutores)
                        @foreach ($tutores as $tutor)
                            <option value="{{ $tutor->id }}"
                                @if (!empty($datos->tutor_id)) {{ $datos->tutor_id == $tutor->id ? 'selected' : '' }} @else {{ old('tutor_id') == $tutor->id ? 'selected' : '' }} @endif>
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
            <div class="p-2 bd-highlight"><a href="{{ url('tutores/create') }}" class="btn btn-success"> Agregar </a>
            </div>

        </div>

    </div>
    <br>
    <div class="form-group">
        <label for="tutor">
            <h5>Tutor:</h5>
        </label>
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <select class="form-control @error('tutor_id') is-invalid @enderror" name="tutor_id" id="tutor">
                    <option value="" selected disabled>--Seleccione--</option>

                    @isset($tutores)
                        @foreach ($tutores as $tutor)
                            <option value="{{ $tutor->id }}"
                                @if (!empty($datos->tutor_id)) {{ $datos->tutor_id == $tutor->id ? 'selected' : '' }} @else {{ old('tutor_id') == $tutor->id ? 'selected' : '' }} @endif>
                                {{ $tutor->nombre }} {{ $tutor->apellido }} </option>
                        @endforeach
                    @endisset

                </select>
                @error('tutor_id')
                    <div class="invalid-feedback">
                        <h5> {{ $message }}</h5>
                    </div>
                @enderror
            </div>
            <div class="p-2 bd-highlight"><a href="{{ url('tutores/create') }}" class="btn btn-success"> Agregar </a>
            </div>

        </div>

    </div>
    <br>
    <div class="form-group">
        <label for="sexo">
            <h5>Sexo:</h5>
        </label>
        <select class="form-control @error('sexo_id') is-invalid @enderror" name="sexo_id" id="sexo">
            <option value="" selected disabled>--Seleccione--</option>
            @isset($sexos)
                @foreach ($sexos as $sexo)
                    <option value="{{ $sexo->id }}"
                        @if (!empty($datos->sexo_id)) {{ $datos->sexo_id == $sexo->id ? 'selected' : '' }} @else {{ old('sexo_id') == $sexo->id ? 'selected' : '' }} @endif>
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

<div class="mt-2 row justify-content-center">
    <div class="d-grid mt-2 col-sm-4">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>

    <div class="d-grid mt-2 col-sm-4">
        <a type="button" class="btn btn-primary" href="{{ url('estudiantes/') }}"> Regresar </a>
    </div>

</div>

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('mensaje-error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ya se encuentra un estudiante con los mismos registros',
            })
        </script>
    @endif
@endsection
