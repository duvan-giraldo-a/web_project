<?php include("../dbConnection.php")?>
<?php include("../Components/auth-middleware.php")?>

<?php

    if (isset($_POST['submit'])) {
       $id = $_POST['id_user'];
       $name = $_POST['name'];
       $identification = $_POST['identification'];
       $id_role = $_POST['role'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       try {
            if ($password == "") {
                $query = "UPDATE users SET idrole = '".$id_role."',name = '".$name."',identification =  '".$identification."',email = '".$email."' WHERE users.idusers = ".$id;
            } else {
                $password = password_hash($password,PASSWORD_DEFAULT);
                $query = "UPDATE users SET idrole = '".$id_role."',name = '".$name."',identification =  '".$identification."',email = '".$email."',password = '".$password."' WHERE users.idusers = ".$id;
            }
            mysqli_query($conn,$query);
            header("location: users.php");
       } catch (\Throwable $th) {
           echo $th;
       };
    }

?>