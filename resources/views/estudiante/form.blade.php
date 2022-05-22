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
        <label for="nombres">Nombres:</label><br>
        <input type="text" class="form-control" id="nombres" name="nombres"
            value="{{ isset($datos->nombres) ? $datos->nombres : old('nombres') }}"><br>
    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" class="form-control" id="apellidos" name="apellidos"
            value="{{ isset($datos->apellidos) ? $datos->apellidos : old('apellidos') }}"><br>
    </div>

    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label><br>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
            value="{{ isset($datos->fecha_nacimiento) ? $datos->fecha_nacimiento : old('fecha_nacimiento') }}"><br>
    </div>

    <div class="form-group">
        <label for="direccion">Direccion:</label><br>
        <input type="text" class="form-control" id="direccion" name="direccion"
            value="{{ isset($datos->direccion) ? $datos->direccion : old('direccion') }}"><br>
    </div>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Tutor</th>
            <th>Sexo</th>
        </tr>
    </thead>
 <tbody>
    <tr>
        <th>
            <div class="form-group">
                <select class="form-control @error('tutor_id') is-invalid @enderror" name="tutor_id" id="tutor">
        
                    <option value="" selected disabled>--Seleccione--</option>
                    @isset($tutores)
                        @foreach ($tutores as $tutor)
                            <option value="{{ $tutor->id }}" {{ old('tutor_id') == $tutor->id ? 'selected' : '' }}>
                                {{ $tutor->nombre }}</option>
                        @endforeach
                    @endisset
            </div>
        </th>
        <th>
              
    <div class="form-group">
        <select class="form-control @error('sexo_id') is-invalid @enderror" name="sexo_id" id="sexo">

            <option value="" selected disabled>--Seleccione--</option>
            @isset($sexos)
                @foreach ($sexos as $sexo)
                    <option value="{{ $sexo->id }}" {{ old('sexo_id') == $sexo->id ? 'selected' : '' }}>
                        {{ $sexo->descripcion }}</option>
                @endforeach
            @endisset
    </div>
        </th>
    </tr>
 </tbody>


</table>



    <input type="submit" value="Guardar" class="btn btn-success">
    <button type="button" class="btn btn-secondary"><a href="{{ url('estudiantes/') }}"> Regresar </a></button>
