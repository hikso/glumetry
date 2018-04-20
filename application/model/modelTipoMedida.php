<?php

class modelTipoMedida 
{

	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public $id_tipo_medida;
	public $descripcion;

	//get
	public function getid_tipo_medida()
	{
		return $this ->id_tipo_medida;
	}
	
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	//set
	public function setid_tipo_medida($id_tipo_medida)
	{
		$this->id_tipo_medida = $id_tipo_medida;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function RegistrarTipoMedida ($descripcion){
		$sql = "CALL SP_Registrar_TipoMedida (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $descripcion, PDO::PARAM_STR);
		$query->execute();
	}
}
?>
