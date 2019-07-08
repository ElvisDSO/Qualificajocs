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
    <div class="float-right">
       <!-- Imprime las banderas. -->
       <?php flags();?>
    </div>
  </div>
</footer>

<?php 
} 
?>