<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
   <meta charset="utf-8" />
   <title>Inicio de sesión</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <script type="text/javascript" src="<?php echo URL; ?>js/jquery.js"></script>
   <link href="<?php echo URL; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo URL; ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="<?php echo URL; ?>bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/jquery-tags-input/jquery.tagsinput.css">
   <link href="<?php echo URL; ?>font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="<?php echo URL; ?>css/style-slide.css" rel="stylesheet" />
   <link href="<?php echo URL; ?>css/style-responsive.css" rel="stylesheet" />
   <link href="<?php echo URL; ?>css/style-default.css" rel="stylesheet" id="style_color" />
   <link href="<?php echo URL; ?>css/glumetry.css" rel="stylesheet">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
<div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="<?php echo URL; ?>">
            <img style="width:400px;" class="center" alt="logo" src="<?php echo URL; ?>img/logoblue.png">
        </a>
        <!-- END LOGO -->
    </div>
<div class="span7 sesion">
        <span id="title" > <h1>Inicio de sesión</h1></span>
</div>
    <div class="login-wrap">
        <div class="metro double-size green">
                <div class="input-append lock-input">
                <span id="error"> <strong> ¡Bienvenido! </strong></br>al Sistema Glúmetry.<br> <img  style="width:100px;" src="<?php echo URL;?>img/mini-logo.png"></span>
                </div>
        </div>
        <div class="metro double-size blue">
                <div class="input-append lock-input">
                    <div><input type="email" class="" autofocus placeholder="Correo electrónico" maxlength="100" id="txtCorreo"></div>
                    <br>
                    <div><input type="password" class="" placeholder="Contraseña" maxlength="45" id="txtPassword"></div>
                    <br>
                </div>
        </div>
        <div class="metro single-size green login">
                <button type="submit" class="btn login-btn" id="login" value"login">Entrar
                    <i class="icon-key"></i>
                </button>
                <a class="forgot-pass" href="<?php echo URL; ?>login/rescue">Recuperar contraseña.</a>
        </div>
        <div class="login-footer">
        </div>
    </div>
</body>
<!-- END BODY -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>
    <script src="<?php echo URL; ?>js/application.js"></script>
</html>