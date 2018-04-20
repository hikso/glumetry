<?php 
	/**
	* 
	*/
	class antecedentes extends Controller
	{
		
		public function index()
		{
			require APP. 'view/_templates/header_Admin.php';
			require APP. 'view/antecedentes/indexAdmin.php';
			require APP. 'view/_templates/footer.php';
		}
	}
 ?>