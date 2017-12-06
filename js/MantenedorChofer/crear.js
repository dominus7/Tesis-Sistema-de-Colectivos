
$("#Estado").select2({
  allowClear: true
});
$("#btnCancelar").button().click(function() {
    clickMenu('MantenedorChofer');
});
$("#btnCrear").button().click(function() {    
    var RUN = $('#RUN').val();
    var Nombre = $('#Nombre').val();
    var Apellidos = $('#Apellidos').val();
    var Correo= $('#Correo').val();
    var Estado = $('#Estado').val();  
    

    //la funcion validar ingreso se necuentra en el archivo funcion.js  
    if(!validacionIngreso()){
    	//alert("no tengo error");
    	$.post(
            base_url + "MantenedorChofer/crear",
            {RUN:RUN,Nombre:Nombre,Apellidos:Apellidos,Correo:Correo,Estado:Estado},
            function(datos) {            	
            	if(datos.valor==0){
            		clickMenu('MantenedorChofer');
            	}else{
            		alert("Chofer ya existe.");
            	}
            },'json'
    	);
    }else{
    	alert("Error existen datos sin completar.");
    }

}); 
$('.botonAgregarRegistro').css('display', 'none');