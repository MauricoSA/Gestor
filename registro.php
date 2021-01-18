<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<!-- Required meta tags -->
	<!-- Caracteres especiales -->
	<meta charset="utf-8">
	<!-- vista en varios dispositivos -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--bootstrap 4-->
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
	<!--jquery-ui-->
	<link rel="stylesheet" type="text/css" href="librerias/jquery-ui/jquery-ui.theme.css">
	<link rel="stylesheet" type="text/css" href="librerias/jquery-ui/jquery-ui.css">

</head>
<body>
	<div class="container">
		<h1 style="text-align: center;">Registro de usuario</h1>
		<hr>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
					<!--para validar campos de manera sencilla ocupa required="" dentro del inpuit-->
					<label>Nombre Personal</label>
					<input type="text" name="Nombre" id="Nombre" class="form-control" required="">
					<label>Fecha De Nacimiento</label>
					<input type="text" name="FechaNacimiento" id="FechaNacimiento" class="form-control" required="" readonly="">
					<label>Email o Correo</label>
					<input type="email" name="Correo" id="Correo" class="form-control" required="">
					<label>Nombre De usuario</label>
					<input type="text" name="Usuario" id="Usuario" class="form-control" required="">
					<label>Password o Contraseña</label>
					<input type="password" name="password" id="password" class="form-control" required="">
					<br>
					<div class="row">
						<div class="col-sm-6 text-left">
							<button class="btn btn-primary">Registrar</button>
						</div>
						<div class="col-sm-6 text-right">
							<a href="index.php" class="btn btn-success">Ir a Inicio</a>
						</div>
					</div>
					
					
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<script src="librerias/jquery-3.5.1.min.js"></script>
	<script src="librerias/jquery-ui/jquery-ui.js"></script>
	<script src="librerias/sweetalert.min.js"></script>
	
	<script type="text/javascript">

		 $(function(){
		 	var fechaA = new Date();
		 	var yyyy = fechaA.getFullYear();
		 	$("#FechaNacimiento").datepicker({
		 		changeMonth: true,
		 		changeYear: true,
		 		yearRange: '1900:' + yyyy,
		 		dateFormat: "yy-mm-dd"
		 	});
		 });

		function agregarUsuarioNuevo(){
			$.ajax({
				method: "POST",
				data: $('#frmRegistro').serialize(),
				url: "procesos/usuario/registro/agregarUsuario.php",
				success:function(respuesta){
					respuesta = respuesta.trim();

					if (respuesta == 1){
						$("#frmRegistro")[0].reset();
						swal(":D","Agregado con exito!","success");
					} else if(respuesta == 2){
						swal("Este usuario ya existe, Elegir otro por favor!! :P");
					} else{
						swal(":C","No se pudo agregar!","error");
					}
				}
			});
			return false;
		}
	</script>
</body>
</html>
