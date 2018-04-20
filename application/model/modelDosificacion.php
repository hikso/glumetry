<?php
	class modelDosificacion
	{
		function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
	}
	
		public $id_dosificacion;
		public $cantidad;
		public $observaciones;
		public $id_tipo_dosificacion;
		public $fecha;
		public $id_ficha_tecnica;
		
		//get
		public function getid_dosificacion()
		{
			return $this ->id_dosificacion; 
		} 
		public function getcantidad()
		{
			return $this->cantidad;
		}
		public function getobservaciones()
		{
			return $this->observaciones;
		}
		public function getid_tipo_dosificacion()
		{
			return $this->id_tipo_dosificacion;
		}
		public function getfecha()
		{
			return $this->fecha;
		}
		public function getid_ficha_tecnica()
		{
			return $this->id_ficha_tecnica;
		}

		//set
		public function setid_dosificacion($id_dosificacion)
		{
			$this->id_dosificacion = $id_dosificacion;
		}
		public function setcantidad($cantidad)
		{
			$this->cantidad=$cantidad;
		}
		public function setobservaciones($observaciones)
		{
			$this->observaciones=$observaciones;
		}
		public function setid_tipo_dosificacion($id_tipo_dosificacion)
		{
			$this->id_tipo_dosificacion=$id_tipo_dosificacion;
		}
		public function setfecha($fecha)
		{
			$this->fecha=$fecha;
		}
		public function setid_ficha_tecnica($id_ficha_tecnica)
		{
			$this->id_ficha_tecnica=$id_ficha_tecnica;
		}

		public function sp_CargarTipoDosificacion()
	    {
	    	$sql = "CALL SP_ConsultarTipoDosificacion();";
	        $query = $this->db->prepare($sql);
	        $query->execute();

	        return $query->fetchAll();
	    }

	
	    public function RegistrarDosificacion($fecha, $dosis, $observaciones, $idFicha, $tipoDosificacion)
	    {
	    	$sql = "call SP_Registrar_Dosificacion (?,?,?,?,?)";
	    	$query = $this->db->prepare($sql);
	    	$query->bindValue(1, $fecha, PDO::PARAM_STR);
	    	$query->bindValue(2, $dosis, PDO::PARAM_STR);
	    	$query->bindValue(3, $observaciones, PDO::PARAM_STR);
	    	$query->bindValue(4, $idFicha, PDO::PARAM_STR);
	    	$query->bindValue(5, $tipoDosificacion, PDO::PARAM_STR);
	    	$query->execute();
	    }

	    public function sp_consultaDosificacion($fecha, $idFicha)
	     {
	    	$sql = "CALL SP_Consultar_Dosificacion (?,?)";
	    	$query = $this->db->prepare($sql);
	    	$query->bindValue(1, $fecha, PDO::PARAM_STR);
	    	$query->bindValue(2, $idFicha, PDO::PARAM_STR);
	    	$query->execute();
 
	    	return $query->fetchAll();
	     }

	    public function IDFicha($historia)
	     {
	    	$sql = "CALL SP_Ultimo_IDFichaTecnica(?)";
	    	$query = $this->db->prepare($sql);
	    	$query->bindValue(1, $historia, PDO::PARAM_STR);
	    	$query->execute();

	    	return $query->fetchAll();	
	     } 
  }

?>
