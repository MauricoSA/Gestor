function agregarArchivosGestor() {
	var formData = new FormData(document.getElementById('frmArchivos'));
	
	$.ajax({
					url:"../procesos/gestor/guardarArchivos.php",
					type:"POST",
					datatype:"html",
					data: formData,
					cache:false,
					contentType: false,
					processData: false,
					success:function(respuesta){
						console.log(respuesta);
						respuesta = respuesta.trim();
						if (respuesta == 1) {
							
							swal("UwU","Agregado Con Exito!","success");
							$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
							$('#frmArchivos')[0].reset();
						} else {
							swal("NwN","No Se Pudo Agregar!","error");
						}
					}
				});
}
function eliminarArchivo(idArchivo){
	swal({
		title:"¿Estas Seguro De eliminar Este Archivo?",
		text:"Una Vez Eliminado No Se Podra Recuperar!",
		icon:"warning",
		buttons: true,
		dangerMode:true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type:"POST",
				data:"idArchivo=" + idArchivo,
				url:"../procesos/gestor/eliminarArchivo.php",
				success:function(respuesta){
					respuesta = respuesta.trim();
					if (respuesta == 1) {

						$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
						swal("Eliminado Con Exito!", {
							icon:"success",
							});
					} else {
						swal("No Se Pudo Eliminar!", {
						icon:"error",
							});
					}
					
				}
			});
		} 
	});
}	

function obtenerArchivoPorId(idArchivo) {
	$.ajax({
		type:"POST",
		data:"idArchivo=" + idArchivo,
		url:"../procesos/gestor/obtenerArchivo.php",
		success:function(respuesta){
			$('#archivoObtenido').html(respuesta);
		}


	});
}	