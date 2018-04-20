  <?php 
  
class Base_alimentaria extends Controller
{
    function __construct(){
        parent::__construct("modelBase_alimentaria");
        date_default_timezone_set('America/Bogota');
    }
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        // $base_alimentaria = $this->model->SP_CargarBaseAlimentaria();
        // $templateBase = $this->CargarBaseAlimentaria($base_alimentaria);
        $this->cargarVistaPaciente();
        $clasificacion = $this->model->SP_CargarClasificacion();
        $Base_alimentariafecha = $this->model->SP_CargarBaseAlimentariaFecha($_SESSION['historia']);

        require APP . 'view/_templates/header.php';
        require APP . 'view/base_alimentaria/index_Paciente.php';
        require APP . 'view/_templates/footer.php';
    }

    public function ConsultarBasePaciente()
    {
        // $base_alimentaria = $this->model->SP_CargarBaseAlimentaria();
        // $templateBase = $this->CargarBaseAlimentaria($base_alimentaria);
        $this->cargarVistaPaciente();
        $clasificacion = $this->model->SP_CargarClasificacion();
        $momento = $this->model->SP_CargarMomento();
        $Base_alimentariafecha = $this->model->SP_CargarBaseAlimentariaFecha($_SESSION['historia']);

        require APP . 'view/_templates/header.php';
        require APP . 'view/base_alimentaria/ConsultarBasePaciente.php';
        require APP . 'view/_templates/footer.php';
    }

    public function indexMedico()
    {
        $momentos = $this->model->sp_CargarMomento();
        $templateMomento = $this->cargarMomentos($momentos);
        $categorias = $this->model->cargarCategorias();
        $this->cargarVistaMedico();
        $alimentos = $this->cargarAlimentos();
        $recomendaciones = $this->model->SP_CargarRecomendacion();
        if (!isset($_SESSION['historia']) || $_SESSION['historia'] == 0) {
            header("location: ".URL."medicos/AtencionPacientes?msg");
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/base_alimentaria/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function cargarAlimentosBase()
    {
      $templateMomentosAlimentos = "";
      $order = 0;
      $momentos = $this->model->SP_CargarMomentoBase($_POST['id_Base']);
      $Ali = $this->model->SP_CargarAlimentosMomentoBase($_POST['id_Base']);

      foreach ($momentos as $value) {
        if ($order == 0) {

          $templateMomentosAlimentos .= "<div class='row-fluid'><div class='span1'></div>";
        }

          $templateMomentosAlimentos .= "<div class='span5'><h3 id='tituloDetalles'>$value->descripcion</h3>(CHO Recomendados: $value->total_cho)<div class='well' id='alimentos'>";

          foreach ($Ali as $key) {
           $templateMomentosAlimentos.= ($key->id_momento == $value->id_momento) ? "<address><strong id='alimento'>1 $key->descripcion :</strong><br>Carbohidratos: $key->carbohidratos</address>" : "" ;
          }

          $templateMomentosAlimentos .="</div></div>";
        
        $order ++;
        if ($order == 2) {
          $templateMomentosAlimentos .= "</div>";
          $order = 0;
        }
      }
      echo $templateMomentosAlimentos;
    }
    public function ConsultarBasesAlimen()
    {
        $this->cargarVistaMedico();
        $baseAlimen = $this->cargarBaseAlimentaria();
       if (!isset($_SESSION['historia']) || $_SESSION['historia'] == 0) {
            header("location: ".URL."medicos/AtencionPacientes?msg");
        }elseif (!$baseAlimen) {
            header("location: ".URL."medicos/AtencionPacientes?msgNoB");
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/base_alimentaria/consultarBaseAlimentaria.php';
        require APP . 'view/_templates/footer.php';
    }
    public function cargarRangos()
    {
      $rangos = $this->model->SP_CargarRangos($_POST['id_Recomendacion']);

      echo json_encode($rangos);
    }
    public function cargarBaseAlimentaria()
    {
      return $this->model->SP_CargarBaseAlimentaria($_SESSION['historia']);
    }
    public function cargarVistaMedico()
    {
        /*
        *Iniciamos session de usuario
        */
        session_start();
        // load views
          if ($_SESSION['tipeUser'] != 2) {

            header('location:'.URL.'Cuentas/access');
            exit();

          }
    }
    public function cargarVistaPaciente()
    {
        /*
        *Iniciamos session de usuario
        */
        session_start();
        // load views
          if ($_SESSION['tipeUser'] != 1) {

            header('location:'.URL.'Cuentas/access');
            exit();

          }
    }
    public function cargarAlimentos()
    {
      $alimentos = $this->model->sp_CargarAlimentos();

      return $alimentos;
    }
    public function GuardarBaseAlimentaria()
    {
      session_start();
      $LastIdBase = $this->model->SP_RegistrarBaseAlimentaria(date('Y-m-d'),$_SESSION['historia'],$_POST['id_RecomendacionSeleccionada']);

      $jsonbase = $_POST['base_alimentaria'];
      $objBase_Alimentaria = array(); 
      foreach ($jsonbase as $i=> $value) {
        $objBase_Alimentaria[$i] = json_decode(json_encode($value), TRUE );
      }
      $rstAlimentacionBase = $this->model->SP_RegistrarAlimentacionBase($objBase_Alimentaria, $LastIdBase);

      $jsonbaseCHO = $_POST['carbohidratosPorMomentos'];
      $objChoProMomentos = array();
      foreach ($jsonbaseCHO as $i => $value) {
        $objChoProMomentos[$i] = json_decode(json_encode($value), TRUE );
      }
      $rstDtll = $this->model->SP_RegistrarDtllBaseAlimentaria($objChoProMomentos, $LastIdBase);

      $this->model->sp_registrar_ficha($LastIdBase);
      
      echo "La Base Alimentaria fué asignada el ". date('d'). " de ". $this->traducirMes(). " de " .date("Y");
    }
    public function traducirMes()
    {
      $mes=date("F");

      if ($mes=="January") $mes="Enero";
      if ($mes=="February") $mes="Febrero";
      if ($mes=="March") $mes="Marzo";
      if ($mes=="April") $mes="Abril";
      if ($mes=="May") $mes="Mayo";
      if ($mes=="June") $mes="Junio";
      if ($mes=="July") $mes="Julio";
      if ($mes=="August") $mes="Agosto";
      if ($mes=="September") $mes="Setiembre";
      if ($mes=="October") $mes="Octubre";
      if ($mes=="November") $mes="Noviembre";
      if ($mes=="December") $mes="Diciembre";

      return $mes;
    }
    public function cargarMomentos($momentos)
    {
      $pos = 5;
        $bol  = 1;
        $templateMomento = null;
        foreach ($momentos as  $value) {
          if ($bol == 0) {
            $pos = 5;
            $bol = 1;
          }else{
            $pos = 6;
            $bol = 0;
          }
          $templateMomento .= " 
          <div class='span$pos'> 
            <!-- BEGIN widget-->
            <div class='widget white-full'>
              <div class='widget-title'>
                <h4>
                $value->descripcion
                </h4>
              </div>
              <div class='widget-body'>
                <!-- BEGIN FORM-->

                <form class='form-horizontal AdvancedForm' action='#'>
                  <div class='control-group'>
                    <label class='control-label'>Carbohidratos</label>
                    <div class='controls'>
                      <input name='txtCho' onkeypress='return validateFloatKeyPress(this, event, 4, 6);' maxlength='3' id='$value->id_momento' type='text' placeholder='Ej: 10' class='input-mini' required>
                    </div>
                  </div>

                  <div name='momentosButtons' class='control-group'>
                    
                    <button href='#myModal3' onclick='cargarModelMomento(this)' id='$value->id_momento'  name='$value->descripcion' data-toggle='modal' type='number' class='btn btn-primary'><i class='icon-plus icon-white'></i> Añadir alimentos</button>
                  </div>
                </form>
                <!-- END FORM-->
              </div>
            </div>
            <!-- END widget-->
          </div>";
 
        }
        return $templateMomento;
    }
    public function AlimentacionBase()
    {
      $clasificacion = $this->model->CargarAlimentacionBase($_POST['idClasificacion']);
       foreach ($clasificacion as $item) {
            echo "<option value='$item->id_alimento'>$item->descripcion</option>";
        }   
    }


    public function baseAlimentaria()
    {
        $this->model->SP_CargarBaseAlimentaria();
        echo json_encode();
    }

     public function AlimentosCalculadora()
    {
      $clasificacion = $this->model->CargarAlimentosCalculadora($_POST['idClasificacion']);
        echo json_encode($clasificacion);   
    }

    public function cargarClasificacion()
    {
      $clasificacion = $this->model->SP_CargarClasificacion();

      return $clasificacion;
    }

    public function AlimentacionBasePaciente()
    {
       $alimento = $this->model->sp_CargarAlimentosPaciente($_POST['idAlimento']);
          echo json_encode($alimento);  
    }


    public function IdBase()
    {
      session_start();
     $dtlls = $this->model->cargarIdBase($_POST['fecha'], $_SESSION['historia']);
        echo json_encode($dtlls);   
    }
    public function DtllsBaseAlimentariaClasificacion()
    {
      $dtllsCls = $this->model->DtllsBaseAlimentariaCls($_POST['idClasificacion'], $_POST['IdBaase']);

       echo json_encode($dtllsCls);   
    }
    // public function SP_FiltroCalcularRecomendados()
    // {
    //    $temp = $this->model->SP_FiltroCalcular($_POST["alimentoRecomendado"]);
    //    foreach ($temp as $value) {
    //        echo "<option value='$value->idAlimento' onclick='filtro(this.innerHTML); '>".$value->alimentoRecomendado."</option><br>";
    //    }
    // }
    public function SP_FiltroCalcular()
    {
       $temp = $this->model->SP_FiltroCalcular($_POST["box1Filter"]);
       foreach ($temp as $value) {
           echo "<option value='$value->id_alimento' onclick='filtro(this.innerHTML); '>".$value->descripcion."</option><br>";
       }
    }
    public function cargarDtllsBaseAlimentaria()
    {
        session_start();
        $dtllsBs = $this->model->cargarDtllsBaseAlimentaria($_POST['IdBaase'], $_SESSION['historia']);
        echo json_encode($dtllsBs);   
    }

    //Consulta de base alimentaria


    public function consultarBaseAlimentariaPaciente()
    {
      session_start();
      $ConsultaBase = $this->model->ConsultarBasePAciente($_SESSION['historia']);
      $_SESSION['IdBase'] = $ConsultaBase[0]->id_base_alimentaria;
      echo json_encode($ConsultaBase);
    }

    public function consultarRangosPaciente()
    {
      session_start();
      $ConsultaNiveles = $this->model->consultarRangosPaciente($_SESSION['IdBase']);
      echo json_encode($ConsultaNiveles);
    }

     public function ConsultaAlimentacionBase()
    {
      session_start();
      $alimentos = $this->model->AlimentacionBase($_POST['momento'], $_POST['actual']);
      echo json_encode($alimentos);
    }

    public function FiltroBaseAlimentaria()
    {
      session_start();
      $filtro = $this->model->FiltroBaseAlimentaria($_POST['fechaConsulta'],$_SESSION['historia']);
      echo json_encode($filtro);
    }

}

 ?>