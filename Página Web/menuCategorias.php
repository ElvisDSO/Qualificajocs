<script>
  
</script>

<?php 
  
?>

<div class="user">
  <div class="photo" style="background-color: #52AB56; margin-right: 15px; border-radius: 8%; width: 42px; height: 42px; text-align: center; margin-left: 8px;">
    <div style="display: inline-block; vertical-align: middle; margin-top: 7px;"><i class="material-icons" style="color: #FFFFFF;">shopping_basket</i></div> <!-- Icono del bloque -->
  </div>
  <div class="user-info">
    <a href="#desplegableCAT" class="username">
      <span>
        <h6><?php echo $arrayRecursosIdioma['BuscarProducto']; ?></h6> <!-- Texto descriptivo del bloque. -->
      </span>
    </a>
    <div class="collapse show" id="desplegableCAT">
      <ul class="nav">
        <?php
        $sectorActual = 0;
        /* Bucle para imprimir todos los grupos y sus correspondientes actividades. */
        foreach ($arraySectores as &$sector) {
          $sectorActual = $sector[0];
          ?>
          <li class="nav-item">
            <a class="nav-link" onclick="mostrarMenu(<?php echo $sectorActual; ?>)" >
              <p> <?php echo $sector[1]; ?> 
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

<?php
}
?>