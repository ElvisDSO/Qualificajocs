<?php
 //PHP include with the database access defines
 include 'config.php';

 $link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// Function to connect with the DB
function connect(){
  global $connection;
      if (!$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS)) {
        echo 'Error al conectar con la base de datos. Error code: 1';
        exit;
    }

    if (!mysqli_select_db($connection, DB_NAME)) {
        echo 'Error al conectar con la base de datos. Error code: 2';
        echo '<script language="javascript">alert("conexión no");</script>';         
        exit;
    }

    mysqli_set_charset($connection, "utf8");
  }

  ?>
