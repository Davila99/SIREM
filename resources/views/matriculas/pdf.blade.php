<!DOCTYPE html>
<html lang="es">

<head>
    <title>Hoja de Matrícula</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Incluye los archivos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Establece el tamaño de fuente y otros estilos para que quepa en una página */
        body {
            font-size: 13px; /* Tamaño de fuente reducido */
        }

        .container {
            max-width: 95%; /* Aprovecha todo el ancho disponible */
            margin: 0; /* Elimina los márgenes para aprovechar al máximo el espacio */
            padding: 20px;
            /* border: 1px solid #ccc; */
        }

        /* Evita que las tablas se dividan entre páginas */
        table {
            page-break-inside: avoid;
        }

        /* Estilos adicionales... */

        .footer {
            position: absolute;
            bottom: 20px;
        }
        /* Estilo para la imagen */
        .imagen-arriba {
            position: absolute;
            top: 10px; /* Espacio a la derecha de la imagen */
            left: 10px; /* Espacio arriba de la imagen */
        }
    </style>
</head>

<body>
    <div class="container"> <!-- Añade el margen superior -->
        <h4 class="text-center mb-3">Hoja de Matrícula</h4>
        <!-- Imagen -->
        <!-- <div class="d-flex align-items margin-right"> -->
        <img src="images/logo.jpeg" alt="Imagen de Matrícula" width="100px" class="imagen-arriba">

        </div>

        <!-- Información del Estudiante -->
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

        <!-- Información del Grupo -->
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

        <!-- Información del Tutor -->
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

<!-- Firmas del Tutor y del Director -->
<div class="section mb-4">
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
</div>


        <!-- Pie de página -->
        <div class="footer mt-4">
            <p class="text-center font-weight-bold text-primary">Colegio Cristiano Manto de Gracia</p>
        </div>
    </div>

    <!-- Incluye el script de jQuery requerido por Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>