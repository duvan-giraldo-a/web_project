<?php include("../dbConnection.php");
    //$_SESSION['role']='admin';
?>
<?php include("../Components/header.php")?>

<div class="card">
    <div class="card-header">
        <h1>Listado de productos</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle table-bordered">
                <thead class="table-dark">
                    <th>Id</th>
                    <th>Nombre producto</th>
                    <th>Precio unitario</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    
                    <th>Acción</th>
                    
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM product";
                        $result_product = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_product)){?>
                            <tr>
                                <td><?php echo $row['idproduct']?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['unit_price']?></td>
                                <td><?php echo $row['stock']?></td>
                                <td class="text-center"><img src="<?php echo "../images/".$row['image_name']?>" width="50px" height="50px"></td>
                                
                                
                                    <td>
                                        <div class="row justify-content-center">
                                            <button class="btn btn-success" onclick = "window.location = '/web_project/Products/productsForm.php?id=<?php echo $row['idproduct']?>'" ><i class="fas fa-edit"></i></button>                            
                                            <button class="btn btn-danger" onclick = "deleteProduct('<?php echo $row['idproduct']?>')" ><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                
                                
                            </tr>
                            <?php } ?>
                </tbody>
            </table>
        </div>  
    </div>  
    <?php if(isset($_SESSION['role'])){?>    
        <div class="card-footer">
            <button class="btn btn-primary float-right" style="border-radius:50%; height:50px;width:50px;" onclick="window.location='/web_project/Products/productsForm.php'"><i class="fas fa-plus"></i></button>
        </div>    
    <?php }?>                      
</div>

<?php include("../Components/footer.php")?>