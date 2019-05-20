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

function realizarBusquedaCompañia(numeroCompañia,nombrefichero,idioma){
  $("#divCompañia").hide("slow");
  $("#inputCompañia").val(document.getElementById('spanCompañia'+numeroCompañia).innerHTML);
  // Actualizamos el texto con el criterio de búsqueda visualizado
  $("#spanCriterioCompañia").html($("#inputCompañia").val());
  if ($("#inputCompañia").val() != ""){
  	$("#tituloCriterioCompañia").css("display", "block");
  } else {
	$("#tituloCriterioCompañia").css("display", "none");
  }	
  realizarBusqueda(nombrefichero,'',idioma);
}

function realizarBusquedaGenero(numeroGenero,nombrefichero,idioma){
  $("#divGenero").hide("slow");
  $("#inputGenero").val(document.getElementById('spanGenero'+numeroGenero).innerHTML);
  // Actualizamos el texto con el criterio de búsqueda visualizado
  $("#spanCriterioGenero").html($("#inputGenero").val());
  if ($("#inputGenero").val() != ""){
  	$("#tituloCriterioGenero").css("display", "block");
  } else {
	$("#tituloCriterioGenero").css("display", "none");
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
	
  if (cambiar == 1) { // cambiar paginación
  	codigoHTMLpaginacion = "";
	  codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<ul class='pagination'>");
	  codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item' disabled><a class='page-link' style='cursor: default;'>PÁGINA</a></li>");
  }
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
      codigoHTMLpaginacion = codigoHTMLpaginacion.concat("</ul>");

      $("#paginacion").html(codigoHTMLpaginacion);
  }
}

function realizarBusqueda(nombrefichero,orden,idioma){
  var codigoHTMLpaginacion = "";
  $("#divPlataforma").hide("slow");

  criterioNombre = $("#inputNombre").val();
  criterioCompañia = $("#inputCompañia").val();
  criterioGenero = $("#inputGenero").val();
  criterioPlataforma = $("#inputPlataforma").val();
  criterioEmpresa = $("#inputEmpresa").val();

  if ((nombrefichero === undefined) || (nombrefichero === 'panelBusqueda.php')) {  // lanzamos la búsqueda desde panelBusqueda
  	$.ajax({
  	  type: "POST",
      dataType: "json",
		  url: "functions/resultadoConsulta.php",
		  data: {nombre: criterioNombre, compañia: criterioCompañia, genero: criterioGenero, plataforma: criterioPlataforma, empresa: criterioEmpresa, orden: orden},
		  success: function (data) {
        $("#divPlataforma").hide("slow");
		    resultadosBusqueda = data;
        numElementos = 0;
        numPagina = 1;
        paginaActiva = 1;
        codigoHTML = "";



        codigoHTML = codigoHTML.concat("<div class='content'><div class='container-fluid'><div class='row'><div class='col-md-12'><div class='card'>");
        codigoHTML = codigoHTML.concat("<div class='card-header card-header-primary card-header-icon'><div class='card-icon'><i class='material-icons'>assignment</i>");
        codigoHTML = codigoHTML.concat("</div><h4 class='card-title'>Resultado de la búsqueda.</h4></div><div class='card-body'><div class='toolbar'></div><div class='material-datatables'>");
        codigoHTML = codigoHTML.concat("<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'><thead>");
        codigoHTML = codigoHTML.concat("<tr><th>Name</th><th>Position</th><th>Office</th><th>Age</th><th>Date</th><th class='disabled-sorting text-right'>Actions</th>");
        codigoHTML = codigoHTML.concat("</tr></thead><tfoot><tr><th>Name</th><th>Position</th><th>Office</th><th>Age</th><th>Start date</th><th class='text-right'>Actions</th>");
        codigoHTML = codigoHTML.concat("</tr></tfoot><tbody><tr><td>Tiger Nixon</td><td>System Architect</td><td>Edinburgh</td><td>61</td><td>2011/04/25</td><td class='text-right'>");
        codigoHTML = codigoHTML.concat("<a href='#' class='btn btn-link btn-info btn-just-icon like'><i class='material-icons'>favorite</i></a>");
        codigoHTML = codigoHTML.concat("<a href='#' class='btn btn-link btn-warning btn-just-icon edit'><i class='material-icons'>dvr</i></a>");
        codigoHTML = codigoHTML.concat("<a href='#' class='btn btn-link btn-danger btn-just-icon remove'><i class='material-icons'>close</i>");
        codigoHTML = codigoHTML.concat("</a></td></tr></tbody></table></div></div></div></div></div></div></div>");

        for (var contadorElementos = 0; contadorElementos < resultadosBusqueda.length; contadorElementos++){
          if (contadorElementos % 9 == 0){
            if (contadorElementos > 0){
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
            codigoHTML = codigoHTML.concat("<div class='card-header card-header-danger card-header-icon'><div class='card-icon'><i class='fas fa-home'></i></div><p class='card-category'>");
          } else if(resultadosBusqueda[contadorElementos][3] == 6){
            codigoHTML = codigoHTML.concat("<div class='card-header card-header-danger card-header-icon'><div class='card-icon'><i class='fas fa-home'></i></div><p class='card-category'>");
          } else if(resultadosBusqueda[contadorElementos][3] == 7){
            codigoHTML = codigoHTML.concat("<div class='card-header card-header-warning card-header-icon'><div class='card-icon'><i class='fas fa-user-alt'></i></div><p class='card-category'>");
          } else if(resultadosBusqueda[contadorElementos][3] == 8){
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
    			codigoHTML = codigoHTML.concat("<input type='hidden' id='inputCompañia' name='inputCompañia' value='");
    			codigoHTML = codigoHTML.concat(criterioCompañia);
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
    			codigoHTML = codigoHTML.concat("<h3 class='card-title' style='cursor: pointer;' onmouseover=$(this).addClass('text-danger') onmouseout=$(this).removeClass('text-danger') ><span id='titulo_nombre' onclick='formInfo");
    			codigoHTML = codigoHTML.concat(contadorElementos);	
    			codigoHTML = codigoHTML.concat(".submit()'>");
    			codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][0]);
    			codigoHTML = codigoHTML.concat("</span></h3></form></div><div class='card-footer'><div class='stats'><i class='material-icons'>place</i>");
    			codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][5]);
    			codigoHTML = codigoHTML.concat("</div></div></div></div>");   
        }
        codigoHTML = codigoHTML.concat("</div>");
		    paginaIdioma = "<?php $arrayRecursosIdioma['Pagina']; ?>";

        if (numPagina > 1) { // Se introduce paginación
          codigoHTMLpaginacion = "";
          codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<ul class='pagination'>");
          codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item' disabled><a class='page-link' style='cursor: default;'>PÁGINA</a></li>");
          for (paginaactual = 1; paginaactual < numPagina; paginaactual++){
            if (paginaactual > 5){
              codigoHTMLpaginacion = codigoHTMLpaginacion.concat("<li class='page-item' id='pagina"+paginaactual+"'><a class='page-link' href='#' onclick='verPagina(")
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
          codigoHTMLpaginacion = codigoHTMLpaginacion.concat("</ul>");
        }
        $("#gridResultados").html(codigoHTML);
        if (resultadosBusqueda.length == 1){
          var textoResultados = "<?php echo $arrayRecursosIdioma['UnResultado']; ?>";
        } else {
          var textoResultados = "" + resultadosBusqueda.length + "<?php echo $arrayRecursosIdioma['ResultadosObtenidos']; ?>";
          if (resultadosBusqueda.length == 200) {
            md.showNotification('top','right','<?php echo $arrayRecursosIdioma["ConsultaDoscientos"]; ?>');
          }
        }
        $("#numResultados").html("<ul class='pagination'><li class='page-item' disabled><a class='page-link' style='cursor: default;'>"+textoResultados+"</a></li></ul>");
        $("#paginacion").html(codigoHTMLpaginacion);
      }
    });
  } else {
    window.location = "panelBusqueda.php?inputNombre="+criterioNombre+"&inputCompañia="+criterioCompañia+"&inputGenero="+criterioGenero+"&inputPlataforma="+criterioPlataforma+"&inputEmpresa="+criterioEmpresa;
  }
}