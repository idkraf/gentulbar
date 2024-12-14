"use strict";

// Class definition
var KTEditDpt = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_edit_dpt');
    const form = element.querySelector('#kt_modal_edit_dpt_form');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initEditDpt = () => {

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'id_dpt': {
                        validators: {
                            notEmpty: {
                                message: 'Valid dpt is required'
                            }
                        }
                    },
                    'id_tps': {
                        validators: {
                            notEmpty: {
                                message: 'Valid tps is required'
                            }
                        }
                    },
                    'jss': {
                        validators: {
                            notEmpty: {
                                message: 'Jumlah Suara Sah is required'
                            }
                        }
                    },
                    'jsts': {
                        validators: {
                            notEmpty: {
                                message: 'Jumlah Suara Tidak Sah is required'
                            }
                        }
                    },
                    'jssdts': {
                        validators: {
                            notEmpty: {
                                message: 'Jumlah Suara Sah dan Tidak Sah is required'
                            }
                        }
                    },
                    'jphp': {
                        validators: {
                            notEmpty: {
                                message: 'Jumlah Pengguna Hak Pilih is required'
                            }
                        }
                    },
                    'jssyd': {
                        validators: {
                            notEmpty: {
                                message: 'Jumlah Surat Suara yang Digunakan is required'
                            }
                        }
                    },
                    'total_votes_1': {
                        validators: {
                            notEmpty: {
                                message: 'Vote calon 1 is required'
                            }
                        }
                    },
                    'total_votes_2': {
                        validators: {
                            notEmpty: {
                                message: 'Vote calon 2 is required'
                            }
                        }
                    },
                    'total_votes_3': {
                        validators: {
                            notEmpty: {
                                message: 'Vote calon 3 is required'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Submit button handler
        const submitButton = element.querySelector('[data-kt-dpt-modal-action="submit"]');
        submitButton.addEventListener('click', e => {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple click 
                        submitButton.disabled = true;

                        // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        setTimeout(function () {
                            // Remove loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;

                            // Show popup confirmation 
                            Swal.fire({
                                text: "Form has been successfully submitted!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    modal.hide();
                                }
                            });

                            //form.submit(); // Submit form
                        }, 2000);
                    } else {
                        // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });

        // Cancel button handler
        const cancelButton = element.querySelector('[data-kt-dpt-modal-action="cancel"]');
        cancelButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form			
                    modal.hide();	
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

        // Close button handler
        const closeButton = element.querySelector('[data-kt-dpt-modal-action="close"]');
        closeButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form			
                    modal.hide();	
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });
    }

    return {
        // Public functions
        init: function () {
            initEditDpt();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTEditDpt.init();
});