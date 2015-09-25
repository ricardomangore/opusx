<html>
	<head>
		<title>
			Titulo
		</title>
	</head>
	<body>
		<?php echo validation_errors(); ?>
		<form  action="" method="POST">
			<input name="nombre" type="text" value="<?php echo set_value('nombre')?>"/>
			<select name="opcion">
					<option value='none'>Seleccione una opcion</option>"
			        <option value="one" <?php echo  set_select('opcion', 'one'); ?> >One</option>
			        <option value="two" <?php echo  set_select('opcion', 'two'); ?> >Two</option>
			        <option value="three" <?php echo  set_select('opcion', 'three'); ?> >Three</option>
			</select>
			<input type="submit" value="submit" />
		</form>
	</body>
</html>