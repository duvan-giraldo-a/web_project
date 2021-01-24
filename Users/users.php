<?php include("../dbConnection.php")?>
<?php include("../Components/admin-middleware.php")?>
<?php include("../Components/header.php")?>
<?php include("../Components/aside-bar.php")?>

<div class="card">
    <div class="card-header">
        <h1>Listado de Usuarios</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle table-bordered">
                <thead class="table-dark">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT u.idusers id , u.name, u.identification, u.email, r.name role FROM users u JOIN role r ON u.idrole = r.idrole";
                        $users = mysqli_query($conn, $query);
                        while($user = mysqli_fetch_array($users)){
                    ?>
                        <tr>
                            <td><?php echo $user['id']?></td>
                            <td><?php echo $user['name']?></td>
                            <td><?php echo $user['identification']?></td>
                            <td><?php echo $user['email']?></td>
                            <td><?php echo $user['role']?></td>
                            <td>
                                <button class="btn btn-success" onclick="window.location='<?php echo ('/web_project/Users/usersForms.php?id='.$user['id'])?>'"><i class="fas fa-user-edit"></i></button>
                                <button class="btn btn-danger" onclick = "deleteUser('<?php echo $user['id']?>')"><i class="fas fa-user-minus"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>  
    </div>
    <div class="card-footer">
        <button class="btn btn-primary float-right" style="border-radius: 50%; height: 50px; width: 50px" onclick="window.location='/web_project/Users/usersForms.php'"><i class="fas fa-user-plus"></i></button>
    </div> 
</div>

<?php include("../Components/footer.php")?>
