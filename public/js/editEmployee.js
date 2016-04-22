$(document).ready(function() {

	update();

});

var update = function(){
	$("#btnSave").on("click",function(e){
		e.preventDefault();
		var form = $("#formEmployee");

		var url = form.attr('action');

		var data = form.serialize();

		$.post(url,data,function(response){
			//console.log(response);
			if(response.respuesta==="Guardado"){
				//informar y recargar
				location.href=response.ruta;
			}else{
				//informar error
				alert(response.mensaje);
			}//
		},'json').fail(function(){
			alert("Ocurrio un error al intentar guardar la informacion");
		});
	});
};