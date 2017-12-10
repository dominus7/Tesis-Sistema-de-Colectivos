<script type="text/javascript" src="<?= base_url(); ?>../js/MantenedorVehiculo/crear.js"></script>

 <div id="formulario">
   <!--<form class="form-horizontal" role="form">-->
    <div class="row">
     
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Crear Vehiculo</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            
            <div class="col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="patente" class="col-md-4 control-label">Patente</label>
                <div class="col-md-8">              
                  <input type="text" class="form-control" id="patente" maxlength="10">
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="ano" class="col-md-4 control-label">Año:</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="ano">
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="cajaCambio" class="col-md-4 control-label">Caja de Cambios:</label>
                <div class="col-md-8">
                  <select id="cajaCambio" style="height: 24px !important;width: 100% !important;">
                  <option value="0">Seleccione</option>
                    <option value="Mecanico">Mecánico</option>
                    <option value="Automatico">Automático</option>
                </select>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="kmInicial" class="col-md-4 control-label">Kilometraje:</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="kmInicial" >
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="combustible" class="col-md-4 control-label">Combustible:</label>
                <div class="col-md-8">
                  <select id="combustible" style="height: 24px !important;width: 100% !important;">
                  <option value="0">Seleccione</option>
                    <option value="Bencina">Bencina</option>
                    <option value="Petroleo">Petroleo</option>
                    <option value="Gas">Gas</option>
                </select>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="estado" class="col-md-4 control-label">Estado:</label>
                <div class="col-md-8">
                  <select id="estado" style="height: 24px !important;width: 100% !important;">
                  <option value="0">Seleccione</option>
                    <option value="Habilitado">Habilitado</option>
                    <option value="Deshabilitado">Deshabilitado</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-12" align="right" style="padding-top: 20px;">   
                <button id="btnCancelar" class="btn btn-default">Cancelar</button>  
                <button id="btnCrear" style="margin-left: 70px;" class="btn btn-success">Crear</button>    
            </div>
          
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
  <!--</form>-->
 </div>
 

  