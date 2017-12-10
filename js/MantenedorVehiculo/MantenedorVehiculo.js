$("#Perfil").select2({
  allowClear: true
});
$("#selectorEstado").select2({
  allowClear: true
});
function tabla() {
    $.post(
            base_url + "MantenedorVehiculo/tabla",
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
        base_url + "MantenedorVehiculo/cargarEditarVehiculo", 
        	{id_contMenu:id_contMenu}, 
        	function (ruta) {                                 
        $("#content").html(ruta);
    });           
    var accion = "Gestión Usuario";
    var modulo = "Editar";
    var icono = "glyphicon glyphicon-edit";
    cargar_contenidoPaginaXusuario(modulo,accion,icono);  
    cargando('ocultar'); 
}
function Deshabilitar(id_contMenu){
    cargando('mostrar');
    $.post(
        base_url + "MantenedorVehiculo/Deshabilitar", 
            {id_contMenu:id_contMenu}, 
            function(datos) {               
                if(datos.valor==0){
                    clickMenu('MantenedorVehiculo');
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
        base_url + "MantenedorVehiculo/Habilitar", 
            {id_contMenu:id_contMenu}, 
            function(datos) {               
                if(datos.valor==0){
                    clickMenu('MantenedorVehiculo');
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
        base_url + 'MantenedorVehiculo/filtrar',
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
        base_url + "MantenedorVehiculo/cargarCrearVehiculo", 
            {}, 
            function (ruta) {                                 
        $("#content").html(ruta);        
    });           
    var accion = "Gestión Vehiculo";
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
$('.botonAgregarRegistro').attr('data-original-title', 'Crear Usuario');
$('.botonAgregarRegistro').css('display', 'block');