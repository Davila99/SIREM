

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
            <th>Niveles Academicos</th>
            <th>Docente</th>
           
        </tr>
    </thead>
 <tbody>
    <tr>
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
                        >{{ $grado->descripcion}}</option>
                 @endforeach
                 @endisset
            
            </div>
        </th>
        <th>

<div class="form-group">
    <select class="form-control @error('niveles_academico_id') is-invalid @enderror"
     name="niveles_academico_id"
     id="niveles_academico_id">

    <option value="" selected disabled>--Seleccione--</option>
    
    @isset($niveles_academicos)
    @foreach ($niveles_academicos as $niveles_academico )
       <option value="{{$niveles_academico->id }}"
           {{ old('niveles_academico_id') == $niveles_academico->id ? 'selected' : '' }}
           >{{ $niveles_academico->nombres}}</option>
    @endforeach
    @endisset

</div>
</th>
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
               >{{ $asignaturadocente}}</option>
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


