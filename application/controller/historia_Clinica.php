<?php 

	/**
	* 
	*/
	class historia_Clinica extends Controller
	{

		function __construct()
		{
			parent::__construct("modelHistoriaClinica");
		}
		public function CargarVista()
		{
			session_start(); 
			if (isset($_SESSION['tipeUser']) !=2) {
				header('location:'.URL.'Cuentas/access');
				exit();
			} 
		}
		public $arrayfrecuencia = "";
		public $arrayParte = "";
		public $clasi_ante_Paciente = "";
		public $arraysintomas_Paciente = "";
		public $array_aparato_paciente  ="";
		public $txtareas = NULL;
		public $LastVisita = NULL;
		public function historialesClinicos()
		{
			$visitas_Historias = NULL;
			if (!isset($_SESSION)) {
				$this->CargarVista();
			}
			if (isset($_SESSION['historia']))
			{ 
				if($_SESSION['historia'] != 0) {
					$visitas_Historias = $this->model->sp_cargar_visitas_paciente($_SESSION['historia']);
				}
			}
			if ($visitas_Historias) {
				require APP. 'view/_templates/header.php';
				require APP. 'view/historialClinico/consultarHCPaciente.php';
				require APP. 'view/_templates/footer.php';
			}else{
				header("Location: ".URL."medicos/AtencionPacientes");
			}
		}
		public function descargarPdf()
		{
			ignore_user_abort(true);
	set_time_limit(0); // disable the time limit for this script

	$path = "C:/xampp/htdocs/fruper_glumetry/mini-glmtry/application/historias/"; // change the path to fit your websites document structure
	$dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_GET['download_file']); // simple file name validation
	$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
	$fullPath = $path.$dl_file;

	if ($fd = fopen ($fullPath, "r")) {
		$fsize = filesize($fullPath);
		$path_parts = pathinfo($fullPath);
		$ext = strtolower($path_parts["extension"]);
		switch ($ext) {
			case "pdf":
			header("Content-type: application/pdf");
	        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
	        break;
	        // add more headers for other content types here
	        default;
	        header("Content-type: application/octet-stream");
	        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
	        break;
	    }
	    header("Content-length: $fsize");
	    header("Cache-control: private"); //use this to open files directly
	    while(!feof($fd)) {
	    	$buffer = fread($fd, 2048);
	    	echo $buffer;
	    }
	}
	fclose ($fd);
	exit;

}

public function historialClinico()
{
	if (!isset($_SESSION)) {
		$this->CargarVista();
	}
	$msg = ($_SESSION['historia'] == 0) ? "<div class='alert alert-info'><button class='close' data-dismiss='alert'>×</button><strong>Información! </strong> Dr(a). Debe registrar la historia clinica Por primera vez para poder acceder a los otros modulos.</div>" : "" ;
	$mostrar_gineco = $this->model->SP_Mostrar_gineco($_SESSION['id_Paciente']);
	$heredo = $this->model->sp_mostrar_heredo();


	

	$heredo = $this->model->sp_mostrar_heredo();
	$tipoAnte = $this ->model->sp_MostrarTipoAnte(); 
	$habitos = $this->model->sp_mostrar_habitosp();
	$nopato = $this->model->sp_mostrar_nopato();
	$sintomas = $this->model->sp_mostrar_sintomas_g();
	$aparto_sistema = $this->model->sp_mostrar_aparatosistema();
	$partes = $this->model->sp_mostrar_partescuerpo();
	$clase_pc= $this->model->sp_mostrar_clase_pc();
	$estado_clase_cp = $this->model->sp_mostrar_estado_clasePc();
	$parentesco = $this->model->sp_mostrar_parentesco();
	$this->txtareas = $this->model->cargartextareashc($_SESSION['historia']);
	$datosgineco = $this->model->sp_cargar_datosgineco($_SESSION['historia']);
	$hora = $this->model->hora();


	$templateheredo = $this->cargarHeredo($heredo,$tipoAnte,$habitos,$nopato,$parentesco);
	
	$templateundientexd = $this->cargarsintomas($sintomas);

	$template_aparato_s = $this->cargaraparatos($aparto_sistema);

	$template_una_parte = $this->cargarpartes($partes,$clase_pc,$estado_clase_cp);
	require APP. 'view/_templates/header.php';
	require APP. 'view/historialClinico/index.php';
	require APP. 'view/_templates/footer.php';
}

public function cargarHeredo($heredo,$tipoAnte,$habitos,$nopato,$parentesco){
	$templateheredo = null;
	//Consulta Hc Por Paciente 
	$antecedentes_Paciente  = $this->model->sp_cargar_vista_antecedentes_historia($_SESSION['historia']);
	$nopato_Paciente  = $this->model->sp_cargar_vista_nopato($_SESSION['historia']);
	
	$keysnopato_Paciente = array();
	$keysAntecedentes_Paciente = array();
	$keysParentesco = array();
	$keysDescAntePaciente = array();

	foreach ($nopato_Paciente as $key) {
		array_push($keysnopato_Paciente, $key->id_frecuencia);
	}

	foreach ($antecedentes_Paciente as $key ) {
		array_push($keysAntecedentes_Paciente, $key->id_clasificacion_antecedente);
	}

	foreach ($antecedentes_Paciente as $key) {
		array_push($keysParentesco, array($key->id_clasificacion_antecedente=>$key->parentesco));
	}
	foreach ($antecedentes_Paciente as $key) {
		array_push($keysDescAntePaciente, array($key->id_clasificacion_antecedente=>$key->personalespato));
	}
	$yolo= null;

	foreach ($parentesco as $parentescos) {
		$yolo .="<option value='$parentescos->id_parentesco'> $parentescos->parent</option>";   

	}

	foreach ($tipoAnte as  $cabezera) {
		$templateheredo .= "<tr>
		<td>
			<h4><strong>$cabezera->descripcion</strong></h4>
		</td>
	</tr>

	<ul class='breadcrumb'></ul>";
	foreach ($heredo as  $abajo) {


		if($abajo->id_tipo_antecedente == $cabezera->id_tipo_antecedente && $abajo->id_tipo_antecedente <> 2 && $abajo->id_tipo_antecedente <> 3){
			$pos = 5;
			if ($antecedentes_Paciente == null) {
				$templateheredo .= "<div class='input-append'>
				<span class='add-on'> $abajo->heredo <input name = 'yolo' value='$abajo->id_clasificacion_antecedentecol' type='checkbox' ></span>
				<select class='input-medium m-wrap' tabindex='1' id='$abajo->id_clasificacion_antecedentecol' style='display:none;'>
					<option value=''> ---selecione--- </option>
					".$yolo."
				</select>
			</div>";
		}else{
			if (in_array($abajo->id_clasificacion_antecedentecol, $keysAntecedentes_Paciente)) {
				$parentescoPaciente = "";
				foreach ($keysParentesco as $key) {
					foreach ($key as $value => $str) {

						if ($value == $abajo->id_clasificacion_antecedentecol)
						{
							$parentescoPaciente = $str;
						}	
					}
				}
				$templateheredo .= "<div class='input-append'>
				<span class='add-on'> $abajo->heredo <input name = 'yolo' value='$abajo->id_clasificacion_antecedentecol' type='checkbox' disabled='disabled' checked='checked' ></span>
				<select disabled='disabled' class='input-medium m-wrap' tabindex='1' id='$abajo->id_clasificacion_antecedentecol' style='display:inline;'>
					<option value=''>".$parentescoPaciente." </option>

				</select>
			</div>";
		}else{
			$templateheredo .= "<div class='input-append'>
			<span class='add-on'> $abajo->heredo <input name = 'yolo' value='$abajo->id_clasificacion_antecedentecol' type='checkbox' ></span>
			<select class='input-medium m-wrap' tabindex='1' id='$abajo->id_clasificacion_antecedentecol' style='display:none;'>
				<option value=''> ---selecione--- </option>
				".$yolo."
			</select>
		</div>";
	}


}

}

if ($abajo->id_tipo_antecedente == 2 && $abajo->id_tipo_antecedente == $cabezera->id_tipo_antecedente){
	if ($antecedentes_Paciente == null) {
		$templateheredo .= "
		<div class='input-append'>
			<span class='add-on'> $abajo->heredo <input name='yolo' value='$abajo->id_clasificacion_antecedentecol' type='checkbox'></span>
			<input type='text' disabled name='yolo' id='$abajo->id_clasificacion_antecedentecol' />
		</div>";
	}else{

		if (in_array($abajo->id_clasificacion_antecedentecol, $keysAntecedentes_Paciente)) {
			$descripcionAnte = "";
			foreach ($keysDescAntePaciente as $key) {
				foreach ($key as $value => $str) {

					if ($value == $abajo->id_clasificacion_antecedentecol)
					{
						$descripcionAnte = $str;
					}	
				}
			}
			$templateheredo .= "
			<div class='input-append'>
				<span class='add-on'> $abajo->heredo <input name='yolo'  value='$abajo->id_clasificacion_antecedentecol' type='checkbox' checked='checked' disabled='disabled'></span>
				<input type='text' maxlength='45' name='yolo' id='$abajo->id_clasificacion_antecedentecol' value='$descripcionAnte'/>
			</div>";
			$this->clasi_ante_Paciente .= "{'id_clasi' : $abajo->id_clasificacion_antecedentecol , 'descripcion_clasi' : '$descripcionAnte', 'id_parentesco' : ''},";

		}else{
			$templateheredo .= "
			<div class='input-append'>
				<span class='add-on'> $abajo->heredo <input name='yolo'  value='$abajo->id_clasificacion_antecedentecol' type='checkbox'></span>
				<input type='text' maxlength='45' disabled name='yolo' id='$abajo->id_clasificacion_antecedentecol' />
			</div>";
		}
	}


}

}
$ValFrecu = TRUE; 
if ($cabezera->id_tipo_antecedente == 3){	

	foreach ($habitos as  $habi) {

		$templateheredo .= "
		<div class='input-append'>
			<span class='add-on'> $habi->descripcion </span>

		</div>" ;

		foreach ($nopato as $nopatolo) {

			if ($nopatolo->fore_in_frecu == $habi->id_habitos_personales) {

				if (in_array($nopatolo->id_frecuencia, $keysnopato_Paciente)) {
					$templateheredo .="
					<input type='radio' checked='checked' name ='$habi->id_habitos_personales' id='$nopatolo->id_frecuencia' class'add-on'> $nopatolo->frecuencia 

					";
					$this->arrayfrecuencia .= "{'id_nopato': $habi->id_habitos_personales, 'id_frecuencia': '$nopatolo->id_frecuencia'},";
					$ValFrecu = FALSE;
				}else{
					$templateheredo .="
					<input type='radio' name ='$habi->id_habitos_personales' id='$nopatolo->id_frecuencia' class'add-on'> $nopatolo->frecuencia 

					";
				}
			}
		}

		if ($ValFrecu) {	
			$this->arrayfrecuencia .= "{'id_nopato': $habi->id_habitos_personales, 'id_frecuencia': ''},";
		}
		$ValFrecu = TRUE;
	}


}  
}


return $templateheredo;

}



public function cargarsintomas($sintomas){

	$templateundientexd = null;
	$Sintomas_Paciente = $this->model->sp_cargar_vista_sintomas($_SESSION['historia']);

		if ($Sintomas_Paciente == null) {
		foreach ($sintomas as $huev) {

			$templateundientexd .= "
			<div class='input-append'>
				<span class='add-on'> $huev->descripcion <input type='checkbox' name ='sintomasg' value='$huev->id_sintomas_g' ></span>

			</div>
			";
			}
		}else{
			  
			foreach ($sintomas as $huev) {

			foreach ($Sintomas_Paciente as $key ) {
				if ($key->id_sintomas_generales == $huev->id_sintomas_g) {
					$templateundientexd .= "
					<div class='input-append'>
						<span class='add-on'> $huev->descripcion <input type='checkbox' checked='checked' name ='sintomasg' value='$huev->id_sintomas_g' ></span>

					</div>
					";
					$this->arraysintomas_Paciente .= "{id_sintomas:'$huev->id_sintomas_g'},";
					break;
				}else{
					$templateundientexd .= "
					<div class='input-append'>
						<span class='add-on'> $huev->descripcion <input type='checkbox' name ='sintomasg' value='$huev->id_sintomas_g' ></span>

					</div>
					";
					break;
				}
			}
		  }
		}
	return $templateundientexd;

}
public function stdToArray($obj){
	$reaged = (array)$obj;
	foreach($reaged as $key => &$field){
		if(is_object($field))$field = $this->stdToArray($field);
	}
	return $reaged;
}
public function cargaraparatos($aparto_sistema){
	$template_aparato_s = null;
	$aparato_Paciente = $this->model->sp_cargar_vista_aparato($_SESSION['historia']);
	$keysAparato_Paciente = array();
	$obj = $this->stdToArray($aparato_Paciente);
	foreach ($aparato_Paciente as $val) {
		array_push($keysAparato_Paciente, $val->id_aparato_sistema);
	}
	$key = array_column($obj,'aparato_dscrpcn','id_aparato_sistema');


	foreach ($aparto_sistema as  $aparato) {
		if (in_array($aparato->id_aparato_sistema,$keysAparato_Paciente)) {
			$template_aparato_s.="
			<thead>
				<tr>
					<td class='buvis'>
						$aparato->nombre_aparato: 
						<br>
						<pre>$aparato->descripcion</pre > 
						</td>
						<td class='buvis'> 
							<div class='input-append'>
								<span class='add-on'> <input type='checkbox' checked='checked' name='aparatete' id = '$aparato->id_aparato_sistema'>  Datos Patologicos</span>

							</div>
							<div>
								<textarea name='aparatete' maxlength='45' rows = '5' class = 'span12' id = '$aparato->id_aparato_sistema'>".$key[$aparato->id_aparato_sistema]."</textarea>
							</div>
						</td>
					</tr>
				</thead>
				";
				$this->array_aparato_paciente .= "{'id_aparato' : $aparato->id_aparato_sistema , 'descripcion_aparato' : '".$key[$aparato->id_aparato_sistema]."'},";
			}else{	
				$template_aparato_s.="
				<thead>
					<tr>
						<td class='buvis'>
							$aparato->nombre_aparato: 
							<br>
							<pre>$aparato->descripcion</pre > 
							</td>
							<td class='buvis'> 
								<div class='input-append'>
									<span class='add-on'> <input type='checkbox' name='aparatete' id = '$aparato->id_aparato_sistema'>  Datos Patologicos</span>

								</div>
								<div>
									<textarea style= 'display:none' maxlength='45' name='aparatete' rows = '5' class = 'span12' id = '$aparato->id_aparato_sistema'></textarea>
								</div>
							</td>
						</tr>
					</thead>
					"; 
				}

			}

			return $template_aparato_s;

		}

		public function cargarpartes($partes,$clase_pc,$estado_clase_cp){

			$template_una_parte = null;
			$hue = null;
			$clase_parteC_Paciente = $this->model->sp_cargar_vista_partedelcuerpo($_SESSION['historia']);
			$keysClase_parteC_Paciente = array();
			foreach ($clase_parteC_Paciente as $key) {
				array_push($keysClase_parteC_Paciente, $key->id_estado);
			}
			foreach ($partes as $cuerpaso) {


				$template_una_parte .= "
				<tr>
					<td>
						<h4><strong> $cuerpaso->partecuerpo </strong></h4>
					</td>
				</tr>
				<ul class='breadcrumb'></ul>

				";

				foreach ($clase_pc as $clase_parteC) {
					if ($clase_parteC->id_parte_cuerpo == $cuerpaso->id_parte_cuerpo) {

						$template_una_parte .="
						<div class='input-append'>
							<span class='add-on'> $clase_parteC->ClaseparteCuerpo </span>

						</div>
						";
						$open = TRUE;

						foreach ($estado_clase_cp as $estado_cpc) {

							if ($estado_cpc->id_clase_parte_cuerpo == $clase_parteC->id_clase_parte_cuerpo) {
								if(in_array($estado_cpc->id_estado, $keysClase_parteC_Paciente)){

									$template_una_parte .="

									<input name = '$clase_parteC->id_clase_parte_cuerpo' checked='checked' type = 'radio' id='$estado_cpc->id_estado' >$estado_cpc->estado/
									";
									$this->arrayParte .= "{'id_parte' : '$clase_parteC->id_clase_parte_cuerpo','id_estadopc': '$estado_cpc->id_estado'},";
									$open = FALSE;

								}else{

									$template_una_parte .="

									<input name = '$clase_parteC->id_clase_parte_cuerpo' type = 'radio' id='$estado_cpc->id_estado' >$estado_cpc->estado/
									";

								}
							}
						}
						if ($open) {
							$this->arrayParte .= "{'id_parte' : '$clase_parteC->id_clase_parte_cuerpo','id_estadopc': ''},";
							$open = FALSE;
						}
					}


				}
			}
			return $template_una_parte;

		}

		public function guardar_historiac()
		{
			session_start();
			if($_SESSION['historia'] == null || $_SESSION['historia'] == "" || $_SESSION['historia'] == "0"){
				$idHC = $this->model->sp_guardar_hc($_POST["txtpadecimiento"],$_POST["txtimpresion"],$_POST["txttratamiento"],$_SESSION['id_Paciente'],$_SESSION['historia']); 
				$_SESSION['historia'] = $idHC[0]->id_historia_clinica;
				echo $_SESSION['historia'];
			}else{
				
			 	$this->model->sp_actualizar_txt($_POST["txtimpresion"],$_POST["txttratamiento"],$_POST["txtpadecimiento"],$_SESSION['historia']);
			}


			$rst = $this->model->sp_guardar_visita($_POST["txtobservacionv"],$_SESSION['idmedico'],$_SESSION['historia']);
			$_SESSION["idvisita"] = $rst[0]->id_visita;

		}


	public function guardar_historia_elresto()
	{


		session_start();

		if (isset($_POST["clasi_ante"])) {
			$jsonclasi = $_POST["clasi_ante"];
			$json = json_decode(json_encode($jsonclasi), TRUE );
			$this->model->sp_guardar_antecedentes($json,$_SESSION['historia']);
		}


		if (isset($_POST["arrayfrecuencia"])) 
		{
			$jsonarrayfrecu = $_POST["arrayfrecuencia"];
			$jsonfrecu = json_decode(json_encode($jsonarrayfrecu), TRUE);
			foreach ($jsonfrecu as $i => $value) {

				if($value['id_frecuencia'] == "") { 

					unset($jsonfrecu[$i]); 
				} 

			}

			$this->model->sp_guardar_no_patologicos($jsonfrecu,$_SESSION['historia']);
		}
		if (isset($_POST["arraysintomas"])) {

			$jsonarraysintonmas = $_POST["arraysintomas"];
			$jsonsinto = json_decode(json_encode($jsonarraysintonmas), TRUE);

			$this->model->sp_guardar_sintomas($jsonsinto,$_SESSION['historia']);
		}else{	
			$this->model->sp_guardar_sintomas(NULL,$_SESSION['historia']);
		}
		if (isset($_POST["arrayaparato"])) {
			$jsonarrayaparato = $_POST["arrayaparato"];
			$jsonaparato = json_decode(json_encode($jsonarrayaparato), TRUE);
			$this->model->sp_guardar_aparato_sistema($jsonaparato,$_SESSION['historia']);
		}

		if (isset($_POST["arrayParte"])) {
			$jsonarraparte = $_POST["arrayParte"];
			$jsonaparato = json_decode(json_encode($jsonarraparte), TRUE);

			foreach ($jsonaparato as $i => $value) {

				if($value['id_estadopc'] == "") { 

					unset($jsonaparato[$i]); 
				} 

			}
			$this->model->sp_guardar_parte_cuerpo($jsonaparato,$_SESSION['historia']);
		}
		$mostrar_gineco = $this->model->SP_Mostrar_gineco($_SESSION['id_Paciente']);
		foreach ($mostrar_gineco as $value){if ($value->aplica_gineco != 0){
			$this->model->sp_guardar_gineco($_SESSION['historia'],$_POST['txtnumparejas'],$_POST['element1'],$_POST['txtritmo'],$_POST['txtrea'],$_POST['txtivsa'],$_POST['txtclimaterio'],$_POST['g'],$_POST['a'],$_POST['p'],$_POST['c'],$_POST['element2'],$_POST['element3'],$_POST['element4'],$_POST['txtplanificacion'],$_POST['element5'],$_POST['element6']);
			}
			}	
	}

	public function GenerarPdfHc(){
		session_start();
		require('FpdfLibrary/fpdf.php');

		$antecedentes_Paciente  = $this->model->sp_cargar_vista_antecedentes_historia($_SESSION['historia']);
		$nopato_Paciente  = $this->model->sp_cargar_vista_nopato($_SESSION['historia']);
		$Sintomas_Paciente = $this->model->sp_cargar_vista_sintomas($_SESSION['historia']);
		$aparato_Paciente = $this->model->sp_cargar_vista_aparato($_SESSION['historia']);
		$clase_parteC_Paciente = $this->model->sp_cargar_vista_partedelcuerpo($_SESSION['historia']);
		$clase_pc= $this->model->sp_mostrar_clase_pc();
		$partes = $this->model->sp_mostrar_partescuerpo();
		$this->txtareas = $this->model->cargartextareashc($_SESSION['historia']);
		$clase_parteC_Paciente = $this->model->sp_cargar_vista_partedelcuerpo($_SESSION['historia']);
		$datosgineco = $this->model->sp_cargar_datosgineco($_SESSION['historia']);


		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 11);
		$pdf->SetFillColor(211,211,211);
		$pdf->SetAutoPageBreak(1, 0.5);

	//inserto la cabecera poniendo una imagen dentro de una celda
		$pdf->Ln(7);
		$pdf->Cell(150,50,$pdf->Image('../public/img/logoblue.png',25,12,80),0,0,'C');
		$pdf->Cell(40,30,"Fecha: ". date('d/m/Y'),0);
		$pdf->Ln(35);
	// $pdf->Ln();
	// $pdf->Ln();
	// $pdf->Ln();
		$pdf->Cell(20,50);
		$pdf->Cell(100,12,utf8_decode("Paciente: ".$_SESSION["nombre"]. ' ' . $_SESSION['apellido']));
		$pdf->Cell(40);
	// $pdf->Cell(40,10,"Fecha: ". date('d/m/Y'),1);
		$pdf->Ln(7);
		$pdf->Cell(20,50);
		$pdf->Cell(100,12,"Documento: ".$_SESSION['documento'] );
		$pdf->Ln(7);
		$pdf->Cell(20,50);
		$pdf->Cell(100,12,utf8_decode("Médico responsable: ". $_SESSION['userName']));

		$pdf->Line(35,48,190,48);
		$pdf->Ln();
		$pdf->Line(35,90,190,90);
		$pdf->Cell(45,50);
		$pdf->Cell(100,50,'HISTORIAL CLINICO','',0,'C',0);

		$pdf->Ln(15);
		$pdf->Cell(25,50);
		$pdf->Cell(100,50,"ANTECEDENTES : ");
		$pdf->Ln(9);
		$pdf->Ln(7);
		$pdf->Ln(7);

		foreach ($antecedentes_Paciente as $key) {
	# code...
			$pdf->Ln(7);

			$pdf->Cell(20,50);
	$pdf->Cell(65,5,' ','LTR',0,'L',0);   // empty cell with left,top, and right borders
	$pdf->Cell(90,5,'PADECIMIENTO',1,0,'C',1);

	$pdf->Ln();
	if ($key->id_tipo_antecedente == 1) {
		$pdf->Cell(20,50);
	$pdf->cell(65,5,utf8_decode($key->clasi_ante),'LR',0,'C',0);  // cell with left and right borders
	$pdf->Cell(40,8,'Parentesco','',0);
	$pdf->Cell(50,5,$key->parentesco,'R',0,'L',0);

	$pdf->Ln();
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,'','LBR',0,'L',0);   
	$pdf->Cell(90,5,'','LBR',0,'L',0); 
}else{
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,$key->clasi_ante,'LR',0,'C',0);
	$pdf->Cell(90,5,$key->personalespato,'LR',0,'C',0);

	$pdf->Ln();
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,'','LBR',0,'L',0);   
	$pdf->Cell(90,5,'','LBR',0,'L',0); 

}
} 	      
$pdf->Ln(1);
$pdf->Cell(20,50);
$pdf->Cell(100,50,"No Patologicos : ");
$pdf->Ln(9);
$pdf->Ln(7);
$pdf->Ln(7);
foreach ($nopato_Paciente as $key ) {
	$pdf->Ln(7);
	$pdf->Cell(20,50);

	$pdf->Cell(65,5,' ','LTR',0,'L',0); 
	$pdf->Cell(90,5,'PADECIMIENTO',1,0,'C',1);

	$pdf->Ln();
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,utf8_decode($key->habitos),'LR',0,'C',1);
	$pdf->Cell(90,5,'Frecuencia: '.utf8_decode($key->frecuencia),'LR',0,'C',0);

	$pdf->Ln();
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
	$pdf->Cell(90,5,'','LBR',0,'L',0);
}

		$pdf->Ln(20);
		$pdf->SetFillColor(211,211,211);
		$pdf->Cell(20,50);
        $pdf->Cell(160,10,utf8_decode('GinecoObstetricos'),1,0,'C',1);
        $pdf->Ln();
         $pdf->Cell(20,50);
         $pdf->cell(25,7,utf8_decode('Menarca'),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(25,7,utf8_decode('Rit.Mestrual'),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(25,7,utf8_decode('IVSA'),'LBR',0,'C',0);
         $pdf->cell(25,7,utf8_decode('Dismenorrea'),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(30,7,utf8_decode('NºParejas'),'LBR',0,'C',0);  // cell with left and right
          $pdf->cell(30,7,utf8_decode('Gestas'),'LBR',0,'C',0);  // cell with left and right
         $pdf->Ln(); 

         $pdf->SetFont('Arial', '', 9);
         foreach ($datosgineco as $key) {

               
         $pdf->Cell(20,50);
         $pdf->cell(25,7,utf8_decode($key->menarca),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(25,7,utf8_decode($key->ritmo_mestrual),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(25,7,utf8_decode($key->inicio_vida_sexual_a),'LBR',0,'C',0);
         $pdf->cell(25,7,utf8_decode($key->dismenorrea),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(30,7,utf8_decode($key->numero_parejas),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(30,7,utf8_decode($key->g),'LBR',0,'C',0);  // cell with left and right
         $pdf->Ln();   

         $pdf->Ln();
         $pdf->SetFillColor(211,211,211);
		 $pdf->Cell(20,5);
         // $pdf->Cell(160,10,utf8_decode('GinecoObstetricos'),1,0,'C',1);
        $pdf->Ln();
         $pdf->Cell(20,50);
         $pdf->cell(25,7,utf8_decode('Abortos'),1,0,'C',0);  // cell with left and right
         $pdf->cell(25,7,utf8_decode('Partos'),1,0,'C',0);  // cell with left and right
         $pdf->cell(25,7,utf8_decode('Cesarias'),1,0,'C',0);
         $pdf->cell(25,7,utf8_decode('FUM'),1,0,'C',0);  // cell with left and right
         $pdf->cell(30,7,utf8_decode('FPP'),1,0,'C',0);  // cell with left and right
         $pdf->cell(30,7,utf8_decode('FUP'),1,0,'C',0);  // cell with left and right
         $pdf->Ln(); 
         // $pdf->SetFont('Arial', '', 9);
               
         $pdf->Cell(20,50);
         $pdf->cell(25,7,utf8_decode($key->a),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(25,7,utf8_decode($key->p),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(25,7,utf8_decode($key->c),'LBR',0,'C',0);
         $pdf->cell(25,7,utf8_decode($key->fum),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(30,7,utf8_decode($key->fpp),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(30,7,utf8_decode($key->fup),'LBR',0,'C',0);  // cell with left and right
         $pdf->Ln(); 
        
         $pdf->Ln();
         $pdf->SetFillColor(211,211,211);
		 $pdf->Cell(20,5);
         // $pdf->Cell(160,10,utf8_decode('GinecoObstetricos'),1,0,'C',1);
        $pdf->Ln();
         $pdf->Cell(20,50);
         $pdf->cell(40,7,utf8_decode('Menp/Climaterio'),1,0,'C',0);  // cell with left and right
         $pdf->cell(40,7,utf8_decode('Mét.Planificación'),1,0,'C',0);  // cell with left and right
         $pdf->cell(40,7,utf8_decode('Cit.Vaginal'),1,0,'C',0);
         $pdf->cell(40,7,utf8_decode('Ex.Mamas/Mastografía'),1,0,'C',0);  // cell with left and right
        
         $pdf->Ln(); 
         // $pdf->SetFont('Arial', '', 9);
               
         $pdf->Cell(20,50);
         $pdf->cell(40,7,utf8_decode($key->climaterio),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(40,7,utf8_decode($key->metplan),'LBR',0,'C',0);  // cell with left and right
         $pdf->cell(40,7,utf8_decode($key->citologia),'LBR',0,'C',0);
         $pdf->cell(40,7,utf8_decode($key->mamas),'LBR',0,'C',0);  // cell with left and right
        
         $pdf->Ln();
     }








$pdf->Ln(30);
$pdf->Cell(20,50);
$pdf->Cell(100,50,"Sintomas Generales: ");
$pdf->Ln(9);
$pdf->Ln(7);
$pdf->Ln(7);

foreach ($Sintomas_Paciente as $key ) {
	$pdf->Ln(7);
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,' ','LTR',0,'L',0); 
	$pdf->Cell(90,5,'PADECIMIENTO',1,0,'C',1);

	$pdf->Ln();
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,'Sintomatologia','LR',0,'C',1);
	$pdf->Cell(90,5,utf8_decode($key->sintmas_genrles),'LR',0,'C',0);
	
	$pdf->Ln();

	$pdf->Cell(20,50);
	$pdf->Cell(65,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
	$pdf->Cell(90,5,'','LBR',0,'L',0);

}

$pdf->Ln(5);
$pdf->Cell(25,50);
$pdf->Cell(100,50,"Pacedimiento Actual: ");
$pdf->Ln(9);
$pdf->Ln(7);
$pdf->Ln(7);

$pdf->Ln(7);
$pdf->Cell(20,50);
$pdf->Cell(65,5,' ','LTR',0,'L',0); 
$pdf->Cell(90,5,'PADECIMIENTO',1,0,'C',1);

$pdf->Ln();
$pdf->Cell(20,50);
$pdf->Cell(65,10,'Padecimiento','LR',0,'C',1);
$pdf->Cell(90,10,utf8_decode($this->txtareas[0]->impresion_diagnostico),'LR',0,'C',0);

$pdf->Ln();
$pdf->Cell(20,50);
	$pdf->Cell(65,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
	$pdf->Cell(90,5,'','LBR',0,'L',0);

	$pdf->Ln(1);
	$pdf->Cell(25,50);
	$pdf->Cell(100,50,utf8_decode("Impresión Diagnostica: "));
	$pdf->Ln(9);
	$pdf->Ln(7);
	$pdf->Ln(7);

	$pdf->Ln(7);
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,' ','LTR',0,'L',0); 
	$pdf->Cell(90,5,'PADECIMIENTO',1,0,'C',1);

	$pdf->Ln();	
	$pdf->Cell(20,50);
	$pdf->Cell(65,10,'Diagnostico','LR',0,'C',1);
	$pdf->Cell(90,10,utf8_decode($this->txtareas[0]->tratamiento),'LR',0,'C',0);

	$pdf->Ln();	
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
	$pdf->Cell(90,5,'','LBR',0,'L',0);


	$pdf->Ln(1);
	$pdf->Cell(25,70); 
	$pdf->Cell(100,50,"Tratamiento: ");
	$pdf->Ln(9);
	$pdf->Ln(7);
	$pdf->Ln(7);

	$pdf->Ln(7);
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,' ','LTR',0,'L',0); 
	$pdf->Cell(90,5,'PADECIMIENTO',1,0,'C',1);

	$pdf->Ln();	

	$pdf->Cell(20,50);
	$pdf->Cell(65,10,'Tratamiento','LR',0,'C',1);
	$pdf->Cell(90,10,utf8_decode($this->txtareas[0]->padecimiento_actual),'LR',0,'C',0);
	
	$pdf->Ln();
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
	$pdf->Cell(90,5,'','LBR',0,'L',0);


	$pdf->SetFont('Arial', 'B', 11);	
	$pdf->Ln(1);
	$pdf->Cell(20,50); 
	$pdf->Cell(100,50,"Aparatos  y sistemas: ");	
	$pdf->Ln(9);
	$pdf->Ln(7);
	$pdf->Ln(7);
	
	$pdf->SetFont('Arial', '', 11);
	foreach ($aparato_Paciente as $key) {
		$pdf->Ln(7);
		$pdf->Cell(20,50); 

		$pdf->Cell(65,5,' ','LTR',0,'L',0); 
		$pdf->Cell(90,5,'PADECIMIENTO',1,0,'C',1);

		$pdf->Ln();
		$pdf->Cell(20,50); 
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(65,5,"Aparato: ".$key->aparato,'LR',0,'C',1);
		$pdf->SetFont('Arial', '', 11);
		$pdf->Cell(90,5,utf8_decode($key->aparato_dscrpcn),'LR',0,'C',0);


		$pdf->Ln();
		$pdf->Cell(20,50);
	$pdf->Cell(65,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
	$pdf->Cell(90,5,'','LBR',0,'L',0);
}


$pdf->SetFont('Arial', 'B', 11);
$pdf->Ln(1);
$pdf->Cell(20,50); 
$pdf->Cell(100,50,utf8_decode("Exploración regional"));
$pdf->Ln(9);
$pdf->Ln(7);
$pdf->Ln(7);
$pdf->SetFont('Arial', '', 11);

foreach ($partes as $cuerpaso) {

	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Ln(7);
	$pdf->Cell(20,50); 

	$pdf->Cell(65,5,' ','LTR',0,'L',0); 
	$pdf->Cell(90,5,'PADECIMIENTO',1,0,'C',1);

	$pdf->Ln();
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,utf8_decode($cuerpaso->partecuerpo),'LR',0,'C',1);
	$pdf->SetFont('Arial', '', 11);
	foreach ($clase_parteC_Paciente as $key) {
		if ($key->id_parte_cuerpo == $cuerpaso->id_parte_cuerpo) {

			$pdf->Cell(90,5,utf8_decode($key->clase_parte .' : '.$key->estadoPc),'LR',0,'C',0);
			break;
		}
	}

	$pdf->Ln();
	$pdf->Cell(20,50);
	$pdf->Cell(65,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
	$pdf->Cell(90,5,'','LBR',0,'L',0);
	
}

$url_pdf = $_SESSION["documento"] . $_SESSION["id_Paciente"] . $_SESSION["idmedico"] . $_SESSION["idvisita"];

$this->model->sp_actualizar_url($url_pdf,$_SESSION["idvisita"]);

$pdf->Output(PATH."application/historias/".$url_pdf.".pdf","F");
$pdf->Output($_SESSION["nombre"]. ' ' . $_SESSION['apellido'].".pdf","I");
}
}
?>    								