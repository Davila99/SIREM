

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
            <th>Asignatura</th>
            <th>Docente</th>
           
        </tr>
    </thead>
 <tbody>
    <tr>
        <th>
            <div class="form-group">
                <select class="form-control @error('asignatura_id') is-invalid @enderror"
                 name="asignatura_id"
                 id="asignatura">
                 <option value="" selected disabled>--Seleccione--</option>
                
                 @isset($asignaturas)
                 @foreach ($asignaturas as $asignatura )
                    <option value="{{$asignatura->id }}"
                        {{ old('asignatura_id') == $asignatura->id ? 'selected' : '' }}
                        >{{ $asignatura->descripcion}}</option>
                 @endforeach
                 @endisset
            
            </div>
        </th>
        <th>

<div class="form-group">
    <select class="form-control @error('empleado_id') is-invalid @enderror"
     name="empleado_id"
     id="empleado">

    <option value="" selected disabled>--Seleccione--</option>
    
    @isset($empleados)
    @foreach ($empleados as $empleado )
       <option value="{{$empleado->id }}"
           {{ old('empleado_id') == $empleado->id ? 'selected' : '' }}
           >{{ $empleado->nombres}}</option>
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
<button type="button" class="btn btn-secondary"><a href="{{ url('asignaturadoc/') }}"> Regresar </a></button>


