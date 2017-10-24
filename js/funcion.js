$(document).ready(function () {        
    verificarLogin();    
});

function verificarLogin() {
    $.post(
            base_url + "Welcome/verificarLogin",
            {},
            function (datos) {
                if (datos.logueado == true) {                    
                    $("#login").hide('fast');
                    $.post(
                        base_url + "welcome/cargar_vista_principal", {}, function (ruta) {
                        	$("#contentidoPagina").html(ruta);
                    	}
                    );
                    cargar_modalUsuario(); 
                    cargar_menu();
                    switch (datos.tipo){
                        case '1':
                          cargar_DashboardAdmin();
                          break;
                        case '2':
                        
                        break;
                      }                            
                } else {       
                    $.post(
                            base_url + "welcome/cargar_login", 
                            {}, 
                            function (ruta) {
                                $("#contentidoPagina").html(ruta);    

                                $('#conectar').click(function () {                            
                                    btn_conectar();
                                });
                                $("#login").show();
                            }
                        );
                }
            },
            'json'
            );    
}


function btn_conectar() {        
    var nombre = $('#user').val();
    var clave = $('#pass').val();    
    if (nombre == '' || clave == '') {
        alert("debe llenar campos!!");
    } else {
        $.post(
                base_url + "welcome/conectar",
                {nombre: nombre, clave: clave},
                function (datos) {
                    if (datos.valor == 1) {                
                        $("#login").hide('fast');
                        $.post(
                                base_url + "welcome/cargar_vista_principal", {}, function (ruta) {
                                $("#contentidoPagina").html(ruta);
                            }
                            );             
                        cargar_modalUsuario();
                        cargar_menu();
                        switch (datos.tipo){
                            case '1':
                              cargar_DashboardAdmin();
                              break;
                            case '2':
                                alert('supervisor');
                            break;
                          }                 
                    } else {
                        alert("Usuario no existe en la base de datos");
                    }
                },
                'json'
                );
    }        
}

function cerrar_sesion() {  

$.post(
    base_url + "welcome/cerrar_sesion",
    {},
    function () {
        verificarLogin();
        $(".botonAgregarRegistro").hide();                    
    }
);
       
    
}