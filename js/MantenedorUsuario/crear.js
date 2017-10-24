$("#Perfil").select2({
  allowClear: true
});
$("#Estado").select2({
  allowClear: true
});
$("#btnCancelar").button().click(function() {
    clickMenu('MantenedorUsuario');
});
$("#btnCrear").button().click(function() {    
    var Rut = $('#Rut').val();
    var Nombre = $('#Nombre').val();
    var Apellidos = $('#Apellidos').val();
    var Perfil = $('#Perfil').val();
    var Estado = $('#Estado').val();  
    var alias = $('#alias').val();

    //la funcion validar ingreso se necuentra en el archivo funcion.js  
    if(!validacionIngreso()){
    	//alert("no tengo error");
    	$.post(
            base_url + "MantenedorUsuario/crear",
            {Rut:Rut,Nombre:Nombre,Apellidos:Apellidos,Perfil:Perfil,Estado:Estado,alias:alias},
            function(datos) {            	
            	if(datos.valor==0){
            		clickMenu('MantenedorUsuario');
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