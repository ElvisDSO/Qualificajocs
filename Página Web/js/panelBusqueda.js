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
	
}

function realizarBusqueda(nombrefichero,orden,idioma){
  $("#divPlataforma").hide("slow");

  var criterioID = $("#inputID").val();
  var criterioNombre = $("#inputNombre").val();
  var criterioCompañia = $("#inputCompañia").val();
  var criterioGenero = $("#inputGenero").val();
  var criterioPlataforma = $("#inputPlataforma").val();
  var criterioEmpresa = $("#inputEmpresa").val();

  if (idioma == "ES") {
    var  traducciones = ['Acciones', 'Compañia', 'La consulta ha generado más de 200 resultados. Se muestran únicamente los 200 primeros resultados.', 'Fecha de lanzamiento', 'Género', 'Nombre', 'Resultado de la búsqueda.', ' resultados obtenidos', '1 resultado obtenido'];
  } else if (idioma == "EN") {
    traducciones = ['Actions', 'Company', 'Your query has generated more than 200 results. Only the first 200 results are displayed.', 'Launch date', 'Gender', 'Name', 'Result of the search.', ' results returned', '1 result returned'];
  } else if (idioma == "PT") {
    traducciones = ['Ações', 'Companhia', 'A consulta gerou mais de 200 resultados. Só são mostrados os primeiros 200 resultados.', 'Data de lançamento', 'Gênero', 'Nome', 'Resultado da busca.', ' resultados obtidos', '1 resultado obtido'];
  }


  if ((nombrefichero === undefined) || (nombrefichero === 'panelBusqueda.php')) {  // lanzamos la búsqueda desde panelBusqueda
  	$.ajax({
  	  type: "POST",
      dataType: "json",
		  url: "functions/resultadoConsulta.php",
		  data: {id: criterioID, nombre: criterioNombre, compañia: criterioCompañia, genero: criterioGenero, plataforma: criterioPlataforma, empresa: criterioEmpresa, orden: orden},
		  success: function (data) {
        $("#divPlataforma").hide("slow");
		    var resultadosBusqueda = data;
        var codigoHTML = "";

        codigoHTML = codigoHTML.concat("<div class='content'><div class='container-fluid'><div class='row'><div class='col-md-12'><div class='card'>");
        codigoHTML = codigoHTML.concat("<div class='card-header card-header-primary card-header-icon'><div class='card-icon'><i class='material-icons'>assignment</i>");
        codigoHTML = codigoHTML.concat("</div><h4 class='card-title'>");
        codigoHTML = codigoHTML.concat(traducciones[6]);
        codigoHTML = codigoHTML.concat("</h4></div><div class='card-body'><div class='toolbar'></div><div class='material-datatables'>");
        codigoHTML = codigoHTML.concat("<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'><thead>");
        codigoHTML = codigoHTML.concat("<tr><th>");
        codigoHTML = codigoHTML.concat(traducciones[5]);
        codigoHTML = codigoHTML.concat("</th><th>");
        codigoHTML = codigoHTML.concat(traducciones[1]);
        codigoHTML = codigoHTML.concat("</th><th>");
        codigoHTML = codigoHTML.concat(traducciones[4]);
        codigoHTML = codigoHTML.concat("</th><th>Rating</th><th>");
        codigoHTML = codigoHTML.concat(traducciones[3]);
        codigoHTML = codigoHTML.concat("</th></tr></thead><tfoot><tr><th>");
        codigoHTML = codigoHTML.concat(traducciones[5]);
        codigoHTML = codigoHTML.concat("</th><th>");
        codigoHTML = codigoHTML.concat(traducciones[1]);
        codigoHTML = codigoHTML.concat("</th><th>");
        codigoHTML = codigoHTML.concat(traducciones[4]);
        codigoHTML = codigoHTML.concat("</th><th>Rating</th><th>");
        codigoHTML = codigoHTML.concat(traducciones[3]);
        codigoHTML = codigoHTML.concat("</th></tr></tfoot>");
        codigoHTML = codigoHTML.concat("<tbody>");
        
        for (var contadorElementos = 0; contadorElementos < resultadosBusqueda.length; contadorElementos++){
          codigoHTML = codigoHTML.concat("<tr><td>");
          codigoHTML = codigoHTML.concat("<form id ='formInfo");
          codigoHTML = codigoHTML.concat(contadorElementos);
          codigoHTML = codigoHTML.concat("' name='formInfo");
          codigoHTML = codigoHTML.concat(contadorElementos);
          codigoHTML = codigoHTML.concat("' action='infoVideojuego.php'>");
          codigoHTML = codigoHTML.concat("<input type='hidden' id='inputID' name='inputID' value='");
          codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][5]);
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
          codigoHTML = codigoHTML.concat("</form></td><td>");
          codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][1]);
          codigoHTML = codigoHTML.concat("</td><td>");
          codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][2]);
          codigoHTML = codigoHTML.concat("</td><td>");
          codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][3]);
          codigoHTML = codigoHTML.concat("</td><td>");
          codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][4]);
          codigoHTML = codigoHTML.concat("</td></tr>");
        }

        codigoHTML = codigoHTML.concat("</tbody></table></div></div></div></div></div></div></div>");

        $("#gridResultados").html(codigoHTML);
        if (resultadosBusqueda.length == 1){
          var textoResultados = traducciones[8];
        } else {
          textoResultados = "" + resultadosBusqueda.length + "" + traducciones[7];
          if (resultadosBusqueda.length == 200) {
            md.showNotification('top','right',traducciones[2]);
          }
        }
        $("#numResultados").html("<ul class='pagination'><li class='page-item' disabled><a class='page-link' style='cursor: default;'>"+textoResultados+"</a></li></ul>");
      }
    });
  } else {
    window.location = "panelBusqueda.php?inputID="+criterioID+"&inputNombre="+criterioNombre+"&inputCompañia="+criterioCompañia+"&inputGenero="+criterioGenero+"&inputPlataforma="+criterioPlataforma+"&inputEmpresa="+criterioEmpresa;
  }
}