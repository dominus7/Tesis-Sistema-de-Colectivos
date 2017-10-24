
$("#Estado").select2({
  allowClear: true
});
$("#btnCancelar").button().click(function() {
    clickMenu('MantenedorTipoPago');
});
$("#btnCrear").button().click(function() {  
    //los #Descripcion, son variables de la vista
    var Descripcion = $('#Descripcion').val();
    var Monto = $('#Monto').val();
    var Fecha = $('#Fecha').val();
    var Estado = $('#Estado').val();  
    

    //la funcion validar ingreso se necuentra en el archivo funcion.js  
    if(!validacionIngreso()){
    	//alert("no tengo error");
    	$.post(
            base_url + "MantenedorTipoPago/crear",
            {Descripcion:Descripcion,Monto:Monto,Fecha:Fecha,Estado:Estado},
            function(datos) {            	
            	if(datos.valor==0){
            		clickMenu('MantenedorTipoPago');
            	}else{
            		alert("El tipo de pago ya existe.");
            	}
            },'json'
    	);
    }else{
    	alert("Error existen datos sin completar.");
    }

}); 
$('.botonAgregarRegistro').css('display', 'none');