$("#Estado").select2({
  allowClear: true
});
$("#btnCancelar").button().click(function() {
    clickMenu('MantenedorPerfiles');
});
$("#btnCrear").button().click(function() {    
    
    var Nombre = $('#Nombre').val();
    var Descripcion = $('#Descripcion').val();
    var Estado = $('#Estado').val();  
    

    //la funcion validar ingreso se necuentra en el archivo funcion.js  
    if(!validacionIngreso()){
    	//alert("no tengo error");
    	$.post(
            base_url + "MantenedorPerfil/crear",
            {Nombre:Nombre,Descripcion:Descripcion,Estado:Estado},
            function(datos) {            	
            	if(datos.valor==0){
            		clickMenu('MantenedorPerfiles');
            	}else{
            		alert("Usuario ya existe.");
            	}
            },'json'
    	);
    }else{
    	alert("Error existen datos sin completar.");
    }

}); 
$('.botonAgregarRegistro').css('display', 'none');