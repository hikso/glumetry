<?php
public function AcercaDeAdmin()
    {
        // $base_alimentaria = $this->model->SP_CargarBaseAlimentaria();
        // $templateBase = $this->CargarBaseAlimentaria($base_alimentaria);
        // $this->cargarVistaPaciente();
        // $clasificacion = $this->model->SP_CargarClasificacion();
        // $momento = $this->model->SP_CargarMomento();
        // $Base_alimentariafecha = $this->model->SP_CargarBaseAlimentariaFecha($_SESSION['historia']);

        require APP . 'view/_templates/header.php';
        require APP . 'view/AcercadeAdm/AcercadeAdm.php';
        require APP . 'view/_templates/footer.php';
    }

?>