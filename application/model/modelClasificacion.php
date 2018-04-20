<?php
	class modelClasificacion
	{
		function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
	}
		public $id_clasificacion_alimentos;
		public $clasificacion;
		
		//get
		public function getid_Clasificacion_alimento()
		{
			return $this ->id_clasificacion_alimentos; 
		} 
		public function getClasificacion()
		{
			return $this->clasificacion;
		}

		//set
		public function setid_Clasificacion_alimento($id_clasificacion_alimentos)
		{
			$this->id_clasificacion_alimentos = $id_clasificacion_alimentos;
		}
		public function setclasificacion($clasificacion)
		{
			$this->clasificacion=$clasificacion;
		}
		public function RegistrarClasificacion($clasificacion)
		{
			$sql = "INSERT INTO clasificacion(clasificacionn) VALUES (:clasificacion)";
			$query = $this->db->prepare($sql);
			$parameters = array(':clasificacion' => $clasificacion);
        	$query->execute($parameters);
		}

		public function ListarClasificacion()
		{
			$sql = "SELECT * FROM clasificacion";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchAll();		
		}
  }

?>
