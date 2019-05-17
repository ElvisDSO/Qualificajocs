function realizarBusquedaPlataforma(numeroPlataforma,nombrefichero,idioma){
  $("#divPlataforma").hide("slow");
  $("#inputPlataforma").val(document.getElementById('spanPlataforma'+numeroPlataforma).innerHTML);
  // Actualizamos el texto con el criterio de búsqueda visualizado
  $("#spanCriterioPlataforma").html($("#inputPlataforma").val());
  if ($("#inputPlataforma").val() != ""){
  	$("#tituloCriterioPlataforma").css("display", "block");
  } else {
	$("#tituloCriterioPlataforma").css("display", "none");
  }
  realizarBusqueda(nombrefichero,'',idioma);
}

function realizarBusquedaEmpresa(numeroEmpresa,nombrefichero,idioma){
  $("#divEmpresa").hide("slow");
  $("#inputEmpresa").val(document.getElementById('spanEmpresa'+numeroEmpresa).innerHTML);
  // Actualizamos el texto con el criterio de búsqueda visualizado
  $("#spanCriterioPlataforma").html($("#inputEmpresa").val());
  if ($("#inputEmpresa").val() != ""){
  	$("#tituloCriterioPlataforma").css("display", "block");
  } else {
	$("#tituloCriterioPlataforma").css("display", "none");
  }	
  realizarBusqueda(nombrefichero,'',idioma);
}

function verPagina(paginaver, cambiar, totalPaginas) {
  
  var myElements = $(".paginaResultados");
  for (var i=0;i<myElements.length;i++) {
	var x = document.getElementById(myElements.eq(i).attr("id"));
    x.style.display = "none";
  }

  var idPaginaVer = "divPagina";
  idPaginaVer = idPaginaVer.concat(paginaver);
  var y = document.getElementById(idPaginaVer);
  y.style.display = "";

  var allListElements = $( ".page-item" );
  $(document).find( allListElements ).css( "background-color", "" );
  var paginaFondo = "pagina";
  paginaFondo = paginaFondo.concat(paginaver);
  $("#"+paginaFondo).css("background-color", "#BAD8EF");
	
  if (cambiar == 1){ // cambiar paginación
	  codigoHTMLpaginacion = "";
	  codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<ul class='pagination'>");
	  //codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item'><a class='page-link' href='#'>Anterior</a></li>");
	  codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item' disabled><a class='page-link' style='cursor: default;'>PÁGINA</a></li>");
	  // Si estamos en el segundo Empresa de páginas, o posteriores, mostramos la opción de volver al Empresa de páginas anterior
	  if (paginaver > 5){
		codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item'><a class='page-link' href='#' onclick='verPagina(");
		paginainicioempresa = paginaver-5;
		codigoHTMLpaginacion = codigoHTMLpaginacion.concat(paginainicioempresa);
		codigoHTMLpaginacion = codigoHTMLpaginacion.concat(",1,");
		codigoHTMLpaginacion = codigoHTMLpaginacion.concat(numPagina);
		codigoHTMLpaginacion = codigoHTMLpaginacion.concat(")'>...</a></li>");
	  }
	   for (paginaactual = paginaver; paginaactual < totalPaginas; paginaactual++){
           // limitamos a 5 páginas
           if (paginaactual > paginaver + 4){
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item' id='pagina");
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat(paginaactual);
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat("'><a class='page-link' href='#' onclick='verPagina(");
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat(paginaactual);
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat(",1,");
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat(numPagina);
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat(")'>...</a></li>");
               break;
           }
           if (paginaactual == paginaver){
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item' id='pagina");
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat(paginaactual);
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat("' style='background-color:#BAD8EF'><a class='page-link' href='#' onclick='verPagina("); 
           } else {
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item' id='pagina");
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat(paginaactual);
               codigoHTMLpaginacion = codigoHTMLpaginacion.concat("'><a class='page-link' href='#' onclick='verPagina(");
           }
           codigoHTMLpaginacion = codigoHTMLpaginacion.concat(paginaactual);
           codigoHTMLpaginacion = codigoHTMLpaginacion.concat(",0)'>");
           codigoHTMLpaginacion = codigoHTMLpaginacion.concat(paginaactual);
           codigoHTMLpaginacion = codigoHTMLpaginacion.concat("</a></li>");
                  }
	  codigoHTMLpaginacion = codigoHTMLpaginacion.concat("</ul>");

	  $("#paginacion").html(codigoHTMLpaginacion);
  }

}

function realizarBusqueda(nombrefichero,orden,idioma){
	
	var codigoHTMLpaginacion = "";

	$("#divPlataforma").hide("slow");

	criterioNombre = $("#inputNombre").val();
	criterioProducto = $("#inputProducto").val();
	criterioGenero = $("#inputGenero").val();
	criterioPlataforma = $("#inputPlataforma").val();
	criterioEmpresa = $("#inputEmpresa").val();
	
	if ((nombrefichero === undefined) || (nombrefichero === 'panelBusqueda.php')) {  // lanzamos la búsqueda desde panelBusqueda

		$.ajax({
			type: "POST",
			// Formato de datos que se espera en la respuesta
			dataType: "json",
			url: "functions/resultadoConsulta.php",
			data: {nombre: criterioNombre, genero: criterioGenero, categoria: criterioPlataforma, empresa: criterioEmpresa, orden: orden},
			success: function (data) {
			  $("#divPlataforma").hide("slow");
			  resultadosBusqueda = data;
			  // Rellenar Grid
			  numElementos = 0;
			  numPagina = 1;
			  paginaActiva = 1;
			  codigoHTML = "";
			  for (var contadorElementos = 0; contadorElementos < resultadosBusqueda.length; contadorElementos++){
				  if (contadorElementos % 9 == 0){
					  //alert(contadorElementos);
					  if (contadorElementos > 0){
						  // cerramos la página anterior
						  codigoHTML = codigoHTML.concat("</div>");
						  codigoHTML = codigoHTML.concat("<div class='row paginaResultados' style='display:none' id='divPagina");
					  } else {
						  codigoHTML = codigoHTML.concat("<div class='row paginaResultados' id='divPagina");
					  }
					  codigoHTML = codigoHTML.concat(numPagina);
					  codigoHTML = codigoHTML.concat("'>");
					  numPagina = numPagina + 1; // se incrementa una página
			  	  } 
				  codigoHTML = codigoHTML.concat("<div class='col-lg-4 col-md-6 col-sm-6'><div class='card card-stats'>"); 
				  if(resultadosBusqueda[contadorElementos][3] == 5){
					codigoHTML = codigoHTML.concat("<div class='card-header card-header-success card-header-icon'><div class='card-icon'><i class=''><img src='images/wheat.png' width='45' height='45'></i></div><p class='card-category'>");
				  }else if(resultadosBusqueda[contadorElementos][3] == 6){
					codigoHTML = codigoHTML.concat("<div class='card-header card-header-danger card-header-icon'><div class='card-icon'><i class='fas fa-home'></i></div><p class='card-category'>");
				  }else if(resultadosBusqueda[contadorElementos][3] == 7){
					codigoHTML = codigoHTML.concat("<div class='card-header card-header-warning card-header-icon'><div class='card-icon'><i class='fas fa-user-alt'></i></div><p class='card-category'>");
				  }else if(resultadosBusqueda[contadorElementos][3] == 8){
					codigoHTML = codigoHTML.concat("<div class='card-header card-header-info card-header-icon'><div class='card-icon'><i class='fas fa-mobile-alt'></i></div><p class='card-category'>");
				  }
				  codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][1]);
				  idActual = resultadosBusqueda[contadorElementos][4];
				  codigoHTML = codigoHTML.concat("</p><form id='formInfo");
				  codigoHTML = codigoHTML.concat(contadorElementos);
				  codigoHTML = codigoHTML.concat("' name='formInfo");
				  codigoHTML = codigoHTML.concat(contadorElementos);
				  codigoHTML = codigoHTML.concat("' action='infoNombre.php'>");
				  codigoHTML = codigoHTML.concat("<input type='hidden' id='idNombre");
				  codigoHTML = codigoHTML.concat(contadorElementos);
				  codigoHTML = codigoHTML.concat("' name='idNombre");
				  codigoHTML = codigoHTML.concat(contadorElementos);
				  codigoHTML = codigoHTML.concat("' value='");
				  codigoHTML = codigoHTML.concat(idActual);
				  codigoHTML = codigoHTML.concat("'>");
				  codigoHTML = codigoHTML.concat("<input type='hidden' id='inputNombre' name='inputNombre' value='");
				  codigoHTML = codigoHTML.concat(criterioNombre);
				  codigoHTML = codigoHTML.concat("'>");
				  codigoHTML = codigoHTML.concat("<input type='hidden' id='inputProducto' name='inputProducto' value='");
				  codigoHTML = codigoHTML.concat(criterioProducto);
				  codigoHTML = codigoHTML.concat("'>");
				  codigoHTML = codigoHTML.concat("<input type='hidden' id='inputGenero' name='inputGenero' value='");
				  codigoHTML = codigoHTML.concat(criterioGenero);
				  codigoHTML = codigoHTML.concat("'>");
				  codigoHTML = codigoHTML.concat("<input type='hidden' id='inputPlataforma' name='inputPlataforma' value='");
				  codigoHTML = codigoHTML.concat(criterioPlataforma);
				  codigoHTML = codigoHTML.concat("'>");	
				  codigoHTML = codigoHTML.concat("<input type='hidden' id='inputEmpresa' name='inputEmpresa' value='");
				  codigoHTML = codigoHTML.concat(criterioEmpresa);
				  codigoHTML = codigoHTML.concat("'>");					
				  codigoHTML = codigoHTML.concat("<h3 class='card-title' style='cursor: pointer;' onmouseover=$(this).addClass('text-danger') onmouseout=$(this).removeClass('text-danger') ><span id='rotulo_nombre' onclick='formInfo");
				  codigoHTML = codigoHTML.concat(contadorElementos);	
				  codigoHTML = codigoHTML.concat(".submit()'>");
				  codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][0]);
				  codigoHTML = codigoHTML.concat("</span></h3></form></div><div class='card-footer'><div class='stats'><i class='material-icons'>place</i>");
				  codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][5]);
				  codigoHTML = codigoHTML.concat("</div></div></div></div>");   
			  }
			  //codigoHTML = codigoHTML.concat("</div>");
			  codigoHTML = codigoHTML.concat("</div>");
			  if(idioma == "ES"){
			  	paginaIdioma = "PÁGINA";
			  } else if(idioma == "EN" || idioma == "FR"){
			  	paginaIdioma = "PAGE";
			  } else{
			  	paginaIdioma = "ORRI";
			  }
			  if (numPagina > 1) { // Se introduce paginación
                 codigoHTMLpaginacion = "";
                 codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<ul class='pagination'>");
                 //codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item'><a class='page-link' href='#'>Anterior</a></li>");
                 codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item' disabled><a class='page-link' style='cursor: default;'>PÁGINA</a></li>");
                 for (paginaactual = 1; paginaactual < numPagina; paginaactual++){
                 // limitamos a 5 páginas
                 	if (paginaactual > 5){
                        codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item' id='pagina"+paginaactual+"'><a class='page-link' href='#' onclick='verPagina(");
                        codigoHTMLpaginacion = codigoHTMLpaginacion.concat(paginaactual);
                        codigoHTMLpaginacion = codigoHTMLpaginacion.concat(",1,");
                        codigoHTMLpaginacion = codigoHTMLpaginacion.concat(numPagina);
                        codigoHTMLpaginacion = codigoHTMLpaginacion.concat(")'>...</a></li>");
                        break;
                    }
                    if (paginaactual == 1){
                       codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item' style='background-color:#BAD8EF' id='pagina");
                       codigoHTMLpaginacion = codigoHTMLpaginacion.concat(paginaactual);
                       codigoHTMLpaginacion = codigoHTMLpaginacion.concat("'><a class='page-link' href='#' onclick='verPagina("); 
                     } else {
                       codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item' id='pagina");
                       codigoHTMLpaginacion = codigoHTMLpaginacion.concat(paginaactual);
                       codigoHTMLpaginacion = codigoHTMLpaginacion.concat("'><a class='page-link' href='#' onclick='verPagina("); 
                     }
                   codigoHTMLpaginacion = codigoHTMLpaginacion.concat(paginaactual);
                   codigoHTMLpaginacion = codigoHTMLpaginacion.concat(",0)'>");
                   codigoHTMLpaginacion = codigoHTMLpaginacion.concat(paginaactual);
                   codigoHTMLpaginacion = codigoHTMLpaginacion.concat("</a></li>");
               }
                //codigoHTML = codigoHTML.concat("<li class='page-item'><a class='page-link' href='#'>Siguiente</a></li>");
     			codigoHTMLpaginacion = codigoHTMLpaginacion.concat("</ul>");
     			//codigoHTML = codigoHTML.concat("</div>");
     		}

			  $("#gridResultados").html(codigoHTML);
			//  idiomaActual = "ES";
			    if (idioma == "ES"){
					if (resultadosBusqueda.length == 1){
						//<?php echo $arrayRecursosIdioma['BuscarProducto']; ?>
					  var textoResultados = "1 resultado obtenido.";
				    } else {
					  var textoResultados = "" + resultadosBusqueda.length + " resultados obtenidos";

						if (resultadosBusqueda.length == 200) {
						  	md.showNotification('top','right','La consulta ha generado más de 200 resultados. Se muestran únicamente los 200 primeros resultados.');
						  //	notificacion = "";
						  //	notificacion = notificacion.concat("<button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;'><i class='material-icons'>close</i></button><i data-notify='icon' class='material-icons'>add_alert</i><span data-notify='title'></span><span data-notify='message'>Welcome to <b>Material Dashboard Pro</b> - a beautiful admin panel for every web developer.</span><a href='#' target='_blank' data-notify='url'></a>");
						}
				    }
				} else if (idioma == "EN"){
					if (resultadosBusqueda.length == 1){
					  var textoResultados = "1 result returned.";
				    } else {
					  var textoResultados = "" + resultadosBusqueda.length + " results returned.";

						if (resultadosBusqueda.length == 200) {
						  	md.showNotification('top','right','Your query has generated more than 200 results. Only the first 200 results are displayed.');
						  //	notificacion = "";
						  //	notificacion = notificacion.concat("<button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;'><i class='material-icons'>close</i></button><i data-notify='icon' class='material-icons'>add_alert</i><span data-notify='title'></span><span data-notify='message'>Welcome to <b>Material Dashboard Pro</b> - a beautiful admin panel for every web developer.</span><a href='#' target='_blank' data-notify='url'></a>");
						}
				    }
				} else if (idioma == "PT"){
					if (resultadosBusqueda.length == 1){
					  var textoResultados = "1 resultado obtido.";
				    } else {
					  var textoResultados = "" + resultadosBusqueda.length + " resultados obtidos";

						if (resultadosBusqueda.length == 200) {
						  	md.showNotification('top','right','A consulta gerou mais de 200 resultados. Só são mostrados os primeiros 200 resultados.');
						  //	notificacion = "";
						  //	notificacion = notificacion.concat("<button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;'><i class='material-icons'>close</i></button><i data-notify='icon' class='material-icons'>add_alert</i><span data-notify='title'></span><span data-notify='message'>Welcome to <b>Material Dashboard Pro</b> - a beautiful admin panel for every web developer.</span><a href='#' target='_blank' data-notify='url'></a>");
						}
				    }
				}
			    $("#numResultados").html("<ul class='pagination'><li class='page-item' disabled><a class='page-link' style='cursor: default;'>"+textoResultados+"</a></li></ul>");
				$("#paginacion").html(codigoHTMLpaginacion);
				//$("#notific").html(notificacion);
			}
		});
		
	} else {  // lanzamos la búsqueda desde index o desde infoVideojuego
		window.location = "panelBusqueda.php?inputNombre="+criterioNombre+"&inputProducto="+criterioProducto+"&inputGenero="+criterioGenero+"&inputPlataforma="+criterioPlataforma+"&inputEmpresa="+criterioEmpresa;

		
	}
	
	
}