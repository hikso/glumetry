<?php 
	/**
	* 
	*/
	class partesCuerpo extends Controller
	{
		
		public function index()
		{
			require APP. 'view/_templates/header_Admin.php';
			require APP. 'view/partesCuerpo/indexAdmin.php';
			require APP. 'view/_templates/footer.php';
		}
	}
 ?>