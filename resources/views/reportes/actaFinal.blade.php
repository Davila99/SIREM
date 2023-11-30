@extends('adminlte::page')
@section('content')
    <div class="container">
        <h1>Acta Final</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Nota Final</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $estudianteId => $calificaciones)
                    @php
                        $estudiante = $calificaciones->first()->estudiante;
                        $notaFinal = $calificaciones->first()->nf;
                    @endphp
                    <tr>
                        <td>{{ $estudiante->nombres }}</td>
                        <td>{{ $notaFinal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Button to generate PDF -->
        <form action="{{ url('/generate-pdf') }}" method="post" style="display:inline;">
            @csrf
            <input type="hidden" name="data" value="{{ ($data) }}">
            <button type="submit" class="btn btn-primary">Generate PDF</button>
        </form>

        <!-- Button to download Excel -->
        <form action="{{ url('download-excel') }}" method="post" style="display:inline;">
            @csrf
            <input type="hidden" name="data" value="{{ ($data) }}">
            <button type="submit" class="btn btn-success">Download Excel</button>
        </form>
    </div>
@endsection

