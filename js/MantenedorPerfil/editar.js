
$("#Estado").select2({
  allowClear: true
});

$("#btnCancelar").button().click(function() {
    clickMenu('MantenedorPerfil');
});
$("#btnEditar").button().click(function() {
    var id = $('#idPerfil').val();
    var Nombre = $('#Nombre').val();
    var Descripcion = $('#Descripcion').val();
    var Estado = $('#Estado').val(); 
    //la funcion validar ingreso se necuentra en el archivo funcion.js   
    if(!validacionIngreso()){
    	//alert("no tengo error");
    	$.post(
            base_url + "MantenedorPerfil/editar",
            {ID: id, Nombre:Nombre,Descripcion:Descripcion,Estado:Estado},
            function(datos) {            	
            	if(datos.valor==0){
            		clickMenu('MantenedorPerfil');
            	}else{
            		alert("error al editar datos");
            	}
            },'json'
    	);
    }else{
    	informacion('Existen datos vacios');
            setTimeout((function() {
                $('#btnCancelarModal').hide();
                $('#btnAceptarModal').click(function(){
                    $('#myModal').modal();
                    $('#myModal').modal({keyboard:false});
                    $('#myModal').modal('hide');                   
                });
            }),600);
    }

});   
$('.botonAgregarRegistro').css('display', 'none');