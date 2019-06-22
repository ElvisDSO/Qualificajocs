<?php 

	//Inicializar la sesión.
	session_start();

	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
		header("location: index.php");
		exit;
	}

	require_once "config/conexion.php";
	$username = $password = "";
	$username_err = $password_err = "";
	$controlador = 0;

	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		$controlador = 1;
		if(empty(trim($_POST["username"]))) {
			$username_err = "Introduzca su nombre de usuario";
		} else {
			$username = trim($_POST["username"]);
		}

		if(empty(trim($_POST["password"]))) {
			$password_err = "Introduzca una contraseña";
		} else {
			$password = trim($_POST["password"]);
		}
	}
	//Validación de credenciales.
	if (empty($username_err) && empty($password_err) &&  $controlador == 1) {
		$sql = "SELECT ID_USUARIO, PASSWORD, NOMBRE_USUARIO, EMAIL FROM usuario WHERE NOMBRE_USUARIO = ?";
		if ($stmt = mysqli_prepare($link, $sql)) {
			mysqli_stmt_bind_param($stmt, "s", $param_username);
			$param_username = $username;

			if (mysqli_stmt_execute($stmt)) {
				mysqli_stmt_store_result($stmt);
			}

			if (mysqli_stmt_num_rows($stmt) == 1) {
				mysqli_stmt_bind_result($stmt, $id_usuario, $hashed_password, $username, $email);
				if (mysqli_stmt_fetch($stmt)) {
					if (password_verify($password, $hashed_password)) {
						echo "nada";
						session_start();
						//Almacenar datos en variables de sesión
						$_SESSION["loggedin"] = true;
						$_SESSION["id_usuario"] = $id_usuario;
						$_SESSION["username"] = $username;

						header("location: index.php");
					} else {
						$password_err = "Contraseña incorrecta";
					}
				} else {
					$username_err = "No se ha encontrado ningún usuario con ese nombre";
				}
			} else {
				echo "Algo salió mal. Inténtelo de nuevo más tarde";
			}
		}
		mysqli_close($link);
	}

?>