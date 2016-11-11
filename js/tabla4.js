function lista(valor){
	$.ajax({
		url:'busquedabitacora.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		
		html="<table class='table table-bordered'><thead><tr><th>Código registro</th><th>Nombre Usuario</th><th>Fecha</th><th>acción</th></thead><tbody>";
		for(i=0;i<valores.length;i++){
			html+="<tr><td>"+valores[i][0]+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td>";
		}
		html+="</tbody></table>"
		$("#lista").html(html);
	});
}

