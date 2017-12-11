function clickMenu(id){	   
  switch (id){
    
    case 'DashboardAdmin':
      cargar_DashboardAdmin('menu');
      break;

    case 'MantenedorUsuario':
      cargar_MantenedorUsuario('menu');
      break;

     case 'MantenedorPerfiles':
      cargar_MantenedorPerfil('menu');
      
      break;
      case 'MantenedorPago':
      cargar_MantenedorPago('menu');
      
      break;
      case 'MantenedorVehiculo':
      cargar_MantenedorVehiculo('menu');
      
      break;
      case 'MantenedorChofer':
      cargar_MantenedorChofer('menu');
      
      break;
      case 'MantenedorTipoPago':
      cargar_MantenedorTipoPago('menu');
      
      break;
      case 'MantenedorTipoGasto':
      cargar_MantenedorTipoGasto('menu');
      
      break;
      case 'MantenedorGasto':
      cargar_MantenedorGasto('menu');
      
      break;
      case 'MantenedorAsignacion':
      cargar_MantenedorAsignacion('menu');
      
      break;
      case 'MantenedorSolicitud':
      cargar_MantenedorSolicitud('menu');
      
      break;
      case 'MantenedorAntecedente':
      cargar_MantenedorAntecedente('menu');
      
      break;
  }
}