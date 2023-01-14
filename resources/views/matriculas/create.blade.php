@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Registrar Nivel Academico</h1>
        <form action="{{ url('/nivelacademic') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('nivelacademico.form')

        </form>
        <select class="buscador-estudiantes col-12">
        </select>
    </div>
@endsection

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

@endsection
