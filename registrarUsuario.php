<?php
$link = mysqli_connect("localhost","root","password","tlallimap") or die(mysqli_connect_error());

if(!isset($_REQUEST)){
	header("Location: index.php");
	exit();
}

var_dump($_REQUEST);

$nombres 	= $_REQUEST['nombres'];
$apaterno 	= $_REQUEST['apaterno'];
$amaterno 	= $_REQUEST['amaterno'];
$fechaNac 	= $_REQUEST['fechaNac'];
$entidad	= $_REQUEST['entidad'];
$usuario 	= $_REQUEST['usuario'];
$password 	= $_REQUEST['password'];
$password2 	= $_REQUEST['password2'];

$queryInserta = "INSERT INTO tlallimap.usuarios(usuario,contrasenia,nombre,apaterno,amaterno,fechaNac,idEntidad) VALUES('".$usuario."','".$password."','".$nombres."','".$apaterno."','".$amaterno."','".$fechaNac."','".$entidad."')";

if(!$inserta = $link->query($queryInserta)){
	/*echo "La consulta falló";
    echo "Errno: " . $link->errno . "\n";
    echo "Error: " . $link->error . "\n";*/
    header("Location: index.php");
	exit();
}

$querySelect = "SELECT idUsuario FROM tlallimap.usuarios WHERE usuario = '".$usuario."'";
if(!$query = $link->query($querySelect)){
	/*echo "La consulta falló";
    echo "Errno: " . $link->errno . "\n";
    echo "Error: " . $link->error . "\n";*/
    header("Location: index.php");
	exit();
}

$datosUsuario = $query->fetch_assoc();
$idUsuario = $datosUsuario['idUsuario'];

/***********************Actualización: Por cada lugar de la ruta**************************************/
$queryInserta1 = "INSERT INTO tlallimap.usuarioHasLugares(idUsuario,idRuta,idLugar,statusVisita) VALUES('".$idUsuario."',1,1,'0')";

if(!$inserta1 = $link->query($queryInserta1)){
	/*echo "La consulta falló";
    echo "Errno: " . $link->errno . "\n";
    echo "Error: " . $link->error . "\n";*/
    header("Location: index.php");
	exit();
}

$queryInserta2 = "INSERT INTO tlallimap.usuarioHasLugares(idUsuario,idRuta,idLugar,statusVisita) VALUES('".$idUsuario."',1,2,'0')";

if(!$inserta2 = $link->query($queryInserta2)){
	/*echo "La consulta falló";
    echo "Errno: " . $link->errno . "\n";
    echo "Error: " . $link->error . "\n";*/
    header("Location: index.php");
	exit();
}

$queryInserta3 = "INSERT INTO tlallimap.usuarioHasLugares(idUsuario,idRuta,idLugar,statusVisita) VALUES('".$idUsuario."',1,3,'0')";

if(!$inserta3 = $link->query($queryInserta3)){
	/*echo "La consulta falló";
    echo "Errno: " . $link->errno . "\n";
    echo "Error: " . $link->error . "\n";*/
    header("Location: index.php");
	exit();
}

$queryInserta4 = "INSERT INTO tlallimap.usuarioHasLugares(idUsuario,idRuta,idLugar,statusVisita) VALUES('".$idUsuario."',1,4,'0')";

if(!$inserta4 = $link->query($queryInserta4)){
	/*echo "La consulta falló";
    echo "Errno: " . $link->errno . "\n";
    echo "Error: " . $link->error . "\n";*/
    header("Location: index.php");
	exit();
}
?>