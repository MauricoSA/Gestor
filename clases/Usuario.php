<?php 
	require_once "Conexion.php"; 
	class Usuario extends Conectar{

		public function agregarUsuario($datos){
			$conexion = Conectar::conexion();

			if (self::buscarUsarioRepetido($datos['Usuario'])) {
				return 2;
			} else {
					$sql = "INSERT INTO t_usuarios (nombre,
													f_nacimiento,
													email,
													usuario,
													password) 
											VALUES (?, ?, ?, ?, ?)";
					$query = $conexion->prepare($sql);
					$query->bind_param('sssss', $datos['Nombre'],
												$datos['FechaNacimiento'],
												$datos['Correo'],
												$datos['Usuario'],
												$datos['password']);
					$exito = $query->execute();
					$query->close();
					return $exito;
			} 
		}
		public function buscarUsarioRepetido($usuario) {
			$conexion = Conectar::conexion();

			$sql = "SELECT usuario
					FROM t_usuarios 
					WHERE usuario = '$usuario'";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			if($datos['usuario'] != "" || $datos['usuario'] == $usuario) {
				return 1;
			} else{
				return 0;
			}
		}
		public function login($usuario, $password){
			$conexion = Conectar::conexion();

			$sql = "SELECT count(*) as existeUsuario 
						FROM t_usuarios 
							WHERE usuario = '$usuario' 
								AND password ='$password'";
			$result = mysqli_query($conexion, $sql);
			$respuesta 	= mysqli_fetch_array($result)['existeUsuario'];

			if ($respuesta > 0) {
				$_SESSION['usuario'] = $usuario;

				$sql = "SELECT id_usuario 
						 FROM t_usuarios 
							WHERE usuario = '$usuario' 
								AND password ='$password'";
				$result = mysqli_query($conexion, $sql);
				$idUsuario 	= mysqli_fetch_row($result)[0];
				
				$_SESSION['idUsuario'] = $idUsuario;

				return 1; 
			} else {
				return 0;
			}

		}
	}

 ?>