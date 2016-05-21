$(document).ready(function() {

	modalAddBranch();

	saveBranch();

	editBranch();

});

var modalAddBranch = function(){
	$("#btnAdd").on("click",function(e){
		e.preventDefault();

		//$('#modalEmployee').modal('show');

		$('#modalBranch').modal('show');
	});
};

var saveBranch = function(){
	$("#btnSave").on("click",function(e){
		e.preventDefault();
		var form = $("#formBranch");

		var url = form.attr('action');

		var data = form.serialize();

		$.post(url,data,function(response){
			//console.log(response);
			if(response.respuesta==="Guardado"){
				//informar y recargar
				branch = response.branchResponse;
				fila = $("#rowBranch").html();

				fila = fila.replace(":NOMBRE",branch.name);
				fila = fila.replace(":TIPO",branch.type);
				fila = fila.replace(":DIRECCION",branch.address);
				fila = fila.replace(":CIUDAD",branch.city);
				fila = fila.replace(":TELEFONO1",branch.phone1);
				fila = fila.replace(":TELEFONO2",branch.phone2);

				$("#allBranches tbody").append(fila);

				$('#modalBranch').modal('hide');
			}else{
				//informar error
				alert(response.mensaje);
			}//
		},'json').fail(function(){
			alert("Ocurrio un error al intentar guardar la informacion");
		});
	});
};

var editBranch = function(){
	$(".editBranch").on("click",function(event){
		event.preventDefault();
		id = $(this).data('id');
		slug = $(this).data('companySlug');

		route = $("#edit-route").val();

		route = route.replace(':SLUG',slug);
		route = route.replace(':ID',id);
		console.log(route);

		location.href=route;
	});
};
