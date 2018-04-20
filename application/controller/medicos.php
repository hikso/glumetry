 <?php

/**
 * Class medicos
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Medicos extends Controller
{
    public $tipo_usuario;
    public $Rango;
    function __construct(){
        parent::__construct("modelMedico");
    }
    public $msg = "";
    public function index()
    {
        $paciente = $this->model->cargarPacientes();
        $this->cargarVista();
         require APP . 'view/home/homeMedico.php';
    }
    public function AtencionPacientes()
    {
        $paciente = $this->model->cargarPacientes();
        $this->cargarVista();
        if(isset($_GET['msg']))
        {
            $this->msg ="<div class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> El paciente aún no tiene historia clinica.</div>";
        }elseif(isset($_GET['msgNoB'])){
            $this->msg ="<div class='alert'><button class='close' data-dismiss='alert'>×</button><strong>Cuidado!</strong> El paciente aún no tiene base alimentaria asignada.</div>";
        }

         require APP . 'view/home/indexMedico.php';
         require APP . 'view/_templates/footer.php';
    }

    public function cargarVista()
    {
        /*
        *Iniciamos session de usuario
        */
        session_start();
        // load views
          if ($_SESSION['tipeUser'] != 2) {

            header('location:'.URL.'Cuentas/access');
            exit();

          }else{
            $user = $this->model->cargarMedico($_SESSION["idUser"],$_SESSION['tipeUser']);
            
            foreach ($user as $value) {
                $this->model->setId_Medico($value->id_medico);
                $this->model->setNombre($value->primer_nombre.' '.$value->segundo_nombre);
                $this->model->setApellido($value->primer_apellido.' '.$value->segundo_apellido);
            }
            $_SESSION['idmedico'] = ($this->model->getId_Medico());

            $_SESSION['userName'] = ('Dr(a). '.$this->model->getNombre(). ' ' .$this->model->getApellido());
            $_SESSION['userHome'] = ($this->model->getUrl());
        }
    }
    // Glucometrias
    public function consultarGlucometria()
    {
        $this->cargarVista();
        $historia = $_SESSION["historia"];
        $Glucometrias = $this->model->consultarGlucometria($historia);
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/Glucometria/consultarGlucometrias.php';
        require APP . 'view/_templates/footer.php';
    }
    public function consultarRangos($idRango)
    {
        $this->Rango = $this->model->sp_cargar_rangos_Paciente_Medico($idRango);
    }
    //Dosificaciones
    public function consultarDosificacion()
    {
        $this->cargarVista();
        $historia = $_SESSION["historia"];
        $Dosificacion = $this->model->consultarDosificacion($historia);
        require APP . 'view/_templates/header.php';
        require APP . 'view/Glucometria/consultarDosificacion.php';
        require APP . 'view/_templates/footer.php';
    }
    public function cargarVistaPaciente()
    {
        session_start();
        $pacientes = array();
        $array = $_POST["arrayPacientes"];
        foreach ($array as $i=> $value) {
             
         $pacientes[$i] = json_decode($value, true );
        
        }

        $index =0| $_POST["identificador"];

        $paciente = $this->model->cargarPacienteSeleccionado($pacientes[$index]);
        foreach ($paciente as $item) {
            $_SESSION['id_Paciente']= $item->id_paciente;
            $_SESSION['nombre'] = $item->primer_nombre. ' ' . $item->segundo_nombre;
            $_SESSION['apellido'] = $item->primer_apellido. ' ' . $item->segundo_apellido;
            $_SESSION['apellido1'] = $item->primer_apellido;
            $_SESSION['apellido2'] = $item->segundo_apellido;
            $_SESSION['tipo_Documento'] = $item->tdocumento;
            $_SESSION['documento'] = $item->documento;
            $_SESSION['genero'] = $item->genero;
            $_SESSION['telefono'] = $item->telefono;
            $_SESSION['escolaridad'] = $item->escolaridad;
            $_SESSION['ocupacion'] = $item->ocupacion;
            $_SESSION['municipio'] = $item->municipio;
            $_SESSION['historia'] = $item->historia;
            $_SESSION['edad'] = $item->edad;
        }

    }
    public function perfilPaciente()
    {
        session_start();
        if(isset($_SESSION["tipeUser"])){
            if ($_SESSION['historia'] != 0) {
            
            // load views
            if ($_SESSION['tipeUser'] != 2 ) {

                header('location:'.URL.'Cuentas/access');
                exit();
            }else{

            require APP . 'view/_templates/header.php';
            require APP . 'view/medicos/perfilPaciente_Medico.php';
            require APP . 'view/_templates/footer.php';
            }
        }else{
            require_once('historia_Clinica.php');
            $HC = new historia_Clinica();
            $HC->historialClinico();

        }
        }else{
            header('location:'.URL.'Cuentas/access');
            exit();
        }
    }
}