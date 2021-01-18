<?php
session_start();
if (isset($_SESSION['usuario'])) {

	include "header.php"; 
	?>
	<!--jumbotron contenedor-->
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Gestor De Archivos</h1>
			<hr>
			<span class="btn btn-primary" data-toggle="modal" data-target="#ModalAgragarArchivos">
				<span class="fas fa-plus-circle"></span>Agregar Nuevos Archivos
			</span>
			<div id="tablaGA"></div>
		</div>
	</div>
	<!--modal agregar archivos-->


	<!-- Modal -->
	<div class="modal fade" id="ModalAgragarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Agregar Archivos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!--propiedad para mover archivos del front al back enctype="multipart/form-data"-->
				<div class="modal-body">
					<form id="frmArchivos" enctype="multipart/form-data" method="post">
						<label>categoria</label>
						<div id="categoriasLoad"></div>
						<label>Selecciona archivos</label>
						<input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
				</div>
			</div>
		</div>
	</div>


<!-- Modal visualizar -->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Vista Previa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div id="archivoObtenido"> </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
	<?php 
	include "footer.php"; 
	?>
	<script src="../js/gestor.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaGA').load("gestor/tablaGestor.php");
			$('#categoriasLoad').load("categorias/selectCategorias.php");
			$('#btnGuardarArchivos').click(function(){
				agregarArchivosGestor();
			
			});
		});
		
	</script>
	<?php 

} else {
	header("location:../index.php");
}

?>