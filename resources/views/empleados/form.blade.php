
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
    <label for="nombres">Nombre:</label><br>
    <input type="text" class="form-control" id="nombres" name="nombres"
        value="{{ isset($datos->nombres) ? $datos->nombres : old('nombres') }}"><br>
</div>
<div class="form-group">
    <label for="apellidos">Apellido:</label><br>
    <input type="text" class="form-control" id="apellidos" name="apellidos"
        value="{{ isset($datos->apellidos) ? $datos->apellidos : old('apellidos')}}"><br>
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
    <label for="fecha_nacimiento">Fecha Nacimiento:</label><br>
    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
        value="{{ isset($datos->fecha_nacimiento) ? $datos->fecha_nacimiento : old('fecha_nacimiento') }}"><br>
</div>
<div class="form-group">
    <label for="nivelacademico">Nivel Academico:</label><br>
    <select class="form-control @error('nivel_academico_id') is-invalid @enderror"
     name="nivel_academico_id"
     id="niveles_academicos">

     <option value="" selected disabled>--Seleccione--</option>
     @isset($niveles_academicos)
     @foreach ($niveles_academicos as $nivelacademico )
        <option value="{{$nivelacademico->id }}"
            {{ old('nivel_academico_id') == $nivelacademico->id ? 'selected' : '' }}
            >{{ $nivelacademico->descripcion}}</option>
     @endforeach
     @endisset

</div>
<div class="form-group">
    <label for="direccion">Direccion:</label><br>
    <input type="text" class="form-control" id="direccion" name="direccion"
        value="{{ isset($datos->direccion) ? $datos->direccion : old('direccion') }}"><br>
</div>

<div class="form-group">
    <label for="email">Email:</label><br>
    <input type="email" class="form-control" id="email" name="email"
        value="{{ isset($datos->email) ? $datos->email : old('email') }}"><br>
</div>
<div class="form-group">
    <label for="fecha_ingreso">Fecha ingreso:</label><br>
    <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso"
        value="{{ isset($datos->fecha_ingreso) ? $datos->fecha_ingreso : old('fecha_ingreso') }}"><br>
</div>


<div class="form-group">
    <label for="cargo">Cargo:</label><br>
    <select class="form-control @error('cargos_id') is-invalid @enderror"
     name="cargos_id"
     id="cargo">
     <option value="" selected disabled>--Seleccione--</option>
     @isset($cargos)
     @foreach ($cargos as $cargo )
        <option value="{{$cargo->id }}"
            {{ old('cargo_id') == $cargo->id ? 'selected' : '' }}
            >{{ $cargo->descripcion}}</option>
     @endforeach
     @endisset

</div>

<input type="submit" value="Guardar" class="btn btn-success">
<button type="button" class="btn btn-secondary"><a href="{{ url('empleados/') }}"> Regresar </a></button>
