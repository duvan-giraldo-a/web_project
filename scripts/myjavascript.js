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

    console.log(unitPrice);

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

    if(!unitPriceValidation){
        document.getElementById('unit_price').className = 'form-control is-invalid';
        if(unitPrice==""){
            unitPriceError.innerHTML = "El campo es requerido.";
        }else{
            unitPriceError.innerHTML = "Este campo es numérico.";
        }
    }else{
        document.getElementById('unit_price').className = 'form-control';
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