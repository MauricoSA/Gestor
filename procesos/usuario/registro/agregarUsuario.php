<?php 
	
	require_once "../../../clases/Usuario.php";

	$password = sha1($_POST['password']);
	$datos =array(

				"Nombre" => $_POST['Nombre'],
			    "FechaNacimiento" => $_POST['FechaNacimiento'], 
			    "Correo" => $_POST['Correo'], 
			    "Usuario" => $_POST['Usuario'], 
			    "password" => $password

   				 ); 

    $usuario = new Usuario();
    echo $usuario->agregarUsuario($datos);
 ?>