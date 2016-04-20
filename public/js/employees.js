$(document).ready(function() {

	modalAddEmployee();

});

var modalAddEmployee = function(){
	$("#btnAdd").on("click",function(e){
		e.preventDefault();
		
		//$('#modalEmployee').modal('show');

		$('#modalEmployee').modal('show');
	});
};