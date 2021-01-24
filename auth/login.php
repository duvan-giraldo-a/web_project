<?php include("../Components/header.php")?>

<div class="container col-12 col-md-6 col-lg-6 col-xl-6">
    <br>
    <div class="card">
        <div class="card-header text-center">
            <h1>Iniciar Sesión</h1>
        </div>
        <div class="card-body">
            <form action="" method="POST" onsubmit="return loginValidation()">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Ingrese el correo electrónico" autocomplete="off" value='<?php echo(isset($_POST['email']) ? $_POST['email'] : '' );?>'>
                        <div id="error-email" class="invalid-feedback text-right"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese la contraseña" autocomplete="off" value='<?php echo(isset($_POST['password']) ? $_POST['password'] : '' );?>'>
                        <div id="error-password" class="invalid-feedback text-right"></div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary float-right">Iniciar Sesión</button>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div id="error-email" class="text-right" style="color: red;font-size: 15px;font-style: italic;">
                <?php 
                    include("../dbConnection.php");
                    
                    if (isset($_POST['login'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $query = 'SELECT u.name, u.password, r.name role FROM users u JOIN role r ON u.idrole = r.idrole WHERE email = "'.$email.'"';
                        
                        $user = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($user);
                        if($row==""){
                            echo "Las credenciales ingresadas no existen en la aplicación";
                        }else{
                            $name = $row['name'];
                            $role = $row['role'];
                            $password_encrypted = $row['password'];
                            if(password_verify($password,$password_encrypted)){
                                session_start();
                                $_SESSION['name'] = $name;
                                $_SESSION['role'] = $role;
                                header("Location: ../Products/homeProducts.php");
                            }else{
                                echo "Las credenciales ingresadas son incorrectas";
                            }
                        }
                    };
                ?>
            </div>    
        </div>
    </div>
</div>
<?php include("../Components/footer.php")?>