{{--  <h1>{{ $titulo }} </h1>  --}}

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
    <select class="form-control @error('tutores_id') is-invalid @enderror"
     name="tutores_id"
     id="tutor">

    <option value="" selected disabled>--Seleccione--</option>
    
    @isset($tutores)
    @foreach ($tutores as $tutore )
       <option value="{{$tutore->id }}"
           {{ old('tutores_id') == $tutore->id ? 'selected' : '' }}
           >{{ $tutore->nombre}}</option>
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
<button type="button" class="btn btn-secondary"><a href="{{ url('tutorestudiante/') }}"> Regresar </a></button>


