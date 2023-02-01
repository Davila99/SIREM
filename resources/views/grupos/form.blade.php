
<table class="table table-responsive table-dark">
    <thead class="thead-light">
        <tr>
            <th>Grado</th>
            <th>Docente</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                <div class="form-group">
                    <select class="form-control @error('grado_id') is-invalid @enderror" name="grado_id" id="grados">

                        <option value="" selected disabled>--Seleccione--</option>

                        @isset($grados)
                            @foreach ($grados as $grado)
                                <option value="{{ $grado->id }}" {{ old('grado_id') == $grado->id ? 'selected' : '' }}>
                                    {{ $grado->descripcion }}</option>
                            @endforeach
                        @endisset

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
        </tr>
    </tbody>

</table>

<input type="submit" value="Guardar" class="btn btn-success">
<button type="button" class="btn btn-secondary"><a href="{{ url('grupos/') }}"> Regresar </a></button>
