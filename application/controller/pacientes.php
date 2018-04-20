 <?php

class pacientes extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    function __construct(){
        parent::__construct("ModelPaciente");
    }
    public function index()
    {
        $this->cargarVista();
        if ($_SESSION['tipeUser']!=1) {
          echo '<script language = javascript>
          this.location.href="'.URL.'Cuentas/access" 
        </script>';
        }
        $_SESSION['userHome'] = ($this->model->getUrl());

        // load views
        require APP . 'view/home/index.php';
    }


    public function cargarVista()
    {
        /*
        *Iniciamos session de usuario
        */
        session_start();
        // load views
          if ($_SESSION['tipeUser'] != 1) {

            header('location:'.URL.'Cuentas/access');
            exit();

          }else{
            $user = $this->model->cargarPaciente($_SESSION["idUser"],$_SESSION['tipeUser']);
            foreach ($user as $value) {
                $this->model->setId_Paciente($value->id_paciente);
                $this->model->setNombre($value->primer_nombre.' '.$value->segundo_nombre);
                $this->model->setApellido($value->primer_apellido.' '.$value->segundo_apellido);
                $_SESSION['historia'] = $value->id_historia_clinica;
            }
            $_SESSION['userName'] = ("Paciente : ".$this->model->getNombre(). ' ' .$this->model->getApellido());
            $_SESSION['idPaciente'] = $this->model->getId_Paciente();
            $_SESSION['userName'] = ($this->model->getNombre(). ' ' .$this->model->getApellido());
            $_SESSION['userHome'] = ($this->model->getUrl());
            
        }
              $paciente = $this->model->consultarPaciente($_SESSION['idPaciente']);
              foreach ($paciente as $item) 
              {
                    $this->model->setId_Paciente($item->id_paciente);
                    $this->model->setNombre($item->primer_nombre.' '.$item->segundo_nombre);
                    $this->model->setApellido($item->primer_apellido.' '.$item->segundo_apellido);
                    $this->model->setTipo_Documento($item->tdocumento);
                    $this->model->setDocumento($item->documento);
                    $this->model->setGenero($item->genero);
                    $this->model->setTelefono($item->telefono);
                    $this->model->setEscolaridad($item->escolaridad);
                    $this->model->setHistoria($item->historia);
              }
               $_SESSION['historia'] = $this->model->getHistoria();
               $_SESSION['documento'] = $this->model->getDocumento();

    }
}

//             $_SESSION['id_Paciente']= $item->id_paciente;
//             $_SESSION['nombre'] = $item->primer_nombre. ' ' . $item->segundo_nombre;
//             $_SESSION['apellido'] = $item->primer_apellido. ' ' . $item->segundo_apellido;
//             $_SESSION['tipo_Documento'] = $item->tdocumento;
//             $_SESSION['documento'] = $item->documento;
//             $_SESSION['genero'] = $item->genero;
//             $_SESSION['telefono'] = $item->telefono;
//             $_SESSION['escolaridad'] = $item->escolaridad;
//             $_SESSION['historia'] = $item->historia;
