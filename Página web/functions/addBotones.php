<script>
	function jugado(idJuego) {
		var criterioIdVideojuego = idJuego;
		$.ajax({
			type: "POST",
			url: "functions/add_jugado.php",
			data: {inputVideojuego: idJuego},
			success: function (data) {
				md.showNotification('top','right','Se ha añadido el juego a tu librería de Jugados.');
			}
		});
	}
</script>

<script>
	function pendiente(idJuego) {
		var criterioIdVideojuego = idJuego;
		$.ajax({
			type: "POST",
			url: "functions/add_pendiente.php",
			data: {inputVideojuego: idJuego},
			success: function (data) {
				md.showNotification('top','right','Se ha añadido el juego a tu librería de Pendientes.');
			}
		});
	}
</script>

<script>
	function valoracion(idJuego, nota) {
		var criterioIdVideojuego = idJuego;
		var criterioValoracion = nota;
		$.ajax({
			type: "POST",
			url: "functions/add_valoracion.php",
			data: {inputVideojuego: idJuego, inputNota: nota},
			success: function (data) {
				md.showNotification('top','right','Se ha añadido una valoración al juego.');
			}
		});
	}
</script>

<?php 

function addBotones($criterioID, $idiomaActual){
  include_once 'functions/recursosIdioma.php'; //Traducción de los párrafos existentes
  $arrayRecursosIdioma = recursosIdioma($idiomaActual);
	?>
  <div class="row">
	<div class="col-lg-8 col-md-12">
	  <form class="form">
	    <div class="form-group">
	      <div class="clearfix">
	        <a class='btn btn-info btn-round pull-right' onclick="jugado(<?php echo $criterioID; ?>)"><?php echo $arrayRecursosIdioma["AddJugados"]; ?></a>
	        <a class='btn btn-danger btn-round pull-right' onclick="pendiente(<?php echo $criterioID; ?>)"><?php echo $arrayRecursosIdioma["AddPendiente"]; ?></a>  
	      </div>
	    </div>
	  </form>
	</div>
	<div class="col-lg-4 col-md-12">
	  <?php echo $arrayRecursosIdioma["TuNota"]; ?>
	  <form class="form">
	    <div class="form-group">
	      <div class="clearfix">
	        <ul class="pagination pagination-primary">
	          <li class="page-item active">
	          	<?php $nota = 1; ?>
	            <a class="page-link" onclick="valoracion(<?php echo $criterioID; ?>, <?php  echo $nota ?>)">1</a>
	          </li>
	          <li class="page-item active">
	          	<?php $nota = 2; ?>
	            <a class="page-link" onclick="valoracion(<?php echo $criterioID; ?>, <?php  echo $nota ?>)">2</a>
	          </li>
	          <li class="page-item active">
	          	<?php $nota = 3; ?>
	            <a class="page-link" onclick="valoracion(<?php echo $criterioID; ?>, <?php  echo $nota ?>)">3</a>
	          </li>
	          <li class="page-item active">
	          	<?php $nota = 4; ?>
	            <a class="page-link" onclick="valoracion(<?php echo $criterioID; ?>, <?php  echo $nota ?>)">4</a>
	          </li>
	          <li class="page-item active">
	          	<?php $nota = 5; ?>
	            <a class="page-link" onclick="valoracion(<?php echo $criterioID; ?>, <?php  echo $nota ?>)">5</a>
	          </li>
	          <li class="page-item active">
	          	<?php $nota = 6; ?>
	            <a class="page-link" onclick="valoracion(<?php echo $criterioID; ?>, <?php  echo $nota ?>)">6</a>
	          </li>
	          <li class="page-item active">
	          	<?php $nota = 7; ?>
	            <a class="page-link" onclick="valoracion(<?php echo $criterioID; ?>, <?php  echo $nota ?>)">7</a>
	          </li>
	          <li class="page-item active">
	          	<?php $nota = 8; ?>
	            <a class="page-link" onclick="valoracion(<?php echo $criterioID; ?>, <?php  echo $nota ?>)">8</a>
	          </li>
	          <li class="page-item active">
	          	<?php $nota = 9; ?>
	            <a class="page-link" onclick="valoracion(<?php echo $criterioID; ?>, <?php  echo $nota ?>)">9</a>
	          </li>
	          <li class="page-item active">
	          	<?php $nota = 10; ?>
	            <a class="page-link" onclick="valoracion(<?php echo $criterioID; ?>, <?php  echo $nota ?>)">10</a>
	          </li>
	        </ul>
	      </div>
	    </div>
	  </form> 
	</div>
  </div>
<?php
}
?>