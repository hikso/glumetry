<?php
/*
 * 
 */
class Admin extends Controller
{
    function __construct(){
        parent::__construct("modelAdmin");
    }
    
    public function indexAdmin()
    {
        $this->cargarVista();
        // load views
        require APP . 'view/home/indexAdmin.php';
    }

    public function cargarVista()
    {
        /*
        *Iniciamos session de usuario
        */
        session_start();
        // load views
          if (isset($_SESSION['tipeUser'])!=3) {

            header('location:'.URL.'Cuentas/access');
            exit();

          }else{
            
            $user = $this->model->cargarAdmin($_SESSION["idUser"],$_SESSION['tipeUser']);
            $_SESSION['userHome'] = ($this->model->getUrl());
            
            foreach ($user as $value) {

                $_SESSION['userName'] = ($value->correo_electronico);

            }   
        }
    }
}
