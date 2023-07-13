<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-up -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="margin: 0px;
    padding: 0px;
    background: url(images/familygo.jpg) no-repeat center top ;
    background-size: cover;">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="../../demo1/dist/index.html" class="mb-12">
                <img alt="Logo" src="../images/logo-sin-background.png" class="h-80px" />
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form id="kt_sign_up_form">
                    @csrf


                    <!--begin::Heading-->
                    <div class="mb-10 text-center">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Crear nueva cuenta</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">Tienes una cuenta?
                        <a href="login" class="link-primary fw-bolder">Iniciar aqui</a></div>
                        <!--end::Link-->
                    </div>
                    <!--end::Heading-->


                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <!--begin::Nombre-->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6">Nombre</label>
                            <input class="form-control form-control-lg form-control-solid" wire:model="name" type="text" placeholder="" name="name" id="name" autocomplete="off" />
                        </div>


                        <!--begin::Apellido-->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6">Apellido</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="apellido" id="apellido" autocomplete="off" wire:model="apellido"/>
                        </div>

                        <!--begin::Celular-->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6">Celular</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="celular" id="celular" autocomplete="off" wire:model="celular"/>
                        </div>

                        <!--begin::Fecha de Nacimiento-->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6">Fecha de Nacimiento</label>
                            <input class="form-control form-control-lg form-control-solid" type="date" placeholder="" name="fecha_nacimiento" id="fecha_nacimiento" autocomplete="off" wire:model="fecha_nacimiento"/>
                        </div>

                        <!--begin::Sexo-->


                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6">Email</label>
                        <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email" placeholder="" name="email" value="{{ old('email') }}" required autocomplete="email" wire:model="email"/>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6">Contraseña</label>
                            <!--end::Label-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" placeholder="" name="password" required autocomplete="new-password" wire:model="password"/>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                            </div>
                            <!--end::Input wrapper-->
                            <!--begin::Meter-->
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                            <!--end::Meter-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Hint-->
                        <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-5">
                        <label class="form-label fw-bolder text-dark fs-6">Confirmar Contraseña</label>
                        <div class="position-relative mb-3">
                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" id="password_confirmation" required autocomplete="new-password" />
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                            <i class="bi bi-eye-slash fs-2"></i>
                            <i class="bi bi-eye fs-2 d-none"></i>
                        </span>
                    </div>
                    <!--end::Input wrapper-->
                    <!--begin::Meter-->
                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->

                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-warning" style="background-color: #fe5000" wire:click.prevent="crear()">
                            <span class="indicator-label">Guardar</span>
                            <span class="indicator-progress">Espere por favor ...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
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
    <!--end::Authentication - Sign-up-->
</div>
