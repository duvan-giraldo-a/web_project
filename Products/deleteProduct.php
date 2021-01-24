<?php include("../dbConnection.php")?>
<?php include("../Components/auth-middleware.php")?>
<?php
    $queryFileName = "SELECT image_name FROM product WHERE idproduct=".$_GET['id'];
    $result = mysqli_query($conn,$queryFileName);
    $fileName = mysqli_fetch_array($result);
    unlink("../images/".$fileName['image_name']);
    $query = "DELETE FROM product WHERE idproduct=".$_GET['id'];
    mysqli_query($conn,$query);
    header("Location: indexProducts.php");
?>