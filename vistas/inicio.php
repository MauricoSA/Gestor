<?php 
session_start();

if (isset($_SESSION['usuario'])) {
	include "header.php";
	?>

		<div class="conteiner">
			<div class="row">
				<div class="col-sm-12" align="center">
					<img src="../img/fondo.jpg" width="85%" >
				</div>
			</div>
		</div>

	<?php 
	include "footer.php";
} else {
	header("location:../index.php");
}
?>


