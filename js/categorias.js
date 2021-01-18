function agregarCategoria(){
	var categoria = $('#NombreCategoria').val();
				
				if (categoria =="") {
					swal("","Agreaga Una Categoria","error");
					return false;
				} else {
					$.ajax({
						type: "POST",
						data: "categoria=" + categoria,
						url: "../procesos/categorias/agregarCategoria.php",
						success:function(respuesta){
							respuesta = respuesta.trim();
							if (respuesta == 1) {
								$('#tablaCategorias').load("categorias/tablaCategoria.php");
								$('#NombreCategoria').val("");
								swal(":D","Categoria Agregada Correctamente!","success");
							} else {
								swal(":C","No se agrego!","error");
							}
						}
					});
				}
}
function eliminarCategoria(idCategoria){
	idCategoria = parseInt(idCategoria);
	if (idCategoria < 1) {
		swal("","No Elejiste Categoria!","error");
		return false;
	} else {
		//-------------------------
		swal({
			title:"¿Estas seguro?",
			text: "Se eliminara esta categoria!, y no se podra recuperar!",
			icon: "warning",
			buttons: true,
			dangerMode: true,

		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type:"POST",
					data:"idCategoria=" + idCategoria,
					url: "../procesos/categorias/eliminarCategoria.php",
					success:function(respuesta){
						respuesta = respuesta.trim();	
						if (respuesta == 1) {
							$('#tablaCategorias').load("categorias/tablaCategoria.php");
							swal("Categoria Elimnada!",{
								 icon: "success",
								});
						} else {
							swal(":C", "No se pudo eliminar!" ,"error");
						}
					}
				});
				
			} 

		});
		//--------------------
	}
}
function obtenerDatosCategoria(idCategoria){
	$.ajax({
		type:"POST",
		data:"idCategoria= " + idCategoria,
		url:"../procesos/categorias/obtenerCategoria.php",
		success:function(respuesta){
			respuesta = jQuery.parseJSON(respuesta);
			$('#idCategoria').val(respuesta['idCategoria']);
			$('#categoriaU').val(respuesta['nombreCategoria']);
			//console.log(respuesta);

			/*respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#tablaCategorias').load("categorias/tablaCategoria.php");
				Swal("UwU", "Categoria editada!", "success");
			} else {
				swal("NwN", "No se pudo Editar!", "error");
			}*/

		}
	});
}
function actualizaCategoria(){
	if ($('#categoriaU').val() == "") {
		swal("-_-","No Hay Categoria!!","error");
		return false;
	} else {
		$.ajax({
			type:"POST",
			data:$('#frmActualizaCategoria').serialize(),
			url:"../procesos/categorias/actualizaCategoria.php",
			success:function(respuesta){
				respuesta = respuesta.trim();
				if (respuesta == 1) {
					$('#tablaCategorias').load("categorias/tablaCategoria.php");
					$('#btnCerrarUpadateCategoria').click();
					swal("UwU","Categoria Actualizada!","success");
				} else {
					swal("NwN","Categoria No Actualizada, Fallo!","error");
				}
			}
		});
	}
}