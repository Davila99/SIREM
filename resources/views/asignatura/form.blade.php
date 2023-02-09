
    <div class="form-group">
        <label for="descripcion">
            Nombre del Asignatura:</label><br>
        <input type="text" id="descripcion" 
            class="form-control @error('descripcion') is-invalid @enderror" placeholder="Asignatura"
            value="{{ isset($datos->descripcion) ? $datos->descripcion : old('descripcion') }}"><br>
            @error('descripcion')
            <div class="invalid-feedback">
                <h6> {{ $message }}</h6>
            </div>
        @enderror
    </div>
  
    <input type="submit" value="Guardar" class="btn btn-success">
    <a type="button" class="btn btn-primary" href="{{ url('asignaturas/') }}"> Regresar </a>

