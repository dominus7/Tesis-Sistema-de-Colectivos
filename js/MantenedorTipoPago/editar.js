$("#Perfil").select2({
  allowClear: true
});
$("#Estado").select2({
  allowClear: true
});

$("#btnCancelar").button().click(function() {
    clickMenu('MantenedorTipoPago');
});
$("#btnEditar").button().click(function() {
    
    var id = $('#idTipoPago').val();
    var Descripcion = $('#Descripcion').val();
    var Monto = $('#Monto').val();
    var Fecha = $('#Fecha').val();
    var Estado = $('#Estado').val(); 
    //la funcion validar ingreso se necuentra en el archivo funcion.js   
    if(!validacionIngreso()){
    	//alert("no tengo error");
    	$.post(
            base_url + "MantenedorTipoPago/editar",
            { Descripcion:Descripcion,Monto:Monto,Fecha:Fecha,Estado:Estado},
            function(datos) {            	
            	if(datos.valor==0){
            		clickMenu('MantenedorTipoPago');
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