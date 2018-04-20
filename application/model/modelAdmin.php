<?php 
	/**
	* 
	*/
	class modelAdmin
	{
		function __construct($db)
		{
			try {
				$this->db=$db;
			}catch(PDOException $e){
				exit('Database connection could not be established.');
			}

		}
		private $url = 'Admin/indexAdmin';

		//Getters	
		public function getUrl()
		{
			return $this->url;
		}

		public function cargarAdmin($id_usuario, $rol)
	    {
			$sql = "CALL sp_CargarUser(:id_usuario,:rol)";
	        $query = $this->db->prepare($sql);
	        $parameters = arraY(':id_usuario' => $id_usuario, ':rol' =>$rol);

	        $query->execute($parameters);

	        return $query->fetchAll();


	    }
	}
 ?>