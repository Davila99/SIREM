{{--  <h1>{{ $titulo }} Asignatura Docentes</h1>  --}}

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
            <th>Estudiante</th>
            <th>Tutor</th>
           
        </tr>
    </thead>
 <tbody>
    <tr>
        <th>
            <div class="form-group">
                <select class="form-control @error('estudiante_id') is-invalid @enderror"
                 name="estudiante_id"
                 id="estudiante">
                 <option value="" selected disabled>--Seleccione--</option>
                
                 @isset($aestudiantes)
                 @foreach ($aestudiantes as $estudiante )
                    <option value="{{$estudiante->id }}"
                        {{ old('estudiante_id') == $asignatura->id ? 'selected' : '' }}
                        >{{ $estudiante->descripcion}}</option>
                 @endforeach
                 @endisset
            
            </div>
        </th>
        <th>

<div class="form-group">
    <select class="form-control @error('tutor_id') is-invalid @enderror"
     name="tutor_id"
     id="tutor">

    <option value="" selected disabled>--Seleccione--</option>
    
    @isset($tutoress)
    @foreach ($tutores as $tutor )
       <option value="{{$tutor->id }}"
           {{ old('tutor_id') == $tutor->id ? 'selected' : '' }}
           >{{ $tutor->nombres}}</option>
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
<button type="button" class="btn btn-secondary"><a href="{{ url('estudiantetutor/') }}"> Regresar </a></button>


