<?php

class modelGenero 
{

	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public $id_genero;
	public $descripcion;

	//get
	public function getid_genero()
	{
		return $this ->id_genero;
	}
	
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	//set
	public function setid_genero($id_genero)
	{
		$this->id_genero = $id_genero;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function RegistrarGenero ($descripcion){
		$sql = "CALL SP_Registrar_Genero (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $descripcion, PDO::PARAM_STR);
		$query->execute();
	}

	}
?>
