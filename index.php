<!DOCTYPE html>
<html lang="en">
	<head>
		<title>TLALLIMAP - Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
	<!--Modal para registrar usuario-->
	<div class="modal fade" id="registroUsuario" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo usuario</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
		      	</div>
		      	<div class="modal-body">
		      		<div id="formulario">
			      		<div class="form-group">
			      			<label for="nombres">Nombre: </label>
							<input  type="text" class="form-control registro" id="nombres" name="nombres" placeholder="Nombre" />
						</div>
						<div class="form-group">
			      			<label for="apaterno">Apellido paterno: </label>
							<input type="text" class="form-control registro" id="apaterno" name="apaterno" placeholder="Apellido paterno" />
						</div>
						<div class="form-group">
			      			<label for="amaterno">Apellido materno: </label>
							<input type="text" class="form-control registro" id="amaterno" name="amaterno" placeholder="Apellido materno" />
						</div>
						<div class="form-group">
			      			<label for="fechaNac">Fecha de nacimiento: </label>
							<input type="date" class="form-control registro" id="fechaNac" name="fechaNac"/>
						</div>
						<div class="form-group">
			      			<label for="entidad">Lugar de origen: </label>
							<select class="form-control registro" id="entidad" name="entidad">
								<option value="0" selected=" disabled=">Selecciona una opción:</option>
								<optgroup label="México">
									<option value="1">Aguascalientes</option>
									<option value="2">Baja California Norte</option>
									<option value="3">Baja California Sur</option>
									<option value="4">Campeche</option>
									<option value="5">Chiapas</option>
									<option value="6">Chihuahua</option>
									<option value="7">Ciudad de México</option>
									<option value="8">Coahuila</option>
									<option value="9">Colima</option>
									<option value="10">Durango</option>
									<option value="11">Estado de México</option>
									<option value="12">Guanajuato</option>
									<option value="13">Guerrero</option>
									<option value="14">Hidalgo</option>
									<option value="15">Jalisco</option>
									<option value="16">Michoacán</option>
									<option value="17">Morelos</option>
									<option value="18">Nayarit</option>
									<option value="19">Nuevo León</option>
									<option value="20">Oaxaca</option>
									<option value="21">Puebla</option>
									<option value="22">Querétaro</option>
									<option value="23">Quintana Roo</option>
									<option value="24">San Luis Potosí</option>
									<option value="25">Sinaloa</option>
									<option value="26">Sonora</option>
									<option value="27">Tabasco</option>
									<option value="28">Tamaulipas</option>
									<option value="29">Tlaxcala</option>
									<option value="30">Veracruz</option>
									<option value="31">Yucatán</option>
									<option value="32">Zacatecas</option>	
								</optgroup>
								<optgroup label="Extranjeros">
									<option value="33">África</option>
									<option value="34">Asia</option>
									<option value="35">Europa</option>
									<option value="36">Norteamérica</option>
									<option value="37">Centroamérica</option>
									<option value="38">Sudamérica</option>
									<option value="39">Oceanía</option>
								</optgroup>
							</select>
						</div>
						<div class="form-group">
			      			<label for="usuario">Usuario: </label>
							<input type="text" class="form-control registro" id="usuario" name="usuario" placeholder="Usuario" />
						</div>
						<div class="form-group">
			      			<label for="password">Contraseña: </label>
							<input type="password" class="form-control registro" id="password" placeholder="Contraseña" />
						</div>
						<div class="form-group">
			      			<label for="password2">Confirmar contraseña: </label>
							<input type="password" class="form-control registro" id="password2" name="password2" placeholder="Confirmar" />
						</div>
						<div class="modal-footer">
			        		<input type="button" value="Crear" id="crearUsuario" class="btn btn-danger btn-block"/>
		      			</div>
					</div>
		      	</div>
		    </div>
		</div>
	</div>
	<!--Termina modal para registrar usuario-->
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-heading">
					<img src="img/logo2_1.png" width="200" height="200" alt="">
					<h2 class="text-center">TlalliMap</h2>
				</div>
				<div class="modal-body">
					<!--Login-->
					<form action="autenticarUsuario.php" role="form" method="post">
						<div class="form-group">
								<input type="text" class="form-control" name="usuarioAuth" placeholder="Usuario" />
						</div>
						<div class="form-group">
								<input type="password" class="form-control" name="passwordAuth" placeholder="Contraseña" />
						</div>
						<div class="form-group text-center">
							<button type="submit" id="ingresar" class="btn btn-danger btn-block">Ingresar</button>
							<!--Recuperar contraseña-->
							<!--<a href="#" id="recPassword" class="btn btn-link">Recuperar contraseña</a>-->
						</div>
					</form>
					
					
					<div class="form-group text-center">
						<button type="submit" class="btn btn-link" data-toggle="modal" id="registrar" data-target="#registroUsuario">Regístrate</button>
					</div>
				</div>
			</div>
		</div>
	<!--Scripts-->
	<script src="js/jquery/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="js/index.js"></script>
	</body>
</html>