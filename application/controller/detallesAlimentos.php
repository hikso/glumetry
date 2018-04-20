<?php 

	class detallesAlimentos extends Controller
	{
		function __construct(){
			parent::__construct("modelPorcion");
			// parent::__construct("modelUnidadMedida");
		}
		
		public function index()
		{
			require APP. 'view/_templates/header_Admin.php';
			require APP. 'view/detallesAlimentos/indexAdmin.php';
			require APP. 'view/_templates/footer.php';
		}

		public function RegistrarPorcion()
		{
			$descripcion = $_POST['txtPorcion'];
			if($this->model->RegistrarPorcion($descripcion))
			{
				echo "Exito";
			}
		}

		public function RegistrarUnidadMedida()
		{
			$descripcion = $_POST['txtUnidadDeMedida'];
			if($this->model->RegistrarUnidadMedida($descripcion))
			{
				echo "Exito";
			}
		}

		public function RegistrarMomento()
		{
			$descripcion = $_POST['txtMomento'];
			if($this->model->RegistrarMomento($descripcion))
			{
				echo "Exito";
			}
		}

	}
 ?>