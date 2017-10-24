$("#Perfil").select2({
  allowClear: true
});
$("#selectorEstado").select2({
  allowClear: true
});

//declarar boton para guardar los registros es un boton global no necesita ser declarado
$(".botonAgregarRegistro").unbind();
$(".botonAgregarRegistro").click(function() {
    cargando('mostrar');
    $.post(
        base_url + "MantenedorPerfil/cargarCrearPerfil", 
            {}, 
            function (ruta) {                                 
        $("#content").html(ruta);        
    });           
    var accion = "Gestión Perfil";
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
$('.botonAgregarRegistro').attr('data-original-title', 'Crear Perfil');
$('.botonAgregarRegistro').css('display', 'block');

function Deshabilitar(id_contMenu){
    cargando('mostrar');
    $.post(
        base_url + "MantenedorPerfil/Deshabilitar", 
            {id_contMenu:id_contMenu}, 
            function(datos) {               
                if(datos.valor==0){
                    clickMenu('MantenedorPerfil');
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
        base_url + "MantenedorPerfil/Habilitar", 
            {id_contMenu:id_contMenu}, 
            function(datos) {               
                if(datos.valor==0){
                    clickMenu('MantenedorPerfil');
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
        base_url + 'MantenedorPerfil/filtrar',
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

function cargarEditar(id_contMenu){
    cargando('mostrar');
    $.post(
        base_url + "MantenedorPerfil/cargarEditarPerfil", 
            {id_contMenu:id_contMenu}, 
            function (ruta) {                                 
        $("#content").html(ruta);
    });           
    var accion = "Gestión Perfil";
    var modulo = "Editar";
    var icono = "glyphicon glyphicon-edit";
    cargar_contenidoPaginaXusuario(modulo,accion,icono);  
    cargando('ocultar'); 
}