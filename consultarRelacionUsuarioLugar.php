<?php
if(isset($_SESSION['idSesion'])){
	header("Location: index.php");
	exit();
}

session_start();

$idUsuario 	= $_REQUEST['idUsuario'];
$idRuta		= $_REQUEST['idRuta'];
$bandera	= $_REQUEST['bandera'];

$link = mysqli_connect("localhost","root","password","tlallimap") or die(mysqli_connect_error());

$queryRelacion = "	SELECT 	a.idUsuario AS idUsuario,
							a.idLugar AS idLugar,
					        a.statusVisita AS statusVisita,
					        b.nombre AS nombreLugar,
					        b.latitud AS latitud,
					        b.longitud AS longitud,
					        b.recurso AS recurso,
					        b.marcador AS marcador,
					        b.audio AS audio,
                            b.texto AS texto,
					        b.descripcion AS descripcion
					        
					FROM tlallimap.usuariohaslugares AS a
							INNER JOIN tlallimap.lugares AS b ON a.idLugar = b.idLugar
					WHERE a.idUsuario = %d and a.statusVisita = '0' AND a.idRuta = %d
					ORDER BY b.idLugar;";

$parametros = array($idUsuario,$idRuta);
$queryRelacionParam = vsprintf($queryRelacion, $parametros);

if(!$relacion = $link->query($queryRelacionParam)){
    header("Location:main.php");
}

$datos = array();

while($row = mysqli_fetch_array($relacion)) {
	$datos[] = $row;
}

echo json_encode($datos);
?>