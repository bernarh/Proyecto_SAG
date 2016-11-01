function lista(valor){
	$.ajax({
		url:'busquedacp.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered'><thead><tr><th>Código Productor</th><th>Nombre Productor</th><th>Telefono</th><th>Correo</th><th>Código Zona</th><th>Municipio</th><th>Ubicación exacta</th> <th>Actividad</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			html+="<tr><td>"+valores[i][0]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][9]+"</td><td>"+valores[i][6]+"</td>";
			html+="<td> <button type='button' class='btn btn-info' data-toggle='modal' data-target='#dataUpdate' data-codigoprodutor='"+valores[i][0]+"' data-nombreprodutor='"+valores[i][1]+"' data-telefono='"+valores[i][2]+"' data-correo='"+valores[i][3]+"' data-codigozona='"+valores[i][4]+"' data-codigomunicipio='"+valores[i][5]+"' data-ubicacionexacta='"+valores[i][6]+"'><i class='glyphicon glyphicon-edit'></i> </button> ";	
			html+="<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#dataDelete' data-codigoproductor='"+valores[i][0]+"'><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
		
		}
		html+="</tbody></table>"
		$("#lista").html(html);
	});
}

