"use strict";
var KTUsersAddUser = function () {
    const t = document.getElementById("kt_modal_add_user"),
        e = t.querySelector("#kt_modal_add_user_form"),
        n = new bootstrap.Modal(t);
    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(e, {
                    fields:
                    {
                        name:
                        {
                            validators:
                            {
                                notEmpty:
                                {
                                    message: "El nombre completo es requerido"

                                }
                            }
                        },
                        email:
                        {
                            validators:
                            {
                                notEmpty:
                                {
                                    message: "El email es requerido"
                                }
                            }
                        },
                        ci:
                        {
                            validators:
                            {
                                notEmpty:
                                {
                                    message: "El carnet de identidad es requerido"
                                }
                            }
                        },
                        telefono:
                        {
                            validators:
                            {
                                notEmpty:
                                {
                                    message: "El celular es requerido"
                                }
                            }
                        },
                      
                        password:
                        {
                            validators:
                            {
                                notEmpty:
                                {
                                    message: "El password es requerido"
                                }
                            }
                        },
                        password:
                        {
                            validators:
                            {
                                notEmpty:
                                {
                                    message: "El password es requerido"
                                }
                            }
                        }
                    },
                     plugins: 
                    {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5
                        ({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                });
                const i = t.querySelector('[data-kt-users-modal-action="submit"]');
                i.addEventListener("submit", (t => {
                    t.preventDefault(), o && o.validate().then((function (t) {
                        console.log("validated!"),
                            "Valid" == t ? (i.setAttribute("data-kt-indicator", "on"),
                                i.disabled = !0, setTimeout((function () {
                                    i.removeAttribute("data-kt-indicator"),
                                        i.disabled = !1, Swal.fire({
                                            text: "¡El formulario ha sido enviado con éxito!", icon: "success", buttonsStyling: !1,
                                            confirmButtonText: "Ok", customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then((function (t) { t.isConfirmed && n.hide() }))
                                }), 2e3)) : 
                                Swal.fire ({
                                     text: "Lo sentimos, parece que se han detectado algunos errores, inténtalo de nuevo.", 
                                     icon: "error", buttonsStyling: !1, 
                                     confirmButtonText: "Ok",
                                      customClass: 
                                        { 
                                          confirmButton: "btn btn-primary" 
                                        } 
                                    })
                    }))
                })),
                    t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (t => {
                        t.preventDefault(), Swal.fire({
                            text: "Está seguro en cancelar?",
                            icon: "warning", showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Si, cancelar!",
                            cancelButtonText: "No, volver",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light"
                            }
                        }).then((function (t) {
                            t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss && Swal.fire({
                                text: "¡Tu formulario no ha sido cancelado!.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            })
                        }))
                    })),
                    t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (t => {
                        t.preventDefault(), Swal.fire({
                            text: "Está seguro en cancelar?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Si, cancelar!",
                            cancelButtonText: "No, volver",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light"
                            }
                        }).then((function (t) {
                            t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss && Swal.fire({
                                text: "¡Tu formulario no ha sido cancelado!.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            })
                        }))
                    }))
            })()
        }
    }
}(); KTUtil.onDOMContentLoaded((function () { KTUsersAddUser.init() }));