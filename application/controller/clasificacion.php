 <?php

/**
 * Class clasificacion
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class clasificacion extends Controller
{
   function __construct(){
        parent::__construct("modelClasificacion");
    }
    public function index()
    {
        // load views
        $clasificacion = $this->model->ListarClasificacion();
        require APP . 'view/_templates/header_Admin.php';
        require APP . 'view/clasificacion/indexAdmin.php';
        require APP . 'view/_templates/footer.php';
    }
    public function RegistrarClasificacion()
    {
        $clasificacion = $_POST['txtclasificacion'];
        if($this->model->RegistrarClasificacion($_POST['txtclasificacion']))
            {
                echo "Exito";
            }
        // header('location: ' . URL . 'clasificacion/index');
    }

}
