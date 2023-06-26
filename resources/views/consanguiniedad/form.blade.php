
    <fieldset class="border p-4">
        <div class="form-group">
            <label for="descripcion"><h5>Consanguiniedad:</h5></label>
            <input id="descripcion" name="descripcion"  type="text"
                class="form-control @error('descripcion') is-invalid @enderror" placeholder="Consanguinidad" 
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
        <a type="button" class="btn btn-primary" href="{{ url('consanguiniedades/') }}"> Regresar </a>
    </div>

</div>

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('mensaje-error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Dato existente ',
            })
        </script>
    @endif
@endsection