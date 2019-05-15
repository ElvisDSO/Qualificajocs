<script>
  
</script>

<?php 
  function menuCategorias(){
    //include 'consulta_menu.php'; //Se carga la variable de sesión.
    include 'functions/establecerIdioma.php'; //Arranca la variable de sesión que contiene al idioma.
    //Se obtienen los valores requeridos de la base de datos.
    //$arrayConsolas = obtenerConsolas(); //Obtiene de la base de datos todas las diferentes consolas.
    //$arrayCompañias = obtenerCompañias(); //Obtiene de la base de datos todas las diferentes compañias.
    $arrayRecursosIdioma = recursosIdioma($idiomaActual);
?>

<!-- Bloque de inicio. -->
  <div class="user">
    <div class="photo" style="background-color: #FD9A13; margin-right: 15px; border-radius: 8%; width: 42px; height: 42px; text-align: center; margin-left: 8px;">
      <div style="display: inline-block; vertical-align: middle; margin-top: 7px;"><i class="material-icons" style="color: #FFFFFF;">home</i></div>
    </div>
    <div class="user-info">
      <a href="./index.php" class="username">
        <span>
          <h6><?php echo $arrayRecursosIdioma['Inicio']; ?></h6> <!-- Se imprime texto descriptivo -->
        </span>
      </a>
    </div>
  </div>

<!-- Bloque de Mi Colección. -->
  <div class="user">
    <div class="photo" style="background-color: #FD9A13; margin-right: 15px; border-radius: 8%; width: 42px; height: 42px; text-align: center; margin-left: 8px;">
      <div style="display: inline-block; vertical-align: middle; margin-top: 7px;"><i class="material-icons" style="color: #FFFFFF;">home</i></div>
    </div>
    <div class="user-info">
      <a href="./miColeccion.php" class="username">
        <span>
          <h6><?php echo $arrayRecursosIdioma['MiColeccion']; ?></h6> <!-- Se imprime texto descriptivo -->
        </span>
      </a>
    </div>
  </div>

<?php
}
?>