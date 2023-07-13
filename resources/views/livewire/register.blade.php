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
        <div class="scrollable-section">
        <div class="w-lg-700px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <form id="kt_sign_up_form" >
                @csrf
                <!--begin::Heading-->
                <div class="mb-10 text-center">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">Crear nueva cuenta</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-400 fw-bold fs-4">Tienes una cuenta?
                        {{-- <a href="{{ route('login') }}" class="link-primary fw-bolder">Iniciar aqui</a></div> --}}
                    <!--end::Link-->
                </div>

                <div class="row fv-row mb-7">
                    <!--begin::Nombre-->
                    <div class="col-xl-6">
                        <label class="form-label fw-bolder text-dark fs-6">Nombre</label>
                        <input class="form-control form-control-lg form-control-solid" wire:model="name" type="text"
                            placeholder="" name="name" id="name" autocomplete="off" />
                    </div>


                    <!--begin::Apellido-->
                    <div class="col-xl-6">
                        <label class="form-label fw-bolder text-dark fs-6">Apellido</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" placeholder=""
                            name="apellido" id="apellido" autocomplete="off" wire:model="apellido" />
                    </div>

                    <!--begin::Celular-->
                    <div class="col-xl-6">
                        <label class="form-label fw-bolder text-dark fs-6">Celular</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" placeholder=""
                            name="celular" id="celular" autocomplete="off" wire:model="celular" />
                    </div>

                    <!--begin::Fecha de Nacimiento-->
                    <div class="col-xl-6">
                        <label class="form-label fw-bolder text-dark fs-6">Fecha de Nacimiento</label>
                        <input class="form-control form-control-lg form-control-solid" type="date" placeholder=""
                            name="fecha_nacimiento" id="fecha_nacimiento" autocomplete="off"
                            wire:model="fecha_nacimiento" />
                    </div>

                    <!--begin::Sexo-->


                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">Email</label>
                    <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                        type="email" placeholder="" name="email" value="{{ old('email') }}" required
                        autocomplete="email" wire:model="email" />
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
                            <input
                                class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                type="password" placeholder="" name="password" required autocomplete="new-password"
                                wire:model="password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                data-kt-password-meter-control="visibility">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>
                        <!--end::Input wrapper-->
                        <!--begin::Meter-->
                       {{--  <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div> --}}
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
                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder=""
                            name="password_confirmation" id="password_confirmation" required
                            autocomplete="new-password" />
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                            data-kt-password-meter-control="visibility">
                            <i class="bi bi-eye-slash fs-2"></i>
                            <i class="bi bi-eye fs-2 d-none"></i>
                        </span>
                    </div>
                    <!--end::Input wrapper-->
                    <!--begin::Meter-->
                   {{--  <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                    </div> --}}
                    <!--end::Input group-->
                    <!--begin::Input group-->

                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-warning"
                            style="background-color: #fe5000" wire:click.prevent="crear()">
                            <span class="indicator-label">Guardar</span>
                            <span class="indicator-progress">Espere por favor ...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
            </form>
        </div>
        </div>
    </section>
</div>

<style>
    .scrollable-section {
        height: calc(100vh - 95px); /* Ajusta la altura según tus necesidades */
        overflow-y: auto; /* Habilita la barra de desplazamiento vertical */
    }
</style>