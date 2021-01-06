<?php include("../dbConnection.php")?>
<?php include("../Components/header.php")?>

<div class="container">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-dark">
                <th>Id</th>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>David Nicolas Sanchez</td>
                    <td>1083926795</td>
                    <td>dnicolas.sanchez@udea.edu.co</td>
                    <td>Administrador</td>
                    <td>
                        <button class="btn btn-success"><i class="fas fa-user-edit"></i></button>
                        <button class="btn btn-danger"><i class="fas fa-user-minus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>    
</div>




<?php include("../Components/footer.php")?>
