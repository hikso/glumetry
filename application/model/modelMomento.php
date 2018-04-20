<?php

class modelMomento 
{

	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public $id;
	public $descripcion;

	//get
	public function getid()
	{
		return $this ->id;
	}
	
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	//set
	public function setid($id)
	{
		$this->id = $id;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

		public function RegistrarMomento($descripcion){
		$sql = "CALL SP_Registrar_Momento (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $descripcion, PDO::PARAM_STR);
		$query->execute();
	}


}
?>