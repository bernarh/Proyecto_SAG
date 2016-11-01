$(document).ready(function(){
		    $( "#nombretecnico" ).autocomplete({
		      source: "buscarproductor.php",
		      minLength: 2
		    });
		});