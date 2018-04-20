<!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     Glucometrias registradas.
   </h3>
   <ul class="breadcrumb">
    <?php echo '<strong>Nombre paciente:</strong> '. $_SESSION["nombre"]. ' ' . $_SESSION['apellido']. ' <br><strong>Documento:</strong> '. $_SESSION['documento']; ?>
   </ul>
 </div>
 <div class="row-fluid">
<div class="span12 glucometria divPo">
  <!-- BEGIN widget-->
  <div class="widget white-full">
   <div class="widget-title">
     <label class="control-label ">Registros</h4></label>
   </div>
   <p class="span2"></p>
   <div class="widget-body">
    <table name="DataTable" class="table">
      <thead>
        <tr>
          <th width="100">Fecha</th>
          <th width="100">Momento</th>
          <th width="100">Antes de la comida</th>
          <th width="100">Despues de la comida</th>
          <th width="100">Estudio asignado</th>          
          <th width="100">Observaciones</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach ($Glucometrias as $value) { ?> 
        

        <?php $this->consultarRangos($value->id_recomendacion_rango);?>
        <tr>
          <td><?php echo $value->fecha; ?></td>
          <td><?php echo $value->momento; ?></td>

          <?php 
              $aplicaMax = FALSE;
              $aplicaMen = FALSE;
              foreach ($this->Rango as $key) {
                if ($key->aplica_A_D == 1) {

                      list($minus, $max) = mb_split("-", $key->descripcion);
                      $minus = trim($minus);
                      $max  = trim($max);

                      if ($minus == "<") {
                        $aplicaMen = TRUE;
                        $aplicaMax = FALSE;
                      }elseif ($minus == ">") {
                        $aplicaMen = FALSE;
                        $aplicaMax = TRUE;
                      }

                      $minus  =0| trim($minus);
                      $max  =0| trim($max);
                    if ($aplicaMen) {
                        if ($value->antes < $max) {
                          echo "<td id ='antesConsulta' name = 'antesConsulta'> $value->antes </td>";
                        }else
                        {
                          echo "<td class='alert alert-error' id ='antesConsulta' name = 'antesConsulta'> $value->antes </td>";
                        }
                    }elseif ($aplicaMax) {
                        if ($value->antes > $max) {
                          echo "<td id ='antesConsulta' name = 'antesConsulta'> $value->antes </td>";
                        }else
                        {
                          echo "<td class='alert alert-info' id ='antesConsulta' name = 'antesConsulta'> $value->antes </td>";
                        }
                    }else{
                        if ($value->antes < $minus) {
                         echo "<td class='alert alert-info' id ='antesConsulta' name = 'antesConsulta'> $value->antes </td>";
                        }elseif ($value->antes > $minus && $value->antes < $max) {
                          echo "<td id ='antesConsulta' name = 'antesConsulta'> $value->antes </td>";
                        }else{
                          echo "<td class='alert alert-error' id ='antesConsulta' name = 'antesConsulta'> $value->antes </td>";
                        }
                    }
                }
                
            }
          ?>

          <?php 
              $aplicaMax = FALSE;
              $aplicaMen = FALSE;

              foreach ($this->Rango as $key) {

                if ($key->aplica_A_D == 0) {

                      list($minus, $max) = mb_split("-", $key->descripcion);
                      $minus = trim($minus);
                      $max  = trim($max);

                      if ($minus == "<") {
                        $aplicaMen = TRUE;
                        $aplicaMax = FALSE;
                      }elseif ($minus == ">") {
                        $aplicaMen = FALSE;
                        $aplicaMax = TRUE;
                      }

                      $minus  =0| trim($minus);
                      $max  =0| trim($max);
                    if ($aplicaMen) {
                        if ($value->despues < $max) {
                          echo "<td id ='despuesConsulta'> $value->despues </td>";
                        }else
                        {
                          echo "<td class='alert alert-error' id ='despuesConsulta'> $value->despues </td>";
                        }
                    }elseif ($aplicaMax) {
                        if ($value->despues > $max) {
                          echo "<td id ='despuesConsulta'> $value->despues </td>";
                        }else
                        {
                          echo "<td class='alert alert-info' id ='despuesConsulta'> $value->despues </td>";
                        }
                    }else{
                        if ($value->despues < $minus) {
                         echo "<td class='alert alert-info' id ='despuesConsulta'> $value->despues </td>";
                        }elseif ($value->despues > $minus && $value->despues < $max) {
                          echo "<td id ='despuesConsulta'> $value->despues </td>";
                        }else{
                          echo "<td class='alert alert-error' id ='despuesConsulta'> $value->despues </td>";
                        }
                    }
                }
                
            }
          ?>
          <td><?php echo $value->rangos; ?></td>
          <td><?php echo $value->observaciones; ?></td>
        </tr> 
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>