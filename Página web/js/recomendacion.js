function desplegarRecomendacion(idUsuario) {
  var criterioIdUsuario = idUsuario;
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "functions/listaRecomendacion.php",
    data: {inputID: criterioIdUsuario},
    success: function(data) {
      var resultadosBusqueda = data;
      var codigoHTML = "";
      codigoHTML = codigoHTML.concat("");
      codigoHTML = codigoHTML.concat("<div class='content'><div class='container-fluid'><div class='row'><div class='col-md-12'><div class='card'>");
      codigoHTML = codigoHTML.concat("<div class='card-header card-header-success card-header-icon'><div class='card-icon'><i class='material-icons'>");
      codigoHTML = codigoHTML.concat("done</i></div><h4 class='card-title'>Nuestra recomendación: </h4></div><div class='card-body'><div class='table-responsive'>");
      codigoHTML = codigoHTML.concat("<table class='table'><thead><tr><th>Nombre</th><th>Compañia</th><th>Fecha de lanzamiento: </th><th class='text-right'>Añadir a pendientes: </th></tr>");
      codigoHTML = codigoHTML.concat("</thead><tbody>");
      for (var contadorElementos = 0; contadorElementos < resultadosBusqueda.length; contadorElementos++){
        codigoHTML = codigoHTML.concat("<tr><td>");
        codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][0]);
        codigoHTML = codigoHTML.concat("</td><td>");
        codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][1]);
        codigoHTML = codigoHTML.concat("</td><td class='text-center'>");
        codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][2]);
        codigoHTML = codigoHTML.concat("</td><td class='td-actions text-right'><button type='button' rel='tooltip' class='btn btn-success'>");
        codigoHTML = codigoHTML.concat("<i class='material-icons'>edit</i></button></td></tr>");
      }
      codigoHTML = codigoHTML.concat("</tbody></table></div></div></div></div></div></div></div>");

      $("#gridRecomendacion").html(codigoHTML);
    }
  });
}


function desplegarTOP(idUsuario) {
  var criterioIdUsuario = idUsuario;
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "functions/listaTOP.php",
    data: {inputID: criterioIdUsuario},
    success: function(data) {
      var resultadosBusqueda = data;
      var codigoHTML = "";
      codigoHTML = codigoHTML.concat("");
      codigoHTML = codigoHTML.concat("<div class='content'><div class='container-fluid'><div class='row'><div class='col-md-12'><div class='card'>");
      codigoHTML = codigoHTML.concat("<div class='card-header card-header-warning card-header-icon'><div class='card-icon'><i class='material-icons'>");
      codigoHTML = codigoHTML.concat("star</i></div><h4 class='card-title'>TOP 20: </h4></div><div class='card-body'><div class='table-responsive'>");
      codigoHTML = codigoHTML.concat("<table class='table'><thead><tr><th>Nombre</th><th>Compañia</th><th>Fecha de lanzamiento: </th><th class='text-right'>Añadir a pendientes: </th></tr>");
      codigoHTML = codigoHTML.concat("</thead><tbody>");
      for (var contadorElementos = 0; contadorElementos < resultadosBusqueda.length; contadorElementos++){
        codigoHTML = codigoHTML.concat("<tr><td>");
        codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][0]);
        codigoHTML = codigoHTML.concat("</td><td>");
        codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][1]);
        codigoHTML = codigoHTML.concat("</td><td class='text-center'>");
        codigoHTML = codigoHTML.concat(resultadosBusqueda[contadorElementos][2]);
        codigoHTML = codigoHTML.concat("</td><td class='td-actions text-right'><button type='button' rel='tooltip' class='btn btn-success'>");
        codigoHTML = codigoHTML.concat("<i class='material-icons'>edit</i></button></td></tr>");
      }
      codigoHTML = codigoHTML.concat("</tbody></table></div></div></div></div></div></div></div>");

      $("#gridTOP").html(codigoHTML);
    }
  });
}