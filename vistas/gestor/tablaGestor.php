<?php  
session_start();
require_once "../../clases/Conexion.php";
		$c = new Conectar();
		$conexion = $c->conexion();
		$idUsuario = $_SESSION['idUsuario'];
		$sql= "SELECT 
					archivos.id_archivos as idArchivo,
					usuario.nombre as nombreUsuario,
					categorias.nombre as categoria,
					archivos.nombre as nombreArchivo,
					archivos.tipo as tipoArchivo,
					archivos.ruta as rutaUbicacion,
					archivos.fecha as fechaSubido
				FROM
					t_archivos AS archivos
						INNER JOIN
					t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
						INNER JOIN
					t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
						AND
					archivos.id_usuario = '$idUsuario'";
		$result = mysqli_query($conexion, $sql);

?>

<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered table-dark" id="tablaGDTable">
				<thead>
					<tr style="text-align: center;">
						<th>Categoria</th>
						<th>Nombre</th>
						<th>Tipo de archivo</th>
						<th>descargar</th>
						<th>Visualizar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					/* arreglo de extensiones validas*/

						$extensionesValidas = array('png', 'jpg', 'pdf', 'mp3', 'mp4');

						while($mostrar = mysqli_fetch_array($result)) {
							$rutaDescarga = "../archivos/".$idUsuario."/".$mostrar['nombreArchivo'];
							$nombreArchivo = $mostrar['nombreArchivo'];
							$idArchivo = $mostrar['idArchivo'];
					?>
					<tr style="text-align: center;">
						<td><?php echo $mostrar['categoria']; ?></td>
						<td><?php echo $mostrar['nombreArchivo']; ?></td>
						<td><?php echo $mostrar['tipoArchivo']; ?></td>
						<td>
							<a href="<?php echo $rutaDescarga; ?>" 
								download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
								<span class="fas fa-download"></span>
							</a>
						</td>
						<td>
							<?php 
								for ($i=0; $i <count($extensionesValidas); $i++) { 
									if ($extensionesValidas[$i] == $mostrar['tipoArchivo']) {
							?>
								<span class="btn btn-primary btn-sm" 
									data-toggle="modal" 
									data-target="#visualizarArchivo" 
									onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')">
									<span class="fas fa-eye"></span>
								</span>

							<?php									
									}
								} 
							?> 
						</td>
						<td style="text-align: center;"> 
							<span class="btn btn-danger btn-sm" 
							onclick="eliminarArchivo('<?php echo $idArchivo ?>')">
								<span class="far fa-trash-alt"></span>
							</span>
						</td>
					</tr>
					<?php 
						}	
					?>
				</tbody>
				<tfoot>
					<tr style="text-align: center;">
						<td>Categoria</td>
						<td>Nombre</td>
						<td>Tipo de archivo</td>
						<td>descargar</td>
						<td>Visualizar</td>
						<td> Eliminar
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaGDTable').DataTable(); 
	});
</script>