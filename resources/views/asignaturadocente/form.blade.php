@extends('1Layouts.app')
<div class="mt-5 row justify-content-center ">
    <fieldset class="border p-4">
        <div class="form-group">
            <label for="descripcion">
                <h5>Asignaturas</h5>
            </label><br>
            <select name="asignatura_id" class="buscador-asignaturas col-12 @error('asignatura_id') is-invalid @enderror">
            </select>
            @error('asignatura_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>   
        <div class="form-group">
            <label for="descripcion">
                <h5>Empleados</h5>
            </label><br>
            <select name="empleado_id" class="buscador-empleados col-12 @error('empleado_id') is-invalid @enderror">
            </select>
            @error('empleado_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div> 

        <div class="form-group">
            <label for="grupo_id">
                <h5>Grupo:</h5>
            </label>
            <select name="grupo_id" class="buscar-grupos col-12 @error('grupo_id') is-invalid @enderror">
            </select>
            @error('grupo_id')
                <div class="invalid-feedback">
                    <h5> {{ $message }}</h5>
                </div>
            @enderror
        </div>
    </fieldset>
    <div class=" d-grid mt-1 col-sm-1">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>

    <div class="d-grid mt-1 col-sm-1">
        <a type="button" class="btn btn-primary" href="{{ url('asignaturadocente/') }}"> Regresar </a>
    </div>

</div>
</div>
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.buscar-grupos').select2({
                ajax: {
                    url: '/buscar-grupos',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data, params) {
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
            $('.buscador-empleados').select2({
                ajax: {
                    url: '/buscar-empleados',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data, params) {
                        let results = [];
                        if (data) {
                            results = data.data.map(item => {
                                return {
                                    id: item.id,
                                    text: item.nombres + ' ' + item.apellidos
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
            $('.buscador-asignaturas').select2({
                ajax: {
                    url: '/buscar-asignaturas',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data, params) {
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
