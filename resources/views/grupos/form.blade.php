@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Grado</th>
            <th>Fecha</th>
            <th>Docente</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                <div class="form-group">
                    <select class="form-control @error('grados_id') is-invalid @enderror" name="grados_id" id="grados">


<div class="form-group">
    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
        value="{{ isset($datos->fecha_nacimiento) ? $datos->fecha_nacimiento : old('fecha_nacimiento') }}"><br>
</div>
</th>
<th>

                        <option value="" selected disabled>--Seleccione--</option>

                        @isset($grados)
                            @foreach ($grados as $grado)
                                <option value="{{ $grado->id }}" {{ old('grados_id') == $grado->id ? 'selected' : '' }}>
                                    {{ $grado->descripcion }}</option>
                            @endforeach
                        @endisset

                </div>
            </th>
            <th>


                <div class="form-group">
                    
                    <input type="date" class="form-control" id="fecha" name="fecha"
                        value="{{ isset($datos->fecha) ? $datos->fecha : old('fecha') }}"><br>
                </div>
            </th>
            <th>

                <div class="form-group">
                    <select class="form-control @error('empleado_id') is-invalid @enderror" name="empleados_id"
                        id="empleados">

                        <option value="" selected disabled>--Seleccione--</option>

                        @isset($empleados)
                            @foreach ($empleados as $empleado)
                                <option value="{{ $empleado->id }}"
                                    {{ old('empleados_id') == $empleado->id ? 'selected' : '' }}>{{ $empleado->nombres }}
                                </option>
                            @endforeach
                        @endisset

                </div>
            </th>
            <th>
            </th>
        </tr>
    </tbody>


</table>

<input type="submit" value="Guardar" class="btn btn-success">
<button type="button" class="btn btn-secondary"><a href="{{ url('grupos/') }}"> Regresar </a></button>
