<!DOCTYPE html>
<html lang="eS">

<head>
    <meta charset="UTF-8">
    <title>Acta Académica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
        }

        .text-center {
            text-align: center;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .font-italic {
            font-style: italic;
        }

        .imagen-arriba {
            position: absolute;
            top: 10px; 
            left: 10px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
        }

        .footer hr {
            margin-top: 5px; 
            width: 50%; 
        }

        .firma-docente {
            margin-top: 10px; 
        }

        .signature-box {
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" colspan="4" class="text-center">
                        <img src="images/logo.jpeg" alt="Imagen de Matrícula" width="80px" class="imagen-arriba">
                        <h1 class="font-weight-bold font-italic">Colegio Cristiano Manto de Gracia</h1>
                    </th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th scope="col" colspan="4" class="text-center">
                        <h1 class="font-weight-bold font-italic">Acta Académica</h1>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Fecha de generación</th>
                    <td>{{ $acta->fecha ?? 'N/A' }}</td>
                    <th scope="row">Docente</th>
                    <td>{{ $acta->empleado->nombres ?? 'N/A'}} {{ $acta->empleado->apellidos ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th scope="row">Asignatura</th>
                    <td>{{ $acta->asignatura->descripcion ?? 'N/A' }}</td>
                    <th scope="row">Observaciones</th>
                    <td>{{ $acta->observaciones ??'N/A' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Calificacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filas as $fila)
                    <tr>
                        <td>{{ $fila->estudiante->nombres ?? 'N/A' }} {{ $fila->estudiante->apellidos ?? 'N/A' }}</td>
                        <td>{{ $fila->calificacion ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
   
    <div class="footer">
        <hr>
        <div class="signature-box p-3">
        <h4 class="mb-0">Firma del Docente: {{ $acta->empleado->nombres ?? 'N/A' }} {{ $acta->empleado->apellidos ?? 'N/A' }}</h4>
        </div>
    </div>
</body>

</html>