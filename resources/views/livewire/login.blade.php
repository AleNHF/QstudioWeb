<div>
<section id="headerSection">
    @include('front.red')
    <div class="header-top">
        <div class="container d-flex justify-content-between">
            <div class="d-inline-flex ml-auto">
                
            </div>
        </div>
    </div>
    <br>
    @include('front.navbar')    

    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        <form class="container" wire:submit.prevent="submit">

            <div class="text-center mb-10">

                <h1 class="text-dark mb-3">Inicio de Sesión</h1>

                <div class="text-gray-400 fw-bold fs-4">Eres nuevo?
                    <a href="register" class="link-primary fw-bolder">Crear nueva cuenta</a>
                </div>

            </div>

            <div class="fv-row mb-10">

                <label class="form-label fs-6 fw-bolder text-dark">Email</label>

                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus wire:model="email" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="fv-row mb-10">

                <div class="d-flex flex-stack mb-2">

                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Contraseña</label>

                    <a href="../../demo1/dist/authentication/layouts/dark/password-reset.html"
                        class="link-primary fs-6 fw-bolder">Olvidaste tu contraseña?</a>

                </div>

                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                    required autocomplete="current-password" wire:model="password" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">

                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                            ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Recuerdame') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="text-center">

                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-warning w-100 mb-5"
                    style="background-color: #fe5000">
                    <span class="indicator-label">Iniciar</span>
                    <span class="indicator-progress">Espere por favor...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>

            </div>

        </form>
    </div>
</section>
 
</div>