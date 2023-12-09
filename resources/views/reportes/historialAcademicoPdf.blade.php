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
        /* Estilos para la marca de agua */
        body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('images/logo2.png'); /* Ruta de tu imagen */
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: contain;
    opacity: 0.2; /* Ajusta este valor según la opacidad deseada (0 a 1) */
    z-index: -1; /* Para colocar la imagen detrás del contenido */
}

        /* Contenedor principal */
        .container-fluid {
            max-width: 800px;
            margin: 10px auto 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1;
            position: relative; /* Para que la posición absoluta de otros elementos sea relativa a este contenedor */
        }

        /* Logotipo */
        .logo {
            width: 80px;
        }

        /* Pie de página */
        .footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            border-top: 1px solid #ddd;
            margin-top: auto;
            position: sticky;
            bottom: 0;
        }

        /* Centrar texto */
        .text-center {
            text-align: center;
        }

        /* Resto de tus estilos... */

        /* Tarjeta de contenido */
        .card {
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
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
            padding: 10px;
        }

        /* Tabla de calificaciones */
        .table {
            width: 100%;
            margin-bottom: 0.25rem;
            color: #212529;
            border: 1px solid #ddd;
            border-radius: 4px;
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
    padding: 10px;
    color: white;
    left: 0;
    width: 100%;
    color: #343a40; /* Color del texto del footer */
    z-index: 1000; /* Puedes ajustar este valor según sea necesario */
    background: none; /* Eliminamos la propiedad de fondo */
    border-top: 1px solid #ddd; /* Mantenemos el borde superior si lo necesitas */
    margin-bottom: 10px;
    border: 1px solid transparent;
    border-radius: 4px;
    position: fixed;
    bottom: 20px; /* Ajusta este valor para cambiar la posición vertical */
    z-index: 1000; /* Puedes ajustar este valor según sea necesario */
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