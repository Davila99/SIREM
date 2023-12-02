<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Académico</title>

    <style>
        /* Estilos generales del cuerpo */
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Contenedor principal */
        .container-fluid {
            max-width: 800px;
            margin: 10px auto 0; /* Ajustado margen superior */
            padding: 10px; /* Reducido padding */
            border: 1px solid #ddd; /* Añadido borde */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Logotipo */
        .logo {
            width: 80px;
            /* Estilos de borde eliminados */
        }

        /* Tarjeta de contenido */
        .card {
            margin-bottom: 10px; /* Ajustado margen */
            border: 1px solid #ddd;
            border-radius: 4px; /* Ajustado borde redondeado */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Encabezado de la tarjeta */
        .card-header {
            background-color: #f8f9fa;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        /* Cuerpo de la tarjeta */
        .card-body {
            padding: 10px; /* Ajustado padding */
        }

        /* Tabla de calificaciones */
        .table {
            width: 100%;
            margin-bottom: 0.25rem; /* Reducido margen inferior */
            color: #212529;
            border: 1px solid #ddd; /* Añadido borde */
            border-radius: 4px; /* Ajustado borde redondeado */
        }

        /* Estilos de celda en la tabla */
        .table th,
        .table td {
            padding: 0.5rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        /* Estilos de encabezado de la tabla */
        .table thead th {
            vertical-align: bottom;
            border-bottom: 1px solid #dee2e6;
        }

        /* Línea entre secciones de la tabla */
        .table tbody + tbody {
            border-top: 1px solid #dee2e6;
        }

        /* Mensaje de alerta */
        .alert {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        /* Estilos para mensaje de información */
        .alert-info {
            color: #0c5460;
            background-color: #d1ecf1;
            border-color: #bee5eb;
        }

        /* Pie de página */
        .footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            border-top: 1px solid #ddd; /* Añadido borde */
        }

        /* Centrar texto */
        .text-center {
            text-align: center;
        }

        /* Ajustes de margen */
        .mt-4 {
            margin-top: 0;
        }

        .mb-6 {
            margin-bottom: 1rem;
        }

        /* Alineación a la derecha */
        .float-right {
            float: right;
        }

        /* Alineación a la derecha */
        .text-right {
            text-align: right;
        }

        /* Alineación a la izquierda */
        .text-left {
            text-align: left;
        }

        /* Estilos para dispositivos pequeños */
        @media (max-width: 576px) {
            .d-sm-none {
                display: none;
            }
        }

        /* Estilos para la tabla de información del estudiante */
        .student-info-table {
            width: 100%;
            margin-top: 20px;
        }

        .student-info-table th,
        .student-info-table td {
            padding: 5px;
            border: none;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="text-left">
            <img src="{{ public_path('images/logo2.png') }}" alt="Imagen de Matrícula" class="logo">
            <h1 style="display: inline-block; margin-left: 10px;">Colegio Cristiano Manto de Gracia</h1>
            <h2 class="text-center mt-4 mb-6">Historial Académico</h2>
        </div>

        <table class="student-info-table table">
            <tr>
                <th>Nombre del Estudiante:</th>
                <td>{{ $dataEstudiante->nombres }} {{ $dataEstudiante->apellidos }}</td>
            </tr>
            <tr>
                <th>Código de Estudiante:</th>
                <td>{{ $dataEstudiante->codigo_estudiante }}</td>
            </tr>
            <tr>
                <th>Sexo:</th>
                <td>{{ $dataEstudiante->sexo->descripcion ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>

    <hr>

    @forelse ($data as $gradoId => $asignaturas)
        <div class="card">
            <div class="card-header text-center">
                <h2>{{ $gradoId }} Grado</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-left">Asignatura</th>
                            <th class="text-right">Nota Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($asignaturas as $asignatura)
                            <tr>
                                <td class="text-left">{{ $asignatura['asignatura'] }}</td>
                                <td class="text-right">{{ $asignatura['nf'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">No hay calificaciones registradas para este grado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <div class="alert alert-info text-center">
            No hay calificaciones registradas para este estudiante.
        </div>
    @endforelse

    <footer class="footer text-center mt-4">
        <p>&copy; {{ date('Y') }} Colegio Cristiano Manto de Gracia</p>
    </footer>
</body>
</html>