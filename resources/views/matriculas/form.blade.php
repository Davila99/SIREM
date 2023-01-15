<div class="form-group">
    <label for="descripcion">
        <h5>Estudiante</h5>
    </label><br>
    <select class="buscador-estudiantes col-12">
    </select>
</div>
<div class="form-group">
    <label for="descripcion">
        <h5>Tipo Matricula</h5>
    </label><br>
    <select class="buscador-tipo-matriculas col-12">
    </select>
</div>
<div class="form-group">
    <label for="descripcion">
        <h5>Grupo</h5>
    </label><br>
    <select class="buscar-grupos col-12">
    </select>
</div>


<input type="submit" value="Guardar" class="btn btn-success">
<a type="button" class="btn btn-primary" href="{{ url('matriculas/') }}"> Regresar </a>




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
                                text: item.fecha
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