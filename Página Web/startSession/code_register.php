<?php 
	// Incluir archivo de conexión a la base de datos.
	require_once "config/conexion.php"; 

	//Definir variables e inicializar con valores vacíos.
	$username = "";
	$email = "";
	$password = "";

	//Variables de error.
	$username_err = "";
	$email_err = "";
	$password_err = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Validación del input de username.
		if (empty(trim($_POST["username"]))) {
			$username_err = "Inserte un nombre de usuario";
		} else {
			$sql = "SELECT ID_USUARIO FROM usuario WHERE NOMBRE_USUARIO = ?";
			if ($stmt = mysqli_prepare($link, $sql)) {
				mysqli_stmt_bind_param($stmt, "s", $param_username);
				$param_username = trim($_POST["username"]);
				if (mysqli_stmt_execute($stmt)) {
					mysqli_stmt_store_result($stmt);
					if (mysqli_stmt_num_rows($stmt) == 1) {
						$username_err = "Nombre de usuario ya registrado";
					} else {
						$username = trim($_POST["username"]);
					}
				} else {
					echo "Ups! Algo salió mal, inténtelo de nuevo un poco más tarde";
				}
			}
		}
		//Validación del input de email.
		if (empty(trim($_POST["email"]))) {
			$email_err = "Inserte un email";
		} else {
			$sql = "SELECT ID_USUARIO FROM usuario WHERE EMAIL = ?";
			if ($stmt = mysqli_prepare($link, $sql)) {
				mysqli_stmt_bind_param($stmt, "s", $param_email);
				$param_email = trim($_POST["email"]);
				if (mysqli_stmt_execute($stmt)) {
					mysqli_stmt_store_result($stmt);
					if (mysqli_stmt_num_rows($stmt) == 1) {
						$email_err = "Email ya registrado";
					} else {
						$email = trim($_POST["email"]);
					}
				} else {
					echo "Ups! Algo salió mal, inténtelo de nuevo un poco más tarde";
				}
			}
		}
		//Validación del input de constraseña.
		if (empty(trim($_POST["password"]))) {
			$password_err = "Inserte una contraseña";
		} else if(strlen(trim($_POST["password"])) < 4) {
			$password_err = "La contraseña debe tener al menos 4 caracteres";
		} else {
			$password = trim($_POST["password"]);
		}

		//Comprobar los errores de entrada antes de insertar información en la base de datos.
		if(empty($username_err) && empty($email_err) && empty($password_err)) {
			$sql = "INSERT INTO usuario (PASSWORD, NOMBRE_USUARIO, EMAIL) VALUES (?, ?, ?)";
			if ($stmt = mysqli_prepare($link, $sql)) {
				mysqli_stmt_bind_param($stmt, "sss", $param_password, $param_username, $param_email);
				//Estableciendo parámetros

				$opciones = [
    				'cost' => 12,
				];
				$param_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
				//$param_password = password_hash($password, PASSWORD_DEFAULT); //Para encriptar la contraseña.
				$param_username = $username;
				$param_email = $email;

				if (mysqli_stmt_execute($stmt)) {
					header("location: http://localhost/qualificajocs/login.php");
				} else {
					echo "Algo salió mal, inténtelo un poco más tarde";
				}
			}
		}
		mysqli_close($link);
	}
?>