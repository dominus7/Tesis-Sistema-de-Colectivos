<script type="text/javascript" src="<?= base_url(); ?>../js/MantenedorChofer/crear.js"></script>

 <div id="formulario">
   <!--<form class="form-horizontal" role="form">-->
    <div class="row">
     
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Agregar chofer</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            
            <div class="col-md-12 col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="RUN" class="col-md-4 control-label">R.U.N</label>
                <div class="col-md-8">              
                  <input type="text" class="form-control" id="RUN" maxlength="10">
                </div>
              </div>
            </div>

            <div class="col-md-12 col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="Nombre" class="col-md-4 control-label">Nombre:</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="Nombre">
                </div>
              </div>
            </div>

            <div class="col-md-12 col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="Apellidos" class="col-md-4 control-label">Apellidos:</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="Apellidos">
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="Correo" class="col-md-4 control-label">Email:</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="Correo">
                </div>
              </div>
            </div>

             <div class="col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="Estado" class="col-md-4 control-label">Estado:</label>
                <div class="col-md-8">
                  <select id="Estado" style="height: 24px !important;width: 100% !important;">
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
 

  