"use strict";var KTJenjang=function(){const t=document.getElementById("kt_modal_jenjang"),n=t.querySelector("#kt_modal_jenjang_form"),e=new bootstrap.Modal(t);return{init:function(){(()=>{var o=FormValidation.formValidation(n,{fields:{nama:{validators:{notEmpty:{message:"Nama is required"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}});t.querySelector('[data-kt-jenjang-modal-action="close"]').addEventListener("click",(t=>{t.preventDefault(),Swal.fire({text:"Are you sure you would like to close?",icon:"warning",showCancelButton:!0,buttonsStyling:!1,confirmButtonText:"Yes, close it!",cancelButtonText:"No, return",customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-active-light"}}).then((function(t){t.value&&e.hide()}))})),t.querySelector('[data-kt-jenjang-modal-action="cancel"]').addEventListener("click",(t=>{t.preventDefault(),Swal.fire({text:"Are you sure you would like to cancel?",icon:"warning",showCancelButton:!0,buttonsStyling:!1,confirmButtonText:"Yes, cancel it!",cancelButtonText:"No, return",customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-active-light"}}).then((function(t){t.value?(n.reset(),e.hide()):"cancel"===t.dismiss&&Swal.fire({text:"Your form has not been cancelled!.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}})}))}));const i=t.querySelector('[data-kt-jenjang-modal-action="submit"]');i.addEventListener("click",(function(t){t.preventDefault(),o&&o.validate().then((function(t){console.log("validated!"),"Valid"==t?(i.setAttribute("data-kt-indicator","on"),i.disabled=!0,setTimeout((function(){i.removeAttribute("data-kt-indicator"),i.disabled=!1,Swal.fire({text:"Form has been successfully submitted!",icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}}).then((function(t){t.isConfirmed&&e.hide()}))}),2e3)):Swal.fire({text:"Sorry, looks like there are some errors detected, please try again.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-primary"}})}))}))})()}}}();KTUtil.onDOMContentLoaded((function(){KTJenjang.init()}));
