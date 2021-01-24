<div id="wrapper">
  <div id="sidebar-wrapper" class="bg-dark">
      <ul class="sidebar-nav">
          <li class="sidebar-brand text-center" style="color: white;">
              MENU
          </li>
          <li>
              <a href="/web_project/index.php">Inicio</a>
          </li>
          
          <?php if(isset($_SESSION['name'])){?>
            <?php if($_SESSION['role']=='ADMINISTRADOR'){?>
              <li>
                  <a href="/web_project/Users/users.php">Usuarios</a>
              </li>
            <?php } ?>
            
            <li>
                <a href="/web_project/Products/indexproducts.php">Productos</a>
            </li>
          <?php } ?>
          <li>
              <a href="/web_project/Components/about.php">Acerca</a>
          </li>
      </ul>
  </div>
  <nav class="navbar navbar-expand navbar-dark bg-dark">
      <button type="button" class="btn btn-dark"  href="#menu-toggle" id="menu-toggle">
          <i class="fas fa-bars"></i>
      </button>
      <a class="navbar-brand mb-0 h1" style="color: white;">CIRCUITERIA MEDELLÍN</a>
      
      <?php if(isset($_SESSION['name'])){?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="dropdown dropleft">
            <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <p class="dropdown-item"><?php echo(isset($_SESSION['name']) ? $_SESSION['name'] : '' );?></p>
              <p class="dropdown-item"><?php echo(isset($_SESSION['role']) ? $_SESSION['role'] : '' );?></p>
            </div>
          </div>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="/web_project/auth/logout.php"><i class="fas fa-power-off"></i></a>
        </li>
      </ul>
      <?php }else{?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/web_project/auth/login.php"><i class="fas fa-sign-in-alt"></i></a>
          </li>
        </u> 
      <?php } ?>
  </nav>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">
      <div class="container-fluid">
