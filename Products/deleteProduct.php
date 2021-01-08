<?php include("../dbConnection.php")?>
<?php
    echo ($_GET['id']);
    $query = "DELETE FROM product WHERE idproduct=".$_GET['id'];
    mysqli_query($conn,$query);
    $queryFileName = "SELECT image_name FROM product WHERE idproduct=".$_GET['id'];
    $fileName = mysqli_query($conn,$queryFileName);
    //echo $fileName;
    //unlink("../images/");
    header("Location: indexProducts.php");
?>