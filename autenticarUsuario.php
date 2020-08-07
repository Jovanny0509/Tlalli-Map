<?php
$link = mysqli_connect("localhost","root","password","tlallimap") or die(mysqli_connect_error());

if(!isset($_POST)){
	header("Location: index.php");
	exit();
}

if($_POST['usuarioAuth'] == '' && $_POST['passwordAuth'] == ''){
	header("Location: index.php");
	exit();
}

$usuario  = $_POST['usuarioAuth'];
$password =	$_POST['passwordAuth'];

$queryAutentica = "SELECT 	idUsuario,
							nombre, 
							apaterno,
							amaterno,
							usuario,
							fechaNac

					FROM 	tlallimap.usuarios
					WHERE 	usuario = '%s' AND contrasenia = '%s';";

$parametros = array($usuario,$password);
$queryAutenticaParam = vsprintf($queryAutentica, $parametros);

if(!$autentica = $link->query($queryAutenticaParam)){
	/*echo "La consulta falló";
    echo "Errno: " . $link->errno . "\n";
    echo "Error: " . $link->error . "\n";*/
    header("Location: index.php");
	exit();
}

$datosUsuario = $autentica->fetch_assoc();

session_start();
$_SESSION['test'] = 1;
$_SESSION['idSesion'] = $datosUsuario['idUsuario'];
$_SESSION['usuario']  = $datosUsuario['usuario'];
$_SESSION['nombre']   = $datosUsuario['nombre'];
$_SESSION['usuario']  = $datosUsuario['usuario'];

header("Location: main.php");
exit();
?>