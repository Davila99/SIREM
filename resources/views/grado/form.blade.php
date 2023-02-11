<div class="mt-5 row justify-content-center">
    <fieldset class="border p-4">
        <div class="form-group">
            <label for="descripcion"><h5>Nombre del Grado:</h5></label>
            <input id="descripcion" name="descripcion"  type="text"
                class="form-control @error('descripcion') is-invalid @enderror" placeholder="Grado" 
                value="{{ isset($datos->descripcion) ? $datos->descripcion : old('descripcion') }}">
            @error('descripcion')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
    </fieldset>

    <div class="d-grid mt-2 col-sm-4">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>

    <div class="d-grid mt-2 col-sm-4">
        <a type="button" class="btn btn-primary" href="{{ url('grados/') }}"> Regresar </a>
    </div>

</div>

