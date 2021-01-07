<?php include("../dbConnection.php")?>

<?php

    if (isset($_POST['submit'])) {
       $name = $_POST['name'];
       $identification = $_POST['identification'];
       $id_role = $_POST['role'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       try {
            $query = "INSERT INTO users (idrole,name,identification,email,password) VALUES('".$id_role."','".$name."','".$identification."','".$email."','".$password."')";
            mysqli_query($conn,$query);
            header("location: users.php");
       } catch (\Throwable $th) {
           echo $th;
       };
    }

?>