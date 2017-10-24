$("#Perfil").select2({
  allowClear: true
});
$("#Estado").select2({
  allowClear: true
});

$("#btnCancelar").button().click(function() {
    clickMenu('MantenedorUsuario');
});
$("#btnEditar").button().click(function() {
    var id = $('#idUsuario').val();
    var Rut = $('#Rut').val();
    var Nombre = $('#Nombre').val();
    var Apellidos = $('#Apellidos').val();
    var Perfil = $('#Perfil').val();
    var Estado = $('#Estado').val(); 
    //la funcion validar ingreso se necuentra en el archivo funcion.js   
    if(!validacionIngreso()){
    	//alert("no tengo error");
    	$.post(
            base_url + "MantenedorUsuario/editar",
            {id:id,Rut:Rut,Nombre:Nombre,Apellidos:Apellidos,Perfil:Perfil,Estado:Estado},
            function(datos) {            	
            	if(datos.valor==0){
            		clickMenu('MantenedorUsuario');
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