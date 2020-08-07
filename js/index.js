$(document).ready(function(){

	$("#crearUsuario").click(function(){

		let camposVacios = 0;

		$(".registro").each(function() {

			if($(this).val() == '' || $.trim($(this).val()) == '' || $(this).val() == 0){
				camposVacios = camposVacios + 1;
			}

		});

		// Verificar que los campos estén vacíos
		if(camposVacios > 0){
			alert("Te falta llenar "+camposVacios+" campos");
		}
		else{
			let nombres = $("#nombres").val();
			let apaterno = $("#apaterno").val();
			let amaterno = $("#amaterno").val();
			let fechaNac = $("#fechaNac").val();
			let entidad = $("#entidad").val();
			let usuario = $("#usuario").val();
			let password = $("#password").val();
			let password2 = $("#password2").val();

			// Verificar que las contraseñas sean iguales
			if(password != password2){
				alert("Las contraseñas deben ser iguales");
			}
			else{

				$.ajax({
					method: "POST",
					url: "registrarUsuario.php",
					data: {"nombres":nombres, "apaterno":apaterno, "amaterno":amaterno, "fechaNac":fechaNac, "entidad":entidad, "usuario": usuario, "password": password, "password2": password2}
				})
				.done(function(msg) {
					alert("Usuario creado exitosamente!");
					location.replace("index.php");
				});
			}
		}
	});
});