 <?php

/**
 * Class Plato
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Plato extends Controller
{
    function __construct(){
        parent::__construct("modelPlato");
    }
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function indexPaciente()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/plato/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function indexMedico()
    {
        session_start();
        $categorias = $this->model->cargarCategorias();
        
        // load views
        require APP . 'view/_templates/header_Medico.php';
        require APP . 'view/plato/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function cargarAlimentos()
    { 
        $alimentos = $this->model->cargarAlimentos($_POST['idClasificacion']);
        foreach ($alimentos as $item) {
            echo "<option value='$item->id_Alimentos'>$item->alimentos</option>";
        }    
    }
    public function cargarAlimento()
    { 
        $alimento = $this->model->cargarAlimento($_POST['idAlimento']);
        
        echo json_encode($alimento);
    }
    public function seleccionarAlimento()
    {
        $alimento = $this->model->cargarAlimentos($_POST['idClasificacion']);
        echo $alimento->id_Alimentos;
    }
    public function calcularCHO()
    {  

        $cho = floatval($this->model->getTotalCho()) + floatval($_POST['carbohidratos']);

        $this->model->setTotalCho();
        echo $this->model->getTotalCho();
    }
}