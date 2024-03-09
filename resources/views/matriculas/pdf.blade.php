<!DOCTYPE html>
<html lang="es">

<head>
    <title>Hoja de Matrícula</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-size: 12px; /* Reducir el tamaño de la fuente */
        }

        .container {
            max-width: 100%; /* Utilizar el ancho completo */
            margin: 0;
            padding: 10px; /* Reducir el relleno */
        }

        table {
            page-break-inside: avoid;
        }

        .footer {
            position: absolute;
            bottom: 10px; /* Reducir el espacio inferior */
            width: 100%;
        }

        .imagen-arriba {
            position: absolute;
            top: 5px;
            left: 5px;
            width: 100px; /* Ajustar el tamaño de la imagen */
        }

        .section {
            margin-bottom: 10px; /* Reducir el espacio entre secciones */
        }

        .table th, .table td {
            padding: 0.25rem; /* Reducir el espacio en las celdas de la tabla */
        }
    </style>
</head>

<body>
    <div class="container">
        <h4 class="text-center mb-3">Hoja de Matrícula</h4>
        <div class="imagen-container">
            <img src="images/logo.jpeg" alt="Imagen de Matrícula" class="imagen-arriba">
        </div>
        <div class="section mt-5 mb-3 bg-white">
            <h4>Información del Estudiante</h4>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nombres:</th>
                        <td>{{ $matriculas->estudiante->nombres }}</td>
                        <th>Apellidos:</th>
                        <td>{{ $matriculas->estudiante->apellidos }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Nacimiento:</th>
                        <td>{{ $matriculas->estudiante->fecha_nacimiento }}</td>
                        <th>Edad:</th>
                        <td>{{ $matriculas->estudiante->edad }}</td>
                    </tr>
                    <tr>
                        <th>Dirección:</th>
                        <td>{{ $matriculas->estudiante->direccion }}</td>
                        <th>Fecha de registro:</th>
                        <td>{{ $matriculas->fecha }}</td>
                    </tr>
                    <tr>
                        <th>Sexo:</th>
                        <td>{{ $matriculas->estudiante->sexo->descripcion }}</td>
                        <th>Tipo de Matrícula:</th>
                        <td>{{ $matriculas->tipo_matricula->descripcion }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section mb-3 bg-white">
            <h4>Información del Grupo</h4>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Grado:</th>
                        <td>{{ $matriculas->grado->descripcion }}</td>
                        <th>Fecha de registro:</th>
                        <td>{{ $matriculas->fecha }}</td>
                    </tr>
                    <tr>
                        <th>Docente Guía:</th>
                        <td>{{ $matriculas->empleado->nombres }}</td>
                        <th>Sección:</th>
                        <td>{{ $matriculas->seccion->descripcion }}</td>
                    </tr>
                    <tr>
                        <th>Turno:</th>
                        <td>{{ $matriculas->turno->descripcion }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="section mb-3 bg-white">
            <h4>Información del Tutor</h4>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nombres:</th>
                        <td>{{ $matriculas->estudiante->tutor->nombre }}</td>
                        <th>Apellidos:</th>
                        <td>{{ $matriculas->estudiante->tutor->apellido }}</td>
                    </tr>
                    <tr>
                        <th>Cédula:</th>
                        <td>{{ $matriculas->estudiante->tutor->cedula }}</td>
                        <th>Teléfono:</th>
                        <td>{{ $matriculas->estudiante->tutor->telefono }}</td>
                    </tr>
                    <tr>
                        <th>Profesión:</th>
                        <td>{{ $matriculas->estudiante->tutor->professions->descripcion }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Firmas como pie de página -->
    <div class="footer mt-4">
        <table class="table">
            <tbody>
                <tr>
                    <td class="text-center">
                        <div class="signature-box p-3">
                            <h6 class="mb-0">Firma del Tutor</h6>
                            <hr>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="signature-box p-3">
                            <h6 class="mb-0">Firma del Director</h6>
                            <hr>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="text-center font-weight-bold text-primary">Colegio Cristiano Manto de Gracia</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>


