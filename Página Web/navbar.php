<?php
/**
* Función encargada de la impresión del elemento navbar.
**/
function navbar(){
	include 'functions/establecerIdioma.php'; //Arranca la variable de sesión que contiene al idioma.
	include_once 'functions/recursosIdioma.php';//Arranca el array que contiene el texto traducido.
  	/* Se carga los textos traducidos de la base de datos. */
  	$arrayRecursosIdioma = recursosIdioma($idiomaActual);
?>

<div class="navbar navbar-expand-lg navbar-absolute fixed-top ">
  	<div class="container-fluid">
  		<!-- Bloque que contiene el título y subtítulo de la página. -->
  	    <div class="row">
          	<div class="col-md-12">
				<!-- Título que aparece si la pantalla es grande. -->
			  	<span id="textotitulogrande"><h3 style="line-height:0.9!important; margin: 20px 0 20px"><font face="Tw Cen MT"><?php echo $arrayRecursosIdioma['Titulo']; ?></font></h3><h4 style="line-height:0.9!important; font-family: 'Happy Monkey', cursive; color:#2A59AA;"><?php echo $arrayRecursosIdioma['Subtitulo']; ?></h4></span>
			  	<!-- Título que aparece si la pantalla es pequeña. -->
         	  	<span id="textotitulopeque"><h5 style="line-height:0.9!important; margin: 20px 0 20px"><font face="Tw Cen MT"><?php echo $arrayRecursosIdioma['Titulo']; ?></font></h5><h6 style="line-height:0.9!important; font-family: 'Happy Monkey', cursive; color:#2A59AA;"><?php echo $arrayRecursosIdioma['Subtitulo']; ?></h6></span>
          	</div>
        </div>	 	
	  	
	  	<div class="navbar-collapse collapse justify-content-end">
	  		<ul class="navbar-nav">
		  		<!-- Imprime las banderas. -->
	      		<?php flags();?>
		 		<?php userButton();?>
			</ul>
	  	</div>
   </div>
</div>
<?php } ?>