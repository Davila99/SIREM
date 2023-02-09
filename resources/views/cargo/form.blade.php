
<fieldset class="border p-4">
    <div class="form-group">
        <label for="descripcion">Nombre del Cargo:</label><br>
        <input type="text" class="form-control @error('descripcion') is-invalid @enderror" placeholder="Cargo"
            id="descripcion" 
            value="{{ isset($datos->descripcion) ? $datos->descripcion : old('descripcion') }}"><br>
        @error('descripcion')
            <div class="invalid-feedback">
                <h6> {{ $message }}</h6>
            </div>
        @enderror
    </div>
</fieldset>




<input type="submit" value="Guardar" class="btn btn-success">
<a type="button" class="btn btn-primary" href="{{ url('cargos/') }}"> Regresar </a>
