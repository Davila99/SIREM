<div class="mt-5 row justify-content-center ">
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
                </th>
    
                <th>
                    <div class="form-group">
                        <select class="form-control @error('empleados_id') is-invalid @enderror" name="empleados_id"
                            id="empleados">
    
                            <option value="" selected disabled>--Seleccione--</option>
                            @isset($empleados)
                                @foreach ($empleados as $empleado)
                                    <option value="{{ $empleado->id }}"
                                        @if (!empty($datos->empleados_id)) {{ $datos->empleados_id == $empleado->id ? 'selected' : '' }} @else {{ old('empleados_id') == $empleado->id ? 'selected' : '' }} @endif>
                                        {{ $empleado->nombres }} </option>
                                @endforeach
                            @endisset
                        </select>
                        @error('empleados_id')
                            <div class="invalid-feedback">
                                <h5> {{ $message }}</h5>
                            </div>
                        @enderror
                    </div>
                </th>
            </tr>
        </tbody>
    
    </table>
    <div class=" d-grid mt-2 col-sm-4">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>
    
    <div class="d-grid mt-2 col-sm-4">
        <a type="button" class="btn btn-primary" href="{{ url('grupos/') }}"> Regresar </a>
    </div>
    
</div>

