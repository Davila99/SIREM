
<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>AsignaturaDocente</th>
            <th>Asignatura</th>
            <th>Grado</th>
            <th>Estudiante</th>
            <th>Cortes_evaluativo</th>
        </tr>
    </thead>
 <tbody>
    <tr>
        <th>
            <div class="form-group">
                <select class="form-control @error('asignaturadocente_id') is-invalid @enderror"
                 name="asignaturadocente_id"
                 id="asignaturadocente">
                 <option value="" selected disabled>--Seleccione--</option>
                
                 @isset($asignaturadocentes)
                 @foreach ($asignaturadocentes as $asignaturadocente )
                    <option value="{{$asignaturadocente->id }}"
                        {{ old('asignaturadocente_id') == $asignaturadocente->id ? 'selected' : '' }}
                        >{{ $asignaturadocente->descripcion}}</option>
                 @endforeach
                 @endisset
            
            </div>
        </th>
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
    <select class="form-control @error('grado_id') is-invalid @enderror"
     name="grado_id"
     id="grado">

    <option value="" selected disabled>--Seleccione--</option>
    
    @isset($grados)
    @foreach ($grados as $grado )
       <option value="{{$grado->id }}"
           {{ old('grado_id') == $grado->id ? 'selected' : '' }}
           >{{ $grado->nombres}}</option>
    @endforeach
    @endisset

</div>
</th>
<th>

    <div class="form-group">
        <select class="form-control @error('estudiante_id') is-invalid @enderror"
         name="estudiante_id"
         id="estudiante">
    
        <option value="" selected disabled>--Seleccione--</option>
        
        @isset($estudiantes)
        @foreach ($estudiantes as $estudiante )
           <option value="{{$estudiante->id }}"
               {{ old('estudiante_id') == $estudiante->id ? 'selected' : '' }}
               >{{ $estudiante->nombres}}</option>
        @endforeach
        @endisset
    
    </div>
    </th>
    <th>

        <div class="form-group">
            <select class="form-control @error('Corte_evaluativo_id') is-invalid @enderror"
             name="cortes_evaluativo_id"
             id="cortes_evaluativo">
        
            <option value="" selected disabled>--Seleccione--</option>
            
            @isset($corte_evaluativos)
            @foreach ($corte_evaluativos as $corte_evaluativo )
               <option value="{{$corte_evaluativo->id }}"
                   {{ old('corte_evaluativo_id') == $corte_evaluativo->id ? 'selected' : '' }}
                   >{{ $corte_evaluativo->nombres}}</option>
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
<button type="button" class="btn btn-secondary"><a href="{{ url('calificaciones/') }}"> Regresar </a></button>
