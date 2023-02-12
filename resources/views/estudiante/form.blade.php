
<div class="mt-5 row justify-content-center">
    <fieldset class="border p-4">
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
         
        <fieldset class="border p-4">
            <div class="form-group">
                <label for="professions">Tutor:</label>
                <select class="form-control @error('tutor_id') is-invalid @enderror" name="tutor_id"
                    id="tutor">
        
                    <option value="" disabled>--Seleccione--</option>
                    @isset($tutores)
                        @foreach ($tutores as $tutor)
                            {{-- <option value="{{ $tutor->id }}"
                                {{ $datos->tutor_id == $tutor->id ? 'selected' : '' }}>
                                {{ $tutor->nombre }}</option> --}}
                            <option value="{{ $tutor->id }}"
                                {{ old('tutor_id') == $tutor->id ? 'selected' : '' }}>{{ $tutor->nombre }}</option>
                        @endforeach
                    @endisset
            </div>
        </fieldset>
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

    </fieldset>
   
    <fieldset class="border p-4">
        <div class="form-group">
            <label for="professions">Sexo:</label>
            <select class="form-control @error('sexo_id') is-invalid @enderror" name="sexo_id"
                id="sexo">
    
                <option value="" selected disabled>--Seleccione--</option>
                @isset($sexos)
                    @foreach ($sexos as $sexo)
                        <option value="{{ $sexo->id }}" {{ old('sexo_id') == $sexo->id ? 'selected' : '' }}>
                            {{ $sexo->descripcion }}</option>
                    @endforeach
                @endisset
        </div>
    </fieldset>

    

    <div class="d-grid mt-2 col-sm-4">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>

    <div class="d-grid mt-2 col-sm-4">
        <a type="button" class="btn btn-primary" href="{{ url('estudiantes/') }}"> Regresar </a>
    </div>
   
</div>