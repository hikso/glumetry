<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
  <meta charset="utf-8" />
  <title>Login</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
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

    <h2>Bienvenido.<br>
      ¿Como desea ingresar?
    </h2> 
  </div>
  <div class="login-wrap">
    <div class="metro single-size white-full" style="width: 65px;">
      <div class="locked">
      </div>
    </div>
    <div class="metro double-size green">
      <a href="#" class="selective" onclick="cargarEspecialUser(this)" id="2">

        <div class="input-append lock-input">
          <i id="rol" class='icon-user-md'></i>
          <span><br>Médico </span>
        </div>
      </a>
    </div>
    <div class="metro double-size blue">
      <a href="#" class="selective" onclick="cargarEspecialUser(this)" id="1">
        <div class="input-append lock-input">
          <span><i id="rol" class='icon-user'></i></span>
          <span><br>Paciente </span>
        </div>
      </a>
    </div>
    <div class="metro single-size white-full">
    </div>
  </div>
</body>
<!-- END BODY -->
<script type="text/javascript" src="<?php echo URL; ?>js/jquery.js"></script>
<script>
  var url = "<?php echo URL; ?>";
</script>
<script src="<?php echo URL; ?>js/application.js"></script>
<script src="<?php echo URL; ?>js/appAjax.js"></script>
</html>