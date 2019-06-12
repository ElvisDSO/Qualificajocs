function desplegarVideojuego(idVideojuego) {
  var criterioIdVideojuego = idVideojuego;
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "functions/datosDelVideojuego.php",
    data: {inputID: criterioIdVideojuego},
    success: function(data) {
      var resultadosBusqueda = data;
      var codigoHTML = "";
      codigoHTML = codigoHTML.concat("<div class='row'><div class='col-md-8'><div class='card'><div class='card-header card-header-icon card-header-rose'>");
      codigoHTML = codigoHTML.concat("<div class='card-icon'><i class='material-icons'>perm_identity</i></div><h4 class='card-title'>Datos del videojuego: ");
      codigoHTML = codigoHTML.concat("</h4></div><div class='card-body'><form><div class='row'><div class='col-md-5'><div class='form-group'>");
      codigoHTML = codigoHTML.concat("<label class='bmd-label-floating'>Nombre: ");
      codigoHTML = codigoHTML.concat(resultadosBusqueda[0]['data'][0]);
      codigoHTML = codigoHTML.concat("</label><input type='text' class='form-control'></div></div><div class='col-md-3'>");
      codigoHTML = codigoHTML.concat("<div class='form-group'><label class='bmd-label-floating'>Compañía: ");
      codigoHTML = codigoHTML.concat(resultadosBusqueda[0]['data'][1]);
      codigoHTML = codigoHTML.concat("</label><input type='text' class='form-control'></div></div><div class='col-md-4'><div class='form-group'>");
      codigoHTML = codigoHTML.concat("<label class='bmd-label-floating'>Fecha de lanzamiento: ");
      codigoHTML = codigoHTML.concat(resultadosBusqueda[0]['data'][2]);
      codigoHTML = codigoHTML.concat("</label><input type='email' class='form-control'></div></div></div><div class='row'><div class='col-md-12'>");
      codigoHTML = codigoHTML.concat("<div class='form-group'><label class='bmd-label-floating'>Plataformas: ");

      var i = 0;
      while (resultadosBusqueda[0]['platform'][i] != null) {
        codigoHTML = codigoHTML.concat(resultadosBusqueda[0]['platform'][i]);
        codigoHTML = codigoHTML.concat(" ");
        if (resultadosBusqueda[0]['platform'][i+1] != null) {
          codigoHTML = codigoHTML.concat("/ ");
        }  
        i++;
      }
      codigoHTML = codigoHTML.concat("</label><input type='text' class='form-control'></div></div><div class='col-md-12'>");
      codigoHTML = codigoHTML.concat("<div class='form-group'><label class='bmd-label-floating'>Género: ");
      
      i = 0;
      while (resultadosBusqueda[0]['gender'][i] != null) {
        codigoHTML = codigoHTML.concat(resultadosBusqueda[0]['gender'][i]);
        codigoHTML = codigoHTML.concat(" ");
        if (resultadosBusqueda[0]['gender'][i+1] != null) {
          codigoHTML = codigoHTML.concat("/ ");
        }  
        i++;
      }
      codigoHTML = codigoHTML.concat("</label><input type='text' class='form-control'></div></div></div><div class='row'>");
      codigoHTML = codigoHTML.concat("<div class='col-md-12'><div class='form-group'><label class='bmd-label-floating'>Número de jugadores: ");
      codigoHTML = codigoHTML.concat(resultadosBusqueda[0]['data'][3]);
      codigoHTML = codigoHTML.concat("</label><input type='text' class='form-control'></div></div></div><div class='row'><div class='col-md-4'>");
      codigoHTML = codigoHTML.concat("<div class='form-group'><label class='bmd-label-floating'>Rating: ");
      codigoHTML = codigoHTML.concat(resultadosBusqueda[0]['data'][4]);
      codigoHTML = codigoHTML.concat("</label><input type='text' class='form-control'></div></div></div>");
      codigoHTML = codigoHTML.concat("<a href='#' class='btn btn-danger btn-round pull-right'>Añadir a Pendientes</a>");
      codigoHTML = codigoHTML.concat("<a href='#' class='btn btn-info btn-round pull-right'>Añadir a Jugados</a>");
      codigoHTML = codigoHTML.concat("<div class='clearfix'></div></form></div></div></div>");

      codigoHTML = codigoHTML.concat("<div class='col-md-4'><div class='card card-profile'><div class='card-avatar'><a href='#'>");
      codigoHTML = codigoHTML.concat("<img class='img' src='images/portadaVideojuego.jpg' /></a></div><div class='card-body'>");
      codigoHTML = codigoHTML.concat("<h6 class='card-category text-gray'>");
      codigoHTML = codigoHTML.concat(resultadosBusqueda[0]['data'][0]);
      codigoHTML = codigoHTML.concat("</h6><h4 class='card-title'>");
      codigoHTML = codigoHTML.concat(resultadosBusqueda[0]['data'][1]);
      codigoHTML = codigoHTML.concat("</h4><p class='card-description'>");
      codigoHTML = codigoHTML.concat("It was so nice throwing big parties. Jumping to the pool from the balcony. Everyone swimming in a champagne sea.");
      codigoHTML = codigoHTML.concat(" And there are no rules when you show up here. Bass beat rattling the chandelier. Feeling so Gatsby for that whole year.");
      codigoHTML = codigoHTML.concat(" So why'd you have to rain on my parade? I'm shaking my head. I'm locking the gates. This is why we can't have nice things, darling.");
      codigoHTML = codigoHTML.concat(" Because you break them. I had to take them away. This is why we can't have nice things, honey.");
      codigoHTML = codigoHTML.concat(" Did you think I wouldn't hear all the things you said about me? This is why we can't have nice things.");
      codigoHTML = codigoHTML.concat("</p><a href='#' class='btn btn-primary btn-round'>X / 10</a></div></div></div></div>");

      $("#gridDatosVideojuego").html(codigoHTML);
    }
  });
}