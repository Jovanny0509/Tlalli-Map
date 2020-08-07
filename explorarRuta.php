<?php
if(isset($_SESSION['idSesion'])){
	header("Location: index.php");
	exit();
}

session_start();
include("includes/rutas.class.php");

$link = mysqli_connect("localhost","root","password","tlallimap") or die(mysqli_connect_error());

$objDB = new Rutas($link);
$informacionRuta = $objDB->getRutas();
$_SESSION['idRuta'] = $informacionRuta[0]['idRuta'];

?>
<!DOCTYPE html>
<html>
	<head>
		<title>TlalliMap - Exploración</title>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/explorarRuta.css">
	</head>
	<body>
		<!-- Modal -->
		<div class="modal fade" id="instrucciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h6 class="modal-title" id="exampleModalLabel">Instrucciones:</h6>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <ol>
		        	<li>Presiona "Iniciar recorrido"</li>
		        	<li>El mapa te indicará la primera ubicación.</li>
		        	<li>Busca el marcador que está junto a la pieza arqueológica</li>
		        	<li>Presiona "Activar cámara"</li>
		        	<li>Se abrirá una ventana nueva con tu cámara activada</li>
		        	<li>Enfócala hacia el marcador y disfruta la experiencia en AR</li>
		        	<li>Cierra la ventana y presiona "Siguiente sitio"</li>
		        </ol>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Entendido</button>
		      </div>
		    </div>
		  </div>
		</div>		
		<section id="two" class="wrapper alt style2">
            <section> 
            	<!-- Mapa -->
            	<div class="container">
					<h4><?=$informacionRuta[0]['nombreRuta'];?></h4> 
				  	<div class="panel panel-default">
					    <div class="panel-body">
					    	<h6><?=$informacionRuta[0]['descripcionRuta'];?></h6>  
					    	<input type="hidden" id="idRuta" value="<?=$_SESSION['idRuta'];?>">
					    	<input type="hidden" id="idUsuario" value="<?=$_SESSION['idSesion'];?>">
					    </div>
				  	</div>
				  	<div id="map_wrapper" class="mapa">
			    		<div id="map_canvas" class="mapping" style="display:none;"></div>
			    		<button id="explorar" data-action="inicio" class="btn btn-danger btn-block">INICIAR RECORRIDO</button>
			    		<button id="ar" class="btn btn-warning btn-block" style="display:none;">Explorando sitios...</button>
			    		<button class="btn btn-success btn-block" data-toggle="modal" id="mostrarIns" data-target="#instrucciones">Instrucciones</button>
			    	</div>
				</div>
				<div id="items" style="display:none;">
					<h4>¿Quieres conocer más?</h4> 
	                <div class="item1">
	                </div>
	                <div class="item2">
	                </div>
	                <!--<div class="item3">
	                </div>-->
                </div>
            </section>
        </section>
	<!-- Scripts -->
	<script src="js/jquery/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="js/explorarRuta.js"></script>
	</body>
</html>