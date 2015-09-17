<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootswatch: Cerulean</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/opusx.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<?php echo $header; ?>
  	<?php echo $content; ?>
  	<?php if(isset($footer)) echo $footer; ?>
    <!--<script src="../assets/js/custom.js"></script>-->
  </body>
</html>
