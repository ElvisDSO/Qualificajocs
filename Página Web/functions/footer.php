<?php
include_once 'config/connection.php';
/*Guarda el idioma de la variable de sesión en una variable propia.*/

function footer(){
  include 'establecerIdioma.php';
  include_once 'recursosIdioma.php';

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
	  	  	  	<em class="material-icons"></em>
	  	  	  	<a href="#" target="_blank" class="icoFacebook a-circle" title="Facebook"><em class="fa fa-facebook"></em></a>
            </li>
            <li>
              <a href="#" class="icoTwitter a-circle" target="_blank" title="Twitter"><em class="fa fa-twitter"></em></a>
            </li>
            <li>
              <a href="#" class="icoInstagram a-circle" target="_blank" title="Instagram"><em class="fa fa-instagram"></em></a>
            </li>
            <li>
              <a href="#" class="icoMail a-circle" title="E-mail"><em class="fa fa-envelope-o"></em></a>
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
              <img src="images/logo.png" alt="Logo de Qualificajocs.">
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