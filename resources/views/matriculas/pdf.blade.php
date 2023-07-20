<!doctype html>
<html lang="es">

<head>
    <title>Hoja de Matrícula</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Incluye los archivos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
      body {
          font-size: 12px; /* Tamaño de fuente reducido */
      }
      .container {
          max-width: 800px;
          margin: 0 auto;
          padding: 20px;
          border: 1px solid #ccc;
      }
      /* ... (otros estilos) ... */
      .footer {
          position: absolute;
          bottom: 20px;
          left: 0;
          right: 0;
      }
     
  </style>
</head>

<body>
    <div class="container mt-5">
        <h4 class="text-center mb-4">Hoja de Matrícula</h4>
        {{-- <div class="d-flex justify-content-center mb-4">
         <img src="{{ asset('/image/lo') }}" alt="">
      </div> --}}
        <div class="section mb-4 p-3 border rounded bg-white">
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

        <div class="section mb-4 p-3 border rounded bg-white">
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

        <div class="section mb-4 p-3 border rounded bg-white">
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

        <div class="signature d-flex justify-content-between mt-5">

       
          <div class="signature-box border rounded p-3">
              <h4 class="text-center">Firma del Tutor</h4>
              <hr>
          </div>
          <div class="signature-box border rounded p-3">
              <h4 class="text-center">Firma del Director</h4>
              <hr>

         </div>
      


        <div class="footer mt-5">
          <p class="text-center font-weight-bold text-primary">Colegio Cristiano Manto de Gracia</p>
      </div>
    </div>

    <!-- Incluye el script de jQuery requerido por Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>
