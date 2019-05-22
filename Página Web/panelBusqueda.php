<!DOCTYPE html>
<?php
  include_once 'config/connection.php';   //Establecer conexión con la base de datos 
  include 'functions/establecerIdioma.php'; //Arranca la variable de sesión que contiene al idioma.

  include 'functions/flags.php'; //Banderas para cambiar el idioma.
  include 'functions/userButton.php'; //Botón usuario.
  include 'functions/footer.php'; //Footer
  include 'functions/menuCategorias.php'; //Buscar por categoría. Buscador en el menú lateral.
  include 'functions/cookies.php'; //Función de aviso de cookies.
  include 'functions/logo.php'; //Logo de Qualificajocs.
  include_once 'functions/recursosIdioma.php'; //Traducción de los párrafos existentes

  $arrayRecursosIdioma = recursosIdioma($idiomaActual);

  //Se almacenan todos los valores que el usuario ha introducido.   
  if (isset($_POST["inputID"])) { 
    $criterioID = $_POST["inputID"];
  } else if (isset($_GET["inputID"])) {  //desde menú izquierdo
    $criterioID = $_GET["inputID"];
  } else {
    $criterioID = "";
  }

  if (isset($_POST["inputNombre"])) { 
    $criterioNombre = $_POST["inputNombre"];
  } else if (isset($_GET["inputNombre"])) {  //desde menú izquierdo
    $criterioNombre = $_GET["inputNombre"];
  } else {
    $criterioNombre = "";
  }

  if (isset($_POST["inputGenero"])) {
    $criterioGenero = $_POST["inputGenero"];
  } else if (isset($_GET["inputGenero"])) {  // desde menú izquierdo
    $criterioGenero = $_GET["inputGenero"];
  } else {
    $criterioGenero = "";
  }
  if (isset($_POST["inputCompañia"])) {
    $criterioCompañia = $_POST["inputCompañia"];
  } else if (isset($_GET["inputCompañia"])) {  // hemos llegado aquí desde menú izquierdo
    $criterioCompañia = $_GET["inputCompañia"];
  } else {
    $criterioCompañia = "";
  }

  if (isset($_POST["inputPlataforma"])) {
    $criterioPlataforma = $_POST["inputPlataforma"];
  } else if (isset($_GET["inputPlataforma"])) {  // hemos llegado aquí desde menú izquierdo
    $criterioPlataforma = $_GET["inputPlataforma"];
  } else {
    $criterioPlataforma = "";
  }

  if (isset($_POST["inputEmpresa"])) {
    $criterioEmpresa = $_POST["inputEmpresa"];
  } else if (isset($_GET["inputEmpresa"])) {  // hemos llegado aquí desde menú izquierdo
    $criterioEmpresa = $_GET["inputEmpresa"];
  } else {
    $criterioEmpresa = "";
  }

  if (isset($_POST["inputTOP"])) {
    $criterioTOP = $_POST["inputTOP"];
  } else if (isset($_GET["inputTOP"])) {  // hemos llegado aquí desde menú izquierdo
    $criterioTOP = $_GET["inputTOP"];
  } else {
    $criterioTOP = "";
  }

  if (isset($_POST["inputRecomendacion"])) {
    $criterioRecomendacion = $_POST["inputRecomendacion"];
  } else if (isset($_GET["inputRecomendacion"])) {  // hemos llegado aquí desde menú izquierdo
    $criterioRecomendacion = $_GET["inputRecomendacion"];
  } else {
    $criterioRecomendacion = "";
  }

?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="images/mando-de-consola.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Qualificajocs - Panel Búsqueda.
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="https://fonts.googleapis.com/css?family=Happy+Monkey" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.css" rel="stylesheet"/>

  <!-- Cookies -->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
  <!-- Librerías de bootstrap --> 
  <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <!-- Librería de iconos. -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  
  <!--   Core JS Files   -->
  <script src="js/jquery-2.1.1.js"></script>
  <script src="js/main.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" ></script>
  <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <!--<script src="assets/js/core/jquery.min.js"></script>-->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  
  <!-- fichero javascript con funciones de búsqueda -->
  <script src="js/panelBusqueda.js"></script>
  
  <!-- Script de carga del aviso de las cookies. -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
  <?php cookies(); ?>

  <!-- Estilos para la modificación de la página en su versión web -->
  <link rel="stylesheet" type="text/css" href="assets/css/ajusteTamPantalla.css">

  <style>
  /* Estilo gif de carga de datos. */
    .ajax-loader {
      visibility: hidden;
      background-color: rgba(255,255,255,0.7);
      position: absolute;
      z-index: +100 !important;
      width: 100%;
      height:100%;
    }

    .ajax-loader img {
      position: relative;
      top:50%;
      left:50%;
    }
  </style>
</head>

<div class="ajax-loader" id="ajax-loader">
  <img src="images/cargando.gif" class="img-responsive" />
</div>

<div id="divBusqueda" class="border shadow-lg p-4 mb-4 bg-light" style="display:none; padding:20px; background-color: #FFFFFF; z-index: 100000; position: absolute; top: 300px; left: 250px"></div>

<input type="hidden" id="inputID" name="inputID">
<input type="hidden" id="inputNombre" name="inputNombre"> 
<input type="hidden" id="inputGenero" name="inputGenero">
<input type="hidden" id="inputPlataforma" name="inputPlataforma"> 
<input type="hidden" id="inputEmpresa" name="inputEmpresa">
<input type="hidden" id="inputCompañia" name="inputCompañia"> 

<body style="margin-top:-20px">
  <div class="wrapper">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="images/sidebar-0.jpg">
      <?php logo(); ?>
      <div class="sidebar-wrapper">
        <?php menuCategorias(); ?>
      </div>
    </div>

    <div class="main-panel">      
      <div class="row">
        <div class="container col-lg-1 col-md-1 col-sm-1"></div><!-- Bloque vacío por cuestiones estéticas. -->
        <div class="container col-lg-6 col-md-6 col-sm-6 border border-right-0" style="padding-left:40px">
          <!-- Mostrador de criterios introducidos -->
          <h5 style="line-height:0.6!important; margin: 20px 0 20px;"><font face="Tw Cen MT" color="#666666"><?php echo $arrayRecursosIdioma['Criterios']; ?></font></h5><hr>
          <?php
            if ($criterioNombre <> "" && $criterioNombre <> "undefined"){
              echo "<h6 id='tituloCriterioNombre'>";
              echo $arrayRecursosIdioma['Nombre'];
              echo ": <b><span id='spanCriterioNombre'>".$criterioNombre."</span></b></h6>";
            } else {
              echo "<h6 id='tituloCriterioNombre' style='display:none'>";
              echo $arrayRecursosIdioma['Nombre'];
              echo ": <b><span id='spanCriterioNombre'></span></b></h6>";
            }
            if ($criterioGenero <> "" && $criterioGenero <> "undefined"){
              echo "<h6 id='tituloCriterioGenero' >";
              echo $arrayRecursosIdioma['Genero'];
              echo ": <b><span id='spanCriterioGenero'>".$criterioGenero."</span></b></h6>";
            } else {
              echo "<h6 id='tituloCriterioGenero' style='display:none'>";
              echo $arrayRecursosIdioma['Genero'];
              echo ": <b><span id='spanCriterioGenero'></span></b></h6>";
            }
            if ($criterioCompañia <> "" && $criterioCompañia <> "undefined"){
              echo "<h6 id='tituloCriterioCompañia' >";
              echo $arrayRecursosIdioma['Compañia'];
              echo ": <b><span id='spanCriterioCompañia'>".$criterioCompañia."</span></b></h6>";
            } else {
              echo "<h6 id='tituloCriterioCompañia' style='display:none'>";
              echo $arrayRecursosIdioma['Compañia'];
              echo ": <b><span id='spanCriterioCompañia'></span></b></h6>";
            }
            if ($criterioPlataforma <> "" && $criterioPlataforma <> "undefined"){
              echo "<h6 id='tituloCriterioPlataforma' >";
              echo $arrayRecursosIdioma['Plataforma'];
              echo ": <b><span id='spanCriterioPlataforma'>".$criterioPlataforma."</span></b></h6>";
            } else if ($criterioEmpresa <> "" && $criterioEmpresa <> "undefined"){
              echo "<h6 id='tituloCriterioPlataforma' >";
              echo $arrayRecursosIdioma['Empresa'];
              echo ": <b><span id='spanCriterioPlataforma'>".$criterioEmpresa."</span></b></h6>";
            } else {
              echo "<h6 id='tituloCriterioPlataforma' style='display:none'>";
              echo $arrayRecursosIdioma['Plataforma'];
              echo ": <b><span id='spanCriterioPlataforma'></span></b></h6>";
            }
          ?>
        </div>
        <div class="container col-lg-2 col-md-2 col-sm-2"></div>
      </div>
      <div class="content" style="margin-top: 0px;">
        <div class="container-fluid row">
          <div class="col-lg-6 col-md-12 col-sm-12" id="paginacion" style="text-align: right"></div>
          <div class="col-lg-6 col-md-12 col-sm-12" id="numResultados" style="text-align: right"></div>
        </div>
        <div class="container-fluid" id="gridResultados"></div> <!-- El ID gridResultados determina el bloque donde se impriman todos los resultados generados en funciones.js (más concretamente en la variable "codigoHTML") -->
      </div>
      <?php footer();?>
    </div>
  </div>

<script>
  //Para poder obtener en JavaScript una variable de PHP.
  //La variable en cuestión es la que almacena el idioma.
  var idioma = '<?php echo $idiomaActual;?>'
  /* Salvapantallas de Cargando Datos (circulito que da vueltas).  */
  $(document).ready(function() {
    $( document ).ajaxStart(function() {
      $('.ajax-loader').css('visibility', 'visible');
    });
    //Detiene el salvapantallas.
    $( document ).ajaxStop(function() {
      $('.ajax-loader').css('visibility', 'hidden');
    });
    //Esconde el desplegable de plataforma cuando se hace click fuera del bloque de plataforma.
    $(window).click(function(e) {
      $("#divPlataforma").hide("slow");
    });

    // Inicializar variables con criterios de búsqueda
    var criterioNombre = "<?php echo $criterioNombre; ?>";
    var criterioCompañia = "<?php echo $criterioCompañia; ?>";
    var criterioGenero = "<?php echo $criterioGenero; ?>";
    var criterioPlataforma = "<?php echo $criterioPlataforma; ?>";
    var criterioEmpresa = "<?php echo $criterioEmpresa; ?>";

    // Actualizar inputs con criterios
    $("#inputNombre").val(criterioNombre);
    $("#inputCompañia").val(criterioCompañia);
    $("#inputGenero").val(criterioGenero);
    $("#inputPlataforma").val(criterioPlataforma);
    $("#inputEmpresa").val(criterioEmpresa);

    realizarBusqueda(window.location.pathname.substring(window.location.pathname.lastIndexOf('/')+1),'',idioma);
    md.initDashboardPageCharts();

    $("#inputGenero").keyup(function (e) {
      if (e.keyCode == 13) {
        realizarBusqueda(window.location.pathname.substring(window.location.pathname.lastIndexOf('/')+1),'',idioma);
        $("#spanCriterioGenero").html($("#inputGenero").val());
        if ($("#inputGenero").val() != ""){
          $("#tituloCriterioGenero").css("display", "block");
        } else {
          $("#tituloCriterioGenero").css("display", "none");
        }
      }
    });

    $("#inputNombre").keyup(function (e) {
      if (e.keyCode == 13) {
        realizarBusqueda(window.location.pathname.substring(window.location.pathname.lastIndexOf('/')+1),'',idioma);
        $("#spanCriterioNombre").html($("#inputNombre").val());
        if ($("#inputNombre").val() != ""){
          $("#tituloCriterioNombre").css("display", "block");
        } else {
          $("#tituloCriterioNombre").css("display", "none");
        }
      }
    });

    /*Funciones propias de la plantilla usada.*/
    $().ready(function() {
      $sidebar = $('.sidebar');
      $sidebar_img_container = $sidebar.find('.sidebar-background');
      $full_page = $('.full-page');
      $sidebar_responsive = $('body > .navbar-collapse');
      window_width = $(window).width();
      fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
      if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
          $('.fixed-plugin .dropdown').addClass('open');
        }
      }

      $('.fixed-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
          if (event.stopPropagation) {
            event.stopPropagation();
          } else if (window.event) {
            window.event.cancelBubble = true;
          }
        }
      });

      $('.fixed-plugin .active-color span').click(function() {
        $full_page_background = $('.full-page-background');
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        var new_color = $(this).data('color');
        if ($sidebar.length != 0) {
          $sidebar.attr('data-color', new_color);
        }
        if ($full_page.length != 0) {
          $full_page.attr('filter-color', new_color);
        }
        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-color', new_color);
        }
      });

      $('.fixed-plugin .background-color .badge').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('background-color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-background-color', new_color);
        }
      });

      $('.fixed-plugin .img-holder').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');


        var new_image = $(this).find("img").attr('src');

        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          $sidebar_img_container.fadeOut('fast', function() {
            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $sidebar_img_container.fadeIn('fast');
          });
        }

        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
          $full_page_background.fadeOut('fast', function() {
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            $full_page_background.fadeIn('fast');
          });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
          var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }
        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
      });

      $('.switch-sidebar-image input').change(function() {
        $full_page_background = $('.full-page-background');
        $input = $(this);
        if ($input.is(':checked')) {
          if ($sidebar_img_container.length != 0) {
            $sidebar_img_container.fadeIn('fast');
            $sidebar.attr('data-image', '#');
          }
          if ($full_page_background.length != 0) {
            $full_page_background.fadeIn('fast');
            $full_page.attr('data-image', '#');
          }
          background_image = true;
        } else {
          if ($sidebar_img_container.length != 0) {
            $sidebar.removeAttr('data-image');
            $sidebar_img_container.fadeOut('fast');
          }
          if ($full_page_background.length != 0) {
            $full_page.removeAttr('data-image', '#');
            $full_page_background.fadeOut('fast');
          }
          background_image = false;
        }
      });

      $('.switch-sidebar-mini input').change(function() {
        $body = $('body');
        $input = $(this);
        if (md.misc.sidebar_mini_active == true) {
          $('body').removeClass('sidebar-mini');
          md.misc.sidebar_mini_active = false;
          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
        } else {
          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
          setTimeout(function() {
            $('body').addClass('sidebar-mini');
            md.misc.sidebar_mini_active = true;
          }, 300);
        }
        // we simulate the window Resize so the charts will get updated in realtime.
        var simulateWindowResize = setInterval(function() {
          window.dispatchEvent(new Event('resize'));
        }, 180);

        // we stop the simulation of Window Resize after the animations are completed
        setTimeout(function() {
          clearInterval(simulateWindowResize);
        }, 1000);
      });
    });
  });
</script>
</body>
</html>