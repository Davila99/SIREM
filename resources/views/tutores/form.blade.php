{{--  <h1>{{ $titulo }} Tutores</h1>  --}}

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

<br>
<div class="form-group">
    <label for="nombre">Nombre:</label><br>
    <input type="text" class="form-control" id="nombre" name="nombre"
        value="{{ isset($datos->nombre) ? $datos->nombre : old('nombre') }}"><br>
</div>
<div class="form-group">
    <label for="apellido">Apellido:</label><br>
    <input type="text" class="form-control" id="apellido" name="apellido"
        value="{{ isset($datos->apellido) ? $datos->apellido : old('apellido')}}"><br>
</div>
<div class="form-group">
    <label for="telefono">Telefono:</label><br>
    <input type="text" class="form-control" id="telefono" name="telefono"
        value="{{ isset($datos->telefono) ? $datos->telefono : old('telefono') }}"><br>
</div>
<div class="form-group">
    <label for="cedula">Cedula:</label><br>
    <input type="text" class="form-control" id="cedula" name="cedula"
        value="{{ isset($datos->cedula) ? $datos->cedula : old('cedula')}}"><br>
</div>

<div class="form-group">
    <label for="profession">Profesion:</label><br>
    <select class="form-control @error('professions_id') is-invalid @enderror"
     name="profesions_id"
     id="profession">

     <option value="" selected disabled>--Seleccione--</option>

     @isset($tutores)
     @foreach ($tutores as $tutore )
        <option value="{{$professions->id }}"
            {{ old('professions_id') == $profession->id ? 'selected' : '' }}
            >{{ $profession->descripcion}}</option>
     @endforeach
     @endisset

</div>

<input type="submit" value="Guardar" class="btn btn-success">
<button type="button" class="btn btn-secondary"><a href="{{ url('tutore/') }}"> Regresar </a></button>
