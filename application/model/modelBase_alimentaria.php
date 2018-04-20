<?php 


class modelBase_alimentaria
	{
		
		function __construct($db)
		{
			if (null == $db) {
			}else{ 
				try {
					$this->db = $db;
				} catch (PDOException $e) {
					exit('Database connection could not be established.');
				}
			}
		}
		public function sp_registrar_ficha($idBase)
		{
			$sql = "CALL sp_registrar_ficha(?)";
	        $query = $this->db->prepare($sql);
	        $query->bindValue(1, $idBase, PDO::PARAM_INT);
	        $query->execute();
		}
		public function SP_CargarAlimentosMomentoBase($idBase)
		{	        
			$sql = "CALL SP_CargarAlimentosMomentoBase(?)";
	        $query = $this->db->prepare($sql);
	        $query->bindValue(1, $idBase, PDO::PARAM_INT);
	        $query->execute();
	        return $query->fetchAll();
		}
		public function SP_CargarBaseAlimentaria($idHistoria)
		{
	        $sql = "CALL SP_CargarBaseAlimentaria(?)";
	        $query = $this->db->prepare($sql);
	        $query->bindValue(1, $idHistoria, PDO::PARAM_INT);
	        $query->execute();
	        return $query->fetchAll();
		}
		public function SP_CargarRangos($id_recomendacion)
		{
	        $sql = "CALL SP_CargarRangos(?)";
	        $query = $this->db->prepare($sql);
	        $query->bindValue(1, $id_recomendacion, PDO::PARAM_INT);
	        $query->execute();
	        return $query->fetchAll();
		}
		public function SP_RegistrarBaseAlimentaria($_fecha_asignacion, $_id_historia_clinica, $_id_recomendacion_rangos)
		{
	        $sql = "CALL SP_RegistrarBaseAlimentaria(?,?,?)";
	        $query = $this->db->prepare($sql);
	        $query->bindValue(1, $_fecha_asignacion, PDO::PARAM_STR);
	        $query->bindValue(2, $_id_historia_clinica, PDO::PARAM_INT);
	        $query->bindValue(3, $_id_recomendacion_rangos, PDO::PARAM_INT);
	        $query->execute();
	        $rst = $query->fetchAll();
	        return $LastId = $rst[0]->id_base_alimentaria;
		}
		public function SP_CargarRecomendacion()
		{
			$sql = "CALL SP_CargarRecomendacion();";
	        $query = $this->db->prepare($sql);
	        $query->execute();

	        return $query->fetchAll();
		}
		public function cargarCategorias()
		{
			$sql = "SELECT * FROM tbl_clasificacion";
			$query = $this->db->prepare($sql);
			$query->execute();


			return $query->fetchAll();
		}	
	    public function SP_CargarMomentoBase($id_Base)
	    {
			$sql = "CALL SP_CargarMomentoBase(?)";
	        $query = $this->db->prepare($sql);
	        $query->bindValue(1, $id_Base, PDO::PARAM_INT);
	        $query->execute();
	        return $query->fetchAll();
	    }
	    public function SP_CargarMomento()
	    {
			$sql = "CALL SP_CargarMomento()";
	        $query = $this->db->prepare($sql);
	        $query->execute();
	        return $query->fetchAll();
	    }
		public function sp_CargarAlimentos()
		{
			$sql = "CALL sp_CargarAlimentos();";
			$query = $this->db->prepare($sql);
			$query->execute();

			return $query->fetchAll();
		}
		public function SP_RegistrarAlimentacionBase($objBase_Alimentaria, $LastIdBase)
		{

			try {
		    // First of all, let's begin a transaction
		    $this->db->beginTransaction();
			    foreach ($objBase_Alimentaria as $key => $value) {
			    	$id_momento = $value['id_momento'];
			    	foreach ($value['alimentos'] as $id_alimento) {
			    		$sql = "CALL SP_RegistrarAlimentacionBase(?,?,?)";

				        $query = $this->db->prepare($sql);
				        $query->bindValue(1, $LastIdBase, PDO::PARAM_INT);
				        $query->bindValue(2, $id_momento, PDO::PARAM_INT);
				        $query->bindValue(3, $id_alimento, PDO::PARAM_INT);
				        $query->execute();
			    	}
			    }

		    // If we arrive here, it means that no exception was thrown
		    // i.e. no query has failed, and we can commit the transaction
		    $this->db->commit();
			} catch (Exception $e) {
			    // An exception has been thrown
			    // We must rollback the transaction
			    $this->db->rollback();
			}
		}
		public function SP_RegistrarDtllBaseAlimentaria($objChoProMomentos, $LastIdBase)
		{
			try {
		    // First of all, let's begin a transaction
		    $this->db->beginTransaction();

			    foreach ($objChoProMomentos as $key => $value) {
			    	$id_momento = $value['id_momento'];
			    	$CHO = $value['CHO'];
			    		$sql = "CALL SP_RegistrarDtllBaseAlimentaria(?,?,?)";

				        $query = $this->db->prepare($sql);
				        $query->bindValue(1, $id_momento, PDO::PARAM_INT);
				        $query->bindValue(2, $CHO, PDO::PARAM_INT);
				        $query->bindValue(3, $LastIdBase, PDO::PARAM_INT);
				        $query->execute();
			    }

		    // If we arrive here, it means that no exception was thrown
		    // i.e. no query has failed, and we can commit the transaction
		    $this->db->commit();
			} catch (IdBaase  $e) {
			    // An exception has been thrown
			    // We must rollback the transaction
			    $this->db->rollback();
			}
		}
		public function SP_CargarClasificacion()
		{
			$sql = "CALL SP_CargarClasificacion();";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}

		public function SP_CargarBaseAlimentariaFecha($idHistoria)
		{
			$sql = "CALL SP_CargarBaseAlimentariaFecha (?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $idHistoria, PDO::PARAM_STR);
			$query->execute();

			return $query->fetchAll();
		}		
		public function CargarAlimentacionBase($id_clasificacion)
		{
			$sql = "CALL SP_CargarAlimentacionBase (?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $id_clasificacion, PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll();
		}
		public function sp_CargarAlimentosPaciente($idAlimento)
		{
			$sql = "CALL sp_CargarAlimentosPaciente (?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $idAlimento, PDO::PARAM_STR);
			$query->execute();

			return $query->fetchAll();
		}
		public function CargarAlimentosCalculadora($id_clasificacion)
		{
			$sql = "CALL SP_CargarAlimentosCalculadora (?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $id_clasificacion, PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll();
		}
		public function cargarIdBase($fecha, $historia)
		{
			$sql = "CALL SP_IdBase (?,?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $fecha, PDO::PARAM_STR);
			$query->bindValue(2, $historia, PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll();
		}
		public function DtllsBaseAlimentariaCls($id_clasificacion, $IdBase)
		{
			$sql = "CALL SP_Cargar_DtllsBaseAlimentariaCls (?,?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $IdBase, PDO::PARAM_STR);
			$query->bindValue(2, $id_clasificacion, PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll();
		}
		public function SP_FiltroCalcular($alimento)
		{
			$sql = "CALL SP_FiltroCalcular(?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $alimento, PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll();	
		}
		public function SP_FiltroCalcularRecomendados($alimentoRecomendado,  $IdBase)
		{
			$sql = "CALL SP_FiltroAlimentosRecomendado (?,?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $alimentoRecomendado, PDO::PARAM_STR);
			$query->bindValue(2, $IdBase, PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll();	
		}
		public function cargarDtllsBaseAlimentaria($IdBase, $idHistoria)
		{
			$sql = "CALL SP_Cargar_Dtlls_Base(?,?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $idHistoria, PDO::PARAM_STR);
			$query->bindValue(2, $IdBase, PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll();
		}

		public function consultarRangosPaciente($IdBase)
		{
			$sql = "CALL SP_Cargar_Niveles(?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $IdBase, PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll();
		}

		public function AlimentacionBase($momento, $id)
		{
			$sql = "CALL SP_ConsultaAlimentacionBase(?,?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $momento, PDO::PARAM_STR);
			$query->bindValue(2, $id, PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll();
		}

		public function FiltroBaseAlimentaria($fecha, $idHistoria)
		{
			$sql = "CALL SP_Filtro_Consulta_BaseAlimentaria(?,?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $fecha, PDO::PARAM_STR);
			$query->bindValue(2, $idHistoria, PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll();
		}

		public function ConsultarBasePAciente($idHistoria)
		{
			$sql = "CALL SP_Consultar_BaseAlimentariaPaciente(?);";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $idHistoria, PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll();
		}

	}

 ?>