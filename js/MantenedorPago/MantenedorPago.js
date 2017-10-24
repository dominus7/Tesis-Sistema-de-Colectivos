$("#Perfil").select2({
  allowClear: true
});
$("#selectorEstado").select2({
  allowClear: true
});
function tabla() {
    $.post(
            base_url + "MantenedorPago/tabla",
            {},
            function(ruta, datos) {            	
                $("#tabla").hide();
                $("#tabla").html(ruta, datos);
                $("#tabla").show('slow');                
                menuContextual();
            }
    );    
}
function cargarEditar(id_contMenu){
	cargando('mostrar');
    $.post(
        base_url + "MantenedorPago/cargarEditarPago", 
        	{id_contMenu:id_contMenu}, 
        	function (ruta) {                                 
        $("#content").html(ruta);
    });           
    var accion = "Gestión Pago";
    var modulo = "Editar";
    var icono = "glyphicon glyphicon-edit";
    cargar_contenidoPaginaXusuario(modulo,accion,icono);  
    cargando('ocultar'); 
}
function Deshabilitar(id_contMenu){
    cargando('mostrar');
    $.post(
        base_url + "MantenedorPago/Deshabilitar", 
            {id_contMenu:id_contMenu}, 
            function(datos) {               
                if(datos.valor==0){
                    clickMenu('MantenedorPago');
                }else{
                    alert("error al Deshabilitar datos");
                }
            },'json'
    );            
    cargando('ocultar'); 
}
function Habilitar(id_contMenu){
    cargando('mostrar');
    $.post(
        base_url + "MantenedorPago/Habilitar", 
            {id_contMenu:id_contMenu}, 
            function(datos) {               
                if(datos.valor==0){
                    clickMenu('MantenedorUsuario');
                }else{
                    alert("error al Habilitar datos");
                }
            },'json' 
    );           
    cargando('ocultar'); 
}
$('#btnFiltrar').click(function(){
    cargando('mostrar');
    $.post(
        //donde,que vamos a enviar,lo que devuelve
        base_url + 'MantenedorPago/filtrar',
        {perfil:$('#Perfil').val(),estado:$('#selectorEstado').val()},
         function(ruta, datos) {                
                $("#tabla").hide();
                $("#tabla").html(ruta, datos);
                $("#tabla").show('slow');                
                menuContextual();
            }
        );
    cargando('ocultar');
});


//declarar boton para guardar los registros es un boton global no necesita ser declarado
$(".botonAgregarRegistro").unbind();
$(".botonAgregarRegistro").click(function() {
    cargando('mostrar');
    $.post(
        base_url + "MantenedorPago/cargarCrearPago", 
            {}, 
            function (ruta) {                                 
        $("#content").html(ruta);        
    });           
    var accion = "Gestión Pago";
    var modulo = "Crear";
    var icono = "glyphicon glyphicon-plus";
    cargar_contenidoPaginaXusuario(modulo,accion,icono);  
    cargando('ocultar');
});
$('.botonAgregarRegistro').hover((function(_this) {
  return function(e) {
    e.preventDefault();
    e.stopPropagation();
    return $('.botonAgregarRegistro').tooltip('toggle');
  };
})(this));
$('.botonAgregarRegistro').attr('data-placement', 'left');
$('.botonAgregarRegistro').attr('data-original-title', 'Crear Pago');
$('.botonAgregarRegistro').css('display', 'block');