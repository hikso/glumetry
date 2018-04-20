 <?php


 class Datos extends Controller
 {

   function __construct()
   {

       parent::__construct("modelDatos");
   }

   public function index()
   {        
    $genero = $this->model->ConsultarGenero();
    $tipoDocumento = $this->model->ConsultarTipoDocumento();
    $estadoCivil = $this->model->ConsultarEstadoCivil();
    $habitosPersonales = $this->model->ConsultarHabitosPersonales();
    $frecuencia = $this->model->ConsultarFrecuencia();
    $tipoMedida = $this->model->ConsularTipoMedida();
    $escolaridad = $this->model->ConsultarEscolaridad();
    $departamento = $this->model->ConsultarDepartamento();
    $municipio = $this->model->ConsultarMunicipio();
    $tipoAntecedente = $this->model->ConsultarTipoAntecedente();
    $distribucionAntecedente = $this->model->consultarDistribucionAntecedente();
    $partesCuerpo = $this->model->ConsultarPartesCuerpo();
    $distribucionPartesCuerpo = $this->model->ConsultarDistribucionParteCuerpo();
    $especializacion = $this->model->ConsultarEspecializacion();
    $tipoDosificacion = $this->model->ConsultarTipoDosificacion();
    $aparatoSistema = $this->model->ConsultarAparatoSistema();
    $estadoDistribucionPartesCuerpo = $this->model->ConsultarEstadoDistribucionPartesCuerpo();
    $estadoDistriParCue2 = $this->model->ConsultarEstadoDistriParCue2();
    $momento = $this->model->ConsultarMomento();
    $parentesco = $this->model->ConsultarParentesco();
    $recomendacion = $this->model->ConsultarRecomendacion();
    $tipoRango = $this->model->ConsultarTipoRango();
    $rangos = $this->model->ConsultarRango();
    $clasificacion = $this->model->ConsultarClasificacion();
    $unidadMedida = $this->model->ConsultarUnidadMedida();
    $alimentos = $this->model->ConsultarAlimentosMaestras();
    $this->cargarVista();
    require APP . 'view/_templates/header.php';
    require APP . 'view/Datos/indexAdmin.php';
    require APP . 'view/_templates/footer.php'; 
    
}
public function cargarVista()
{
    session_start();

    // load views
      if (isset($_SESSION['tipeUser'])) {
        if ($_SESSION['tipeUser'] !=3) {
            
            header('location:'.URL.'Cuentas/access');
            exit();
        }

      }
}
    //Inico Genero
public function RegistrarGenero()
{
    $descripcionG = $_POST["txtGenero"];
    $EstadoG = $_POST["SelectEstadoGenero"];
    $this->model->RegistrarGenero($descripcionG,$EstadoG);
}
public function ConsultarGenero(){
    $genero = $this->model->ConsultarGenero();

    echo json_encode($genero);

}
public function EditarGenero(){
    $id = $_POST['txtid'];
    $descripcionG = $_POST['txtGenero'];
    $EstadoG = $_POST['SelectEstadoGenero'];
    $ComlAfec = $this->model->EditarGenero($id,$descripcionG,$EstadoG);

    if($ComlAfec>0){
        echo " Actualización Correcta ";          
    }else{
        echo " No se Actualizo ";
    }

}
    //Fin Genero
    //Inicio Estado Parto
public function RegistrarEstadoParto()
{
    $descripcionEP = $_POST["txtEstadoParto"];
    $this->model->RegistrarEstadoParto($descripcionEP);

}
public function EditarEstadoParto(){
    $idEstPar = $_POST['txtIdEstParto'];
    $_descripcionEP = $_POST['txtEstadoParto'];
    $ComlAfec = $this->model->EditarEstadoParto($idEstPar,$_descripcionEP);

    if($ComlAfec>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";                     
    }        
}
public function ConsulgtarEstadoParto(){
    $estadoParto = $this->$model->ConsultarEstadoParto();

    echo json_encode($estadoParto);
}
    //Fin estado Parto
    //Inicio TipoDosificacion
public function RegistrarTipoDosificacion()
{
    $descripcionTD = $_POST["txtTipoDosificacion"];
    $this->model->RegistrarTipoDosificacion($descripcionTD);
}
public function EditarTipoDosificacion(){
    $_id_tipo_dosificacion = $_POST['txtIdTipoDosificacion'];
    $_descripcionTDo = $_POST['txtTipoDosificacion'];
    $Validador = $this->model->EditarTipoDosificacion($_id_tipo_dosificacion,$_descripcionTDo);

    if($Validador>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";                     
    }
}
    //Fin Tipo Dosificacion    

public function RegistrarAparatoSistema()
{
    $descripcionAP = $_POST["TextAreaDescripcionAparato"];
    $NombreAS = $_POST['txtAparatoSistema'];
    $EstadoAS = $_POST['SelectEstadoAparaSistema'];
    $this->model->RegistrarAparatoSistema($descripcionAP, $NombreAS,$EstadoAS);

}
public function EditarAparatoSistema(){
    $_id_apa_sist = $_POST['txtIdApaSis'];
    $descripcionAP = $_POST['txtAparatoSistema'];
    $NombreAS = $_POST['TextAreaDescripcionAparato'];
    $EstadoAS = $_POST['SelectEstadoAparaSistema'];
    $NumComlAfecAS = $this->model->EditarAparatoSistema($_id_apa_sist,$descripcionAP,$NombreAS,$EstadoAS);

    if($NumComlAfecAS>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";                     
    }
}
public function ConsultarAparatosistema(){
    $aparatoSistema = $this->model->ConsultarAparatoSistema();
    echo json_encode($aparatoSistema);
}
    //Inicio Especializacion

public function RegistrarEspecializacion()
{
    $especializacion = $_POST["txtEspecializacion"];
    $EstadoEspec = $_POST["SelectEstadoEspciliza"];
    $this->model->RegistrarEspecializacion($especializacion,$EstadoEspec);

}
public function EditarEspecialiazacion(){
    $_id_Espcia =$_POST['txtIdEspecializacion'];
    $especializacion = $_POST['txtEspecializacion'];
    $EstadoEspec = $_POST['SelectEstadoEspciliza'];
    $validadorEsp = $this->model->EditarEspecializacion($_id_Espcia,$especializacion,$EstadoEspec);

    if($validadorEsp>0){
     echo "Actualización Correcta";          
 }else{
    echo "No se Actualizo";                     
}
}

public function ConsultarEspecializacion(){
    $Espcializacion = $this->model->ConsultarEspecializacion();
    echo json_encode($Espcializacion);
}
//Inicio tipo Documento
public function RegistrarTipoDocumento()
{
    $_descripcionTD = $_POST['txtTipoDocumento'];
    $estadoTD = $_POST['SelectEstadoTD'];
    $this->model->RegistrarTipoDocumento($_descripcionTD,$estadoTD);            
}     
public function EditarTipoDocumento(){
    $_id_TD = $_POST['txtidTD'];
    $_descripcionTD = $_POST['txtTipoDocumento'];
    $estadoTD = $_POST['SelectEstadoTD'];
    $ComlAfecTD = $this->model->EditarTipoDocumento($_id_TD,$_descripcionTD,$estadoTD);

    if($ComlAfecTD>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarTipoDocumento(){
    $tipoDocumento = $this->model->ConsultarTipoDocumento();

    echo json_encode($tipoDocumento);

}
    //Fin Tipo Documento
public function RegistrarEstadoCivil()
{        
   $descripcion = $_POST['txtEstadoCivil'];
   $EstadoEstCil = $_POST['SelectEstadoEstCiv'];
   $this->model->RegistrarEstadoCivil($descripcion,$EstadoEstCil);
}
public function EditarEstadoCivil(){
    $id_ECivil = $_POST['txtIDEstadoCivil'];
    $_descripcionEC = $_POST['txtEstadoCivil'];
    $EstadoEstCil = $_POST['SelectEstadoEstCiv'];
    $ValidadorEC = $this->model->EditarEstadoCivil($id_ECivil,$_descripcionEC,$EstadoEstCil);

    if($ValidadorEC>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarEstadoCivil(){
    $EstadoCivil = $this->model->ConsultarEstadoCivil();

    echo json_encode($EstadoCivil);
}
public function RegistrarMetodoPlanificacion()
{        
   $descripcion = $_POST['txtMetodoPlanificacion'];
   $this->model->RegistrarMetodoPlanificacion($descripcion);
}
public function EditarMetodoPlanificacion(){
    $_idMetPlan = $_POST['txtIdMetPlanificacion'];
    $_DescrMetPla = $_POST['txtMetodoPlanificacion'];
    $ValidadorMP = $this->model->EditarMetodoPlanificacion($_idMetPlan,$_DescrMetPla);
    if($ValidadorMP>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarMetodoPlanificacion(){
    $metodoPlanifiacion = $this->model->ConsularMetodosPlanificacion();
    echo json_encode($metodoPlanifiacion);
}
public function RegistrarHabitosPersonales()
{
    $habitosPersonales = $_POST['txtHabitosPersonales'];
    $EstadoHabito = $_POST['SelectEstadoHabitosPer'];
    $this->model->RegistrarHabitosPersonales($habitosPersonales,$EstadoHabito);
}
public function EditarHabitosPersonales()
{
    $idHabPer = $_POST['txtIdHabPers'];
    $habitosPersonales = $_POST['txtHabitosPersonales'];
    $EstadoHabito = $_POST['SelectEstadoHabitosPer'];
    $validadorHabPer = $this->model->EditarHabitosPersonales($idHabPer,$habitosPersonales,$EstadoHabito);

    if($validadorHabPer>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarHabitosPersonales(){
    $habitosPersonales= $this->model->ConsultarHabitosPersonales();

    echo json_encode($habitosPersonales);
}
 //Inicio Frecuencia
public function RegistrarFrecuencia()
{
   $DescrFrecuencia = $_POST['txtFrecuencia'];
   $id_habito = $_POST['HabitoPersonal'];
   $estadoFrec = $_POST['SelectEstadoFrecuencia'];
   $this->model->RegistrarFrecuencia($DescrFrecuencia,$id_habito,$estadoFrec);
}
public function EditarFrecuencia()
{
    $id_Frecu = $_POST['txtIdFrecuencia'];
    $DescrFrecuencia = $_POST['txtFrecuencia'];
    $id_habito = $_POST['HabitoPersonal'];
    $estadoFrec = $_POST['SelectEstadoFrecuencia'];
    $validadorFrec = $this->model->EditarFrecuencia($id_Frecu,$DescrFrecuencia, $id_habito,$estadoFrec);

    if($validadorFrec>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarFrecuencia(){
    $Frecuencia = $this->model->ConsultarFrecuencia();

    echo json_encode($Frecuencia);
}
 //Fin Frecuencia
public function RegistrarTipoMedida()
{
    $descripcion = $_POST['txtTipoMedida'];
    $this->model->RegistrarTipoMedida($descripcion);

}
public function EditarTipoMedida()
{
    $id_TipMed = $_POST['txtIdTipoMedida'];
    $_tipoMedida = $_POST['txtTipoMedida'];
    $validadorTipMed = $this->model->EditarTipoMedida($id_TipMed,$_tipoMedida);

    if($validadorTipMed>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarTipoMedida(){
    $tipoMedida = $this->model->ConsularTipoMedida();
    
    echo json_encode($tipoMedida);
}
//Inicio Escolaridad
public function RegistrarEscolaridad()
{
   $Escolaridad = $_POST['txtEscolaridad'];
   $EstEscolaridad = $_POST['SelectEstadoEscolaridad'];
   $this->model->RegistrarEscolaridad($Escolaridad,$EstEscolaridad);
}
public function EditarEscolaridad()
{
    $_id_Escolaridad = $_POST['txtIdEcolaridad'];
    $Escolaridad = $_POST['txtEscolaridad'];
    $EstEscolaridad = $_POST['SelectEstadoEscolaridad'];
    $validadorEsc = $this->model->EditarEscolaridad($_id_Escolaridad,$Escolaridad,$EstEscolaridad);

    if($validadorEsc>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarEscolaridad(){
    $Escolaridad = $this->model->ConsultarEscolaridad();

    echo json_encode($Escolaridad);
}
    //Fin Escolaridad
    //Inicio Muicipio
public function RegistrarMunicipio()
{
    $municipioDepar = $_POST['txtMunicipio'];
    $departamentoM = $_POST['departamentoM'];
    $EstadoMuni = $_POST['SelectEstadoMunicipio'];
    $this->model->RegistrarMunicipio($municipioDepar, $departamentoM,$EstadoMuni);
}
public function EditarMunicipio()
{
    $_id_Muni = $_POST['txtIdMunicipio'];
    $_Municipio = $_POST['txtMunicipio'];
    $departamentoM = $_POST['departamentoM'];
    $EstadoMuni = $_POST['SelectEstadoMunicipio'];

    $validadorMuni = $this->model->EditarMunicipio($departamentoM,$_Municipio, $_id_Muni,$EstadoMuni);

    if($validadorMuni>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}

public function ConsultarMunicipios(){
    $municipio = $this->model->ConsultarMunicipio();

    echo json_encode($municipio);
}
 //Fin Municipio
public function RegistrarDepartamento()
{
    $Departamento = $_POST['txtDepartamento'];
    $EstDepartamento = $_POST['SelectEstadoDepartament'];
    $this->model->RegistrarDepartamento($Departamento,$EstDepartamento);
}
public function EditarDepartamento()
{
    $id_Depar = $_POST['txtIdDepar'];
    $Departamento = $_POST['txtDepartamento'];
    $EstDepartamento = $_POST['SelectEstadoDepartament'];
    $validadorDepar = $this->model->EditarDepartamento($id_Depar,$Departamento,$EstDepartamento);

    if($validadorDepar>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarDepartamento(){
    $departamento = $this->model->ConsultarDepartamento();

    echo json_encode($departamento);
}
//Tipo Antecedente
public function RegistrarTipoAntecedente()
{
    $DescripTipoAntecedente = $_POST['txtTipoAntecedente'];
    $EstadoTipAnt = $_POST['SelectEstadoTipoAntecedente'];
    $this->model->RegistrarTipoAntecedente($DescripTipoAntecedente,$EstadoTipAnt);
}
public function EditarTipAnt()
{
    $id_TipAnt = $_POST['txtIdTipoAntec'];
    $TipoAntece = $_POST['txtTipoAntecedente'];
    $EstadoTipAnt = $_POST['SelectEstadoTipoAntecedente'];
    $validadortipAnt = $this->model->EditarTipAnt($id_TipAnt,$TipoAntece,$EstadoTipAnt);

    if($validadortipAnt>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarTipoAntecedente(){
    $tipoAntecedente = $this->model->ConsultarTipoAntecedente();

    echo json_encode($tipoAntecedente);
}
public function RegistrarDistribucionAntecedente()
{
   $id_Anteceden = $_POST['TipoAntecedenteSelect'];
   $DescripTipoAntecedente = $_POST['txtDistribucionAntecedentes'];
   $EstadoAntecedente = $_POST['SelectEstadoDistriAnteceden'];
   $this->model->RegistrarDistribucionAntecedente($id_Anteceden, $DescripTipoAntecedente,$EstadoAntecedente);
}
public function EditarDistribucionAntecedente(){
   $_id_tipoAnt = $_POST['txtIdDistribuAntece'];
   $DescripTipoAntecedente = $_POST['txtDistribucionAntecedentes'];
   $_id_ant = $_POST['TipoAntecedenteSelect'];
   $EstadoAntecedente = $_POST['SelectEstadoDistriAnteceden'];
   $validadorDistribucionAnt = $this->model->EditarDistribucionAntecedente($_id_tipoAnt,$DescripTipoAntecedente,$_id_ant,$EstadoAntecedente);
   if ($validadorDistribucionAnt>0){
    echo "Actualizacion Correcta";
}else{
    echo "No se Actualizo";
}
}

public function ConsultarDistribuciuonAntecedente(){
    $distribucionAntecedente = $this->model->consultarDistribucionAntecedente();
    echo json_encode($distribucionAntecedente);
}

public function RegistrarPartesCuerpo()
{
    $ParteCuerpo = $_POST['txtPartesCuerpo'];
    $EstadoPC = $_POST['SelectEstadoParsCuerpo'];
    $this->model->RegistrarPartesCuerpo($ParteCuerpo,$EstadoPC);
}
public function EditarPartesCuerpo()
{
    $id_PartCuer = $_POST['txtIdParteCuerpo'];
    $ParteCuerpo = $_POST['txtPartesCuerpo'];
    $EstadoPC = $_POST['SelectEstadoParsCuerpo'];
    $validadortipParCuer = $this->model->EditarPartesCuerpo($id_PartCuer,$ParteCuerpo,$EstadoPC);

    if($validadortipParCuer>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarPartesCuerpo(){
    $partesCuerpo = $this->model->ConsultarPartesCuerpo();
    echo json_encode($partesCuerpo);
}

public function RegistrarDistribucionPartesCuerpo()
{
   $PartesCuerpo = $_POST['PartesCuerpoSelect'];
   $DescripcionDistribucion = $_POST['txtDistribucionPartesCuerpo'];
   $EstadoDistPC = $_POST['SelectEstadoDistriParsCuerpo'];
   $this->model->RegistrarDistribucionPartesCuerpo($PartesCuerpo, $DescripcionDistribucion,$EstadoDistPC);
}
public function EditarDistribucionPartesCuerpo()
{
    $_id_Clase_Par_Cuer = $_POST['txtUIdDistrPartesCuerpo'];
    $DescripcionDistribucion =$_POST['txtDistribucionPartesCuerpo'];
    $PartesCuerpo = $_POST['PartesCuerpoSelect'];
    $EstadoDistPC = $_POST['SelectEstadoDistriParsCuerpo'];
    $validadortipDistriParCuer = $this->model->EditarDistribucionPartesCuerpo($_id_Clase_Par_Cuer,$DescripcionDistribucion,$PartesCuerpo,$EstadoDistPC);

    if($validadortipDistriParCuer>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarDistribucionPartesCuerpo(){
    $distribucionPartesCuerpo = $this->model->ConsultarDistribucionParteCuerpo();
    echo json_encode($distribucionPartesCuerpo);
}
//Begin Estado Distribucion Partes Cuerpo
public function RegistrarEstadoDistribucionParteCuerpo(){
    $EstadoDistribcionPC = $_POST['txtEstadoPartesCuerpo'];
    $id_ClasePC = $_POST['EstadoDistribucioPartesCuerpoSelect'];
    $EstadoEstPC = $_POST['SelectEstadoEstParsCuerpo'];
    $this->model->RegistrarEstadoDistribucionParteCuerpo($EstadoDistribcionPC,$id_ClasePC,$EstadoEstPC);
}

public function EditarEstadoDistribucionParteCuerpo(){
    $id_estUpd = $_POST['txtId_EstadoPartesCuerpo'];
    $EstadoDistribcionPC = $_POST['txtEstadoPartesCuerpo'];
    $id_ClasePC = $_POST['EstadoDistribucioPartesCuerpoSelect'];
    $EstadoEstPC = $_POST['SelectEstadoEstParsCuerpo'];
    $validadorEstDesPC = $this->model->EditarEstadoDistribucionEstadoParteCuerpo($id_estUpd,$EstadoDistribcionPC,$id_ClasePC,$EstadoEstPC);

    if($validadorEstDesPC>0){
        echo "Actualización Correcta";
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarEstadoPartescuerpo(){
    $estadoDistribucionPartesCuerpo = $this->model->ConsultarEstadoDistribucionPartesCuerpo();
    echo json_encode($estadoDistribucionPartesCuerpo);
}
//Begin Momento
public function RegistrarMomento(){
    $Momento = $_POST['txtMomentoM'];
    $EstadoMomen = $_POST['SelectEstadoMomento'];
    $this->model->RegistrarMomento($Momento,$EstadoMomen);
}
public function EditarMomento(){
    $idMomen = $_POST['txtIdMomentoM'];
    $Momento = $_POST['txtMomentoM'];
    $EstadoMomen = $_POST['SelectEstadoMomento'];
    $validadorMomento = $this->model->EditarMomento($idMomen,$Momento,$EstadoMomen);
    if($validadorMomento>0){
        echo "Actualización Correcta";
    }else{
        echo "no se actualizo";
    }
}
public function ConsultarMomento(){
    $momento = $this->model->ConsultarMomento();
    echo json_encode($momento);
}
//End Momento
//Begin Parentesco
public function RegistrarParentesco(){
    $descripcionParentesco = $_POST["txtParentesco"];
    $EstadoParentesco = $_POST['SelectEstadoParentesco'];
    $this->model->RegistrarParentesco($descripcionParentesco,$EstadoParentesco);
}
public function EditarParentesco(){
    $id_parent = $_POST['txtIdParentescoM'];
    $descripcionParentesco = $_POST['txtParentesco'];
    $EstadoParentesco = $_POST['SelectEstadoParentesco'];

    $validarorParentesco = $this->model->EditarParentesco($id_parent,$descripcionParentesco,$EstadoParentesco);

    if ($validarorParentesco>0){
        echo "Actualización Correcta";          
    }else{
        echo "No se Actualizo";
    }
}
public function ConsultarParentesco(){
    $Parentesco = $this->model->ConsultarParentesco();
    echo json_encode($Parentesco);
}
//End Parentesco
//Begin Recomendacion
    public function RegistrarRecomendacion(){
        $Recomendar = $_POST['txtRecomendacionM'];
        $Abrevia = $_POST['txtSiglasM'];
        $EstadoRecomendacion = $_POST['SelectEstadoRecomendacion'];
        $this->model->RegistrarRecomendacion($Recomendar,$Abrevia,$EstadoRecomendacion);
    }
    public function EditarRecomendacion(){
        $id_Recomenda = $_POST['txtIdRecomendacionM'];
        $Recomendar = $_POST['txtRecomendacionM'];
        $Abrevia = $_POST['txtSiglasM'];
        $EstadoRecomendacion = $_POST['SelectEstadoRecomendacion'];
        $ValidadorRecomendacion = $this->model->EditarRecomendacion($id_Recomenda,$Recomendar,$Abrevia,$EstadoRecomendacion);

        if($ValidadorRecomendacion>0){
            echo "Actualización Correcta";
        }else{
            echo "No se Actualizo";
        }
    }
//End Recomendacion
//Begin Tipo Rango
    public function RegistrarTipoRango(){
        $descripcionTipoRango = $_POST['txtTipoRango'];
        $EstadoTR = $_POST['SelectEstadoTipoRango'];
        $this->model->RegistrarTipoRango($descripcionTipoRango,$EstadoTR);
    }
    public function EditarTipoRango(){
        $id_TipRan = $_POST['txtIdTipoRangoM'];
        $descripcionTipoRango = $_POST['txtTipoRango'];
        $EstadoTR = $_POST['SelectEstadoTipoRango'];
        $ValidadorTipoRango = $this->model->EditarTipoRango($id_TipRan,$descripcionTipoRango,$EstadoTR);

        if($ValidadorTipoRango>0){
            echo "Actualización Correcta";
        }else{
            echo "No se Actualizo";
        }
    }
    public function ConsultarTipoRango(){
        $tipoRango = $this->model->ConsultarTipoRango();
        echo json_encode($tipoRango);
    }
//End Tipo Rango
//Begin Registrar Rangos
    public function RegistrarRango(){
        $id_Ti_Ran = $_POST['TiposRangoSelect'];
        $descripcionRango = $_POST['txtRangoM'];
        $EstadoR = ['SelectEstadoRango'];
        $this->model->RegistrarRango($descripcionRango,$id_Ti_Ran,$EstadoR);
    }
    public function EditarRango(){
        $id_Ti_Ran = $_POST['TiposRangoSelect'];
        $descripcionRango = $_POST['txtRangoM'];
        $id_Ran = ['txtIdRangosM'];
        $EstadoR = ['SelectEstadoRango'];
        $ValidadorRango = $this->model->EditarRango($id_Ti_Ran,$descripcionRango,$id_Ran,$EstadoR);

        if($ValidadorRango>0){
            echo " Actualización Correcta";
        }else{
            echo " No se Actualizo";
        }
    }
    public function ConsultarRango(){
        $rangos = $this->model->ConsultarRango();
        echo json_encode($rangos);
    }
//Registrar Rangos
//Begin Clasificacion Alimentos
    public function RegistrarClasificacionAlimento(){
        $_clasificacion = $_POST['txtClasificacionAM'];
        $EstadoClasifi = $_POST['SelectEstadoClasificacionAlimentos'];
        $this->model->RegistrarClasificacionAlimento($_clasificacion,$EstadoClasifi);
    }
    public function EditarClasificacionAlimentosMA(){
        $_clasificacion = $_POST['txtClasificacionAM'];
        $id_ClasifiAM = $_POST['txtIdClasificacion'];
        $EstadoClasifi = $_POST['SelectEstadoClasificacionAlimentos'];
        $ValidadorClasificaiconAlimentos = $this->model->EditarClasificacionAlimentosMA($_clasificacion,$id_ClasifiAM,$EstadoClasifi);
         if($ValidadorClasificaiconAlimentos>0){
            echo " Actualización Correcta";
        }else{
            echo " No se Actualizo";
        }
    }
    public function ConsultarClasificacion(){
       $clasificacion = $this->model->ConsultarClasificacion();
       json_encode($clasificacion);
    }
    public function RegistrarAlimentosM(){
        $A_descripcion = $_POST['txtNombreAlimentosAM'];
        $A_grasas = $_POST['txtGrasasAM'];
        $A_ClasificacionA = $_POST['SelectClasAlimenAM'];
        $A_unidadMedida = $_POST['SelectUnidadMedidaAM'];
        $A_peso = $_POST['txtPesoAM'];
        $A_carbohidratos = $_POST['txtCarbohidratosAM'];
        $A_proteinas = $_POST['txtProteinasAM'];
        $A_IndiceGlucemico = $_POST['txtIndiceGlucemicoAM'];

        if ($this->model->RegistrarAlimentosM($A_descripcion,$A_ClasificacionA) == 0) {
            $this->model->RegistrarAlimentos($A_descripcion,$A_grasas,$A_ClasificacionA,$A_unidadMedida,$A_peso,$A_carbohidratos,$A_proteinas,$A_IndiceGlucemico);
        }else{
             //si ya El campo ya existe en la base de datos el dato lo redirecciono para mostrar el mensaje
             echo "El campo ya existe en la base de datos ";
        }
    }
    public function EditarAlimentosM(){
        $A_descripcion = $_POST['txtNombreAlimentosAM'];
        $A_grasas = $_POST['txtGrasasAM'];
        $A_ClasificacionA = $_POST['SelectClasAlimenAM'];
        $A_unidadMedida = $_POST['SelectUnidadMedidaAM'];
        $A_peso = $_POST['txtPesoAM'];
        $A_carbohidratos = $_POST['txtCarbohidratosAM'];
        $A_proteinas = $_POST['txtProteinasAM'];
        $A_IndiceGlucemico = $_POST['txtIndiceGlucemicoAM'];
        $A_id_Alimento = $_POST['txtIdAlimentosM'];
        $EstadoAlimento = $_POST['SelectEstadoAlimentos'];
         $ValidadorEditarAlimentos = $this->model->EditarAlimentos($A_descripcion,$A_grasas,$A_ClasificacionA,$A_unidadMedida,$A_peso,$A_carbohidratos,$A_proteinas,$A_IndiceGlucemico,$A_id_Alimento,$EstadoAlimento);
        if($ValidadorEditarAlimentos==0){
            echo "No se Actualizo";
        }else{
            echo "Actualización Correcta";
        }
    }
    public function ConsultarAlimentos(){
        $alimentos = $this->model->ConsultarAlimentosMaestras();
        echo json_encode($alimentos);
    }
}
?>