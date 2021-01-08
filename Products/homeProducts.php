<?php include("../dbConnection.php");
    include("../Components/header.php");
    //$_SESSION['role']='admin';
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card" id="cardId" onmouseover="cardEffectOver()" onmouseout="cardEffectOut()">
                <div class="card-header">
                <h1>CI 555</h1>
                </div>
                <div class="body">
                    <img src="../images/5ff758d533e0d6.05711177.jpg" width="200" height="200">                    
                    <div id="product-info" class="display-none">
                        <p>Precio unitario: 10</p> 
                        <p>Stock: 10</p>    
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3">
        
        </div>
        <div class="col-md-3">
        
        </div>
        <div class="col-md-3">
        
        </div>
    </div>
</div>


<?php
    include("../Components/footer.php");
    //$_SESSION['role']='admin';
?>