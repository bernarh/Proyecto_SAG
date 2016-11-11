function lista(valor){
	$.ajax({
		url:'busquedac.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table id='tblReporte' class='table table-bordered table-hover'><div class='container'><div class='table-responsive'><thead><tr class='success' ><th>Productor</th><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Fecha Recolección</th><th>Tipo de Transacción</th><th>Punto Recolección</th><th>Comentario</th><th>Actividad</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			html+="<tr class='success'><td>"+valores[i][0]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][6]+"</td><td>"+valores[i][7]+"</td>";
			html+="<td> <button type='button' class='btn btn-info' data-toggle='modal' data-target='#dataUpdate'  data-codigoproductor='"+valores[i][10]+"' ><i class='glyphicon glyphicon-plus'></i> </button>";	
			html+="<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#dataDelete' data-codigoproductor='"+valores[i][10]+"' data-codigoproducto='"+valores[i][11]+"' data-cantidad='"+valores[i][2]+"' data-precio='"+valores[i][3]+"' data-codigotipoproduccion='"+valores[i][12]+"' data-codigousuario='"+valores[i][13]+"' data-codigotipotransaccion='"+valores[i][14]+"' data-fecharecoleccion='"+valores[i][4]+"' data-codigopuntorecoleccion='"+valores[i][15]+"' data-comentario='"+valores[i][7]+"' data-fechaingresoproducto='"+valores[i][8]+"'><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
		}

		html+="</tbody></div></div></table>"
		$("#lista").html(html);
	});
}

function descargarExcel(){
        //Creamos un Elemento Temporal en forma de enlace
        var tmpElemento = document.createElement('a');
        // obtenemos la información desde el div que lo contiene en el html
        // Obtenemos la información de la tabla
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('tblReporte');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html;
        //Asignamos el nombre a nuestro EXCEL
        tmpElemento.download = 'Reporte_Productores.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();
    }