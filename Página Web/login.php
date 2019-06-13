<?php
session_start();
$returnUrl = $_POST["returnUrl"];
if (is_null($returnUrl)) {
    $returnUrl = "index.php";
}
//echo "Cierro 1:" . $_GET["logout"];
//echo "id: " . $_SESSION['id'];
if ($_GET["logout"]==1 AND $_SESSION['ID_USUARIO']) {
    session_destroy();
    $message = "Has cerrado la sesión correctamente";
}

require_once("config/connection.php");

if ($_POST['submit']=="Registrar"){ //Registro
    //Comprobar mail
    if (!$_POST['email']) $error.="<br />Por favor, introduzca su mail";
    else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error.="<br />Por favor, introduzca un mail v&aacute;lido";

    //Comprobar password
    if (!$_POST['password']) $error.="<br />Por favor, introduzca su contrase&ntilde;a";
    else{
        if (strlen($_POST['password']) < 6) $error.="<br />La contrase&ntilde;a debe tener un m&iacute;nimo de 6 car&aacute;cteres, la tuya tiene " . strlen($_POST['password']);
    }

    if ($error) {  //Hay errores
        $error = "Hay error(es) en el registro: $error";
    }
    else { //Todo OK
        $query= "SELECT * FROM `usuario` WHERE EMAIL ='".mysqli_real_escape_string($link, $_POST['email'])."'";
        $result = mysqli_query($link, $query);
        $num_results = mysqli_num_rows($result);
        if ($num_results) { //Compruebo si el mail ya existe en la BD
            $error = "Este email ya est&aacute; registrado. &iquest;Quieres hacer login?";
        }
        else { //No existe el mail en la BD, todo OK
            $query = "INSERT INTO `usuario` (EMAIL, CONTRASEÑA, USERNAME) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."', '".mysqli_real_escape_string($link, $_POST['email'])."')";
            mysqli_query($link, $query);
            $message = "Registro completado";

            $_SESSION['id_user']=mysqli_insert_id($link);
            //print_r($_SESSION);

            //Redirigir a la página de logged
            header("Location:" . $returnUrl);
        }
    }
}

else if ($_POST['submit'] == "Acceder")  //Login
{
    //Uso md5 por seguridad
    $query="SELECT * FROM `usuario` WHERE EMAIL='".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND PASSWORD='".$_POST['loginpassword']."' LIMIT 1";
    //echo $query;
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    if ($row){  //Login correcto, actualizo log
        $_SESSION['id_user']=$row['id_user'];
        $queryLastLogin = "UPDATE `usuario` SET ULTIMO_LOGIN = now() WHERE ID_USUARIO = " . $row['id_user'];
        mysqli_query($link, $queryLastLogin);

        header("Location:" . $returnUrl);
    }
    else{
        $error = "Acceso incorrecto. Vuelva a intentarlo";
    }
}
?>