<?php
include_once 'config/connection.php';
/*Guarda el idioma de la variable de sesión en una variable propia.*/

function footerPagsExtra(){
  include 'establecerIdioma.php';
  include_once 'recursosIdioma.php';

  $arrayRecursosIdioma = recursosIdioma($idiomaActual);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<footer class="footer">
  <div class="container">
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
</footer>

<?php 
} 
?>