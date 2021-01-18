<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	  <!-- Required meta tags -->
	  <!-- Caracteres especiales -->
    <meta charset="utf-8">
      <!-- vista en varios dispositivos -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--bootstrap 4-->
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">

</head>
<body>
	<!--inicio de login -->

	<div class="wrapper fadeInDown">
		<div id="formContent">
			<!-- Tabs Titles -->

			<!-- Icon -->
			<div class="fadeIn first">
				<img src="img/logo.png" id="icon" alt="User Icon" />
				<h1>Inicio De Sesion </h1>
				<h1>Al</h1>
				<h1>Gestor De Archivos</h1>
			</div>

			<!-- Login Form -->
			<form method="post" id="frmlogin" onsubmit="return logear()">
				<input type="text" id="login" class="fadeIn second" name="login" placeholder="username" required="">
				<input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required="">
				<input type="submit" class="fadeIn fourth" value="Iniciar Sesión">
			</form>

			<!-- Remind Passowrd -->
			<div id="formFooter">
				<a class="underlineHover" href="registro.php">Registrate</a>
			</div>

		</div>
	</div>
	<!--fin de login-->
	<script src="librerias/jquery-3.5.1.min.js"></script>
	<script src="librerias/sweetalert.min.js"></script>

	<script type="text/javascript">
		function logear(){
			$.ajax({
				type: "POST",
				data: $('#frmlogin').serialize(),
				url: "procesos/usuario/login/login.php",
				success:function(respuesta){
					
					respuesta =  respuesta.trim();
					if (respuesta == 1) {
						window.location = "vistas/inicio.php"; 	
					} else {
						swal(":C","Fallo al entrar!","error");
					}
				}
			});
			return false;
		}
	</script>
</body>
</html>