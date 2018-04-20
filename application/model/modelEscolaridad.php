<?php

class modelEscolaridad 
{

	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public $id_escolaridad;
	public $descripcion;

	//get
	public function getid_escolaridad()
	{
		return $this ->id_escolaridad;
	}
	
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	//set
	public function setid_escolaridad($id_escolaridad)
	{
		$this->id_escolaridad = $id_escolaridad;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function RegistrarEscolaridad ($descripcion){
		$sql = "CALL SP_Registrar_Escolaridad (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $descripcion, PDO::PARAM_STR);
		$query->execute();
	}
}
?>
