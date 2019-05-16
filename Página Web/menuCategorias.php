<script>
  /*Muestra en el menú lateral el bloque de búsqueda.*/
  function mostrarMenu(idSector){
  // Si el puntero del ratón apunta a un botón, este botón cambiará el color de su fondo
    if ($("#sectorAbierto").val()==idSector){
      $('#icon-derecha'+idSector).css({color:"#FFFFFF"});
      $("#sectorAbierto").val("");
      $("#divBusqueda").hide("slow");
    } else {
      $('#icon-derecha1').css({color:""});
      $('#icon-derecha2').css({color:""});
      $('#icon-derecha3').css({color:""});
      $('#icon-derecha4').css({color:""});
      $('#icon-derecha'+idSector).css({color:"#FF0000"});
      // Llamada función ajax para rellenar el div con los datos correspondientes a grupos y actividades del sector.
      $.ajax({
        type: "POST",
        url: "functions/rellenarDivBusqueda.php",
        data: {idSector: idSector},
        success: function (data) {
          $("#divBusqueda").html(data);
          $("#divBusqueda").show("slow");
          $("#divBusqueda").css({ top: '100px' });
          if ($(window).width() < 992){
            $("#divBusqueda").css({ left: '20px' });  
          }
        }
      });
    }
  }
</script>

<?php 
/**
* Función que establece el bloque del menú lateral.
**/
  function menuCategorias(){
    include 'functions/consulta_menu.php'; //Se carga la variable de sesión.
    include 'functions/establecerIdioma.php'; //Arranca la variable de sesión que contiene al idioma.
    //Se obtienen los valores requeridos de la base de datos.
    $arrayPlataforma = obtenerPlataforma(); //Obtiene de la base de datos todas las diferentes consolas.
    $arrayCompañias = obtenerCompañia(); //Obtiene de la base de datos todas las diferentes compañias.
    $arrayGenero = obtenerGenero(); //Obtiene de la base de datos todas las diferentes compañias.
    $arraySectores = obtenerSectores(); //Obtiene de la base de datos todos los sectores.
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
    <div style="display: inline-block; vertical-align: middle; margin-top: 7px;"><i class="material-icons" style="color: #FFFFFF;">library_books</i></div>
  </div>
  <div class="user-info">
    <a href="./miColeccion.php" class="username">
      <span>
        <h6><?php echo $arrayRecursosIdioma['MiColeccion']; ?></h6> <!-- Se imprime texto descriptivo -->
      </span>
    </a>
  </div>
</div>




<!-- Bloque Buscar. -->
<div class="user">
  <div class="photo" style="background-color: #52AB56; margin-right: 15px; border-radius: 8%; width: 42px; height: 42px; text-align: center; margin-left: 8px;">
    <div style="display: inline-block; vertical-align: middle; margin-top: 7px;"><i class="material-icons" style="color: #FFFFFF;">search</i></div> <!-- Icono del bloque -->
  </div>
  <div class="user-info">
    <a href="#desplegableBusqueda" class="username">
      <span>
        <h6><?php echo $arrayRecursosIdioma['Descubre']; ?></h6> <!-- Texto descriptivo del bloque. -->
      </span>
    </a>
    <div class="collapse show" id="desplegableBusqueda">
      <ul class="nav">
        <?php
        $sectorActual = 0;
        /* Bucle para imprimir todos los grupos y sus correspondientes actividades. */
        foreach ($arraySectores as &$sector) {
          $sectorActual = $sector[0];
          ?>
          <li class="nav-item">
            <a class="nav-link" onclick="mostrarMenu(<?php echo $sectorActual; ?>)" >
              <p> 
                <?php 
                  if ($sector[0] == 1) {
                    echo $arrayRecursosIdioma['BuscarPlataforma'];
                  } else if ($sector[0] == 2) {
                    echo $arrayRecursosIdioma['BuscarCompañia'];
                  } else if ($sector[0] == 3) {
                    echo $arrayRecursosIdioma['BuscarGenero'];
                  } else if ($sector[0] == 4) {
                    echo $arrayRecursosIdioma['BuscarNombre'];
                  }
                ?> 
                <!--<b class="caret"></b>-->
                <i id="icon-derecha<?php echo $sectorActual; ?>" name="icon-derecha<?php echo $sectorActual; ?>" class="fa fa-caret-right" style="float:right; font-size: 12px; vertical-align:middle; line-height: 30px"></i>
              </p>
            </a>
          </li>
          <?php 
        }
        ?>
      </ul>
    </div>
  </div>
</div>























<?php
}
?>