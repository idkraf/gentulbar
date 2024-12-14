"use strict";var KTSigninGeneral=function(){var t,e,a;return{init:function(){t=document.querySelector("#kt_password_reset_form"),e=document.querySelector("#kt_account_delete_submit"),a=FormValidation.formValidation(t,{fields:{email:{validators:{notEmpty:{message:"Email address is required"},emailAddress:{message:"Please enter a valid email address"}}},password:{validators:{notEmpty:{message:"Password is required"}}}},plugins:{bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}}),e.addEventListener("click",(function(i){i.preventDefault(),a.validate().then((function(a){"Valid"===a?(e.setAttribute("data-kt-indicator","on"),e.disabled=!0,axios.post(t.getAttribute("action"),new FormData(t)).then((function(t){t.data.success?Swal.fire({text:t.data.message||"You have successfully deleted your account.",icon:"success",confirmButtonText:"Ok, got it!"}).then((function(){window.location.href=t.data.redirect_url||"/"})):Swal.fire({text:t.data.message||"An error occurred. Please try again.",icon:"error",confirmButtonText:"Ok, got it!"})})).catch((function(t){Swal.fire({text:"Something went wrong. Please try again.",icon:"error",confirmButtonText:"Ok, got it!"})})).finally((function(){e.removeAttribute("data-kt-indicator"),e.disabled=!1}))):Swal.fire({text:"Please check the form for errors.",icon:"error",confirmButtonText:"Ok, got it!"})}))}))}}}();KTUtil.onDOMContentLoaded((function(){KTSigninGeneral.init()}));
