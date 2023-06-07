
    <fieldset class="border p-4">
        <div class="form-group">
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
            <label for="seccion">
                <h5>Empleados:</h5>
            </label>
            <select class="form-control @error('empleado_id') is-invalid @enderror" name="empleado_id"
                id="empleados">

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
            <label for="seccion">
                <h5>Seccion:</h5>
            </label>
            <select class="form-control @error('seccion_id') is-invalid @enderror" name="seccion_id"
                id="seccion">
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
            <select class="form-control @error('turno_id') is-invalid @enderror" name="turno_id"
                id="turno">
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

