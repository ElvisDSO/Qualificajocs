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
    include 'consulta_menu.php'; //Se carga la variable de sesión.
    include 'establecerIdioma.php'; //Arranca la variable de sesión que contiene al idioma.
    //Se obtienen los valores requeridos de la base de datos.
    $arraySectores = obtenerSectores(); //Obtiene de la base de datos todos los sectores.
    $arrayRecursosIdioma = recursosIdioma($idiomaActual);
?>

<!-- Bloque de inicio. -->
<div class="user">
  <div class="photo" style="background-color: #2271B3; margin-right: 15px; border-radius: 8%; width: 42px; height: 42px; text-align: center; margin-left: 8px;">
    <div style="display: inline-block; vertical-align: middle; margin-top: 7px;"><em class="material-icons" style="color: #FFFFFF;">home</em></div>
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
  <div class="photo" style="background-color: #dc3545; margin-right: 15px; border-radius: 8%; width: 42px; height: 42px; text-align: center; margin-left: 8px;">
    <div style="display: inline-block; vertical-align: middle; margin-top: 7px;"><em class="material-icons" style="color: #FFFFFF;">library_books</em></div>
  </div>
  <div class="user-info">
    <a href="./coleccionUsuario.php" class="username">
      <span>
        <h6><?php echo $arrayRecursosIdioma['MiColeccion']; ?></h6> <!-- Se imprime texto descriptivo -->
      </span>
    </a>
  </div>
</div>




<!-- Bloque Buscar. -->
<div class="user">
  <div class="photo" style="background-color: #52AB56; margin-right: 15px; border-radius: 8%; width: 42px; height: 42px; text-align: center; margin-left: 8px;">
    <div style="display: inline-block; vertical-align: middle; margin-top: 7px;"><em class="material-icons" style="color: #FFFFFF;">search</em></div> <!-- Icono del bloque -->
  </div>
  <div class="user-info">
    <a href="#desplegableBusqueda" class="username"><!-- referencia al bloque desplegableBusqueda -->
      <span>
        <h6><?php echo $arrayRecursosIdioma['Descubre']; ?></h6> <!-- Texto descriptivo del bloque. -->
      </span>
    </a>
    <div class="collapse show" id="desplegableBusqueda"> <!-- identifica a este bloque como desplegableBusqueda. -->
      <ul class="nav">
        <?php
        $sectorActual = 0;
        /* Bucle para imprimir todos los grupos y sus correspondientes actividades. */
        foreach ($arraySectores as &$sector) {
          $sectorActual = $sector[0];

          if ($sector[0] != 4) { //Si el sector no es el de escribir el nombre del juego.
          
          ?>
            <li class="nav-item">
              <a class="nav-link" onclick="mostrarMenu(<?php echo $sectorActual; ?>)" >
                <p> 
                  <?php 
                    if ($sector[0] == 1) { //Imprime el texto de buscar por plataforma
                      echo $arrayRecursosIdioma['BuscarPlataforma'];
                    } else if ($sector[0] == 2) { //Imprime el texto de buscar por compañía
                      echo $arrayRecursosIdioma['BuscarCompañia'];
                    } else if ($sector[0] == 3) { //Imprime el texto de buscar por género
                      echo $arrayRecursosIdioma['BuscarGenero'];
                    }
                  ?>
                  <em id="icon-derecha<?php echo $sectorActual; ?>" name="icon-derecha<?php echo $sectorActual; ?>" class="fa fa-caret-right" style="float:right; font-size: 12px; vertical-align:middle; line-height: 30px"></em> <!-- imprime una flecha al lado del texto. -->
                </p>
              </a>
            </li>
          <?php 
          } else { ?>
            <li class="nav-item">
              <a class="nav-link">
                <p>
                  <?php echo $arrayRecursosIdioma['BuscarNombre']; //Imprime el texto de buscar por nombre.?> 
                </p>
                <div class="input-group no-border"> <!-- imprime el bloque para introducir el texto y el botón para enviar la búsqueda. -->
                  <input type="text" value="" class="form-control searchbar-properties" placeholder="<?php echo $arrayRecursosIdioma['IntroduceNombre']; ?>..." id="inputNombre" name="inputNombre">
                  <button type="submit" class="btn btn-success btn-round btn-just-icon" id="botonNombre">
                    <em class="material-icons">search</em>
                    <div class="ripple-container"></div>
                  </button>
                </div>
              </a>
            </li>
            <?php
          }
        }
        ?>
      </ul>
    </div>
  </div>
</div>
<?php
}
?>