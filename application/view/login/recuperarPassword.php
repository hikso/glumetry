<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
   <title>Recuperar contraseña</title>
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

    <h2>Recuperar contraseña</h2> 


  </div>
  <div class="login-wrap">
  <div class="metro widreset single-size white-full" style="  width: 70px;">
    </div>
    <div class="metro widreset double-size green">

      <div class="input-append lock-input input-docu">
        <span class="forgot-pass">Ingrese el documento:</span>
        <div class="input-docu">
                <select class="slctRescue" tabindex="1" id="slctTipo_Documento" required/>
                    <option value="" selected="selected">Tipo documento</option>
                    <?php foreach ($tipoDoc as $value) {
                        echo "<option value='$value->id_tipo_documento'>$value->descripcion</option>";
                    } ?>
                </select><br><br>
                <input type="text" maxlength="45" class="" placeholder="Documento de identidad" name="txtDocumento" id="txtDocumento">
                    <button type="submit" class="btn tarquoise" name="tbnBuscarDocumento" id="tbnBuscarDocumento"><i class="icon-search"></i></button>
        </div>
        <br>
        <span id="error">  </span>
      </div>
    </div>
    <div class="metro widreset single-size terques login">
      <button type="submit" class="btn login-btn" name="btnRescue" id="btnRescue">Recuperar
      </button>
                <a class="forgot-pass" href="<?php echo URL; ?>">Volver.</a>

    </div>
    <div class="metro widreset double-size white-full">
    </div>
  </div>
</body>
    <script>
        var url = "<?php echo URL; ?>";
    </script>
    <script src="<?php echo URL; ?>js/application.js"></script>
</html>