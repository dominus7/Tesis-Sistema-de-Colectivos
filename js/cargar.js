function cargar_contenidoPaginaXusuario(modulo,accion,icono){
     //cargar contenido pagina                 
    $.post(
        base_url + "welcome/cargar_contenidoPaginaXusuario", 
        {modulo:modulo,accion:accion,icono}, 
        function (ruta,datos) {                                   
        $("#contenidoHead").html(ruta,datos);
    });
}
function cargar_modalUsuario() {
    setTimeout((function() {
        $.post(
            base_url + "welcome/cargar_modalUsuario",
            {},
            function(ruta, datos) {
                $("#modalUsuario").hide();
                $("#modalUsuario").html(ruta, datos);
                $("#modalUsuario").show('slow');
            }
        );  
    }),600); 
}
function cargar_menu()
{
    setTimeout(
        (function(){
            $.post(
                base_url + "welcome/cargar_menu",
                {},
                function(ruta)
                {
                    $("#menu").hide();
                    $("#menu").html(ruta);
                    $("#menu").show('slow');
                }

            );
        })
    ,600);
}

function cargar_DashboardAdmin()
{
    setTimeout(
        (function(){
            $('.botonAgregarRegistro').css('display', 'none');
            $.post(
                base_url + "welcome/cargar_dashboard_admin",
                {},
                function(ruta)
                {
                    $("#content").hide();
                    $("#content").html(ruta);
                    $("#content").show('slow');
                }

            );
        })
    ,600);
}
function cargar_MantenedorUsuario()
{
    setTimeout(
        (function(){
            $.post(
                base_url + "MantenedorUsuario/MantenedorUsuario",
                {},
                function(ruta, datos) { 
                    $("#content").hide();
                    $("#content").html(ruta,datos);
                    $("#content").show('slow');
                }

            );
        })
    ,600);
}

function cargar_MantenedorPerfil()
{
  setTimeout(
        (function(){
            $.post(
                base_url + "MantenedorPerfil/MantenedorPerfil",
                {},
                function(ruta, datos) { 
                    $("#content").hide();
                    $("#content").html(ruta,datos);
                    $("#content").show('slow');
                }

            );
        })
    ,600);
}

function cargar_MantenedorVehiculo()
{
  setTimeout(
        (function(){
            $.post(
                base_url + "MantenedorVehiculo/MantenedorVehiculo",
                {},
                function(ruta, datos) { 
                    $("#content").hide();
                    $("#content").html(ruta,datos);
                    $("#content").show('slow');
                }

            );
        })
    ,600);
}
function cargar_MantenedorChofer()
{
     setTimeout(
        (function(){
            $.post(
                base_url + "MantenedorChofer/MantenedorChofer",
                {},
                function(ruta, datos) { 
                    $("#content").hide();
                    $("#content").html(ruta,datos);
                    $("#content").show('slow');
                }

            );
        })
    ,600);
}
function cargar_MantenedorTipoPago()
{
  setTimeout(
        (function(){
            $.post(
                base_url + "MantenedorTipoPago/MantenedorTipoPago",
                {},
                function(ruta, datos) { 
                    $("#content").hide();
                    $("#content").html(ruta,datos);
                    $("#content").show('slow');
                }

            );
        })
    ,600);
}
function cargar_MantenedorPago()
{
  setTimeout(
        (function(){
            $.post(
                base_url + "MantenedorPago/MantenedorPago",
                {},
                function(ruta, datos) { 
                    $("#content").hide();
                    $("#content").html(ruta,datos);
                    $("#content").show('slow');
                }

            );
        })
    ,600);
}
function cargar_MantenedorGasto()
{
  setTimeout(
        (function(){
            $.post(
                base_url + "MantenedorChofer/MantenedorChofer",
                {},
                function(ruta, datos) { 
                    $("#content").hide();
                    $("#content").html(ruta,datos);
                    $("#content").show('slow');
                }

            );
        })
    ,600);
}