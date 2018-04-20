<?php
	class nuevoUsuario extends controller
		{
			public function index() 
				{
					require APP . 'view/_templates/header_Admin.php';
			        require APP . 'view/nuevos_Usuarios/indexAdmin.php';
			        require APP . 'view/_templates/footer.php';
                }
	    }
		
?>