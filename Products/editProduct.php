<?php include("../dbConnection.php")?>
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
                echo $fileNameNew;
                $fileDestination = '../images/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $query = "UPDATE product SET name='".$_POST['name']."',unit_price='".$_POST['unit_price']."',stock='".$_POST['stock']."',image_name='".$fileNameNew."'"."WHERE idproduct=".$_GET['id'];
                echo ($query);
                mysqli_query($conn, $query);
                header("Location: indexproducts.php");
            }
        }
        else{
            echo ("El tipo de archivo no es correcto. Debe ser png, jpg o jpeg.");
        }
    }
?>