<!DOCTYPE html>
<?php

  include 'functions/establecerIdioma.php'; //Arranca la variable de sesión que contiene al idioma.
  include 'functions/recursosIdioma.php';

  include 'config/connection.php';
  include 'functions/autoComplete.php';
  $autoComplete = autoComplete();

  include 'functions/autoCompleteGeo.php';
  $autoCompleteGeo = autoCompleteGeo();

  include 'flags.php';
  include 'footer.php';
  include 'menuSectores.php';
  include 'menuBusqueda.php';
  include 'functions/cookies.php';
  include 'logo.php'; //Logo de Guía de Compras Burgos.

  $arrayRecursosIdioma = recursosIdioma($idiomaActual);

?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon.png">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      Qualificajocs
    </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="https://fonts.googleapis.com/css?family=Happy+Monkey" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.css" rel="stylesheet"/>

  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
  <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  
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
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
 <!-- <script src="assets/js/plugins/jquery-jvectormap.js"></script> -->
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
  <script src="js/funciones.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

</head>
<body class="">
  <div class="wrapper ">

    <div class="sidebar" data-color="rose" data-background-color="black" data-image="images/sidebar-5.jpg">
      <?php logo(); ?>
      <!-- Menú lateral. -->
      <div class="sidebar-wrapper">
        <?php menuCategorias();?>
      </div>
    </div>

    <div class="main-panel"> 

      <div class="row"> 
      </div>

    </div>
  </div>

  <script>
  
  </script>
</body>
</html>