<?php 
	/**
	* 
	*/
	class modelDatos
	{
		function __construct($db)
		{
			try{
				$this->db = $db;
			}catch(PDOException $e){
				exit("No se pudo establecer conexión con las base de datos");
			}
		}

	//Genero

	public $id_genero;
	public $descripcionG;

	//get
	public function getid_genero()
	{
		return $this->id_genero;
	}
	
	public function getdescripcionG()
	{
		return $this->descripcionG;
	}

	//set
	public function setid_genero($id_genero)
	{
		$this->id_genero = $id_genero;
	}

	public function setdescripcionG($descripcionG)
	{
		$this->descripcionG = $descripcionG;
	}

	public function RegistrarGenero($descripcionG,$EstadoG)
	{
		$sql = "CALL SP_Validar_CampoGenero (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$descripcionG,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoG,PDO::PARAM_INT);
		$query->execute();
		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto

			$query->closeCursor();
			$sql = "CALL SP_Registrar_Genero (?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $descripcionG, PDO::PARAM_STR);
			$query->execute();
			echo "¡ Registro Exitoso !";

		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}

	public function ConsultarGenero(){
		$sql = "select id_genero,descripcion as genero, estado from tbl_genero";
		$query = $this->db->prepare($sql);		
		$query->execute();
		return $query->fetchAll();
	}
	public function EditarGenero($id, $descripcionG,$EstadoG){//Valores son ogiales a el procedure en la DB
		$sql = "CALL SP_Validar_CampoGenero (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$descripcionG,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoG,PDO::PARAM_INT);
		$query->execute();
		if($query->fetchColumn()==0){

		$sql = "CALL sp_ActualizarGenero (?,?,?)";
		$query = $this->db->prepare($sql);		
		$query->bindValue(1,$id, PDO::PARAM_INT);
		$query->bindValue(2,$descripcionG, PDO::PARAM_STR);
		$query->bindValue(3,$EstadoG, PDO::PARAM_INT);
		$query->execute();
		$ComlAfec = $query->rowCount();
		return $ComlAfec;

		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}
	//----------------------------------------------------------------------------------------


	//TipoDocumento

	public $id_tipo_documento;
	public $descripcionTD;

	//get

	public function getid_tipo_documento()
	{
		return $this->id_tipo_documento;
	}
	
	public function getdescripcionTD()
	{
		return $this->descripcionTD;
	}

	//set
	public function setid_tipo_documento($id_tipo_documento)
	{
		$this->id_tipo_documento = $id_tipo_documento;
	}

	public function setDescripcionTD($descripcionTD)
	{
		$this->descripcionTD = $descripcionTD;
	}

	public function RegistrarTipoDocumento ($_descripcionTD,$estadoTD){
		$sql = "CALL SP_Validar_CampoTipoDocumento (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$_descripcionTD,PDO::PARAM_STR);
		$query->bindValue(2,$estadoTD,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto

			$sql = "CALL SP_Registrar_TipoDocumento (?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $_descripcionTD, PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";

		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}

	public function ConsultarTipoDocumento(){
		$sql = "select id_tipo_documento, descripcion, estado from tbl_tipo_documento";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarTipoDocumento($_id_TD, $_descripcionTD,$estadoTD){//los parametros de entrada son iguales a los definidos en el procedimieto de la DB
		$sql = "CALL SP_Validar_CampoTipoDocumento (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$_descripcionTD,PDO::PARAM_STR);
		$query->bindValue(2,$estadoTD,PDO::PARAM_INT);
		$query->execute();
		if($query->fetchColumn()==0){

			$sql = "CALL sp_Actualizar_TipoDocumento (?,?,?)";
			$query = $this->db->prepare($sql);		
			$query->bindValue(1,$_id_TD, PDO::PARAM_INT);
			$query->bindValue(2,$_descripcionTD, PDO::PARAM_STR);
			$query->bindValue(3,$estadoTD, PDO::PARAM_INT);
			$query->execute();		
			$ComlAfecTD = $query->rowCount();

			return $ComlAfecTD;

		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
		
	}
	//----------------------------------------------------------------------------------------

	//Estado Civil

	public $id_estado_civil;
	public $descripcionEC;

	//get
	public function getid_estado_civil()
	{
		return $this->id_estado_civil;
	}
	
	public function getdescripcionEC()
	{
		return $this->descripcionEC;
	}

	//set
	public function setid_estado_civil($id_estado_civil)
	{
		$this->id_estado_civil = $id_estado_civil;
	}

	public function setdescripcionEC($descripcionEC)
	{
		$this->descripcionEC = $descripcionEC;
	}

	public function RegistrarEstadoCivil ($_descripcionEC,$EstadoEstCil){
		$sql = "CALL SP_Validar_CampoEstadoCivil (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$_descripcionEC,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoEstCil,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto

			$sql = "CALL SP_Registrar_EstadoCivil (?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $_descripcionEC, PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}		
	}
	public function ConsultarEstadoCivil(){
		$sql = "select id_estado_civil,descripcion,estado from tbl_estado_civil";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarEstadoCivil($id_ECivil,$_descripcionEC,$EstadoEstCil){
		$sql = "CALL SP_Validar_CampoEstadoCivil (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$_descripcionEC,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoEstCil,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto

		$sql = "CALL sp_Actualizar_EstadoCivil (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$id_ECivil,PDO::PARAM_INT);
		$query->bindValue(2,$_descripcionEC,PDO::PARAM_STR);
		$query->bindValue(3,$EstadoEstCil,PDO::PARAM_INT);
		$query->execute();
		$ValidadorEC = $query->rowCount();
		return $ValidadorEC;

		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}	
	}
	//----------------------------------------------------------------------------------------

	//Métodos Planificación

	
	//----------------------------------------------------------------------------------------


	// Habitos Personales

	public $id_habitos_personales;
	public $descripcionHP;

	//get
	public function getid_habitos_personales()
	{
		return $this ->id_habitos_personales;
	}
	
	public function getdescripcionHP()
	{
		return $this->descripcionHP;
	}

	//set
	public function setid_habitos_personales($id_habitos_personales)
	{
		$this->id_habitos_personales = $id_habitos_personales;
	}

	public function setdescripcionHP($descripcionHP)
	{
		$this->descripcionHP = $descripcionHP;
	}

	public function RegistrarHabitosPersonales ($habitosPersonales,$EstadoHabito){
		$sql = "CALL SP_Validar_CampoHabitosPersonales (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$habitosPersonales,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoHabito,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto

			$sql = "CALL SP_Registrar_HabitosPersonales (?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $habitosPersonales, PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}	
	}

	public function ConsultarHabitosPersonales(){
		$sql = "select id_habitos_personales, descripcion , estado from tbl_habitos_personales";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarHabitosPersonales($idHabPer,$habitosPersonales,$EstadoHabito){
		$sql = "CALL SP_Validar_CampoHabitosPersonales (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$habitosPersonales,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoHabito,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto

		$sql = "CALL sp_Actualizar_HabitosPersonales (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$idHabPer,PDO::PARAM_INT);
		$query->bindValue(2,$habitosPersonales, PDO::PARAM_STR);
		$query->bindValue(3,$EstadoHabito, PDO::PARAM_INT);
		$query->execute();
		$validadorHabPer = $query->rowCount();
		return $validadorHabPer;

		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}

	//----------------------------------------------------------------------------------------

	// Frecuencia

	public $id_frecuencia;
	public $descripcionF;

	//get
	public function getid_frecuencia()
	{
		return $this->id_frecuencia;
	}
	
	public function getdescripcionF()
	{
		return $this->descripcionF;
	}

	//set
	public function setid_frecuencia($id_frecuencia)
	{
		$this->id_frecuencia = $id_frecuencia;
	}

	public function setdescripcionF($descripcionF)
	{
		$this->descripcion = $descripcionF;
	}

	public function RegistrarFrecuencia ($DescrFrecuencia,$id_habito,$estadoFrec){
		$sql = "CALL SP_Validar_CampoFrecuencia (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$DescrFrecuencia,PDO::PARAM_STR);
		$query->bindValue(2, $id_habito,PDO::PARAM_INT);
		$query->bindValue(3, $estadoFrec,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto

			$sql = "CALL SP_Registrar_Frecuencia (?,?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $DescrFrecuencia, PDO::PARAM_STR);
			$query->bindValue(2,$id_habito, PDO::PARAM_INT);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}

	public function ConsultarFrecuencia(){
		$sql = "select hp.id_habitos_personales as id_hab, hp.descripcion as habito, f.id_frecuencia as id_frec, f.descripcion as frecuencia,f.estado from tbl_frecuencia f join tbl_habitos_personales hp on hp.id_habitos_personales = f.id_habitos_personales";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarFrecuencia($id_Frecu,$DescrFrecuencia, $id_habito,$estadoFrec){//los parametros de entrada son iguales a los definidos en el procedimieto de la DB
		$sql = "CALL SP_Validar_CampoFrecuencia (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$DescrFrecuencia,PDO::PARAM_STR);
		$query->bindValue(2, $id_habito,PDO::PARAM_INT);
		$query->bindValue(3, $estadoFrec,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto

		$sql = "CALL sp_Actualizar_Frecuencia (?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$id_Frecu, PDO::PARAM_INT);
		$query->bindValue(2,$DescrFrecuencia, PDO::PARAM_STR);
		$query->bindValue(3,$id_habito, PDO::PARAM_INT);
		$query->bindValue(4,$estadoFrec, PDO::PARAM_INT);
		$query->execute();
		$validadorFrec = $query->rowCount();

		return $validadorFrec;
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}

	//----------------------------------------------------------------------------------------

	// Tipo Medida

	public $id_tipo_medida;
	public $descripcionTP;

	//get
	public function getid_tipo_medida()
	{
		return $this->id_tipo_medida;
	}
	
	public function getdescripcionTP()
	{
		return $this->descripcionTP;
	}

	//set
	public function setid_tipo_medida($id_tipo_medida)
	{
		$this->id_tipo_medida = $id_tipo_medida;
	}

	public function setdescripcionTP($descripcionTP)
	{
		$this->descripcion = $descripcionTP;
	}

	public function RegistrarTipoMedida ($descripcionTP){
		$sql = "CALL SP_Validar_TipoMedida (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$descripcionTP,PDO::PARAM_STR);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto

			$sql = "CALL SP_Registrar_TipoMedida (?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $descripcionTP, PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}

	public function ConsularTipoMedida(){
		$sql = "select id_tipo_medida, descripcion from tbl_tipo_medida";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarTipoMedida($id_TipMed,$_tipoMedida){
		$sql = "CALL sp_Actualizar_TipoMedida (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$id_TipMed,PDO::PARAM_INT);
		$query->bindValue(2,$_tipoMedida, PDO::PARAM_STR);
		$query->execute();
		$validadorTipMed = $query->rowCount();
		return $validadorTipMed;
	}
	//----------------------------------------------------------------------------------------

	// Municipio

	public $id_municipio;
	public $descripcionMC;

	//get
	public function getid_municipio()
	{
		return $this ->id_municipio;
	}
	
	public function getdescripcion()
	{
		return $this->descripcionMC;
	}

	//set
	public function setid_municipio($id_municipio)
	{
		$this->id_municipio = $id_municipio;
	}

	public function setdescripcionMC($descripcionMC)
	{
		$this->descripcionMC = $descripcionMC;
	}

	public function RegistrarMunicipio($municipioDepar, $departamentoM,$EstadoMuni){
		$sql = "CALL SP_Validar_CampoMunicipio  (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$municipioDepar,PDO::PARAM_STR);
		$query->bindValue(2,$departamentoM,PDO::PARAM_INT);
		$query->bindValue(3,$EstadoMuni,PDO::PARAM_INT);
		$query->execute();


		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto

			$sql = "CALL SP_Registrar_Municipio (?,?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $municipioDepar, PDO::PARAM_STR);
			$query->bindValue(2, $departamentoM,PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}

	public function ConsultarMunicipio(){
		$sql ="select m.id_municipio, CONCAT(UPPER(LEFT(m.descripcion, 1)), LOWER(SUBSTRING(m.descripcion, 2))) municipio, d.id_departamento, CONCAT(UPPER(LEFT(d.descripcion, 1)), LOWER(SUBSTRING(d.descripcion, 2))) departamento, m.estado from tbl_municipio m join tbl_departamento d on (m.id_departamento = d.id_departamento)";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	
	public function EditarMunicipio($departamentoM, $municipioDepar,$_id_Muni,$EstadoMuni){//los parametros de entrada son iguales a los definidos en el procedimieto de la DB
		$sql = "CALL SP_Validar_CampoMunicipio  (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$municipioDepar,PDO::PARAM_STR);
		$query->bindValue(2,$departamentoM,PDO::PARAM_INT);
		$query->bindValue(3,$EstadoMuni,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto

		$sql = "CALL sp_Actualizar_Municipio (?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$_id_Muni, PDO::PARAM_INT);
		$query->bindValue(2,$municipioDepar, PDO::PARAM_STR);
		$query->bindValue(3,$departamentoM, PDO::PARAM_INT);
		$query->bindValue(4,$EstadoMuni, PDO::PARAM_INT);
		$query->execute();		
		$validadorMuni = $query->rowCount();

		return $validadorMuni;
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
		
	}
	//----------------------------------------------------------------------------------------

	//Escolaridad

	public $id_escolaridad;
	public $descripcionE;

	//get
	public function getid_escolaridad()
	{
		return $this->id_escolaridad;
	}
	
	public function getdescripcionE()
	{
		return $this->descripcionE;
	}

	//set
	public function setid_escolaridad($id_escolaridad)
	{
	
		$this->id_escolaridad = $id_escolaridad;
	}

	public function setdescripcionE($descripcionE)
	{
		$this->descripcion = $descripcionE;
	}

	public function RegistrarEscolaridad ($Escolaridad,$EstEscolaridad)
	{
		$sql = "CALL SP_Validar_CampoEscolaridad (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$Escolaridad,PDO::PARAM_STR);
		$query->bindValue(2,$EstEscolaridad,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	
			$sql = "CALL SP_Registrar_Escolaridad (?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $Escolaridad, PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}

	}
	public function ConsultarEscolaridad(){
		$sql = "select id_escolaridad, descripcion,estado from tbl_escolaridad";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarEscolaridad($_id_Escolaridad,$Escolaridad,$EstEscolaridad){
		$sql = "CALL SP_Validar_CampoEscolaridad (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$Escolaridad,PDO::PARAM_STR);
		$query->bindValue(2,$EstEscolaridad,PDO::PARAM_INT);
		$query->execute();
		if($query->fetchColumn()==0){
			$sql = "CALL sp_Actualizar_Escolaridad (?,?,?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1,$_id_Escolaridad,PDO::PARAM_INT);
			$query->bindValue(2,$Escolaridad, PDO::PARAM_STR);
			$query->bindValue(3,$EstEscolaridad, PDO::PARAM_INT);
			$query->execute();
			$validadorEsc = $query->rowCount();
			return $validadorEsc;
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}
	//----------------------------------------------------------------------------------------

	//Inicio Departamento
	public $id_departamento;
	public $descripcionD;

	//get
	public function getid_departamento()
	{
		return $this->id_departamento;
	}
	public function getdescripcionD()
	{
		return $this->descripcionD;
	}
	//set
	public function setid_departamento($id_departamento)
	{
		$this->id_departamento = $id_departamento;
	}
	public function setDescripcionD()
	{
		$this->descripcion = $descripcionD;
	}

	public function RegistrarDepartamento($Departamento,$EstDepartamento)
	{
		$sql = "CALL SP_Validar_CampoDepartamento (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$Departamento,PDO::PARAM_STR);
		$query->bindValue(2,$EstDepartamento,PDO::PARAM_INT);
		$query->execute();
		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	
			$sql = "CALL SP_Registrar_Departamento (?)";
			$query = $this->db->prepare($sql);
			$query -> bindValue(1, $Departamento, PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
		
	}

	public function ConsultarDepartamento()
	{
		$sql = "select id_departamento,descripcion as departamento, estado from tbl_departamento";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarDepartamento($id_Depar,$Departamento,$EstDepartamento){
		$sql = "CALL SP_Validar_CampoDepartamento (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$Departamento,PDO::PARAM_STR);
		$query->bindValue(2,$EstDepartamento,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	
		
		$sql = "CALL sp_Actualizar_Departamento (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$id_Depar,PDO::PARAM_INT);
		$query->bindValue(2,$Departamento, PDO::PARAM_STR);
		$query->bindValue(3,$EstDepartamento, PDO::PARAM_INT);
		$query->execute();
		$validadorDepar = $query->rowCount();
		return $validadorDepar;

		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}
	
	//----------------------------------------------------------------------------------------
	

	//Tipo Antecedente
	
	public $id_tipoAntecedente;
	public $descripcion;

	//get
	public function getid_tipoAntecedente()
	{
		return $this->id_tipoAntecedente;
	}
	public function getDescripcionTA()
	{
		return $this->descripcionTA;
	}
	//set
	public function setid_tipoAntecedente($id_tipoAntecedente)
	{
		$this->id_tipoAntecedente = $id_tipoAntecedente;
	}
	public function setDescripcionTA($descripcionTA)
	{
		$this->descripcionTA = $descripcionTA;
	}

	public function RegistrarTipoAntecedente($DescripTipoAntecedente,$EstadoTipAnt)
	{
		$sql = "CALL SP_Validar_CampoTipoAntecedente (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$DescripTipoAntecedente,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoTipAnt,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	
			$sql = "CALL SP_Registrar_TipoAntecedente (?)";
			$query = $this->db->prepare($sql);
			$query -> bindValue(1, $DescripTipoAntecedente, PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
		
	} 

	public function ConsultarTipoAntecedente()
	{
		$sql = "select id_tipo_antecedente, descripcion as tipo_Antecedente, estado from tbl_tipo_antecedente";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarTipAnt($id_TipAnt,$DescripTipoAntecedente,$EstadoTipAnt){
		$sql = "CALL SP_Validar_CampoTipoAntecedente (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$DescripTipoAntecedente,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoTipAnt,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto
		$sql = "CALL sp_Actualizar_TipoAntecedente (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$id_TipAnt,PDO::PARAM_INT);
		$query->bindValue(2,$DescripTipoAntecedente, PDO::PARAM_STR);
		$query->bindValue(3,$EstadoTipAnt, PDO::PARAM_INT);
		$query->execute();
		$validadortipAnt = $query->rowCount();
		return $validadortipAnt;
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}
	//----------------------------------------------------------------------------------------

	//Distribucion Antecedente

	public $id_DistribucionAntecedente;
	public $descripcionDA;

	//get
	public function getid_DistribucionAntecedente()
	{
		return $this->id_DistribucionAntecedente;
	}
	public function getdescripcionDA()
	{
		return $this->descripcionDA;
	}
	//set
	public function setid_DistribucionAntecedente($id_DistribucionAntecedente)
	{
		$this->id_DistribucionAntecedente = $id_DistribucionAntecedente;
	}
	public function setDescripcion($descripcionDA)
	{
		$this->descripcionDA = $descripcionDA;
	}


	public function RegistrarDistribucionAntecedente($id_Anteceden,$DescripTipoAntecedente,$EstadoAntecedente)
	{
		$sql = "CALL SP_Validar_CampoClasificacionAntecedente (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$DescripTipoAntecedente,PDO::PARAM_STR);
		$query->bindValue(2,$id_Anteceden,PDO::PARAM_INT);
		$query->bindValue(3,$EstadoAntecedente,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	
			$sql = "CALL SP_Registrar_ClasificacionAntecedentes (?,?)";
			$query = $this->db->prepare($sql);
			$query -> bindValue(1, $id_Anteceden, PDO::PARAM_INT);
			$query -> bindValue(2, $DescripTipoAntecedente, PDO::PARAM_STR);
			$query -> execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}

	}

	public function consultarDistribucionAntecedente()
	{
		$sql = "select Ca.id_clasificacion_antecedentecol, ta.id_tipo_antecedente, CONCAT(UPPER(LEFT(Ca.descripcion, 1)), LOWER(SUBSTRING(Ca.descripcion, 2))) distribucion, CONCAT(UPPER(LEFT(ta.descripcion, 1)), LOWER(SUBSTRING(ta.descripcion, 2))) antecedente, Ca.estado FROM tbl_clasificacion_antecedente Ca INNER JOIN tbl_tipo_antecedente ta ON (Ca.id_tipo_antecedente = ta.id_tipo_antecedente)";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	public function EditarDistribucionAntecedente($id_Anteceden,$DescripTipoAntecedente,$_id_ant,$EstadoAntecedente){
		$sql = "CALL SP_Validar_CampoClasificacionAntecedente (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$DescripTipoAntecedente,PDO::PARAM_STR);
		$query->bindValue(2,$id_Anteceden,PDO::PARAM_INT);
		$query->bindValue(3,$EstadoAntecedente,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	
		
		$sql = "CALL sp_Actualizar_DistribucionAntecedente (?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$id_Anteceden, PDO::PARAM_INT);
		$query->bindValue(2,$DescripTipoAntecedente,PDO::PARAM_STR);
		$query->bindValue(3,$_id_ant, PDO::PARAM_INT);
		$query->bindValue(4,$EstadoAntecedente, PDO::PARAM_INT);
		$query->execute();
		$validadorDistribucionAnt = $query->rowCount();
		return $validadorDistribucionAnt;
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}
	//----------------------------------------------------------------------------------------

	//Partes cuerpo


	public $id_PartesCuerpo;
	public $descripcionPC;

	//get
	public function getid_PartesCuerpo()
	{
		return $this->id_PartesCuerpo;
	}
	public function getdescripcioPCn()
	{
		return $this->descripcionPC;
	}
	//set
	public function setid_PartesCuerpo($id_PartesCuerpo)
	{
		$this->id_PartesCuerpo = $id_PartesCuerpo;
	}
	public function setDescripcionPC($descripcionPC)
	{
		$this->descripcionPC = $descripcionPC;
	}

	public function RegistrarPartesCuerpo($ParteCuerpo,$EstadoPC)
	{
		$sql = "CALL SP_Validar_CampoParteCuerpo (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$ParteCuerpo,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoPC,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	
			$sql = "CALL SP_Registrar_ParteCuerpo (?)";
			$query = $this->db->prepare($sql);
			$query -> bindValue(1, $ParteCuerpo, PDO:: PARAM_STR);
			$query -> execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}	
	}
	public function EditarPartesCuerpo($id_PartCuer,$ParteCuerpo,$EstadoPC){
		$sql = "CALL SP_Validar_CampoParteCuerpo (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$ParteCuerpo,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoPC,PDO::PARAM_INT);
		$query->execute();
		if($query->fetchColumn()==0){

		$sql = "CALL sp_Actualizar_PartesCuerpo (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$id_PartCuer,PDO::PARAM_INT);
		$query->bindValue(2,$ParteCuerpo, PDO::PARAM_STR);
		$query->bindValue(3,$EstadoPC, PDO::PARAM_INT);
		$query->execute();
		$validadortipParCuer = $query->rowCount();
		return $validadortipParCuer;
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}
	public function ConsultarPartesCuerpo()
	{
		$sql = "select id_parte_cuerpo, descripcion as partesCuerpo, estado from tbl_parte_cuerpo";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	//----------------------------------------------------------------------------------------

	//Especializacion

	public $id_especializacion;
	public $especializacion;

	//get
	public function getid_especializacion()
	{
		return $this->id_especializacion;
	}
	public function getespecializacion()
	{
		return $this->especializacion;
	}
	//set
	public function setid_especializacion($id_especializacion)
	{
		$this->id_especializacion = $id_especializacion;
	}
	public function setespecializacion($especializacion)
	{
		$this->especializacion = $especializacion;
	}

	public function RegistrarEspecializacion($especializacion,$EstadoEspec)
	{
		$sql = "CALL SP_Validar_CampoEspecializacion (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$especializacion,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoEspec,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	

			$sql = "CALL SP_Registrar_Especializacion (?)";
			$query = $this->db->prepare($sql);
			$query -> bindValue(1, $especializacion, PDO:: PARAM_STR);
			$query -> execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}

	}

	public function EditarEspecializacion($_id_Espcia, $especializacion,$EstadoEspec){
		$sql = "CALL SP_Validar_CampoEspecializacion (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$especializacion,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoEspec,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){
		$sql = "CALL sp_Actualizar_Especializacion (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$_id_Espcia, PDO::PARAM_INT);
		$query->bindValue(2,$especializacion, PDO::PARAM_STR);
		$query->bindValue(3,$EstadoEspec, PDO::PARAM_INT);
		$query->execute();
		$validadorEsp = $query->rowCount();
		return $validadorEsp;

		}else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}
	public function ConsultarEspecializacion(){
		$sql = "select id_especializacion, descripcion, estado from tbl_especializacion";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
		//----------------------------------------------------------------------------------------

	//Distribucion partes del cuerpo

	public $id_DistribucionPartesCuerpo;
	public $descripcionDPC;

	//get
	public function getid_DistribucionPartesCuerpo()
	{
		return $this->id_DistribucionPartesCuerpo;
	}
	public function getdescripcionDPC()
	{
		return $this->descripcionDPC;
	}
	//set
	public function setid_DistribucionPartesCuerpo($id_DistribucionPartesCuerpo)
	{
		$this->id_DistribucionPartesCuerpo = $id_DistribucionPartesCuerpo;
	}
	public function setDescripcionDPC($descripcionDPC)
	{
		$this->descripcionDPC = $descripcionDPC;
	}

	public function RegistrarDistribucionPartesCuerpo($PartesCuerpo, $DescripcionDistribucion,$EstadoDistPC)
	{
		$sql = "CALL SP_Validar_CampoClasificacionParteCuerpo (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$DescripcionDistribucion,PDO::PARAM_STR);
		$query->bindValue(2,$PartesCuerpo,PDO::PARAM_INT);
		$query->bindValue(3,$EstadoDistPC,PDO::PARAM_INT);
		$query->execute();
		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	

			$sql = "CALL SP_Registrar_ClasePartesCuerpo (?,?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $PartesCuerpo, PDO:: PARAM_INT);
			$query->bindValue(2, $DescripcionDistribucion, PDO:: PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}

	}

	public function ConsultarDistribucionParteCuerpo()
	{
		$sql = "select cp.id_clase_parte_cuerpo as id_clasePart, CONCAT(UPPER(LEFT(cp.descripcion, 1)), LOWER(SUBSTRING(cp.descripcion, 2))) distribucionPC, cp.id_parte_cuerpo as id_ParteCuer, CONCAT(UPPER(LEFT(pc.descripcion, 1)), LOWER(SUBSTRING(pc.descripcion, 2))) ParteCuerpo, cp.estado FROM tbl_clase_parte_cuerpo cp INNER JOIN tbl_parte_cuerpo pc ON (cp.id_parte_cuerpo = pc.id_parte_cuerpo)";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarDistribucionPartesCuerpo($_id_Clase_Par_Cuer,$DescripcionDistribucion,$PartesCuerpo,$EstadoDistPC){
		$sql = "CALL SP_Validar_CampoClasificacionParteCuerpo (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$DescripcionDistribucion,PDO::PARAM_STR);
		$query->bindValue(2,$PartesCuerpo,PDO::PARAM_INT);
		$query->bindValue(3,$EstadoDistPC,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	

		$sql = "CALL sp_Actualizar_DistibucionParteCuerpo (?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$_id_Clase_Par_Cuer,PDO::PARAM_INT);
		$query->bindValue(2,$DescripcionDistribucion,PDO::PARAM_STR);
		$query->bindValue(3,$PartesCuerpo,PDO::PARAM_INT);
		$query->bindValue(4,$EstadoDistPC,PDO::PARAM_INT);
		$query->execute();
		$validadortipDistriParCuer = $query->rowCount();
		return $validadortipDistriParCuer;

		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}
	//----------------------------------------------------------------------------------------

	//Estado Distribucion Partes Cuerpo
	public $id_EstadoDistribucionPartesCuerpo;
	public $DescripcionEstadoDistribucionPartesCuerpo;

	//get
	public function getid_EstadoDistribucionPartesCuerpo()
	{
		return $this->id_EstadoDistribucionPartesCuerpo;
	}
	public function getDescripcionEstadoDistribucionPartesCuerpo()
	{
		return $this->DescripcionEstadoDistribucionPartesCuerpo;
	}
	//set
	public function setid_EstadoDistribucionPartesCuerpo($id_EstadoDistribucionPartesCuerpo)
	{
		$this->id_EstadoDistribucionPartesCuerpo = $id_EstadoDistribucionPartesCuerpo;
	}
	public function setDescripcionEstadoDistribucionPartesCuerpo($DescripcionEstadoDistribucionPartesCuerpo)
	{
		$this->DescripcionEstadoDistribucionPartesCuerpo = $DescripcionEstadoDistribucionPartesCuerpo;
	}

	public function RegistrarEstadoDistribucionParteCuerpo($EstadoDistribcionPC,$id_ClasePC,$EstadoEstPC){

		$sql = "CALL sp_validarEstadoDistribucionParteCuerpo (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$EstadoDistribcionPC,PDO::PARAM_STR);
		$query->bindValue(2,$id_ClasePC, PDO::PARAM_INT);
		$query->bindValue(3,$EstadoEstPC, PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	

			$sql = "CALL sp_RegistarEstadoDistribucionPartesCuerpo (?,?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1,$EstadoDistribcionPC, PDO::PARAM_STR);
			$query->bindValue(2,$id_ClasePC, PDO::PARAM_INT);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}
	public function ConsultarEstadoDistribucionPartesCuerpo(){
		$sql = "select est.id_estado, est.descripcion as estado, claseParCuerpo.id_clase_parte_cuerpo, claseParCuerpo.descripcion as distribucion, PartCuerpo.descripcion as parteCuerpo, est.estado as est from tbl_estado est join tbl_clase_parte_cuerpo claseParCuerpo on (est.id_clase_parte_cuerpo = claseParCuerpo.id_clase_parte_cuerpo) join tbl_parte_cuerpo PartCuerpo on (claseParCuerpo.id_parte_cuerpo = PartCuerpo.id_parte_cuerpo)";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function ConsultarEstadoDistriParCue2(){
		$sql="select ClasParCuerpo.descripcion as distribucion, PartCuerpo.descripcion as parteCuerpo, ClasParCuerpo.id_clase_parte_cuerpo from tbl_clase_parte_cuerpo ClasParCuerpo join tbl_parte_cuerpo PartCuerpo on (ClasParCuerpo.id_parte_cuerpo = PartCuerpo.id_parte_cuerpo)";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarEstadoDistribucionEstadoParteCuerpo($id_estUpd,$EstadoDistribcionPC,$id_ClasePC,$EstadoEstPC){
		$sql = "CALL sp_validarEstadoDistribucionParteCuerpo (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$EstadoDistribcionPC,PDO::PARAM_STR);
		$query->bindValue(2,$id_ClasePC, PDO::PARAM_INT);
		$query->bindValue(3,$EstadoEstPC, PDO::PARAM_INT);
		$query->execute();
		if($query->fetchColumn()==0){

		$sql = "CALL sp_ActualizarEstadoDistribucionParteCuerpo (?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$id_estUpd,PDO::PARAM_INT);
		$query->bindValue(2,$EstadoDistribcionPC,PDO::PARAM_STR);
		$query->bindValue(3,$id_ClasePC,PDO::PARAM_INT);
		$query->bindValue(4,$EstadoEstPC,PDO::PARAM_INT);
		$query->execute();
		
		$validadorEstDesPC = $query->rowCount();
		return $validadorEstDesPC;
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}

	//Estado Distribucion Partes Cuerpo
	//----------------------------------------------------------------------------------------

	//Aparato Sistema

	public $id_AparatoSistema;
	public $descripcionAP;

	//get
	public function getid_AparatoSistema()
	{
		return $this->id_AparatoSistema;
	}
	public function getdescripcionAP()
	{
		return $this->descripcionAP;
	}
	//set
	public function setid_AparatoSistema($id_AparatoSistema)
	{
		$this->id_AparatoSistema = $id_AparatoSistema;
	}
	public function setdescripcionAP($descripcionAP)
	{
		$this->descripcionAP = $descripcionAP;
	}

	public function RegistrarAparatoSistema($descripcionAP, $NombreAS,$EstadoAS)
	{
		$sql = "CALL SP_Validar_CampoAparatoSistema (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$descripcionAP,PDO::PARAM_STR);
		$query->bindValue(2,$NombreAS, PDO::PARAM_STR);
		$query->bindValue(3,$EstadoAS, PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	

			$sql = "CALL SP_Registrar_AparatoSistema (?,?)";
			$query = $this->db->prepare($sql);
			$query -> bindValue(1, $descripcionAP, PDO:: PARAM_STR);
			$query->bindValue(2,$NombreAS, PDO::PARAM_STR);
			$query -> execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}
	public function ConsultarAparatoSistema()
	{
		$sql = "select id_aparato_sistema, CONCAT(UPPER(LEFT(descripcion, 1)), LOWER(SUBSTRING(descripcion, 2))) aparatoSistema,nombre_aparato, estado FROM tbl_aparato_sistema";
		$query = $this->db->prepare($sql);		
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarAparatoSistema($_id_apa_sist,$descripcionAP,$NombreAS,$EstadoAS){
		$sql = "CALL SP_Validar_CampoAparatoSistema (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$descripcionAP,PDO::PARAM_STR);
		$query->bindValue(2,$NombreAS, PDO::PARAM_STR);
		$query->bindValue(3,$EstadoAS, PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){

		$sql = "CALL sp_Actualizar_AparatoSistema(?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$_id_apa_sist,PDO::PARAM_INT);
		$query->bindValue(2,$descripcionAP,PDO::PARAM_STR);
		$query->bindValue(3,$NombreAS,PDO::PARAM_STR);
		$query->bindValue(4,$EstadoAS,PDO::PARAM_INT);
		$query->execute();
		$NumComlAfecAS = $query->rowCount();
		return $NumComlAfecAS;
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}


	//----------------------------------------------------------------------------------------

	//Tipo dosificacion

	public $id_TipoDosificacion;
	public $TipoDosificacion;

	//get
	public function getid_TipoDosificacion()
	{
		return $this->id_TipoDosificacion;
	}
	public function getTipoDosificacion()
	{
		return $this->TipoDosificacion;
	}
	//set
	public function setid_TipoDosificacion($id_TipoDosificacion)
	{
		$this->id_TipoDosificacion = $id_TipoDosificacion;
	}
	public function setTipoDosificacion($TipoDosificacion)
	{
		$this->TipoDosificacion = $TipoDosificacion;
	}

	public function RegistrarTipoDosificacion($TipoDosificacion)
	{
		$sql = "CALL SP_Validar_CampoTipoDosificacion (?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$TipoDosificacion,PDO::PARAM_STR);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	

			$sql = "CALL SP_Registrar_tipoDosificacion (?)";
			$query = $this->db->prepare($sql);
			$query -> bindValue(1, $TipoDosificacion, PDO:: PARAM_STR);
			$query -> execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}

	}

	public function ConsultarTipoDosificacion()
	{
		$sql = "CALL SP_ConsultarTipoDosificacion";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarTipoDosificacion($_id_tipo_dosificacion,$_descripcionTDo){
		$sql = "CALL sp_Actualizar_TipoDosificacion (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$_id_tipo_dosificacion,PDO::PARAM_INT);
		$query->bindValue(2,$_descripcionTDo,PDO::PARAM_STR);
		$query->execute();
		$Validador = $query->rowCount();
		return $Validador;
	}

	//Begin Parentesco
	public $id_momento;
	public $momento;

	public function getIdmomento(){
		return $this->id_momento;
	}
	public function getMomento(){
		return $this->momento;
	}
	public function setIdmomento(){
		$this->id_momento = $id_momento;
	}
	public function setMomento(){
		$this->momento = $momento;
	}

	public function RegistrarMomento($Momento,$EstadoMomen){
		$sql = "CALL SP_Validar_CampoMomento(?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$Momento,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoMomen, PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	

			$sql = "CALL SP_Registrar_Momento (?)";
			$query = $this->db->prepare($sql);
			$query -> bindValue(1, $Momento, PDO::PARAM_STR);
			$query -> execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}

	public function ConsultarMomento(){
		$sql = "select id_momento, descripcion as momento, estado from tbl_momento";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarMomento($idMomen,$Momento,$EstadoMomen){
		$sql = "CALL SP_Validar_CampoMomento(?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$Momento,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoMomen, PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){

		$sql = "CALL sp_ActualizarMomento (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$idMomen, PDO::PARAM_INT);
		$query->bindValue(2,$Momento, PDO::PARAM_STR);
		$query->bindValue(3,$EstadoMomen, PDO::PARAM_INT);
		$query->execute();

		$validadorMomento = $query->rowCount();
		return $validadorMomento;
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}
	//End Prentesco

	//Begin Parentesco
	public $id_parentesco;
	public $descripcionParentesco;

	public function getIdParentesco(){
		return $this->id_parentesco;
	}
	public function getdescripcionParentesco(){
		return $this->descripcionParentesco;
	}
	public function setIdParentesco(){
		$this->id_parentesco = $id_parentesco;
	}
	public function setdescripcionParentesco(){
		$this->descripcionParentesco = $descripcionParentesco;
	}

	public function RegistrarParentesco($descripcionParentesco,$EstadoParentesco){
		$sql="CALL sp_validarParentesco(?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$descripcionParentesco, PDO::PARAM_STR);
		$query->bindValue(2,$EstadoParentesco, PDO::PARAM_INT);
		$query->execute();

		if ($query->fetchColumn()==0) {
			$sql = "CALL sp_Insertar_Parentesco (?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1, $descripcionParentesco, PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}else{
			echo "El campo ya existe en la base de datos";
		}
		
	}
	public function EditarParentesco($id_parent,$descripcionParentesco,$EstadoParentesco){
		$sql="CALL sp_validarParentesco(?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$descripcionParentesco, PDO::PARAM_STR);
		$query->bindValue(2,$EstadoParentesco, PDO::PARAM_INT);
		$query->execute();

		if ($query->fetchColumn()==0) {

		$sql = "CALL sp_ActualizarParentesco(?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$id_parent, PDO::PARAM_INT);
		$query->bindValue(2,$descripcionParentesco,PDO::PARAM_STR);
		$query->bindValue(3,$EstadoParentesco,PDO::PARAM_INT);
		$query->execute();

		$validarorParentesco = $query->rowCount();
		return $validarorParentesco;
		}else{
			echo "El campo ya existe en la base de datos ";
		}
	}
	public function ConsultarParentesco(){
		$sql = "select id_parentesco, descripcion as Parentesco, estado from tbl_parentesco";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	//End Parentesco

	//Begin Recomedación
	public $id_Recomendacion;
	public $Recomendacion;
	Public $sigla;

	public function getid_Recomendacion(){
		return $this->id_Recomendacion;
	}
	public function getRecomendacion(){
		return $this->Recomendacion;
	}
	public function getsigla(){
		return $this->sigla;
	}
	public function setid_Recomendacion(){
		$this->id_Recomendacion = $id_Recomendacion;
	}
	public function setRecomendacion(){
		$this->Recomendacion = $Recomendacion;
	}
	public function setSiglas(){
		$this->sigla = $sigla;
	}

	public function RegistrarRecomendacion($Recomendar,$Abrevia,$EstadoRecomendacion){
		$sql = "CALL sp_ValidarRecomendacion (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$Recomendar,PDO::PARAM_STR);
		$query->bindValue(2,$Abrevia,PDO::PARAM_STR);
		$query->bindValue(3,$EstadoRecomendacion,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	

			$sql = "CALL sp_RegistrarRecomendacion (?,?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1,$Recomendar,PDO::PARAM_STR);
			$query->bindValue(2,$Abrevia,PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}
	public function ConsultarRecomendacion(){
		$sql = "Select id_recomendacion_rango, descripcion as recomendacion, siglas, estado from tbl_recomendacion_rangos";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarRecomendacion($id_Recomenda,$Recomendar,$Abrevia,$EstadoRecomendacion){
		$sql = "CALL sp_ValidarRecomendacion (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$Recomendar,PDO::PARAM_STR);
		$query->bindValue(2,$Abrevia,PDO::PARAM_STR);
		$query->bindValue(3,$EstadoRecomendacion,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){
		$sql = "CALL sp_ActualizarRecomendacion (?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$id_Recomenda,PDO::PARAM_INT);
		$query->bindValue(2,$Recomendar,PDO::PARAM_STR);
		$query->bindValue(3,$Abrevia,PDO::PARAM_STR);
		$query->bindValue(4,$EstadoRecomendacion,PDO::PARAM_INT);
		$query->execute();

		$ValidadorRecomendacion = $query->rowCount();
		return $ValidadorRecomendacion;
			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}
	//Begin Tipo Rango
	public $id_tipo_Rango;
	public $descripcionTipoRango;

	public function getid_tipo_Rango(){
		return $this->id_tipo_Rango;
	}
	public function getdescripcionTipoRango(){
		return $this->descripcionTipoRango;
	}
	public function setid_tipo_Rango(){
		$this->id_tipo_Rango = $id_tipo_Rango;
	}
	public function setdescripcionTipoRango(){
		$this->descripcionTipoRango = $descripcionTipoRango;
	}
	
	public function RegistrarTipoRango($descripcionTipoRango,$EstadoTR){
		$sql = "CALL sp_ValidarTipoRango (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$descripcionTipoRango,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoTR,PDO::PARAM_INT);		
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	

			$sql = "CALL sp_RegistrarTipoRango (?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1,$descripcionTipoRango,PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}
	public function ConsultarTipoRango(){
		$sql = "select id_tipo_rango, descripcion as tipoRango, estado from tbl_tipo_rango";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarTipoRango($id_TipRan,$descripcionTipoRango,$EstadoTR){
		$sql = "CALL sp_ValidarTipoRango (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$descripcionTipoRango,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoTR,PDO::PARAM_INT);
		
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	

		$sql = "CALL sp_ActualizarTipoRango(?,?,?)";
		$query= $this->db->prepare($sql);
		$query->bindValue(1,$id_TipRan,PDO::PARAM_STR);
		$query->bindValue(2,$descripcionTipoRango,PDO::PARAM_INT);
		$query->bindValue(3,$EstadoTR,PDO::PARAM_INT);
		$query->execute();

		$ValidadorTipoRango = $query->rowCount();
		return $ValidadorTipoRango;
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}
	//Begin Rangos
	public $id_Rango;
	public $descripcionRango;

	public function getid_Rango(){
		return $this->id_Rango;
	}
	public function getdescripcionRango(){
		return $this->descripcionRango;
	}
	public function setid_Rango(){
		$this->id_Rango = $id_Rango;
	}
	public function setdescripcionRango(){
		$this->descripcionRango = $descripcionRango;
	}
	
	public function RegistrarRango($descripcionRango,$id_Ti_Ran,$EstadoR){
		$sql = "CALL SP_Validar_CampoRango (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$descripcionRango,PDO::PARAM_STR);
		$query->bindValue(2,$id_Ti_Ran,PDO::PARAM_INT);
		$query->bindValue(3,$EstadoR,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	

			$sql = "CALL sp_RegistrarRango (?,?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1,$descripcionRango,PDO::PARAM_STR);
			$query->bindValue(2,$id_Ti_Ran,PDO::PARAM_INT);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}
	public function ConsultarRango(){
		$sql = "select r.id_rango, tr.id_tipo_rango, r.descripcion as Rangos, tr.descripcion as TipoRangoC, r.estado from tbl_rango r join tbl_tipo_rango tr on (r.id_tipo_rango = tr.id_tipo_rango)";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarRango($id_Ti_Ran,$descripcionRango,$id_Ran,$EstadoR){
		$sql = "CALL SP_Validar_CampoRango (?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$descripcionRango,PDO::PARAM_STR);
		$query->bindValue(2,$id_Ti_Ran,PDO::PARAM_INT);
		$query->bindValue(3,$EstadoR,PDO::PARAM_INT);
		$query->execute();


		if($query->fetchColumn()==0){
		$sql = "CALL sp_ActualizarRango(?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$id_Ti_Ran,PDO::PARAM_INT);
		$query->bindValue(2,$descripcionRango,PDO::PARAM_STR);
		$query->bindValue(3,$id_Ran,PDO::PARAM_INT);
		$query->bindValue(4,$EstadoR,PDO::PARAM_INT);
		$query->execute();

		$ValidadorRango = $query->rowCount();
		return $ValidadorRango;
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos ";
		}
	}
	//Begin Registrar Clasificación Alimento
		public function RegistrarClasificacionAlimento($_clasificacion,$EstadoClasifi){
		$sql = "CALL SP_Validar_Campo_Clasificacion (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$_clasificacion,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoClasifi,PDO::PARAM_INT);
		$query->execute();
		if($query->fetchColumn()==0){ //si no El campo ya existe en la base de datos el dato lo inserto	

			$sql = "CALL SP_RegistrarClasificacion (?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1,$_clasificacion,PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
		}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}
	public function EditarClasificacionAlimentosMA($_clasificacion,$id_ClasifiAM,$EstadoClasifi){
		$sql = "CALL SP_Validar_Campo_Clasificacion (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$_clasificacion,PDO::PARAM_STR);
		$query->bindValue(2,$EstadoClasifi,PDO::PARAM_INT);
		$query->execute();

		if($query->fetchColumn()==0){
			
			$sql = "CALL sp_EditarClasificacionAliementos (?,?,?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1,$_clasificacion,PDO::PARAM_STR);
			$query->bindValue(2,$id_ClasifiAM,PDO::PARAM_INT);
			$query->bindValue(3,$EstadoClasifi,PDO::PARAM_INT);
			$query->execute();
			
			$ValidadorClasificaiconAlimentos = $query->rowCount();
			return $ValidadorClasificaiconAlimentos;
			}
		else
		{ //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
			echo "El campo ya existe en la base de datos";
		}
	}

	public function ConsultarClasificacion(){
		$sql = "select id_clasificacion,descripcion as clasificacion, estado FROM tbl_clasificacion";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function ConsultarUnidadMedida(){
		$sql="select id_unidad_medida,descripcion as UniMedi from tbl_unidad_medida";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	//Begin Alimentos
	public function RegistrarAlimentosM($A_descripcion,$A_ClasificacionA){
		$sql = "CALL SP_Validar_CampoAlimento (?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$A_descripcion,PDO::PARAM_STR);
		$query->bindValue(2,$A_ClasificacionA,PDO::PARAM_INT);
		$query->execute();

		return $query->fetchColumn();
	}
	public function RegistrarAlimentos($A_descripcion,$A_grasas,$A_ClasificacionA,$A_unidadMedida,$A_peso,$A_carbohidratos,$A_proteinas,$A_IndiceGlucemico)
	{
			$sql = "CALL sp_RegistrarAlimentos (?,?,?,?,?,?,?,?)";
			$query = $this->db->prepare($sql);
			$query->bindValue(1,$A_descripcion,PDO::PARAM_STR);
			$query->bindValue(2,$A_grasas,PDO::PARAM_STR);
			$query->bindValue(3,$A_ClasificacionA,PDO::PARAM_INT);
			$query->bindValue(4,$A_unidadMedida,PDO::PARAM_INT);
			$query->bindValue(5,$A_peso,PDO::PARAM_STR);
			$query->bindValue(6,$A_carbohidratos,PDO::PARAM_STR);
			$query->bindValue(7,$A_proteinas,PDO::PARAM_STR);
			$query->bindValue(8,$A_IndiceGlucemico,PDO::PARAM_STR);
			$query->execute();

			echo "¡ Registro Exitoso !";
	}
	public function ConsultarAlimentosMaestras(){
		$sql = "select a.id_alimento,a.descripcion as Alimento,um.id_unidad_medida,cl.id_clasificacion, um.descripcion as unidadMedida, cl.descripcion as Clasificacion, a.peso, a.carbohidratos,a.proteinas,a.grasas,a.indice_Glucemico,a.estado  from tbl_alimento a join tbl_unidad_medida um on (a.id_unidad_medida=um.id_unidad_medida)join tbl_clasificacion cl on (a.id_clasificacion = cl.id_clasificacion)";
		$query = $this->db->prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}
	public function EditarAlimentos($A_descripcion,$A_grasas,$A_ClasificacionA,$A_unidadMedida,$A_peso,$A_carbohidratos,$A_proteinas,$A_IndiceGlucemico,$A_id_Alimento,$EstadoAlimento){
		$sql = "CALL sp_ActualizarAlimentos(?,?,?,?,?,?,?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->bindValue(1,$A_descripcion,PDO::PARAM_STR);
		$query->bindValue(2,$A_grasas,PDO::PARAM_STR);
		$query->bindValue(3,$A_ClasificacionA,PDO::PARAM_INT);
		$query->bindValue(4,$A_unidadMedida,PDO::PARAM_INT);
		$query->bindValue(5,$A_peso,PDO::PARAM_STR);
		$query->bindValue(6,$A_carbohidratos,PDO::PARAM_STR);
		$query->bindValue(7,$A_proteinas,PDO::PARAM_STR);
		$query->bindValue(8,$A_IndiceGlucemico,PDO::PARAM_STR);
		$query->bindValue(9,$A_id_Alimento,PDO::PARAM_INT);
		$query->bindValue(10,$EstadoAlimento,PDO::PARAM_INT);
		$query->execute();

		$ValidadorEditarAlimentos = $query->rowCount();
		return $ValidadorEditarAlimentos;
	}
}

?>