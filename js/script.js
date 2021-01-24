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

function loginValidation(){
    email = document.getElementById('email').value;
    password = document.getElementById('password').value;

    emailError = document.getElementById('error-email');
    passwordError = document.getElementById('error-password');

    emailValidation = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/.test(email);

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

    if(password == ""){
        document.getElementById('password').className = 'form-control is-invalid';
        passwordError.innerHTML = "El campo es requerido";
    }else{
        document.getElementById('password').className = ' form-control';
    }

    if(emailValidation && password != ""){
        return true;
    }else{
        return false;
    }
}



function deleteUser(idUser) {
    Swal.fire({
      title: "¿Estás seguro?",
      text: "Una vez borrado el usuario, no se puede recuperar!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: 'Sí',
      cancelButtonText: 'No'
    })
    .then((willDelete) => {
        if (willDelete.value) {
            window.location="/web_project/Users/deleteUser.php?id="+idUser;
        } 
    });
}


//-----------
function deleteProduct(idProduct) {
    Swal.fire({
      title: "¿Estás seguro?",
      text: "Una vez borrado el producto, no se puede recuperar!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: 'Sí',
      cancelButtonText: 'No'
    })
    .then((willDelete) => {
        if (willDelete.value) {
            window.location="/web_project/Products/deleteProduct.php?id="+idProduct;
        } 
    });
}

function cardEffectOver(){  
    var cardFooter = document.getElementsByClassName('display-none');
    cardFooter.className="display-info";
    console.log("Hols");
}

function cardEffectOut(){  
    var cardFooter = document.getElementsByClassName('display-info');
    cardFooter.className="display-none";
    console.log("Bye");     
}

function validationProductForm(){
    
    var productName = document.getElementById('name').value;
    var unitPrice = document.getElementById('unit_price').value;
    var stockValue = document.getElementById('stock').value;
    
    var nameError = document.getElementById('error-name');
    var unitPriceError = document.getElementById('error-unit-price');
    var stockError = document.getElementById('error-stock');
    
    var unitPriceValidation = /^\d*\.?\d*$/.test(unitPrice);
    var stockValidation = /^[0-9]+$/.test(stockValue);

    console.log("sa"+unitPrice+"qe");
    console.log("sa"+(unitPriceValidation)+"qe");

    if(!stockValidation){
        document.getElementById('stock').className = 'form-control is-invalid';
        if(stockValue == ""){
            stockError.innerHTML = "El campo es requerido";
        }else{
            stockError.innerHTML = "El campo es numérico";
        }
    }else{
        document.getElementById('stock').className = ' form-control';
    }

    if(productName==""){
        document.getElementById('name').className = 'form-control is-invalid';
        nameError.innerHTML = "El campo es requerido";
    }
    else{
        document.getElementById('name').className = ' form-control';
    }

    if(unitPrice==""){
        unitPriceError.innerHTML = "El campo es requerido.";
        document.getElementById('unit_price').className = 'form-control is-invalid';    
    }
    else{
        if(!unitPriceValidation){
            document.getElementById('unit_price').className = 'form-control is-invalid';    
            unitPriceError.innerHTML = "Este campo es numérico.";
        }
        else{
            document.getElementById('unit_price').className = 'form-control';
        }
    }

    var fileInput = document.getElementById('fileInput');
    var fileRoute = fileInput.value;

    if(stockValidation && unitPriceValidation && productName!="" && fileRoute!=""){
        return true;
    }
    else{
        return false;
    }
}

function validateImage(){
    var fileInput = document.getElementById('fileInput');
    var fileRoute = fileInput.value;    
    var allowedExtensions = /(.jpg|.JPG|.png|.PNG|.jpeg|.JPEG)$/i;
    if(!allowedExtensions.exec(fileRoute)){
        Swal.fire("Asegúrate de haber seleccionado una imagen: .jpg, .png, .jpeg");
        fileInput.value = '';
        document.getElementById('fileViewer').innerHTML ='';               
        return false;
    }
    else{
        if(fileInput.files && fileInput.files[0]){
            var viewer = new FileReader();
            viewer.onload=function(e){
                document.getElementById('fileViewer').innerHTML ='<embed src="'+e.target.result+'" width="200" height="200">';               
            }
            viewer.readAsDataURL(fileInput.files[0]);
        }
    }
}





