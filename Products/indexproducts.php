<?php include("../dbConnection.php")?>
<?php include("../Components/header.php")?>
<div class="container">
    <div class="col-md-8">
        <h1>Listado de productos</h1>
        <hr>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Nombre producto</th>
                <th>Precio unitario</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Acción</th>
            </tr>
            <tbody>
                <?php 
                    $query = "SELECT * FROM product";
                    $result_product = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_product)){?>
                        <tr>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['unit_price']?></td>
                            <td><?php echo $row['stock']?></td>
                            <td><?php echo $row['image_name']?></td>
                            <td>
                                
                                <div class="row justify-content-center">
                                    <a href= "edit_product.php?id=<?php echo $row['idproduct'] ?>" >Editar</a>
                                </div>
                                
                                <div class="row justify-content-center">
                                    <a href= "delete_product.php?id=<?php echo $row['idproduct'] ?>" >Borrar</a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("../Components/footer.php")?>