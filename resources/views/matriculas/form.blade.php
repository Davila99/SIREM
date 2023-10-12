<div class="mt-5 row justify-content-center ">
    <fieldset class="border p-4">
        <div class="form-group">
            <label for="descripcion">
                <h5>Estudiante</h5>
            </label><br>
            <select name="estudiante_id" class="buscador-estudiantes col-12 @error('estudiante_id') is-invalid @enderror" >
            </select>
            @error('estudiante_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="descripcion">
                <h5>Tipo Matricula</h5>
            </label><br>
            <select name="tipo_matricula_id" class="buscador-tipo-matriculas col-12 @error('tipo_matricula_id') is-invalid @enderror" >
            </select>
            @error('tipo_matricula_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="descripcion">
                <h5>Grupo</h5>
            </label><br>
            <select name="grupo_id" class="buscar-grupos col-12 @error('grupo_id') is-invalid @enderror" >
            </select>
            @error('grupo_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                <h5>Partida De Nacimiento</h5>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckDefault">
                <h5>Tarjeta De Vacuna</h5>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckDefault">
              <h5>  Diploma De Prescolar</h5>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckDefault">
              <h5>  Cedula De Los Padres</h5>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckDefault">
              <h5>  Bolotin del Año Anterior</h5>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckDefault">
                <h5>Hoja De Traslado</h5>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckDefault">
               <h5> Diploma De Sexto</h5>
            </label>
          </div>
        <br>
       
        
    </fieldset>
    <div class=" d-grid mt-2 col-sm-4">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>

    <div class="d-grid mt-2 col-sm-4">
        <a type="button" class="btn btn-primary" href="{{ url('matriculas/') }}"> Regresar </a>
    </div>
</div>
    

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('.buscador-estudiantes').select2({
        ajax: {
            url: '/buscar-estudiantes',
            dataType: 'json',
            delay: 250,
            processResults: function (data, params) {
                let results = [];
                if (data) {
                    results = data.data.map(item => {
                        return {
                            id: item.id,
                            text: item.nombre
                        }
                    })
                }

                console.log(results);

                return {
                    results: results
                };
            },
        }
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('.buscador-tipo-matriculas').select2({
        ajax: {
            url: '/buscador-tipo-matriculas',
            dataType: 'json',
            delay: 250,
            processResults: function (data, params) {
                let results = [];
                if (data) {
                    results = data.data.map(item => {
                        return {
                            id: item.id,
                            text: item.descripcion
                        }
                    })
                }

                console.log(results);

                return {
                    results: results
                };
            },
        }
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.buscar-grupos').select2({
            ajax: {
                url: '/buscar-grupos',
                dataType: 'json',
                delay: 250,
                processResults: function (data, params) {
                    let results = [];
                    if (data) {
                        results = data.data.map(item => {
                            return {
                                id: item.id,
                                text: item.descripcion
                            }
                        })
                    }
    
                    console.log(results);
    
                    return {
                        results: results
                    };
                },
            }
        });
    });
    </script>
@endsection