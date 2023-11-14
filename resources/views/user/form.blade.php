<fieldset class="border p-4">
    <div class="form-group">
        <label for="name">
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
            placeholder="Correo electronico" value="{{ isset($datos->email) ? $datos->email : old('email') }}">
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
                    <button class="btn btn-outline-success" type="button" id="togglePassword">
                        <i id="togglePassword" class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="invalid-feedback">
            <h5>Las contraseñas no coinciden.</h5>
        </div>
    </div>

    <div class="form-group">
        <label for="passwordConfirmation">
            <h5>Confirmar contraseña</h5>
        </label>
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight"><input id="passwordConfirmation" type="password"
                    class="form-control @error('passwordConfirmation') is-invalid @enderror" name="passwordConfirmation"
                    required autocomplete="new-passwordConfirmation" placeholder="Confirmacion de contraseña"></div>
            <div class="p-2 bd-highlight">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="button" id="passwordConfirmation">
                        <i id="toggleConfirmPassword" class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="invalid-feedback">
            <h5>Las contraseñas no coinciden.</h5>
        </div>
    </div>
</fieldset>

<div class="mt-2 row justify-content-center">
    <div class=" d-grid mt-1 col-sm-1">
        <input type="submit" value="Guardar" id="PasswordVerication" class="btn btn-success">
    </div>

    <div class="d-grid mt-1 col-sm-10">
        <a type="button" class="btn btn-primary" href="{{ url('users/') }}"> Regresar </a>
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
                    $('#togglePassword').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    $('#togglePassword').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            $('#toggleConfirmPassword').click(function() {
                var passwordConfirmationInput = $('#passwordConfirmation');
                var passwordConfirmationFieldType = passwordConfirmationInput.attr('type');

                if (passwordConfirmationFieldType === 'password') {
                    passwordConfirmationInput.attr('type', 'text');
                    $('#toggleConfirmPassword').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordConfirmationInput.attr('type', 'password');
                    $('#toggleConfirmPassword').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("password");
            const passwordConfirmationInput = document.getElementById("passwordConfirmation");
            const errorFeedbacks = document.querySelectorAll(".invalid-feedback");

            function validatePasswords() {
                const passwordValue = passwordInput.value;
                const passwordConfirmationValue = passwordConfirmationInput.value;

                if (passwordValue !== passwordConfirmationValue) {
                    errorFeedbacks.forEach(function(feedback) {
                        feedback.style.display = "block";
                    });

                    passwordInput.classList.add("is-invalid");
                    passwordConfirmationInput.classList.add("is-invalid");
                } else {
                    errorFeedbacks.forEach(function(feedback) {
                        feedback.style.display = "none";
                    });

                    passwordInput.classList.remove("is-invalid");
                    passwordConfirmationInput.classList.remove("is-invalid");
                }
            }

            passwordInput.addEventListener("input", validatePasswords);
            passwordConfirmationInput.addEventListener("input", validatePasswords);
        });
    </script>
@endsection
