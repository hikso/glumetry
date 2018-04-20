 <?php

/**
 * Class alimentos
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class alimentos extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        $this->cargarVista();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/alimentos/indexAdmin.php';
        require APP . 'view/_templates/footer.php';
    }

    public function RegistrarAlimentos()
    {
        $alimentos = $_POST['txtNombreAlimentos'];
        $carbohidratos = $_POST['txtCarbohidratosAlimentos'];
        $caloria = $_POST['txtCaloriaAlimento'];
        $proteinas = $_POST['txtProteinasAlimento'];
        $grasas = $_POST['txtGrasaAlimento'];
        if($this->model->RegistrarAlimentos($_POST['txtNombreAlimentos'], $_POST['txtCarbohidratosAlimentos'], $_POST['txtCaloriaAlimento'], $_POST['txtProteinasAlimento'], $_POST['txtGrasaAlimento']))
        {
           echo  "exito";
        }
    }

    public function cargarVista()
    {
        session_start();

        // load views
          if (isset($_SESSION['tipeUser'])) {
            if ($_SESSION['tipeUser'] !=3) {
                
                header('location:'.URL.'Cuentas/access');
                exit();
            }

          }
    }
}