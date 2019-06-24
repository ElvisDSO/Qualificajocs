<script>
	function jugado(idJuego) {
		var criterioIdVideojuego = idJuego;
		$.ajax({
			type: "POST",
			url: "functions/add_jugado.php",
			data: {inputVideojuego: idJuego},
			success: function (data) {
				$("#alertaJugado").html(data);
			}
		});
	}
</script>

<?php 

function addBotones($criterioID){
	?>
  <div class="row">
	<div class="col-lg-8 col-md-12">
	  <form class="form">
	    <div class="form-group">
	      <div class="clearfix">
	        <a class='btn btn-info btn-round pull-right' onclick="jugado(<?php echo $criterioID; ?>)">Añadir a Jugados</a>
	        <a href='#' class='btn btn-danger btn-round pull-right'>Añadir a Pendientes</a>  
	      </div>
	    </div>
	  </form>
	</div>
	<div class="col-lg-4 col-md-12">
	  <form class="form">
	    <div class="form-group">
	      <div class="clearfix">
	        <ul class="pagination pagination-primary">
	          Tu valoración:
	          <li class="page-item active">
	            <a class="page-link" href="#">1</a>
	          </li>
	          <li class="page-item">
	            <a class="page-link" href="#link">2</a>
	          </li>
	          <li class="page-item">
	            <a class="page-link" href="#link">3</a>
	          </li>
	          <li class="page-item">
	            <a class="page-link" href="#link">4</a>
	          </li>
	          <li class="page-item">
	            <a class="page-link" href="#link">5</a>
	          </li>
	          <li class="page-item">
	            <a class="page-link" href="#link">6</a>
	          </li>
	          <li class="page-item">
	            <a class="page-link" href="#link">7</a>
	          </li>
	          <li class="page-item">
	            <a class="page-link" href="#link">8</a>
	          </li>
	          <li class="page-item">
	            <a class="page-link" href="#link">9</a>
	          </li>
	          <li class="page-item">
	            <a class="page-link" href="#link">10</a>
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