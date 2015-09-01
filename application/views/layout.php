<!DOCTYPE html>
<html>
	<head>
		<title>opusX</title>
		<link rel="stylesheet" href="<?php echo _CSS_PATH; ?>/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo _CSS_PATH; ?>/opxstyles.css" />
		<link rel="stylesheet" href="<?php echo _CSS_PATH; ?>/dataTables.bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo _CSS_PATH; ?>/bootstrap-select.min.css" />
		<link rel="stylesheet" href="<?php echo _CSS_PATH; ?>/select2.css" />
		<link rel="stylesheet" href="<?php echo _CSS_PATH; ?>/dataTables.bootstrap.select.min.css" />
		<link rel="stylesheet" href="<?php echo _JS_PATH; ?>/plugins/fuelux/css/fuelux.min.css" />
		<link rel="stylesheet" href="<?php echo _JS_PATH; ?>/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" />
		<script type="text/javascript" src="<?php echo _JS_PATH; ?>/libraries/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="<?php echo _JS_PATH; ?>/plugins/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo _JS_PATH; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo _JS_PATH; ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo _JS_PATH; ?>/plugins/datatables/extensions/dataTables.select.min.js"></script>
		<script type="text/javascript" src="<?php echo _JS_PATH; ?>/plugins/select2/select2.min.js"></script>
		<script type="text/javascript" src="<?php echo _JS_PATH; ?>/plugins/select/bootstrap-select.min.js"></script>
		<script type="text/javascript" src="<?php echo _JS_PATH; ?>/plugins/fuelux/js/fuelux.min.js"></script>
		<script type="text/javascript" src="<?php echo _JS_PATH; ?>/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
		<script type="text/javascript" src="<?php echo _JS_PATH; ?>/libraries/opusx.js"></script>
		<script type="text/javascript" src="<?php echo _JS_PATH; ?>/libraries/opxdatatable.js"></script>
	</head>
	<body class="fuelux">
		<!-- Navbar -->
		<nav class="navbar navbar-default">
			<div class="container">
				<?php echo $main_menu; ?>
			</div><!-- .container -->
		</nav><!-- .navbar -->
		<div id="<?php echo $id_content; ?>" class="container">
			<div class="row">
				<?php if(isset($sidebar)): ?>
				<div class="col-md-2">
					<?php echo $sidebar; ?>
				</div>
				<?php endif; ?>
				<?php if(isset($title_content)): ?>
				<div class="col-md-10">
					<div class="panel panel-primary">
					  <div class="panel-heading"><?php echo $title_content; ?></div>
					  	<div class="panel-body">
							<?php echo $main_content; ?>
						</div>
					</div>
				</div>
				<?php else: ?>
					<?php echo $main_content; ?>
				<?php endif; ?>
			</div>		
		</div><!-- .container -->
		<footer class="bs-docs-footer" role="contentinfo">
		  <div class="container">
			<?php echo $main_footer; ?>
		  </div>
		</footer>
	</body>
</html>