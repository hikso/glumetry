<?php
class modelAlimentacion
{
	function __construct($db)
	{
		try {
			$this->db=$db;
		}catch(PDOException $e){
			exit('Database connection could not be established.');
		}

	}
		public $id_Alimentos;
		public $alimentos;
		public $clasificacion;
		public $caloria;

		public function getId_Alimentos()
		{
			return $this->id_Alimentos;
		}

		public function getAlimentos()
		{
			return $this->alimentos;
		}

		public function getClasificacion()
		{
			return $this->clasificacion;
		}

		public function getIndiceGlucemico()
		{
			return $this->IndiceGlucemico;
		}

		public function setId_Alimentos($id_Alimentos)
		{
			$this->id_Alimentos = $id_Alimentos;
		}

		public function setAlimento($alimentos)
		{
			$this->alimentos = $alimentos();
		}

		public function setClasificacion($clasificacion)
		{
			$this->clasificacion = $clasificacion;
		}

		public function setIndiceGlucemico($IndiceGlucemico)
		{
			$this->IndiceGlucemico=$IndiceGlucemico;
		}


		public function RegistrarAlimentos($alimentos, $clasificacion, IndiceGlucemico)
		{
				$sql = "INSERT INTO alimentos(alimentos, clasificacion, IndiceGlucemico) VALUES (:alimentos, :clasificacion, :IndiceGlucemico)";
				$query = $this->db->prepare($sql);
				$parameters = array(':alimentos' => $alimentos, ':clasificacion'=>$clasificacion, ':IndiceGlucemico'=>$IndiceGlucemico);
				$query->execute($parameters);
		}

	?>