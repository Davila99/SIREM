<fieldset class="border p-4">
    <div class="form-group">
        <label for="nombre">
            <h5>Nombre de Usuario</h5>
        </label>
        <input type="text" id="name" name="name"class="form-control @error('name') is-invalid @enderror"
            placeholder="Nombre de Usuario " value="{{ isset($datos->name) ? $datos->name : old('name') }}">
        @error('name')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">
            <h5>Correo Electronico:</h5>
        </label>
        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
            placeholder="Correo electronico" value="{{ isset($datos->email) ? $datos->apellido : old('email') }}">
        @error('email')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="empleado">
            <h5>Empleado:</h5>
        </label>
        <select class="form-control @error('empleado_id') is-invalid @enderror" name="empleado_id" id="empleados">
            <option value="" selected disabled>--Seleccione--</option>

            @isset($empleados)
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}"
                        @if (!empty($datos->empleado_id)) {{ $datos->empleado_id == $empleado->id ? 'selected' : '' }} @else {{ old('empleado_id') == $empleado->id ? 'selected' : '' }} @endif>
                        {{ $empleado->nombres }} {{ $empleado->apellidos }} </option>
                @endforeach
            @endisset
        </select>
        @error('empleado_id')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">
            <h5>Constraseña</h5>
        </label>
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight"><input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password" placeholder="Contraseña"></div>
            <div class="p-2 bd-highlight">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>
        

        @error('password')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror
    </div>

    {{-- <div class="form-group">
        <label for="password">
            <h5>Confirmar contraseña</h5>
        </label>
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight"><input id="passwordConfirmation" type="password"
                    class="form-control @error('passwordConfirmation') is-invalid @enderror" name="passwordConfirmation"
                    required autocomplete="new-passwordConfirmation" placeholder="Confirmacion de contraseña"></div>
            <div class="p-2 bd-highlight">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="toggleCondirmadPassword">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        @error('password_confirmation')
            <div class="invalid-feedback">
                <h5> {{ $message }}</h5>
            </div>
        @enderror
    </div> --}}
</fieldset>

<div class="mt-2 row justify-content-center">
    <div class=" d-grid mt-1 col-sm-1">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>

    <div class="d-grid mt-1 col-sm-10">
        <a type="button" class="btn btn-primary" href="{{ url('tutores/') }}"> Regresar </a>
    </div>
</div>

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('mensaje-error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ya se encuentra un registro con los mismos datos',
            })
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                var passwordInput = $('#password');
                var passwordFieldType = passwordInput.attr('type');

                if (passwordFieldType === 'password') {
                    passwordInput.attr('type', 'text');
                    $('#togglePassword i').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    $('#togglePassword i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

        });
        $(document).ready(function() {
            $('#toggleCondirmadPassword').click(function() {
                var passworConfirmationdInput = $('#passwordConfirmation');
                var passwordConfirmationFieldType = passworConfirmationdInput.attr('type');

                if (passwordConfirmationFieldType === 'passwordConfirmation') {
                    passworConfirmationdInput.attr('type', 'text');
                    $('#toggleCondirmadPassword i').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passworConfirmationdInput.attr('type', 'passwordConfirmation');
                    $('#toggleCondirmadPassword i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

        });
    </script>
@endsection
