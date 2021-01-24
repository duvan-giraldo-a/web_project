<?php include("../dbConnection.php")?>
<?php include("../Components/auth-middleware.php")?>
<?php
    if(isset($_POST['submit'])){   
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                $fileNameNew =uniqid('',true).".".$fileActualExt;
                ##echo $fileNameNew;
                $fileDestination = '../images/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $query = "INSERT INTO product(name, unit_price, stock, image_name) VALUES('".$_POST['name']."','".$_POST['unit_price']."','".$_POST['stock']."','".$fileNameNew."')";
                mysqli_query($conn, $query);
                header("Location: indexproducts.php");
            }
        }
        else{
            echo ("El tipo de archivo no es correcto. Debe ser png, jpg o jpeg.");
        }
    }
?>