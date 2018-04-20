 <?php

class dosificacion extends Controller
{
     function __construct()
    {
        parent::__construct("modelDosificacion");
    }
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {

        $this->cargarVistaPaciente();
        $id = $this->model->IDFicha($_SESSION['historia']);
        $_SESSION['ficha'] = $id[0]->idb;
        $_SESSION['idBase'] = $id[0]->idBase;

        $dosificacion = $this->model->sp_CargarTipoDosificacion();
        require APP . 'view/_templates/header.php';
        require APP . 'view/Dosificacion/index.php';
        require APP . 'view/_templates/footer.php';
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
    public function RegistroDosificacion()
    {
        session_start();
        $fecha = $_POST['fechaDosificacion'];
        $dosis = $_POST['dosis'];
        $observaciones = $_POST['txtComentarioDosificacion'];
        $idFicha = $_POST['id'];
        $tipoDosificacion = $_POST['tipoDosificacion'];
        $this->model->RegistrarDosificacion($fecha, $dosis, $observaciones, $_SESSION['ficha'], $tipoDosificacion);
    }

    public function ConsultarDosificacion()
    { 
        session_start();
        $fecha = $_POST["fechaDosificacion"];
        $idFicha = $_POST['id'];
        $dosificacion = $this->model->sp_consultaDosificacion($fecha, $_SESSION['ficha']);
        echo json_encode($dosificacion);
    }
}