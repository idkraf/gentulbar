"use strict";

// Class definition
var KTSigninGeneral = function () {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form validation
    var handleValidation = function (e) {
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'Email address is required'
                            },
                            emailAddress: {
                                message: 'Please enter a valid email address'
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'Password is required'
                            }
                        }
                    }
                },
                plugins: {
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '', 
                        eleValidClass: ''
                    })
                }
            }
        );
    }

    var handleSubmitAjax = function (e) {
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status === 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;

                    // Make the AJAX request
                    axios.post(form.getAttribute('action'), new FormData(form))
                        .then(function (response) {
                            if (response.data.success) {
                                // Success: Show success message
                                Swal.fire({
                                    text: response.data.message || "You have successfully deleted your account.",
                                    icon: "success",
                                    confirmButtonText: "Ok, got it!",
                                }).then(function() {
                                    // Optionally redirect or take other actions
                                    window.location.href = response.data.redirect_url || '/';
                                });
                            } else {
                                // Error: Show error message
                                Swal.fire({
                                    text: response.data.message || "An error occurred. Please try again.",
                                    icon: "error",
                                    confirmButtonText: "Ok, got it!",
                                });
                            }
                        })
                        .catch(function (error) {
                            // General error
                            Swal.fire({
                                text: "Something went wrong. Please try again.",
                                icon: "error",
                                confirmButtonText: "Ok, got it!",
                            });
                        })
                        .finally(function () {
                            // Hide loading indication
                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;
                        });
                } else {
                    // Show form validation errors
                    Swal.fire({
                        text: "Please check the form for errors.",
                        icon: "error",
                        confirmButtonText: "Ok, got it!",
                    });
                }
            });
        });
    }

    // Public functions
    return {
        init: function () {
            form = document.querySelector('#kt_password_reset_form');
            submitButton = document.querySelector('#kt_account_delete_submit');
            handleValidation();
            handleSubmitAjax();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
