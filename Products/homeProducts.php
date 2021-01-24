<?php include("../dbConnection.php")?>
<?php include("../Components/header.php")?>
<?php session_start()?>
<?php include("../Components/aside-bar.php")?>


<div class="container" id="cardId">
        <h1>Productos de la compañía</h1>
        <div class="row">
            <?php
            $query = "SELECT * FROM product";
            $result_product = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result_product)){?>
                
                    <div  class="col-lg-4 col-md-6">
                        <div class="card"  onmouseover="cardEffectOver()" onmouseout="cardEffectOut()">
                            <div class="card-header">
                                <h1><?php echo $row['name']?></h1>
                            </div>
                            <div class="card-body">
                                <img src="<?php echo "../images/".$row['image_name']?>" width="160" height="160">                    
                            </div>
                            <div class="card-footer">
                                <p>Precio unitario: <?php echo $row['unit_price']?></p> 
                                <p>Stock: <?php echo $row['stock']?></p>    
                            </div>    
                        </div>
                    </div>
                
            <?php } ?>
        
        </div>

        </div>
<?php
    include("../Components/footer.php");
?>