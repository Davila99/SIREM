<!DOCTYPE html>
<html lang="en">

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
            top: 10px; /* Espacio a la derecha de la imagen */
            left: 10px; /* Espacio arriba de la imagen */
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
                    <td>{{ $acta->fecha }}</td>
                    <th scope="row">Empleado</th>
                    <td>{{ $acta->empleado->nombres }} {{ $acta->empleado->apellidos }}</td>
                </tr>
                <tr>
                    <th scope="row">Asignatura</th>
                    <td>{{ $acta->asignatura->descripcion }}</td>
                    <th scope="row">Observaciones</th>
                    <td>{{ $acta->observaciones }}</td>
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
                        <td>{{ $fila->estudiante->nombres }} {{ $fila->estudiante->apellidos }}</td>
                        <td>{{ $fila->calificacion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

