
$("#Estado").select2({
  allowClear: true
});
$("#btnCancelar").button().click(function() {
    clickMenu('MantenedorChofer');
});
$("#btnCrear").button().click(function() {    
    var Rut = $('#Rut').val();
    var Nombre = $('#Nombre').val();
    var ApellidoP = $('#Apellidos').val();
    var ApellidoM = $('#Apellidos').val();
    var Direccion = $('#Direccion').val();
    var Telefono = $('#Telefono').val();
    var Email = $('#Email').val();
    
    var Estado = $('#Estado').val();  
    

    //la funcion validar ingreso se necuentra en el archivo funcion.js  
    if(!validacionIngreso()){
    	//alert("no tengo error");
    	$.post(
            base_url + "MantenedorChofer/crear",
            {Rut:Rut,Nombre:Nombre,ApellidoP:ApellidoP,ApellidoM:ApellidoM,Direccion:Direccion,Telefono:Telefono,Email:Email,Estado:Estado},
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