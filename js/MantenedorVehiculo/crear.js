
$("#Estado").select2({
  allowClear: true
});
$("#btnCancelar").button().click(function() {
    clickMenu('MantenedorVehiculo');
});
$("#btnCrear").button().click(function() {    
    var patente = $('#patente').val();
    var ano = $('#ano').val();
    var cajaCambio = $('#cajaCambio').val();
    var kmInicial= $('#kmInicial').val();
    var combustible= $('#combustible').val();
    var estado = $('#estado').val();  
    

    //la funcion validar ingreso se necuentra en el archivo funcion.js  
    if(!validacionIngreso()){
    	//alert("no tengo error");
    	$.post(
            base_url + "MantenedorVehiculo/crear",
            {patente:patente,ano:ano,cajaCambio:cajaCambio,kmInicial:kmInicial,combustible:combustible,estado:estado},
            function(datos) {            	
            	if(datos.valor==0){
            		clickMenu('MantenedorVehiculo');
            	}else{
            		alert("Vehiculo ya existe.");
            	}
            },'json'
            
    	);

    }else{
    	alert("Error existen datos sin completar.");
    }

}); 
$('.botonAgregarRegistro').css('display', 'none');