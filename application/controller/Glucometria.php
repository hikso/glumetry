 <?php

/**
 * Class Control
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Glucometria extends Controller
{
     function __construct()
    {
        parent::__construct("modelGlucometria");
    }
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */

    public function index()
    {
        // $this->GenerarPDF();
        $this->cargarVistaPaciente();
        // load views   
        $idB = $this->model->spid($_SESSION['historia']);
        $_SESSION['ficha'] = $idB[0]->idb;
        $_SESSION['idBase'] = $idB[0]->idBase;

        $momentos = $this->model->sp_CargarMomento();

        require APP . 'view/_templates/header.php';
        require APP . 'view/Glucometria/index.php';
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

   public function RegistrarGlucometria()
    {
        session_start();
        $fecha = $_POST["fecha"];
        $antes = $_POST["inputAntes"];
        $observaciones = $_POST["txtComentario"];
        $momento = $_POST["momento"];
        $ficha = $_SESSION["ficha"];
        $despues = $_POST["inputDespues"];
        $this->model->sp_RegistrarGlucometria($fecha, $antes, $observaciones, $momento, $ficha, $despues);

    }

    public function ConsultarMomento()
    {
        $momento = $this->model->sp_CargarMomento();
        echo json_encode($momento);
    }

    public function ConsultarSeguimiento()
    {
        session_start();
        $fecha = $_POST["fecha"];
        $idFicha = $_SESSION["ficha"];
        $Sglucometria = $this->model->sp_consultaSeguimiento($fecha, $idFicha);
        echo json_encode($Sglucometria);
    }

    public function ActualizarGlucometria()
    {
        $idGlucometria = $_POST['SeguimeintoGlucometriaID'];
        $antes = $_POST['inputAntes'];
        $despues = $_POST['inputDespues'];
        $ComentarioD = $_POST['txtComentario'];
        $this->model->ModificarGlucometria($idGlucometria, $despues, $ComentarioD, $antes);
    }

     public function SP_Cargar_NivelGlucometria()
    {
        session_start();
        $idBase = $_SESSION["idBase"];
        $nivelGlucometria = $this->model->SP_Cargar_Niveles($idBase);
        echo json_encode($nivelGlucometria);
    }

    public function CargarMomentoSeguimeinto()
    {
        session_start();
        $fecha = $_POST["fecha"];
        $idFicha = $_SESSION["ficha"];
        $momento = $this->model->sp_CargarMomentoSeguimeinto($fecha, $idFicha);
        echo json_encode($momento);
    }

   public function cargarPdf()
    {
        session_start();
        $_SESSION['fecha'] = $_POST["fecha"];
       
       
    }
    public function GenerarPDF()
    {
        session_start();
        $fecha = $_SESSION["fecha"];
        $idFicha = $_SESSION["ficha"];

        $mostrar_seguimiento = $this->model->sp_consultaSeguimiento($fecha,$idFicha);

        $IdBasee = $_SESSION['idBase'];

        $niveles = $this->model->SP_Cargar_Niveles($IdBasee);

        require('FpdfLibrary/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 10);
     
        $pdf->SetAutoPageBreak(1, 0.5);
       
       //inserto la cabecera poniendo una imagen dentro de una celda
        $pdf->Ln(7);
        $pdf->Cell(150,50,$pdf->Image('../public/img/logoblue.png',25,12,80),0,0,'C');
        $pdf->Cell(40,30,"Fecha: ". date('d/m/Y'),0);
        $pdf->Ln(28);

        $pdf->Cell(30,10);
        $pdf->Line(30,48,190,48);
        $pdf->Ln();

        $pdf->Cell(20,10);
        $pdf->Cell(100,12,utf8_decode("Paciente: ".$_SESSION["userName"]));
        $pdf->Cell(40);
        $pdf->Ln(5);
        $pdf->Cell(20);
        $pdf->Cell(100,12,utf8_decode("Documento: ".$_SESSION['documento']));
        $pdf->Cell(40);
        $pdf->Ln(20);

        // $pdf->cell(10,5,utf8_decode($niveles[1]->Recomendacionrango.' '.$niveles[1]->rangos)); 
        $pdf->Ln(8);

         $pdf->SetFillColor(211,211,211);
         $pdf->Cell(20);
         $pdf->Cell(110,7,utf8_decode('Recomendacion de rangos'),'LTR',0,'C',0);
         $pdf->Cell(50,5,utf8_decode('Rango'),'LTR',0,'C',0);  
         $pdf->Ln();
         $pdf->Cell(20);
         $pdf->Cell(110,7,utf8_decode($niveles[1]->Recomendacionrango.' '.$niveles[1]->rangos),'LR',0,'C',0);
         $pdf->cell(50,7,utf8_decode($niveles[0]->rango .' '.$niveles[0]->tipoRango),'LTR',0,'C',1);  // cell with left and right
         $pdf->Ln();
         $pdf->Cell(20);
         $pdf->Cell(110,5,'','LBR',0,'C',0);
         $pdf->cell(50,5,utf8_decode($niveles[1]->rango.' '.$niveles[1]->tipoRango),'LBR',0,'C',1); 
         // $pdf->cell(25,7,utf8_decode($niveles[1]->tipoRango),'LBR',0,'C',0); 
         // $pdf->cell(25,7,utf8_decode($niveles[0]->tipoRango),'LBR',0,'C',0); 
         $pdf->Ln(10);   
        $pdf->SetFillColor(211,211,211);
        $pdf->Cell(20,50);
        // $pdf->Cell(30,5,' ','LTR',0,'L',0);
        $pdf->Cell(160,10,utf8_decode('Control de glucometría'),1,0,'C',1);
        $pdf->Ln();
         $pdf->Cell(20,50);
         $pdf->cell(25,7,utf8_decode('Fecha'),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(25,7,utf8_decode('Momento'),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(25,7,utf8_decode('Antes'),'LBR',0,'C',0);
         $pdf->cell(25,7,utf8_decode('Después'),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(60,7,utf8_decode('Observación'),'LBR',0,'C',0);  // cell with left and right
         $pdf->Ln(); 

               $pdf->SetFont('Arial', '', 9);
        foreach ($mostrar_seguimiento as $key)
        {
         $pdf->Cell(20,50);
         $pdf->cell(25,7,utf8_decode($key->fecha),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(25,7,utf8_decode($key->momento),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(25,7,utf8_decode($key->antes),'LBR',0,'C',0);
         $pdf->cell(25,7,utf8_decode($key->despues),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(60,7,utf8_decode($key->observaciones),'LBR',0,'C',0);  // cell with left and right
         $pdf->Ln();   
        }

        $pdf->Output();
    }
    public function ValidarMomentoSeguimeinto()
    {
        session_start();
        $momento = $_POST["momento"];
        $fecha = $_POST["fecha"];
        $idFicha = $_SESSION["ficha"];
        $Valimomento = $this->model->SP_Validar_MomentoGlucometria($momento, $fecha, $idFicha);
        echo json_encode($Valimomento);
    }


 }
?>