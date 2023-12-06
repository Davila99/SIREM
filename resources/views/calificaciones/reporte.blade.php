<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Acta Académica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('images/logo2.png');
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: contain;
            opacity: 0.2;
            z-index: -1;
        }

        .footer {
            text-align: center;
            padding: 10px;
            color: #343a40;
            left: 0;
            width: 100%;
            z-index: 1000;
            background: none;
            border-top: 1px solid #ddd;
            margin-top: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
            position: fixed;
            bottom: 0;
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
                    <th>Calificacion Cuantitativa</th>
                    <th>Calificacion Cualitativa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filas as $fila)
                    <tr>
                        <td>{{ $fila->estudiante->nombres ?? 'N/A' }} {{ $fila->estudiante->apellidos ?? 'N/A' }}</td>
                        <td>{{ $fila->calificacion ?? 'N/A' }}</td>
                        <td>{{ $fila->calificacion_cualitativa ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <footer class="footer text-center mt-4">
        <!-- Línea horizontal con margen inferior para separación -->
        
        
        <div class="signature-box p-3">
        <hr style="margin-bottom: 10px; border-top: 1px solid #ddd;">
            <h4 class="mb-0">Firma del Docente: {{ $acta->empleado->nombres ?? 'N/A' }} {{ $acta->empleado->apellidos ?? 'N/A' }}</h4>
        </div>
    </footer>

    <!-- Footer estándar sin línea horizontal encima -->
    <footer class="footer text-center">
        &copy; {{ date('Y') }} Colegio Cristiano Manto de Gracia
    </footer>
</body>

</html>