function validationForm(){
    nombre = document.getElementById('name').value;
    email = document.getElementById('email').value;
    identification = document.getElementById('identification').value;
    role = document.getElementById('role').value;
    password = document.getElementById('password').value;
    id_user = document.getElementById('id_user').value;

    nameError = document.getElementById('error-name');
    emailError = document.getElementById('error-email');
    roleError = document.getElementById('error-role');
    identificationError = document.getElementById('error-identification');
    passwordError = document.getElementById('error-password');
    
    emailValidation = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/.test(email);
    nombreValidation = /^[a-zA-ZÀ-ÿ ]+$/.test(nombre);
    roleValidation = /^[0-9]+$/.test(role);
    identificationValidation = /^[0-9]+$/.test(identification);

    if(!emailValidation){
        document.getElementById('email').className = 'form-control is-invalid';
        if(email == ""){
            emailError.innerHTML = "El campo es requerido";
        }else{
            emailError.innerHTML = "Ingrese un email válido";
        }
    }else{
        document.getElementById('email').className = ' form-control';
    }

    if(!nombreValidation){
        document.getElementById('name').className = 'form-control is-invalid';
        if(nombre == ""){
            nameError.innerHTML = "El campo es requerido";
        }else{
            nameError.innerHTML = "El campo es de tipo texto";
        }
    }else{
        document.getElementById('name').className = ' form-control';
    }

    if(!roleValidation){
        document.getElementById('role').className = 'form-control is-invalid';
        roleError.innerHTML = "El campo es requerido";
    }else{
        document.getElementById('role').className = ' form-control';
    }

    if(!identificationValidation){
        document.getElementById('identification').className = 'form-control is-invalid';
        if(nombre == ""){
            identificationError.innerHTML = "El campo es requerido";
        }else{
            identificationError.innerHTML = "El campo es de numérico";
        }
    }else{
        document.getElementById('identification').className = ' form-control';
    }

    if(password == "" && id_user == ""){
        document.getElementById('password').className = 'form-control is-invalid';
        passwordError.innerHTML = "El campo es requerido";
    }else{
        document.getElementById('password').className = ' form-control';
    }

    if(emailValidation && roleValidation && nombreValidation && identificationValidation){
        if(password == "" && id_user == ""){
            return false;    
        }else{
            return true;
        }
    }else{
        return false;
    }
}