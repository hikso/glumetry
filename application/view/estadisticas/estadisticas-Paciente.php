    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
      <!-- BEGIN PAGE HEADER-->   
      <div class="row-fluid">
       <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
         Mis estadisticas
     </h3>
     <ul class="breadcrumb">
     </ul>
     <!-- Weee -->
     <div id="page-wraper">
        <div class="row-fluid">
            <div class="span6">
                <!-- BEGIN CHART PORTLET-->
                <div class="widget white-full">
                    <div class="widget-title">
                        <h4></i> Hiper-Hipos</h4>
                       <a style="margin-left: 284px;" href="#myModal2" class="btn btn-primary" data-toggle="modal">Especificaciones</a>
                    </div>
                    <div class="widget-body">
                    <?php if ($this->hipoglicemias == 0 && $this->hiperglicemias == 0 && $this->normal == 0) { ?>
                        <div class="metro-nav">
                          <div class="span12">
                                <div class="metro-nav-block nav-block-blue double" style="  width: 100%;">
                                    <a data-original-title="" href="#">
                                        <i class="icon-exclamation-sign"></i>
                                        <div class="info">Información insuficiente <br><br>para mostrar estadisticas.</div>
                                        <div class="status">Sin información para mostrar</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <div class="text-center">
                            <canvas id="doughnut" height="300" width="400"></canvas>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
            <div class="span6">     
                <!-- BEGIN CHART PORTLET-->
                <div class="widget white-full">
                    <div class="widget-title">
                        <h4></i>Promedio de glucometrias según el mes</h4>
                        <a style="margin-left: 121px;" href="#promG" class="btn btn-primary" data-toggle="modal">Especificaciones</a>
                    </div>
                    <div class="widget-body">

                    <?php if ($this->contarBarras < 0) { ?>
                        <div class="metro-nav">
                          <div class="span12">
                                <div class="metro-nav-block nav-block-blue double" style="  width: 100%;">
                                    <a data-original-title="" href="#">
                                        <i class="icon-exclamation-sign"></i>
                                        <div class="info">Información insuficiente <br><br>para mostrar estadisticas.</div>
                                        <div class="status">Sin información para mostrar</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php }else{ ?>

                        <div class="text-center">
                            <canvas id="bar" height="300" width="500" style="width: 500px; height: 300px;"></canvas>
                        </div>
                    <?php } ?>

                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
    </div>
</div>

<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="false" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel2">Especificaciones</h3>
    </div>
    <div class="modal-body">
        <div class="metro-nav">
                    <div class="metro-nav-block nav-block-orange double" style="  background: #4A8BC2;">
                        <a data-original-title="" href="#">
                            <i class="icon-long-arrow-down"></i>
                            <div class="info" style="right: 30px;">Total: <?php echo $this->hipoglicemias; ?></div>
                            <div class="status">Hipoglicemias</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-olive double" style="  background: #F7464A;">
                        <a data-original-title="" href="#">
                            <i class="icon-long-arrow-up"></i>
                            <div class="info" style="right: 30px;">Total: <?php echo $this->hiperglicemias; ?></div>
                            <div class="status">Hiperglicemias</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-yellow double" style="  background: #01A31C;">
                        <a data-original-title="" href="#">
                            <i class="icon-minus"></i>
                            <div class="info" style="right: 30px;">Total: <?php echo $this->normal; ?></div>
                            <div class="status">Normal</div>
                        </a>
                    </div>
                </div>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary">Aceptar</button>
    </div>
</div>

<div id="promG" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="false" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel2">Promedios por mes de glucometrias registradas</h3>
    </div>
    <div class="modal-body">
    <div>
        <div  class='alert alert-info'><button class='close' data-dismiss='alert'>×</button><h4>Información!</h4> <p><strong>Antes</strong> : Glucometrias Pre-prandial o antes de la comida.</p><p><strong> Despues</strong> : Glucometrias Post-prandial o depues de la comida.</p></div>
    </div>
        <div class="metro-nav">
        <?php foreach ($this->promBarras as $key) { ?>

            <div class="metro-nav-block nav-block-orange double" style="   width: 31%; background: #4A8BC2;">
                <a data-original-title="" href="#">
                    <i class="icon-tint"></i>
                    <div class="info" style="right: 30px;   font-size: 16px; top: 30px;">Antes: <?php echo round($key->promAntes,2); ?></div>
                    <div class="info" style="right: 30px;   font-size: 16px;   top: 60px;">Despues: <?php echo round($key->promDespues,2); ?></div>
                    <div class="status"><?php echo $key->Fecha; ?></div>
                </a>
            </div>

        <?php } ?>
    </div>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary">Aceptar</button>
    </div>
</div>
</div>

<script type="text/javascript" src="<?php echo URL; ?>assets/chart-master/Chart.js"></script>
   <script type="text/javascript">
           var Script = function () {


            var doughnutData = [
            {
                value: <?php echo $this->hiperglicemias; ?>,
                color:"#F7464A"
            },
            {
                value : <?php echo $this->hipoglicemias; ?>,
                color : "#4A8BC2"
            },
            {
                value : <?php echo $this->normal; ?>,
                color : "#01A31C"
            }

            ];
            var barChartData = {
                labels : [<?php echo $this->meses; ?>],
                datasets : [
                {
                    fillColor : "rgba(220,220,220,0.5)",
                    strokeColor : "rgba(220,220,220,1)",
                    data : [<?php echo $this->promAntes; ?>]
                },
                {
                    fillColor : "rgba(151,187,205,0.5)",
                    strokeColor : "rgba(151,187,205,1)",
                    data : [<?php echo  $this->promDespues; ?>]
                }
                ]

            };
            new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);
            new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);


        }();
    </script>