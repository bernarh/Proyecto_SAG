function lista(valor){
	$.ajax({
		url:'busquedausuario.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		
		html="<table class='table table-bordered'><thead><tr><th>Código usuario</th><th>Nombre Usuario</th><th>Direccion</th><th>Télefono</th><th>Correo</th><th>Tipo de usuario</th><th>Fecha Ingreso</th> </thead><tbody>";
		for(i=0;i<valores.length;i++){
			html+="<tr><td>"+valores[i][0]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][6]+"</td>";
			html+="<td> <button type='button' class='btn btn-info' data-toggle='modal' data-target='#dataUpdate' data-codigousuario='"+valores[i][0]+"' data-nombreusuario='"+valores[i][1]+"' data-direccion='"+valores[i][2]+"' data-telefono='"+valores[i][3]+"' data-correo='"+valores[i][4]+"' data-tipousuario='"+valores[i][5]+"' data-fechaingreso='"+valores[i][6]+"' data-pw='"+valores[i][7]+"'><i class='glyphicon glyphicon-edit'></i> </button> ";	
			html+="<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#dataDelete' data-codigousuario='"+valores[i][0]+"'><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
		
		}
		html+="</tbody></table>"
		$("#lista").html(html);
	});
}

