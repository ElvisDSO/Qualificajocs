<?php
include_once 'config/connection.php';
/*Guarda el idioma de la variable de sesión en una variable propia.*/

function footer(){
  include 'functions/establecerIdioma.php';
  include_once 'functions/recursosIdioma.php';

  $arrayRecursosIdioma = recursosIdioma($idiomaActual);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <footer class="footer" style="padding: 0px;">
	<div class="container-fluid">
	  <div class="row">
	  	<!-- Bloque Redes Sociales. -->
	  	<div class="col-sm-9">
	  	  <nav class="float-left">
	  	  	<ul style="line-height: 0;">
	  	  	  <li>
	  	  	  	<i class="material-icons"></i>
	  	  	  	<a href="#" target="_blank" class="icoFacebook a-circle" title="Facebook"><i class="fa fa-facebook"></i></a>
              </li>
              <li>
                <a href="#" class="icoTwitter a-circle" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
              </li>
              <li>
                <a href="#" class="icoInstagram a-circle" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
              </li>
              <li>
                <a href="#" class="icoMail a-circle" title="E-mail"><i class="fa fa-envelope-o"></i></a>
              </li>
              <li>
                <p class="card-category"><?php echo $arrayRecursosIdioma['Contacta']; ?></p>
              </li>
              <li>
                <p class="card-category"><?php echo $arrayRecursosIdioma['RedesSociales']; ?></p>
              </li>
            </ul>
          </nav>
        </div>

        <!-- Bloque Aviso Legal. -->
        <div class="col-sm-3">
          <div class="copyright float-right" style="float: right"> &copy;
            <a href="avisoLegal.php">
              <?php echo $arrayRecursosIdioma['AvisoLegal']; ?>
            </a>
          </div>
        </div>
      </div>

      <!-- Bloque oculto si estás en pantalla grande. -->
      <div class="row">
        <div class="col-sm-12 col-md-6 float-left">
          <!-- Logo -->
          <nav id="iconosFooter">
            <ul class="navbar-nav">
              <li class="nav-item">
                <img src="images/logo.png">
              </li>
            </ul>
          </nav>
        </div>
        <!-- Banderas -->
        <div class="col-md-6 col-sm-12" id="footerPeq">
          <div class="row">
            <div class="col-sm-12">
              <ul>
                <?php flags();?>
              </ul>
            </div>
            <div class="col-sm-6">
              <?php userButton();?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
<?php
}
?>