<?php 
    include("../dbConnection.php");
    if(isset($_GET['id'])){
        $editing = true;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM product WHERE idproduct = $id";
            $result = mysqli_query($conn, $query);
            if(!empty($result) and mysqli_num_rows($result)==1){
                $row = mysqli_fetch_array($result);
                $product_id = $row['idproduct'];
                $product_name = $row['name'];
                $unit_price = $row['unit_price'];
                $stock = $row['stock'];
            }
        }
    }
    else{
        $product_name = "";
        $unit_price = "";
        $stock = "";
        $editing = false;
    }
?>  

<?php include("../Components/header.php")?>
<div class="container col-12 col-md-10 col-lg-10 col-xl-10">
    <div class="card">
        <div class="card-header">
            <h1><?php echo($editing ? "Editar producto":"Crear producto")?></h1>
        </div>
        <div class="card-body">
            <form  method="POST" enctype="multipart/form-data" action="<?php echo($editing ? 'editProduct.php?id='.$product_id : 'createProduct.php' );?>" onsubmit="return validationProductForm()">
                <input id="prodId" name="prodId" type="hidden" value="<?php echo $product_id?>">
                <div class="form-group">
                <label for="name">Nombre del producto</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                        <input type="text" class="form-control" autocomplete="off" placeholder="Ingrese nombre del producto"  id="name" name="name" value="<?php echo($product_name)?>">            
                        <div id="error-name" class="invalid-feedback text-right"></div>
                    </div>
                </div>
            
                <div class="form-group">
                <label for="unit_price">Precio unitario</label>
                    <div class="input-group">
                        <span class="input-group-text" ><i class="fas fa-dollar-sign"></i></span>
                        <input type="text" class="form-control" id="unit_price" name="unit_price" placeholder="Ingrese precio unitario" autocomplete="off" value="<?php echo($unit_price)?>">            
                        <div id="error-unit-price" class="invalid-feedback text-right"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                        <input type="text" autocomplete="off" class="form-control"  id="stock" name="stock" placeholder="Ingrese cantidad disponible" value="<?php echo($stock)?>">            
                        <div id="error-stock" class="invalid-feedback text-right"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="stock">Imagen</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                        <input type="file" name="file" id="fileInput" onchange="return validateImage()">            
                           
                    </div>
                </div>
                   
                <div id="fileViewer"></div>
                
                <div class="form-group">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary float-right"><?php echo(!$editing ? 'Registrar Producto' : 'Guardar Edición' );?></button>
                </div>
                
            
            </form>
        </div>      
    </div>
</div>
<?php include("../Components/footer.php")?>