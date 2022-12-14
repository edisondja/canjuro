<div class="menu_movil">
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container" style="background: ">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" style="background:#db0000;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand navbar-image" href="<?php echo $dominio; ?>"><img src="<?php echo LOGOSITE;?>" alt=""></a>
      </div>
      
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
       
        <ul class="nav navbar-nav navbar-right" style="font-size:16px;" >

           

      </div><!-- /.navbar-collapse -->
    </div>
    <div class="btn-group btn-group-justified" role="group" aria-label="..." style="background:   #564d4d">
    <div class="btn-group" role="group"  >
     <a href="<?php echo $dominio; ?>"> <button type="button" class="btn btn-default" style="background:#171212; color:#F9F5F5;">Cams</button> </a>

    </div>
    <div class="btn-group" role="group">
     <a href="<?php echo $dominio; ?>/index.php?search=tiktok+tiktokers+leak"> <button type="button" class="btn btn-default" style="background:#171212; color:#F9F5F5;">Tiktokers</button> </a>
    </div>

    <div class="btn-group" role="group">
      <a href="<?php echo $dominio; ?>/onlyfans.php"><button type="button" class="btn btn-default" style="background:#171212; color:#F9F5F5;">Onlyfans</button></a>
    </div>

    <div class="btn-group" role="group">
      <?php
          if(isset($_SESSION['usuario'])){

              echo"<a  href='$dominio/dashboard.php' type='button' class='btn btn-default' style='background:#010101;color:#F9F5F5;'>Profile</button> </a>";

          }else{
             echo"<a  data-toggle='modal' data-target='#myModal' type='button' class='btn btn-default' style='background:#010101;color:#F9F5F5;'>Login</button> </a>";
          }

      ?>

    </div>


  </nav>


    <div class="col-lg-6">
        <form method="get" action="index.php">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." name="search"  style="background: #171212; color: white;">
              <span class="input-group-btn">
                <input type="submit" value="Buscar" class="btn btn-default" style="background:#db0000; color:#F9F5F5;">
              </span>
            </div><!-- /input-group -->
        </form>
    </div><!-- /.col-lg-6 -->

  <!-- Trigger the modal with a button -->

  <!-- Modal -->

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm" >

      <!-- Modal content-->
      <div class="modal-content" style="background:black; opacity: 0.8; color:#FF1196;">
        <div class="modal-header">
          
          <button type="button" class="close" style="color:#FF1196;" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
    
        <form class="form-horizontal" action="" method="post">
            <input type="text" name="usuario" class="form-control" placeholder="usuario"><br/>
            <input type="password" class="form-control" name="password"/><br/>
            <button class="btn btn-danger">Login</button>        
        </form>
  <div class="button-bottom" style="font-size: 14px;">
  	<p>REGISTRATE GRATIS! <a data-dismiss="modal" data-toggle="modal" data-target="#RegistroModal" class="play-icon popup-with-zoom-anim">Registro</a></p> 
  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!-- MODAL DE REGISTRO -->
  <!-- REGISTRO Modal -->

  <div id="RegistroModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content-->
      <div class="modal-content" style="background:black; opacity: 0.8; color:#FF1196;">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrate Gratis!</h4>
        </div>
        <div class="modal-body menu_movil" >
            <!--<h3>Lo sentimos, estamos en mantimiento para darte un mejor servicio</h3>-->
                        <?php
                          	include'components/component_registrer_mobile.php';
                        ?>
        </div>
      </div>
  <div class="button-bottom" style="font-size: 14px;">
  	<p>YA tienes una Cuenta? Inicia Aqui <a data-dismiss="modal" data-toggle="modal" data-target="#myModal" class="play-icon popup-with-zoom-anim">Login</a></p> 
  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</div>


