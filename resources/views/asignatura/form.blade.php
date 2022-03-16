{{--  <h1>{{ $titulo }} Carrera</h1>  --}}

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="descripcion">Nombre del Asignatura:</label><br>
    <input type="text" class="form-control" id="descripcion" name="descripcion"
        value="{{ isset($datos->descripcion) ? $datos->descripcion : old('descripcion') }}"><br>
</div>



<input type="submit" value="Guardar" class="btn btn-success">
<button type="button" class="btn btn-secondary"><a href="{{ url('asignaturas/') }}"> Regresar </a></button>
