		function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'tabla2.js',
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
		  var codigoprodutor = button.data('codigoprodutor') // Extraer la información de atributos de datos
		  var nombreprodutor = button.data('nombreprodutor') // Extraer la información de atributos de datos
		  var telefono = button.data('telefono') // Extraer la información de atributos de datos
		  var correo = button.data('correo') // Extraer la información de atributos de datos
		  var codigozona = button.data('codigozona') // Extraer la información de atributos de datos
		  var codigomunicipio = button.data('codigomunicipio') // Extraer la información de atributos de datos
		  var ubicacionexacta = button.data('ubicacionexacta') // Extraer la información de atributos de datos
		  var correo = button.data('correo') // Extraer la información de atributos de datos
		  var modal = $(this)
		  modal.find('.modal-title').text('Modificar Productor: '+ nombreprodutor)
		  modal.find('.modal-body #nombretecnico').val(nombreprodutor)
		  modal.find('.modal-body #telefono').val(telefono)
		  modal.find('.modal-body #ruta').val(codigozona)
		  modal.find('.modal-body #municipio').val(codigomunicipio)
		  modal.find('.modal-body #ubicacion').val(ubicacionexacta)
		  modal.find('.modal-body #correo').val(correo)
		  modal.find('#codigotecnico').val(codigoprodutor)
		  $('.alert').hide();//Oculto alert
		})
		
		$('#dataDelete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var codigoproductor = button.data('codigoproductor') // Extraer la información de atributos de datos
		  var modal = $(this)
		  modal.find('#codigoproductor').val(codigoproductor)
		})

	$( "#actualidarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "modificarproductor.php",
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
					url: "agregarproductor.php",
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
					url: "eliminarproductor.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax_delete").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax_delete").html(datos);
					
					$('#dataDelete').modal('hide');
					load(1);
				  }
			});
		  event.preventDefault();
		});