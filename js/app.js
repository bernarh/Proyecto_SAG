	function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'productosrecientes.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='imagenes/loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}

		$('#dataUpdate').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var telefono = button.data('telefono') // Extraer la información de atributos de datos
		  var nombretecnico = button.data('nombretecnico') // Extraer la información de atributos de datos
		  
		  var modal = $(this)
		  modal.find('.modal-body #nombretecnico').val(nombretecnico)
		  modal.find('.modal-body #telefono').val(telefono)
		  $('.alert').hide();//Oculto alert
		})
		
		$('#dataDelete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var fechaingresoproducto = button.data('fechaingresoproducto') // Extraer la información de atributos de datos
		  var codigoproductor = button.data('codigoproductor') // Extraer la información de atributos de datos
		  var codigoproducto = button.data('codigoproducto') // Extraer la información de atributos de datos
		  var cantidad = button.data('cantidad') // Extraer la información de atributos de datos
		  var precio = button.data('precio') // Extraer la información de atributos de datos
		  var codigotipoproduccion = button.data('codigotipoproduccion') // Extraer la información de atributos de datos
		  var codigousuario = button.data('codigousuario') // Extraer la información de atributos de datos
		  var codigotipotransaccion = button.data('codigotipotransaccion') // Extraer la información de atributos de datos
		  var codigopuntorecoleccion = button.data('codigopuntorecoleccion') // Extraer la información de atributos de datos
		  var comentario = button.data('comentario') // Extraer la información de atributos de datos
		  var fecharecoleccion = button.data('fecharecoleccion') // Extraer la información de atributos de datos
		  var modal = $(this)
		  modal.find('#fechaingresoproducto').val(fechaingresoproducto);
		  modal.find('#codigoproductor').val(codigoproductor);
		  modal.find('#codigoproducto').val(codigoproducto);
		  modal.find('#cantidad').val(cantidad);
		  modal.find('#precio').val(precio);
		  modal.find('#codigotipoproduccion').val(codigotipoproduccion);
		  modal.find('#codigousuario').val(codigousuario);
		  modal.find('#codigotipotransaccion').val(codigotipotransaccion);
		  modal.find('#codigopuntorecoleccion').val(codigopuntorecoleccion);
		  modal.find('#comentario').val(comentario);
		  modal.find('#fecharecoleccion').val(fecharecoleccion);
		})

	$( "#actualidarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "agregar.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});
		
		$( "#guardarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "agregar.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax_register").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax_register").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});
		
		$( "#eliminarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "eliminar.php",
					data: parametros,
					 beforeSend: function(objeto){
						$(".datos_ajax_delete").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$(".datos_ajax_delete").html(datos);
					
					$('#dataDelete').modal('hide');
					load(1);
				  }
			});
		  event.preventDefault();
		});
