<?php
	class modelGlucometria
	{
		function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
	}
	
		public $id_glucometria;
		public $fecha;
		public $antes;
		public $despues;
		public $observaciones;
		public $id_ficha_tecnica;
		public $id_momento;
		
		//get
		public function getid_glucometria()
		{
			return $this ->id_glucometria; 
		} 
		public function getfecha()
		{
			return $this->fecha;
		}
		public function getantes()
		{
			return $this->antes;
		}
		public function getdespues()
		{
			return $this->despues;
		}
		public function getobservaciones()
		{
			return $this->observaciones;
		}
		public function getid_ficha_tecnica()
		{
			return $this->id_ficha_tecnica;
		}
		public function getid_momento()
		{
			return $this->id_momento;
		}

		//set
		public function setid_glucometria($id_glucometria)
		{
			$this->id_glucometria = $id_glucometria;
		}
		public function setfecha($fecha)
		{
			$this->fecha=$fecha;
		}
		public function setantes($antes)
		{
			$this->antes=$antes;
		}
		public function setdespues($despues)
		{
			$this->despues=$despues;
		}
		public function setobservaciones($observaciones)
		{
			$this->observaciones=$observaciones;
		}
		public function setid_ficha_tecnica($id_ficha_tecnica)
		{
			$this->id_ficha_tecnica=$id_ficha_tecnica;
		}
		public function setid_momento($id_momento)
		{
			$this->id_momento=$id_momento;
		}

		public function sp_CargarMomento()
	    {
	    	$sql = "CALL sp_CargarMomento();";
	        $query = $this->db->prepare($sql);
	        $query->execute();

	        return $query->fetchAll();
	    }

	    public function sp_RegistrarGlucometria($fecha, $antes, $observaciones, $momento, $ficha, $despues)
	    {
	    	
	    	$sql = "call SP_Registrar_Glucometria (?,?,?,?,?, ?)";
	    	$query = $this->db->prepare($sql);
	    	$query->bindValue(1, $fecha, PDO::PARAM_STR);
	    	$query->bindValue(2, $antes, PDO::PARAM_STR);
	    	$query->bindValue(3, $observaciones, PDO::PARAM_STR);
	    	$query->bindValue(4, $ficha, PDO::PARAM_STR);
	    	$query->bindValue(5, $momento, PDO::PARAM_STR);
	    	$query->bindValue(6, $despues, PDO::PARAM_STR);
	    	$query->execute();
	    }

	    public function spid($historia)
	    {
	    	$sql = "CALL SP_Ultimo_IDFichaTecnica (?)";
	    	$query = $this->db->prepare($sql);
	    	$query->bindValue(1, $historia, PDO::PARAM_INT);
	    	$query->execute();

	    	return $query->fetchAll();
	    	
	    }

	    public function sp_consultaSeguimiento($fecha, $idFicha)
	    {
	    	$sql = "CALL SP_CnsultarSeguimiento (?,?)";
	    	$query = $this->db->prepare($sql);
	    	$query->bindValue(1, $fecha, PDO::PARAM_STR);
	    	$query->bindValue(2, $idFicha, PDO::PARAM_STR);
	    	$query->execute();
 
	    	return $query->fetchAll();
	    }

	    public function ModificarGlucometria($idGlucometria, $despues, $ComentarioD, $antes)
	    {
	        $sql = " CALL SP_Despues_Glucometria (?,?,?,?)";
	        $query = $this->db->prepare($sql);
	        $query->bindValue(1, $idGlucometria, PDO::PARAM_STR);
	        $query->bindValue(2, $despues, PDO::PARAM_STR);
	        $query->bindValue(3, $ComentarioD, PDO::PARAM_STR);
	        $query->bindValue(4, $antes, PDO::PARAM_STR);
	        $query->execute();
	        $FilasAfectadas = $query->rowCount();

	        return $FilasAfectadas;
	    }
	    public function SP_Cargar_Niveles($idBase)
	    {
	    	$sql = "CALL SP_Cargar_Niveles (?)";
	    	$query = $this->db->prepare($sql);
	    	$query->bindValue(1, $idBase, PDO::PARAM_STR);
	    	$query->execute();
 
	    	return $query->fetchAll();
	    }

	     public function sp_CargarMomentoSeguimeinto($fecha, $idFicha)
	    {
	    	$sql = "CALL SP_ConsultarMomentoSeguimmiento (?,?)";
	    	$query = $this->db->prepare($sql);
	    	$query->bindValue(1, $fecha, PDO::PARAM_STR);
	    	$query->bindValue(2, $idFicha, PDO::PARAM_STR);
	    	$query->execute();
 
	    	return $query->fetchAll();
	    }
	    public function SP_Validar_MomentoGlucometria($momento, $fecha, $idFicha)
	    {
	    	$sql = "CALL SP_Validar_MomentoGlucometria (?,?,?)";
	    	$query = $this->db->prepare($sql);
	    	$query->bindValue(1, $momento, PDO::PARAM_STR);
	    	$query->bindValue(2, $fecha, PDO::PARAM_STR);
	    	$query->bindValue(3, $idFicha, PDO::PARAM_STR);
	    	$query->execute();
 
	    	return $query->fetchAll();
	    }
  }

?>
