

//funcion que despliega el menu contextual
var id_contMenu =0;
var estado ="";
var VistaMenuContextual = ""
var EstadoMenuContextual = ""
function menuContextual(){
    (function ($, window) {

    $.fn.contextMenu = function (settings) {        
        return this.each(function () {

            // Open context menu
            $(this).on("contextmenu", function (e) {                 
                id_contMenu = e.currentTarget.attributes[0].value;
                VistaMenuContextual = e.currentTarget.attributes[1].value;
                EstadoMenuContextual = e.currentTarget.attributes[2].value;                                                      
                var idTR = e.currentTarget.attributes[0].value;
                cargarAccionMenu(id_contMenu,VistaMenuContextual,EstadoMenuContextual);
                // return native menu if pressing control
                if (e.ctrlKey) return;
                
                //open menu
                $(settings.menuSelector)
                    //.data("invokedOn", $(e.target))
                    .data("invokedOn", $(idTR))
                    .show()
                    .css({
                        position: "absolute",
                        left: getMenuPosition(e.clientX, 'width', 'scrollLeft'),
                        top: getMenuPosition(e.clientY, 'height', 'scrollTop')
                    })                                                
                
                return false;
            });

            //make sure menu closes on any click
            $(document).click(function () {
                $(settings.menuSelector).hide();
            });
        });
        
        function getMenuPosition(mouse, direction, scrollDir) {
            var win = $(window)[direction](),
                scroll = $(window)[scrollDir](),
                menu = $(settings.menuSelector)[direction](),
                position = mouse + scroll;
                        
            // opening menu would pass the side of the page
            if (mouse + menu > win && menu < mouse) 
                position -= menu;
            
            return position;
        }    

    };
    })(jQuery, window);

    $("#myTable tr").contextMenu({
        menuSelector: "#contextMenu"
    });  
}
// funcion que carga las acciones por usuario
function cargarAccionMenu(id,vista,estado){ 
    //alert(estado);   
    $.post(
        base_url + "welcome/cargarAccionMenu",
            {id:id,vista:vista,estado:estado},function (ruta) {                                   
        $("#contextMenu").html(ruta);
    });
}

function accionContentMenu(accion,modulo){  
  
    switch (accion){
        case 'Editar':
            cargarEditar(id_contMenu);
            //cargar vista editar                    
            break;
        case 'Deshabilitar':
            //cargar vista editar     
             Deshabilitar(id_contMenu);               
            break;
        case 'Habilitar':
            //cargar vista editar  
            Habilitar(id_contMenu);                  
            break;
        case 'Eliminar':
            //cargar vista editar  
            Eliminar(id_contMenu);                  
            break;
        case 'Visualizar':
            //cargar vista editar  
            Visualizar(id_contMenu);                  
            break;
        case 'Aprobar':
            //cargar vista editar  
            Aprobar(id_contMenu);                  
            break;
        case 'Rechazar':
            //cargar vista editar  
            Rechazar(id_contMenu);                  
            break;
    }     

} 

function validacionIngreso() {
    var error, input, tipo, _i, _j, _len, _len1, _ref, _ref1;
    error = false;
    tipo = 0;
    _ref = $('#formulario input:text');
    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
      input = _ref[_i];

      if ($(input).val()=="" && $(input).hasClass("select2-focusser") == false && $(input).hasClass("select2-input")==false) {
        error = true;        
        $(input).addClass('error');
      }
    }
    _ref1 = $('#formulario select');
    for (_j = 0, _len1 = _ref1.length; _j < _len1; _j++) {
      input = _ref1[_j];      
      if ($(input).val() === "0") {
        error = true;        
        $(input).addClass('error');
      }
    }   
    return error;
};

function esconderMenu(){
    $('.logo').click(function(){    
        var bandera = $('.sidebar-mini').hasClass('sidebar-collapse');
        if (bandera == true){
            $('.sidebar-mini').removeClass('sidebar-collapse');
        }else{
            $('.sidebar-mini').addClass('sidebar-collapse');
        }
    });
}

function cargando(estado){    
    
    switch(estado){
        case 'mostrar':
            $.post(
                base_url + "welcome/cargando", {}, function (ruta) {            
                $("#myModal").html(ruta);

                $('#myModal').unbind('shown');   
                $('#myModal').modal({
                  'show': true,
                  'backdrop': 'static',
                  'keyboard': false
                }); 
            });            
        break;
        case 'ocultar':
            setTimeout((function() {
                $('#myModal').modal();                     // initialized with defaults
                $('#myModal').modal({keyboard:false});   // initialized with no keyboard
                $('#myModal').modal('hide');                // initializes and invokes show immediately    
                }),1200);      
        break;
    }
    
}

function advertencia(estado){    
    
    switch(estado){
        case 'mostrar':
            $.post(
                base_url + "welcome/advertencia", {}, function (ruta) {            
                $("#myModal").html(ruta);

                $('#myModal').unbind('shown');   
                $('#myModal').modal({
                  'show': true,
                  'backdrop': 'static',
                  'keyboard': false
                }); 
            });            
        break;
        case 'ocultar':
            setTimeout((function() {
                $('#myModal').modal();                     // initialized with defaults
                $('#myModal').modal({keyboard:false});   // initialized with no keyboard
                $('#myModal').modal('hide');                // initializes and invokes show immediately    
                }),1200);      
        break;
    }
    
}
function error(estado){    
    
    switch(estado){
        case 'mostrar':
            $.post(
                base_url + "welcome/error", {}, function (ruta) {            
                $("#myModal").html(ruta);

                $('#myModal').unbind('shown');   
                $('#myModal').modal({
                  'show': true,
                  'backdrop': 'static',
                  'keyboard': false
                }); 
            });            
        break;
        case 'ocultar':
            setTimeout((function() {
                $('#myModal').modal();                     // initialized with defaults
                $('#myModal').modal({keyboard:false});   // initialized with no keyboard
                $('#myModal').modal('hide');                // initializes and invokes show immediately    
                }),1200);      
        break;
    }
    
}
function exito(estado){    
    
    switch(estado){
        case 'mostrar':
            $.post(
                base_url + "welcome/exito", {}, function (ruta) {            
                $("#myModal").html(ruta);

                $('#myModal').unbind('shown');   
                $('#myModal').modal({
                  'show': true,
                  'backdrop': 'static',
                  'keyboard': false
                }); 
            });            
        break;
        case 'ocultar':
            setTimeout((function() {
                $('#myModal').modal();                     // initialized with defaults
                $('#myModal').modal({keyboard:false});   // initialized with no keyboard
                $('#myModal').modal('hide');                // initializes and invokes show immediately    
                }),1200);      
        break;
    }
    
}
function informacion(text){    
    $.post(
        base_url + "welcome/informacion", {text:text}, function (ruta,datos) {            
        $("#myModal").html(ruta,datos);

        $('#myModal').unbind('shown');   
        $('#myModal').modal({
          'show': true,
          'backdrop': 'static',
          'keyboard': false
        }); 
         $('#btnCancelarModal').click(function(){
            $('#myModal').modal();                     // initialized with defaults
            $('#myModal').modal({keyboard:false});   // initialized with no keyboard
            $('#myModal').modal('hide');                // initializes and invokes show immediately
        });        
    });    
}
