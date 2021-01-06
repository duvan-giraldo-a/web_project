<?php include("../dbConnection.php")?>
<?php include("../Components/header.php")?>

<?php 
    if (isset($_GET['id'])) {
        $editing = true;
        $id = $_GET['id'];
        $query = "SELECT * FROM users WHERE idusers = ".$id;
        $user_query = mysqli_query($conn, $query);
        $user = mysqli_fetch_array($user_query);
    }else{
        $editing = false;
    }
?>
<div class="container col-12 col-md-10 col-lg-10 col-xl-10">
    <div class="card">
        <div class="card-header">
            <h1><?php echo(!$editing ? 'Nuevo Usuario' : 'Editar Usuario ' );?></h1>
        </div>
        <div class="card-body">
            <form action="<?php echo($editing ? 'editUser.php' : 'createUser.php' );?>" method="POST">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text" id="name"> <i class="fas fa-user"></i> </span>
                        <input type="text" class="form-control" placeholder="Ingrese nombre del usuario" value='<?php echo($editing ? $user['name'] : '' );?>'>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text" id="identification"><i class="fas fa-id-card"></i></span>
                        <input type="number" class="form-control" placeholder="Ingrese el documento del usuario" value='<?php echo($editing ? $user['identification'] : '' );?>'>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text" id="email"><i class="fas fa-user-tie"></i></span>
                        <select id="role" class="form-control" placeholder="Ingrese el correo del usuario">
                            <option value="">Seleccione un rol</option>
                            <?php 
                                $query = "SELECT * FROM role";
                                $roles = mysqli_query($conn, $query);
                                while($role = mysqli_fetch_array($roles)){
                                    if($editing && $role['idrole'] == $user['idrole'] ){ ?>
                                        <option value="<?php echo $role['idrole']?>" selected><?php echo $role['name']?></option>
                            <?php   }else{ ?>
                                        <option value="<?php echo $role['idrole']?>"><?php echo $role['name']?></option>
                            <?php   } 
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text" id="email"><i class="fas fa-envelope"></i></span>
                        <input type="text" class="form-control" placeholder="Ingrese el correo del usuario" value='<?php echo($editing ? $user['email'] : '' );?>'>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text" id="password"><i class="fas fa-key"></i></span>
                        <input type="password" class="form-control" placeholder="Ingrese una contraseña para el usuario">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right"><?php echo(!$editing ? 'Registrar Usuario' : 'Guardar Edición' );?></button>
                </div>
            </form>
        </div>
    </div>    
</div>

<?php include("../Components/footer.php")?>