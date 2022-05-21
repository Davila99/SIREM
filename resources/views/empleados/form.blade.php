

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
    <label for="fecha_nacimiento">Fecha Nacimiento:</label><br>
    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
        value="{{ isset($datos->fecha_nacimiento) ? $datos->fecha_nacimiento : old('fecha_nacimiento') }}"><br>
</div>
{{-- <div class="form-group">
    <label for="niveles_academicos">Nivel Academico:</label><br>
    <select class="form-control @error('niveles_academicos_id') is-invalid @enderror"
     name="niveles_academicos"
     id="niveles_academicos">

     <option value="" selected disabled>--Seleccione--</option>
     @isset($niveles_academicos)
     @foreach ($niveles_academicos as $nivelacademico )
        <option value="{{$niveles_academicos->id }}"
            {{ old('niveles_academicos_id') == $niveles_academicos->id ? 'selected' : '' }}
            >{{ $niveles_academicos->descripcion}}</option>
     @endforeach
     @endisset

</div> --}}
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
    <label for="cargos">Cargo:</label><br>
    <select class="form-control @error('cargo_id') is-invalid @enderror"
     name="cargo_id"
     id="cargo">

     <option value="" selected disabled>--Seleccione--</option>
     @isset($cargos)
     @foreach ($cargos as $cargo )
        <option value="{{$cargo->id }}"
            {{ old('cargo_id') == $cargo->id ? 'selected' : '' }}
            >{{ $cargos->descripcion}}</option>
     @endforeach
     @endisset

</div>

<input type="submit" value="Guardar" class="btn btn-success">
<button type="button" class="btn btn-secondary"><a href="{{ url('estudiante/') }}"> Regresar </a></button>
