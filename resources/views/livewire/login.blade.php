<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="margin: 0px;
    padding: 0px;
    background: url(img/ninos.jpg) no-repeat center top ;
    background-size: cover;">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="#" class="mb-10">
                <img alt="Logo" src="../../img/lgoo.png" class="h-100px" />
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
            <form class="container" wire:submit.prevent="submit">
                {{-- @csrf --}}
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Inicio de Sesión</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">Eres nuevo?
                        <a href="register" class="link-primary fw-bolder">Crear nueva cuenta</a></div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus wire:model="email" />
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-2">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">Contraseña</label>
                            <!--end::Label-->
                            <!--begin::Link-->
                            <a href="../../demo1/dist/authentication/layouts/dark/password-reset.html" class="link-primary fs-6 fw-bolder">Olvidaste tu contraseña?</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Input-->
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" wire:model="password"/>
                           @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!--end::Input-->

                    </div>
                    <!--end::Input group-->
                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recuerdame') }}
                                </label>
                            </div>
                        </div>
            </div>
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-warning w-100 mb-5" style="background-color: #fe5000">
                            <span class="indicator-label">Iniciar</span>
                            <span class="indicator-progress">Espere por favor...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Submit button-->
                        <!--begin::Separator-->

                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="d-flex flex-center flex-column-auto p-10">
            <!--begin::Links-->
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
                <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
                <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
