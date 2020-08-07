<?php
class Rutas{

	var $link;

	function __construct($link) {
        $this->link = $link;
    }

    function getRutas(){

    	$queryRuta = "	SELECT 		a.idRuta AS idRuta,
									a.nombre AS nombreRuta,
									a.descripcion AS descripcionRuta,
							        b.idLugar AS idLugar,
							        b.nombre AS nombreLugar,
							        b.descripcion AS descripcion,
							        b.latitud AS latitud,
							        b.longitud AS longitud
							        
						FROM		tlallimap.rutas AS a 
									LEFT JOIN tlallimap.lugares AS b ON
							        a.idRuta = b.idRuta

						WHERE a.idRuta = 1";

		$parametros = array();
		$queryRutaParam = vsprintf($queryRuta, $parametros);

		if(!$ruta = $this->link->query($queryRutaParam)){
			/*echo "La consulta falló";
		    echo "Errno: " . $link->errno . "\n";
		    echo "Error: " . $link->error . "\n";*/
		    return 0;
		}

		$lugaresRuta = array();

		while($row = mysqli_fetch_array($ruta)) {
    		//array_push($lugaresRuta, $row);
    		$lugaresRuta[] = $row;
		}

    	return $lugaresRuta;
    }
}
?>