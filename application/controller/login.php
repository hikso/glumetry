<?php

/*
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Login extends Controller
{
    public $id_usuario;
    public $numCuentas;
    public $correo_electronico;
    public $_pass;
    public $rol;
    public $error;
    public $estado;

    function __construct(){
        parent::__construct("modelLogin");
    }
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function generaPass(){
        //Se define una cadena de caractares. Te recomiendo que uses esta.
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        //Obtenemos la longitud de la cadena de caracteres
        $longitudCadena=strlen($cadena);
         
        //Se define la variable que va a contener la contraseña
        $pass = "";
        //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
        $longitudPass=10;
         
        //Creamos la contraseña
        for($i=1 ; $i<=$longitudPass ; $i++){
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos=rand(0,$longitudCadena-1);
         
            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }

    public function index()
    {
        require APP . 'view/login/index.php'; 
    }
    public function recuperarPassword()
    {
        require_once 'crypter.php';
        session_start();
        if (isset($_SESSION["id_usuarioRecuperar"])) {
            if ($_SESSION["id_usuarioRecuperar"] != NULL) {
                $NuevaContraseña = $this->generaPass();
                if ($Add = $this->model->SP_UpdateContra(encrypt($NuevaContraseña), $_SESSION['id_usuarioRecuperar'])) {
                    $recorrer =$this->model->SP_GetCorreo($_SESSION['id_usuarioRecuperar']);
                    echo "Cambio exitoso:  Le enviaremos a <br><strong> ".$recorrer[0]->correo_electronico ."</strong><br> la contraseña restablecida.";
                };

                foreach ($recorrer as $value) {
                    $Correo = $value->correo_electronico;
                }
                
                $this->sendMail($Correo, $_SESSION["nombreCompleto"], $NuevaContraseña);
            }else{
                echo "El documento debe ser validado";
            }
        }else{
                echo "El documento debe ser validado";     
        }

    }
    public function ValidarDocumentoRecuperar()
    {
        if (!$cuentas = $this->model->SP_ValidarDocumentoRecuperar($_POST["txtDocumento"])) {
            echo "El documento ingresado <br> no se ha registrado.";
            $_SESSION["id_usuarioRecuperar"] = NULL;
        }else{
            $numeroCuentas = count($cuentas);
            if ($numeroCuentas == 2) {
                if ($cuentas[0]->id_usuario == $cuentas[1]->id_usuario) {
                    echo "Cuentas asociadas ($numeroCuentas),<br> para recuperar la contraseña<br> haga clic en recuperar.";
                }
            }else
            {
                echo "Cuentas asociadas ($numeroCuentas),<br> para recuperar la contraseña<br> haga clic en recuperar.";
            }
            session_start();

            $_SESSION["id_usuarioRecuperar"] = $cuentas[0]->id_usuario;
            $_SESSION["nombreCompleto"] = $cuentas[0]->nombreCompleto;
        }
               
    }
    public function sendMail($correo_electronico, $nombreCompleto, $NuevaContraseña)
    {
        require_once("PHPMailer-master/PHPMailerAutoload.php");

        $mail = new PHPMailer();

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                              // Enable SMTP authentication
        $mail->Username = 'hugo0220@gmail.com';                 // SMTP username
        $mail->Password = 'hueso149352';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;     
        $mail->CharSet = 'UTF-8';                               // TCP port to connect to

        $mail->From = 'glumetry@gmail.com';
        $mail->FromName = 'Glumetry AdminSystem';
        $mail->addAddress($correo_electronico, $nombreCompleto);     // Add a recipient+

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Petición para recuperar la contraseña';
        $mail->Body    = 'La contraseña ha sido restablecida <b>'.$NuevaContraseña.'</b> !';
        $mail->AltBody = 'Para mas informacion comuniquese con Glumetry AdminSystem';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    }
    public function rescue()
    {  
        $tipoDoc = $this->model->tipodoc();
        require APP . 'view/login/recuperarPassword.php';
    }
    public function validar()
    {
            require_once 'crypter.php';
            $login = $this->model->validarLogin($_POST["txtCorreo"]);   
            if ($login){
                foreach ($login as $value) {
                 $this->id_usuario = $value->id_user;
                 $this->numCuentas = $value->numCuentas;
                 $this->_pass = $value->_pass;
                 $this->rol = $value->rol;
                 $this->estado = $value->estado;
             }
            if (trim(decrypt($this->_pass)) == $_POST["txtPassword"]) {
            switch ($this->rol) {
             case 1:
                if ($this->estado == 0) {
                    echo "<i class='icon-warning-sign'></i><br><br> Actualmente no tiene<br> acceso al sistema.,2";
                    exit();
                }
                    session_start();
                    $_SESSION['tipeUser'] = ($this->rol);
                    $_SESSION['idUser'] = ($this->id_usuario);
                    $_SESSION['Menu'] = $this->model->SP_CargarMenu($this->rol);
                    $_SESSION['subMenus'] = $this->model->SP_CargarSubMenus($this->rol);
                    $_SESSION['directAccess'] = "<div id='top_menu' class='nav notify-row'>
                     <!-- BEGIN NOTIFICATION -->
                     <ul class='nav top-menu'>
                       <!-- BEGIN INBOX DROPDOWN -->
                       <li class='dropdown tooltips' id='header_inbox_bar'>
                         <a href='".URL."glucometria' class='dropdown-toggle thehover' >
                           <i class='icon-edit'></i>
                           <span>Glucometrias</span>
                         </a>
                     </li>
                     <li class='dropdown tooltips' id='header_inbox_bar'>
                         <a href='".URL."base_alimentaria' class='dropdown-toggle thehover' >
                           <i class='icon-building'></i>
                           <span>Contador de CHO</span>
                         </a>
                     </li>
                     <li class='dropdown tooltips' id='header_inbox_bar'>
                         <a href='".URL."estadisticas/estadisticasPaciente' class='dropdown-toggle thehover' >
                           <i class='icon-bar-chart'></i>
                           <span>Estadisticas</span>
                         </a>
                     </li>
                     <li class='dropdown tooltips' id='header_inbox_bar'>
                         <a href='".URL."dosificacion' class='dropdown-toggle thehover' >
                           <i class='icon-tint'></i>
                           <span>Dosificación</span>
                         </a>
                     </li>
                     <!-- END INBOX DROPDOWN -->
                    </ul>
                    </div>";
                    echo '<script language = javascript>
                    this.location.href="'.URL.'pacientes" 
                </script>';
                $user = $this->model->cargarUsuario($this->id_usuario, $this->rol);
                 break;
             case 2:
                if ($this->estado == 0) {
                    echo "<i class='icon-warning-sign'></i><br><br> Actualmente no tiene<br> acceso al sistema.,2";
                    exit();
                }
                    session_start();

                    $_SESSION['tipeUser'] = ($this->rol);
                    $_SESSION['idUser'] = ($this->id_usuario);
                    $_SESSION['Menu'] = $this->model->SP_CargarMenu($this->rol);
                    $_SESSION['subMenus'] = $this->model->SP_CargarSubMenus($this->rol);
                    $_SESSION['directAccess'] = "<div id='top_menu' class='nav notify-row'>
                                 <!-- BEGIN NOTIFICATION -->
                                 <ul class='nav top-menu'>
                                   <!-- BEGIN SETTINGS -->
                                   
                                   <!-- END SETTINGS -->
                                   <!-- BEGIN INBOX DROPDOWN -->
                                   <li class='dropdown tooltips' id='header_inbox_bar'>
                                     <a href='". URL ."/medicos/AtencionPacientes' class='dropdown-toggle thehover' >
                                       <i class='icon-stethoscope'></i>
                                       <span>Atención a pacientes</span>
                                     </a>
                                 </li>
                                 <!-- END INBOX DROPDOWN -->
                                </ul>
                                </div>";
                    echo '<script language = javascript>
                    this.location.href="'.URL.'medicos"
                </script>';
                $user = $this->model->cargarUsuario($this->id_usuario, $this->rol);
                 break;
             case 3:
                    session_start();

                    $_SESSION['tipeUser'] = ($this->rol);
                    $_SESSION['idUser'] = ($this->id_usuario);
                    $_SESSION['Menu'] = $this->model->SP_CargarMenu($this->rol);
                    $_SESSION['subMenus'] = $this->model->SP_CargarSubMenus($this->rol);
                    $_SESSION['directAccess'] = "<div id='top_menu' class='nav notify-row'>
                                                 <!-- BEGIN NOTIFICATION -->
                                                 <ul class='nav top-menu'>
                                                   <!-- BEGIN SETTINGS -->
                                                   <li class='dropdown tooltips'>
                                                     <a href='".URL."/Usuarios' class='dropdown-toggle thehover' >
                                                       <i class='icon-group'></i>
                                                       <span>Nuevo usuario</span>
                                                     </a>
                                                   </li>
                                                   <!-- END SETTINGS -->
                                                   <!-- BEGIN INBOX DROPDOWN -->
                                                   <li class='dropdown tooltips' id='header_inbox_bar'>
                                                     <a href='".URL."/Datos' class='dropdown-toggle thehover' >
                                                       <i class='icon-gears'></i>
                                                       <span>Configuración</span>
                                                     </a>
                                                   </li>
                                                      <li class='dropdown tooltips' id='header_inbox_bar'>
                                                     <a href='".URL."/Usuarios/ConsultarUsuarios' class='dropdown-toggle thehover' >
                                                       <i class='icon-search'></i>
                                                       <span>Consultar usuarios</span>
                                                     </a>
                                                   </li>

                                                   <!-- END INBOX DROPDOWN -->
                                                 </ul>
                                                </div>";
                    echo '<script language = javascript>
                    this.location.href="'.URL.'Admin/indexAdmin" 
                </script>';
                $user = $this->model->cargarUsuario($this->id_usuario, $this->rol);
                 break;
             default:
                                     session_start();
                    $_SESSION['idUser'] = ($this->id_usuario);
                    $_SESSION['tipeUser'] = ($this->rol);

                    echo '<script language = javascript>
                    this.location.href="'.URL.'login/UsuarioEspecial" 
                </script>';
                 break;
         }
            }else{
                echo "<i class='icon-exclamation-sign'></i><br><br> Contraseña invalida.,2";
            }

        }else{
            echo "<i class='icon-exclamation-sign'></i><br><br> Correo o contraseña incorrecto. <br> Vuelve a intentarlo,1";
        }        

    }
    public function UsuarioEspecial()
    {
        require APP . 'view/login/UsuarioEspecial.php'; 
    }
    public function direccionarUsuario()
    {
        session_start();
        $_SESSION['tipeUser'] = $_POST['tipoUser'];
        $_SESSION['Menu'] = $this->model->SP_CargarMenu($_POST['tipoUser']);
        $_SESSION['subMenus'] = $this->model->SP_CargarSubMenus($_POST['tipoUser']);
        if ($_POST['tipoUser'] == 1) {
            echo URL.'pacientes';
            $_SESSION['directAccess'] = "<div id='top_menu' class='nav notify-row'>
                     <!-- BEGIN NOTIFICATION -->
                     <ul class='nav top-menu'>
                       <!-- BEGIN INBOX DROPDOWN -->
                       <li class='dropdown tooltips' id='header_inbox_bar'>
                         <a href='".URL."glucometria' class='dropdown-toggle thehover' >
                           <i class='icon-edit'></i>
                           <span>Glucometrias</span>
                         </a>
                     </li>
                     <li class='dropdown tooltips' id='header_inbox_bar'>
                         <a href='".URL."base_alimentaria' class='dropdown-toggle thehover' >
                           <i class='icon-building'></i>
                           <span>Contador de CHO</span>
                         </a>
                     </li>
                     <li class='dropdown tooltips' id='header_inbox_bar'>
                         <a href='".URL."estadisticas/estadisticasPaciente' class='dropdown-toggle thehover' >
                           <i class='icon-bar-chart'></i>
                           <span>Estadisticas</span>
                         </a>
                     </li>
                     <li class='dropdown tooltips' id='header_inbox_bar'>
                         <a href='".URL."dosificacion' class='dropdown-toggle thehover' >
                           <i class='icon-tint'></i>
                           <span>Dosificación</span>
                         </a>
                     </li>
                     <!-- END INBOX DROPDOWN -->
                    </ul>
                    </div>";
        }else{
            echo URL.'medicos';
            $_SESSION['directAccess'] = "<div id='top_menu' class='nav notify-row'>
         <!-- BEGIN NOTIFICATION -->
         <ul class='nav top-menu'>
           <!-- BEGIN SETTINGS -->
           
           <!-- END SETTINGS -->
           <!-- BEGIN INBOX DROPDOWN -->
           <li class='dropdown tooltips' id='header_inbox_bar'>
             <a href='". URL ."/medicos/AtencionPacientes' class='dropdown-toggle thehover' >
               <i class='icon-stethoscope'></i>
               <span>Atención a pacientes</span>
             </a>
         </li>

         <!-- END INBOX DROPDOWN -->
        </ul>
        </div>";
        }
    }
    
    public function LogOut()
    {
        // Inicializar la sesión.
        session_start();

        // Destruir todas las variables de sesión.
        $_SESSION = array();

        // Borrando también la cookie de sesión.
        // ¡Esto destruirá la sesión, y no la información de la sesión!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finalmente, destruir la sesión.
        session_destroy();
        echo '<script language = javascript>
                           this.location.href="'.URL.'"</script>';
    }

}
     

