<script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url(); ?>../js/DashboardAdmin/Dashboard.js"></script>
    <section class="content">
          <div class="row">
            <div class="col-md-12">
              


              <!-- LINE CHART -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Bienvenido!</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="lineChart" height="250"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              <!-- DONUT CHART -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Cantidad de Usuarios Por Perfil</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" height="250"></canvas>                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col (LEFT) -->

          </div><!-- /.row -->

        </section>
    <!-- page script -->