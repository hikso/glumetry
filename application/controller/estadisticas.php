<?php 
/**
* 
*/
	class estadisticas extends Controller
	{
        function __construct(){
	        parent::__construct("modelEstadisticas");
	    }
	    public $hipoglicemias = 0;
	    public $hiperglicemias = 0;
	    public $normal = 0;
	    public $meses = "";
	    public $promAntes = "";
	    public $promDespues = "";
	    public $contarBarras = 0;
	    public $promBarras;
		public function estadisticasPaciente()
		{
        	$this->cargarVistaPaciente();
        	$glucometrias = $this->model->sp_Estadisticas_glucometrias_Paciente($_SESSION['historia']);
        	$rangosPaciente = $this->model->sp_cargar_rangos_Paciente($_SESSION['historia']);

        	$this->calculoGlicemia($glucometrias, $rangosPaciente);

        	$promedioBarras = $this->model->sp_estadisticas_barras_paciente($_SESSION['historia'], date('Y').'/01/01',date('Y').'/12/01');
        	$this->promBarras = $promedioBarras;
        	foreach ($promedioBarras as $key) {
        		$this->meses .= "'".ucfirst($key->Fecha)."'".",";
        		$intPromAntes =0| $key->promAntes;
        		$intPromDespues =0| $key->promDespues;
        		$this->promAntes .= round($intPromAntes,2).",";
        		$this->promDespues .= round($intPromDespues,2).",";
        		$this->contarBarras ++;
        	}
	        require APP . 'view/_templates/header.php';
	        require APP . 'view/estadisticas/estadisticas-Paciente.php';
	        require APP . 'view/_templates/footer.php';
		}
		public function calculoGlicemia($glucometrias, $rangosPaciente)
		{
			$aplicaMax = FALSE;
        	$aplicaMen = FALSE;
        	foreach ($rangosPaciente as $key) {
        		    list($minus, $max) = mb_split("-", $key->descripcion);
        		    $minus = trim($minus);
        			$max  = trim($max);

        		    if ($minus == "<") {
						$aplicaMen = TRUE;
						$aplicaMax = FALSE;
        		    }elseif ($minus == ">") {
						$aplicaMen = FALSE;
						$aplicaMax = TRUE;
        		    }

        			$minus  =0| trim($minus);
        			$max  =0| trim($max);

        		if ($key->aplica_A_D == 1) {
        			if ($aplicaMen) {
	        			foreach ($glucometrias as $value) {
	        				if ($value->antes < $max) {
	        					$this->normal ++;
	        				}else
	        				{
	        					$this->hiperglicemias ++;
	        				}
	        			}
        			}elseif ($aplicaMax) {
	        			foreach ($glucometrias as $value) {
	        				if ($value->antes > $max) {
	        					$this->normal ++;
	        				}else
	        				{
	        					$this->hipoglicemias ++;
	        				}
	        			}
        			}else{
	        			foreach ($glucometrias as $value) {
	        				if ($value->antes < $minus) {
	        					$this->hipoglicemias ++;
	        				}elseif ($value->antes > $minus && $value->antes < $max) {
	        					$this->normal ++;
	        				}else{
	        					$this->hiperglicemias ++;
	        				}
	        			}
	        		}
        		}else
        		{
        			if ($aplicaMen) {
	        			foreach ($glucometrias as $value) {
	        				if ($value->despues < $max) {
	        					$this->normal ++;
	        				}else
	        				{
	        					$this->hiperglicemias ++;
	        				}
	        			}
        			}elseif ($aplicaMax) {
	        			foreach ($glucometrias as $value) {
	        				if ($value->despues > $max) {
	        					$this->normal ++;
	        				}else
	        				{
	        					$this->hipoglicemias ++;
	        				}
	        			}
        			}else{
	        			foreach ($glucometrias as $value) {
	        				if ($value->despues < $minus) {
	        					$this->hipoglicemias ++;
	        				}elseif ($value->despues > $minus && $value->despues < $max) {
	        					$this->normal ++;
	        				}else{
	        					$this->hiperglicemias ++;
	        				}
	        			}
        			}
        		}
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
	}
 ?>