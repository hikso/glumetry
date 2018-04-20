<?php

class modelFrecuencia 
{

	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public $id_frecuencia;
	public $descripcion;

	//get
	public function getid_frecuencia()
	{
		return $this ->id_frecuencia;
	}
	
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	//set
	public function setid_frecuencia($id_frecuencia)
	{
		$this->id_frecuencia = $id_frecuencia;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function RegistrarFrecuencia ($descripcion){
		$sql = "CALL SP_Registrar_Frecuencia (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $descripcion, PDO::PARAM_STR);
		$query->execute();
	}
}
?>
