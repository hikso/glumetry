<?php

class modelMunicipio 
{

	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public $id_municipio;
	public $descripcion;

	//get
	public function getid_municipio()
	{
		return $this ->id_municipio;
	}
	
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	//set
	public function setid_municipio($id_municipio)
	{
		$this->id_municipio = $id_municipio;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function RegistrarMunicipio ($descripcion){
		$sql = "CALL SP_Registrar_Municipio (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $descripcion, PDO::PARAM_STR);
		$query->execute();
	}
}
?>
