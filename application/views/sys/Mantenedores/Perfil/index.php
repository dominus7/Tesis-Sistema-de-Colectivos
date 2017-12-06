
 <script type="text/javascript" src="<?= base_url(); ?>../js/MantenedorPerfil/MantenedorPerfil.js"></script>
 <!--<form class="form-horizontal" role="form">-->
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Filtros de Búsqueda</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <!-- INICIO FORMULARIO-->
        <div class="col-sm-6 col-lg-4">
          <div class="form-group">
            <label for="Perfil" class="col-md-4 control-label">Perfil:</label>
            <div class="col-md-8">
              <select id="Perfil" style="height: 24px !important;width: 100% !important;">
                <option value="0">Seleccione</option>
                <?php foreach ($datosPerfil as $filas): ?>
                    <option value="<?= $filas['ID'];?>"><?= $filas['Nombre']; ?></option>                 
                <?php endforeach; ?> 
            </select>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4">
          <div class="form-group">
            <label for="selectorEstado" class="col-md-4 control-label">Estado:</label>
            <div class="col-md-8">
              <select id="selectorEstado" style="height: 24px !important;width: 100% !important;">
              <option value="0">Seleccione</option>
                <option value="Habilitado">Habilitado</option>
                <option value="Deshabilitado">Deshabilitado</option>
            </select>
            </div>
          </div>
        </div>
        <!--TERMINO FORMULARIO-->
        <div class="row">  
          <div class="col-md-12" align="right">    
              <button id="btnFiltrar" class="btn btn-warning">Filtrar</button>          
          </div>  
        </div>

      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </dir>
</dir>
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Listado</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div id="tabla" class="table-responsive">
          <? if ($cantidad == 0): ?>
    <table id="myTable" class="table table-hover">
        <thead align="center">
            <th>No registra Datos!!</th>    
        </thead>
    </table>    
<? else: ?>
    <table id="myTable" class="table table-hover">
        <thead align="center">
        <th>N°</th>    
        <th>Nombre</th>
        <th>Estado</th>
        <th>Descripcion</th> 
        
    </thead>
    <tbody>
    
        <? $i = 0; ?>        
        <?php foreach ($datos as $filas): ?>                      
                <? $i++; ?>      
                <tr id="<?= $filas['ID'];?>" vista="MantenedorPerfil" estado="<?= $filas['Estado']; ?>" align="center">
                    <td><?= $i;?></td>
                    <td><?= $filas['Nombre']; ?></td>
                    <td><?= $filas['Estado']; ?></td>
                    <td><?= $filas['Descripcion']; ?></td>
                    
                </tr>                        
        <?php endforeach; ?>        
    </tbody>
    </table>
<? endif;?>
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>
<script type="text/javascript">
  menuContextual();
</script>