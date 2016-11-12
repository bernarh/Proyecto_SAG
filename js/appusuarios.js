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
		 	var fechaingreso = button.data('fechaingreso') // Extraer la información de atributos de datos
		  var codigousuario = button.data('codigousuario') // Extraer la información de atributos de datos
		  var nombreusuario = button.data('nombreusuario') // Extraer la información de atributos de datos
		  var direccion = button.data('direccion') // Extraer la información de atributos de datos
		  var telefono = button.data('telefono') // Extraer la información de atributos de datos
		  var correo = button.data('correo') // Extraer la información de atributos de datos
		  var tipousuario = button.data('tipousuario') // Extraer la información de atributos de datos
		  var modal = $(this)
		  modal.find('#fechaingreso').val(fechaingreso);
		  modal.find('#codigousuario').val(codigousuario);
		  modal.find('#nombreusuario').val(nombreusuario);
		  modal.find('#direccion').val(direccion);
		  modal.find('#telefono').val(telefono);
		  modal.find('#correo').val(correo);
		  modal.find('#tipousuario').val(tipousuario);
		  $('.alert').hide();//Oculto alert
		})
		
		$('#dataDelete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var codigousuario = button.data('codigousuario') // Extraer la información de atributos de datos
		  var modal = $(this)
		  modal.find('#codigousuario').val(codigousuario);
		})

	$( "#actualidarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "editarusuario.php",
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
					url: "agregarusuario.php",
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
					url: "eliminarusuario.php",
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

$(document).ready(function() {    
    //Al escribr dentro del input con id="nombretecnico"
    $('#nombretecnico0').keypress(function(){
        //Obtenemos el value del input
        var nombretecnico = $(this).val();        
        var dataString = 'nombretecnico='+nombretecnico;

        //Le pasamos el valor del input al ajax
        $.ajax({
            type: "POST",
            url: "autocomplete.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').on('click',function(){
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id= $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestions').fadeOut(1000);
                });              
            }
        });
    });              
});    