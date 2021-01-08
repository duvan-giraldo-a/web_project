<?php include("../dbConnection.php")?>
<?php include("../Components/auth-middleware.php")?>

<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM users WHERE users.idusers = ".$id;
        mysqli_query($conn, $query);
        header("location: users.php");
    }
?>