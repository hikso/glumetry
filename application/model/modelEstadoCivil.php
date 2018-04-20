<?php

class modelEstadoCivil 
{

	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public $id_estado_civil;
	public $descripcion;

	//get
	public function getid_estado_civil()
	{
		return $this ->id_estado_civil;
	}
	
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	//set
	public function setid_estado_civil($id_estado_civil)
	{
		$this->id_estado_civil = $id_estado_civil;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}


	public function RegistrarEstadoCivil ($descripcion){
		$sql = "CALL SP_Registrar_Estado_Civil (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $descripcion, PDO::PARAM_STR);
		$query->execute();
	}
}
?>
