
@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row justify-content-between">

    </div>
</div>

<div class="form-group">
    <label for="nombres"><h5>Nombre:</h5></label><br>
    <input type="text" class="form-control" id="nombres" name="nombres"
        value="{{ isset($datos->nombres) ? $datos->nombres : old('nombres') }}"><br>
</div>
<div class="form-group">
    <label for="apellidos"><h5>Apellido:</h5></label><br>
    <input type="text" class="form-control" id="apellidos" name="apellidos"
        value="{{ isset($datos->apellidos) ? $datos->apellidos : old('apellidos')}}"><br>
</div>
<div class="form-group">
    <label for="telefono"><h5>Telefono:</h5></label><br>
    <input type="text" class="form-control" id="telefono" name="telefono"
        value="{{ isset($datos->telefono) ? $datos->telefono : old('telefono') }}"><br>
</div>
<div class="form-group">
    <label for="cedula"><h5>Cedula:</h5></label><br>
    <input type="text" class="form-control" id="cedula" name="cedula"
        value="{{ isset($datos->cedula) ? $datos->cedula : old('cedula')}}"><br>
</div>
<div class="form-group">
    <label for="fecha_nacimiento"><h5>Fecha Nacimiento:</h5></label><br>
    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
        value="{{ isset($datos->fecha_nacimiento) ? $datos->fecha_nacimiento : old('fecha_nacimiento') }}"><br>
</div>
<div class="form-group">
    <label for="nivel_academico_id"><h5>Nivel Academico:</h5></label>
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
    <label for="direccion"><h5>Direccion:</h5></label>
    <input type="text" class="form-control" id="direccion" name="direccion"
        value="{{ isset($datos->direccion) ? $datos->direccion : old('direccion') }}"><br>
</div>

<div class="form-group">
    <label for="email"><h5>Email:</h5></label>
    <input type="email" class="form-control" id="email" name="email"
        value="{{ isset($datos->email) ? $datos->email : old('email') }}"><br>
</div>
<div class="form-group">
    <label for="fecha_ingreso"><h5>Fecha ingreso:</h5></label>
    <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso"
        value="{{ isset($datos->fecha_ingreso) ? $datos->fecha_ingreso : old('fecha_ingreso') }}"><br>
</div>
<div class="form-group">
    <label for="email"><h5>Cargo:</h5></label>
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
<a  type="button" class="btn btn-primary"  href="{{ url('empleados/') }}"> Regresar </a>

