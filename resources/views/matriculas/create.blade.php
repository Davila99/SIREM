@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Registrar Matricula</h1>
        <form action="{{ url('/matriculas') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('matriculas.form')

        </form>
       
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
