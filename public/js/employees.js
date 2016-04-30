$(document).ready(function() {

	modalAddEmployee();

	saveEmployee();

	editEmployee();

	imageEmployee();

});

var modalAddEmployee = function(){
	$("#btnAdd").on("click",function(e){
		e.preventDefault();
		
		$('#modalEmployee').modal('show');
	});
};

var saveEmployee = function(){
	$("#btnSave").on("click",function(e){
		e.preventDefault();
		var form = $("#formEmployee");

		var url = form.attr('action');

		var data = form.serialize();

		$.post(url,data,function(response){
			console.log(response);
			if(response.respuesta==="Guardado"){
				//informar y recargar

				fila = $("#rowEmployee").html();

				fila = fila.replace(":NOMBRE",response.name);
				fila = fila.replace(":DEPARTMENT",response.department);
				fila = fila.replace(":POSITION",response.position);
				fila = fila.replace(":ANNEX",response.annex);
				fila = fila.replace(":EMAIL",response.email);
				fila = fila.replace(":BRANCH",response.branch);
				fila = fila.replace(/:ID/g,response.id);

				$("#allEmployees tbody").append(fila);

				$('#modalEmployee').modal('hide');
			}else{
				//informar error
				alert(response.mensaje);
			}//
		},'json').fail(function(){
			alert("Ocurrio un error al intentar guardar la informacion");
		});
	});
};

var editEmployee = function(){
	$("#allEmployees tbody").on("click","tr th .editEmployee",function(e){
		e.preventDefault();
		id = $(this).data("id");

		ruta = $("#rutaEdicion").val();

		ruta = ruta.replace(":ID",id);

		location.href=ruta;
	});
}

var imageEmployee = function(){
	$("#allEmployees tbody").on("click","tr th .imageEmployee",function(e){
		e.preventDefault();
		id = $(this).data("id");

		ruta = $("#rutaImage").val();

		ruta = ruta.replace(":ID",id);

		var data = "<img src='"+ruta+"' alt='Imagen Firma'/>";

		$("#routeToCopy").val(data);

		//window.open(ruta);

		$("#imageModal").modal('show');
		$("#imageOfSign").html(data);
	});
}