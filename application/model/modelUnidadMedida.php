<?php

class modelUnidadMedida 
{

	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public $id_unidad_medida;
	public $descripcion;

	//get
	public function getid_unidad_medida()
	{
		return $this ->id_unidad_medida;
	}
	
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	//set
	public function setid_unidad_medida($id_unidad_medida)
	{
		$this->id_unidad_medida = $id_unidad_medida;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function RegistrarUnidadMedida($descripcion){
		$sql = "CALL SP_Registrar_UnidadMedida (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $descripcion, PDO::PARAM_STR);
		$query->execute();
	}

	
}
?>