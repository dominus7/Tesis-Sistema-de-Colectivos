<script type="text/javascript" src="<?= base_url(); ?>../js/MantenedorPerfil/editar.js"></script>

 <div id="formulario">
   <!--<form class="form-horizontal" role="form">-->
    <div class="row">
     
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Editar Perfil</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">

          <div class="col-sm-6 col-lg-4" >
              <div class="form-group">
                <label for="id" class="col-md-4 control-label">ID</label>
                <div class="col-md-8">  
                  <input id="idPerfil"   value="<?php echo $datos[0]['ID']?>" hidden>       
                  <input type="text" class="form-control"  id="id" value="<?php echo $datos[0]['ID']?>">
                </div>
              </div>
            </div>
            
            
            <div class="col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="Nombre" class="col-md-4 control-label">Nombre:</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="Nombre" value="<?php echo $datos[0]['Nombre']?>">
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="Descripcion" class="col-md-4 control-label">Descripcion:</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="Descripcion" value="<?php echo $datos[0]['Descripcion']?>">
                </div>
              </div>
            </div>
      
            <div class="col-sm-6 col-lg-4">
              <div class="form-group">
                <label for="Estado" class="col-md-4 control-label">Estado:</label>
                <div class="col-md-8">
                  <select id="Estado" style="height: 24px !important;width: 100% !important;">
                  <option value="SELECCIONE">Seleccione</option>
                  <?php if($datos[0]['Estado_U']=='Habilitado'){?>
                    <option value="Habilitado" selected>Habilitado</option>                        
                  <?php }else{?>
                    <option value="Habilitado">Habilitado</option>
                  <?php }?>
                  <?php if($datos[0]['Estado_U']=='Deshabilitado'){?>
                    <option value="Deshabilitado" selected>Deshabilitado</option>                        
                  <?php }else{?>
                    <option value="Deshabilitado">Deshabilitado</option>
                  <?php }?> 
                </select>
                </div>
              </div>
            </div>

            <div class="col-md-12" align="right" style="padding-top: 20px;">   
                <button id="btnCancelar" class="btn btn-default">Cancelar</button>  
                <button id="btnEditar" style="margin-left: 70px;" class="btn btn-success">Editar</button>    
            </div>
          
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
  <!--</form>-->
 </div>