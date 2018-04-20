<?php

	class Usuarios extends controller
	{
	    function __construct(){
	        parent::__construct("modelUsuarios");
	    }

		public function index() 
		{
			$rst = $this->model->GetMultiSelectArrays();
			$tipo_documento = $rst[0];
			$departamento = $rst[1];
			$estado_civil = $rst[2];
			$genero = $rst[3];
			$escolaridad = $rst[4];
			$especializacion = $rst[5];
			$this->cargarVista();
			require APP . 'view/_templates/header.php';
			require APP . 'view/Usuarios/index.php';
			require APP . 'view/_templates/footer.php';
		}
		public function ConsultarUsuarios()
		{
			$numCuentas = $this->model->SP_CargarNumCuentas();
			$rst = $this->model->GetMultiSelectArrays();
			$tipo_documento = $rst[0];
			$departamento = $rst[1];
			$estado_civil = $rst[2];
			$genero = $rst[3];
			$escolaridad = $rst[4];
			$especializacion = $rst[5];

			$users = $this->model->SP_CargarUsuarios();
			$this->cargarVista();
			require APP . 'view/_templates/header.php';
			require APP . 'view/Usuarios/consultarUsuarios.php';
			require APP . 'view/_templates/footer.php';	
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
		public function cargarDepartamentos()
		{
			$municipios = $this->model->sp_cargarMunicipio($_POST["idDepartamento"]);
			$templateMunicipios = $this->pintarMunicipios($municipios);
			echo $templateMunicipios;
		}
		public function pintarMunicipios($municipios)
		{
			$Municipios = "";
			foreach ($municipios as $value) {
				$Municipios .= "<option value='$value->id_municipio'>$value->descripcion</option>";
			}
			return $Municipios;
		}
		public function guardarPaciente()
		{
			require_once 'crypter.php';
			//Metodo que valida la existencia de el documento o correo, se consideran unicos
			$validacion = $this->model->SP_ValidarRegistroUsuario($_POST["txtCorreo"],$_POST["documento"],1);
			if ($validacion == 4) {
				  $LastIdUsuario = $this->model->SP_RegistrarUsuario($_POST["txtCorreo"],encrypt($_POST["txtPassword"]));
				  $LastIdPaciente = $this->model->SP_RegistrarPaciente($_POST["primerNombre"],$_POST["segundoNombre"],$_POST["primerApellido"],$_POST["segundoApellido"],$_POST["tipoDocumento"],$_POST["estadoCivil"],$_POST["genero"],$_POST["escolaridad"],$_POST["ocupacion"],$_POST["telefono"],$_POST["documento"],$_POST["idMunicipio"],$_POST['celular'],$_POST['fecha']);
				  $rst = $this->model->SP_AsociarCuentasPaciente($LastIdUsuario,$LastIdPaciente);
				echo "$validacion";
			}else
			{
				echo "$validacion";
			}
			

		}
		public function ActualizarEstado()
		{
			$data = array();

			$data["numCuentas"] = $numCuentas = $this->model->SP_CargarNumCuentas();
			$this->model->SP_UpdateEstado($_POST["id_usuario"]);
			$data["users"] = $users = $this->model->SP_CargarUsuarios();
			echo json_encode($data);
		}
		public function guardarMedico()
		{
			require_once 'crypter.php';
			//Metodo que valida la existencia de el documento o correo, se consideran unicos

			$validacion = $this->model->SP_ValidarRegistroUsuario($_POST["txtCorreo"],$_POST["documento"],2);

			if ($validacion == 4) {
				  $LastIdUsuario = $this->model->SP_RegistrarUsuario($_POST["txtCorreo"],encrypt($_POST["txtPassword"]));
				  $LastIdMedico = $this->model->SP_RegistrarMedico($_POST["primerNombre"],$_POST["segundoNombre"],$_POST["primerApellido"],$_POST["segundoApellido"], $_POST["genero"], $_POST["telefono"], $_POST["celular"], $_POST["centro_trabajo"], $_POST["especializacion"], $_POST["documento"],  $_POST["tipoDocumento"]);
				  $rst = $this->model->SP_AsociarCuentasMedico($LastIdUsuario,$LastIdMedico);
				echo "$validacion";
			}else
			{
				echo "$validacion";
			}
		}
		public function AgregarCuentaMedico()
		{
				$LastIdMedico = $this->model->SP_RegistrarMedico($_POST["primerNombre"],$_POST["segundoNombre"],$_POST["primerApellido"],$_POST["segundoApellido"], $_POST["genero"], $_POST["telefono"], $_POST["celular"], $_POST["centro_trabajo"], $_POST["especializacion"], $_POST["documento"],  $_POST["tipoDocumento"]);
				$rst = $this->model->SP_AsociarCuentasMedico($_POST['id_usuario'],$LastIdMedico);
				
				$data = array();
				$data["numCuentas"] = $numCuentas = $this->model->SP_CargarNumCuentas();
				$data["users"] = $users = $this->model->SP_CargarUsuarios();
				

				echo " Se agrego la cuenta <strong>'Médico'</strong> para el usuario: <Strong>".$_POST["primerNombre"]." ".$_POST["segundoNombre"]." ".$_POST["primerApellido"]." ".$_POST["segundoApellido"]."</strong> con documento: <strong>". $_POST["documento"]."</strong>%";
				echo json_encode($data);
		}
		public function AgregarCuentaPaciente()
		{
				$LastIdPaciente = $this->model->SP_RegistrarPaciente($_POST["primerNombre"],$_POST["segundoNombre"],$_POST["primerApellido"],$_POST["segundoApellido"],$_POST["tipoDocumento"],$_POST["estadoCivil"],$_POST["genero"],$_POST["escolaridad"],$_POST["ocupacion"],$_POST["telefono"],$_POST["documento"],$_POST["idMunicipio"],$_POST['celular'],$_POST['fecha_nacimiento'],$_POST['celular'],$_POST['fecha']);
				
				$rst = $this->model->SP_AsociarCuentasPaciente($_POST['id_usuario'],$LastIdPaciente);
				
				$data = array();
				$data["numCuentas"] = $numCuentas = $this->model->SP_CargarNumCuentas();
				$data["users"] = $users = $this->model->SP_CargarUsuarios();

				echo " Se agrego la cuenta <strong>'Paciente'</strong> para el usuario: <Strong>".$_POST["primerNombre"]." ".$_POST["segundoNombre"]." ".$_POST["primerApellido"]." ".$_POST["segundoApellido"]."</strong> con documento: <strong>". $_POST["documento"]."</strong>%";
				echo json_encode($data);
				
		}
	}
?>