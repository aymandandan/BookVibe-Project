import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
document.addEventListener('DOMContentLoaded',function(){
    let nameRef = document.getElementById('name');
    let emailRef = document.getElementById('email');
    let phoneNbRef = document.getElementById('phoneNb');
    let countryRef = document.getElementById('country');
    let cityRef = document.getElementById('city');
    let stateRef = document.getElementById('state');
    let zipCodeRef = document.getElementById('zip_code');
    let paymentSec = document.getElementById('paymentSection');

    function validateFields(){
      if(nameRef.value.trim() != "" && emailRef.value.trim() != "" && phoneNbRef.value.trim() && 
        countryRef.value.trim()!= ""  && cityRef.value.trim() != "" && stateRef.value.trim() != "" && zipCodeRef.value.trim() != ""){
          paymentSec.style.display = "block"
        }
        else{
          paymentSec.style.display = "none"
        }
    }
    [nameRef,emailRef,phoneNbRef,countryRef,cityRef,stateRef,zipCodeRef].forEach(field =>{
      field.addEventListener("input",validateFields);
    });
});
