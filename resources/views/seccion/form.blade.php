
<fieldset class="border p-4">
    <div class="form-group">
        <label for="descripcion"><h5>Seccion:</h5></label>
        <input id="descripcion" name="descripcion"  type="text"
            class="form-control @error('descripcion') is-invalid @enderror" placeholder="Seccion" 
            value="{{ isset($datos->descripcion) ? $datos->descripcion : old('descripcion') }}">
        @error('descripcion')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror
    </div>
</fieldset>
<div class="mt-5 row justify-content-center">
<div class="d-grid mt-1 col-sm-1">
    <input type="submit" value="Guardar" class="btn btn-success">
</div>

<div class="d-grid mt-1 col-sm-10">
    <a type="button" class="btn btn-primary" href="{{ url('seccion/') }}"> Regresar </a>
</div>
</div>
