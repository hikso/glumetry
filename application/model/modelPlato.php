<?php 
	
	/**
	* 
	*/
	class modelPlato
	{
		
		function __construct($db)
		{
			if (null == $db) {
			}else{ 
				try {
					$this->db = $db;
				} catch (PDOException $e) {
					exit('Database connection could not be established.');
				}
			}
		}
			private $id_Clasificacion_Alimentos;
			private $clasificacion;
			private $totalCHO;

		public function setTotalCho()
		{
			$this->totalCHO++;
		}
		public function getTotalCho()
		{
			return $this->totalCHO;
		}
		public function getIdClasificacionAlimentos()
		{
			return $this->id_Clasificacion_Alimentos;
		}		
		public function getClasificacion()
		{
			return $this->clasificacion;
		}
		public function setIdClasificacionAlimentos($id_Clasificacion_Alimentos)
		{
			$this->id_Clasificacion_Alimentos = $id_Clasificacion_Alimentos;
		}
		public function setClasificacion($clasificacion)
		{
			$this->clasificacion = $clasificacion;
		}

		public function cargarCategorias()
	    {
	        $sql = "SELECT * FROM tbl_clasificacion_alimentos";
	        $query = $this->db->prepare($sql);
	        $query->execute();


	        return $query->fetchAll();
	    }
	    public function cargarAlimentos($id_Categoria)
	    {
	    	$sql = "SELECT * FROM tbl_alimentos WHERE id_Clasificacion_Alimentos = :id_Categoria";
	        $query = $this->db->prepare($sql);
            $parameters = array(':id_Categoria'=>$id_Categoria);
	        $query->execute($parameters);

	        return $query->fetchAll();
	    }
	    public function cargarAlimento($id_Alimento)
	    {
	    	$sql = "SELECT * FROM tbl_alimentos WHERE id_Alimentos = :id_Alimento";
	        $query = $this->db->prepare($sql);
            $parameters = array(':id_Alimento'=>$id_Alimento);
	        $query->execute($parameters);

	        return $query->fetchAll();
	    }
	}
 ?>