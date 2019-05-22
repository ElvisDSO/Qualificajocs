function desplegarVideojuego(idVideojuego) {
	var criterioIdVideojuego = idVideojuego;
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "functions/datosDelVideojuego.php";
		data: {idVideojuego: criterioIdVideojuego},
		success: function(data) {
			
		}
	});
}