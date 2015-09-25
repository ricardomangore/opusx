<div class="row">
	<ul class="nav nav-pills">
	  <li role="presentation"><a href="<?php echo base_url();?>addaerolinea"><i class="fa fa-plus-square"></i> Agregar</a></li>
	  <li role="presentation"><a href="<?php echo base_url();?>editaerolinea/0"><i class="fa fa-pencil"></i> Editar</a></li>
	  <li role="presentation" class="active"><a href="<?php echo base_url();?>deleteaerolinea/0"><i class="fa fa-trash"></i> Eliminar</a></li>
	</ul>
</div>
<div class="row">
	<div style="height:20px;"></div>
	<div class="panel panel-default">
		<div style="height:20px;"></div>
		<div class="row">
			<?php echo validation_errors('<div class="col-sm-4 col-sm-offset-2"><div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ','</div></div>'); ?>
			<?php if(isset($message)){
				echo '<div class="col-sm-4 col-sm-offset-2"><div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <strong>No se puede eliminar la aerolínea</strong><p>'.$message.'</p></div></div>';
			}?>
		</div>
		<form class="form-horizontal" method="POST" action="<?php echo base_url();?>deleteaerolinea/0">
		  <div class="form-group <?php if(form_error('aerolinea')!='') echo 'has-error';?>">
		    <label for="aerolinea" class="col-sm-2 control-label">Aerolínea</label>
		    <div class="col-sm-4">
		      <input name="aerolinea" type="text" class="form-control" id="aerolinea" placeholder="Aerolínea" value="<?php if(isset($aerolinea)) echo $aerolinea; ?>" aria-describedby="inputError2Status">
		      <input name="idaerolinea" type="hidden" class="form-control" value="<?php if(isset($idaerolinea)) echo $idaerolinea; ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button id="opx_btn_action" type="submit" class="btn btn-primary"><i class="fa fa-trash"></i> Eliminar</button>
		    </div>			    
		  </div>
		</form>
	</div>
	<div style="height: 30px;"></div>
	<!-- Catálogo de Naviera -->
	<table id="opxtable" class="display table table-hover" cellspacing="0" width="100%">
	    <thead>
	        <tr>
	            <th>ID</th>
	            <th>Región</th>
	            <th>opt</th>
	        </tr>
	    </thead>
	    <tfoot>
	        <tr>
	            <th>ID</th>
	            <th>Aerolínea</th>
	            <th>opt</th>
	        </tr>
	    </tfoot>
	    	<tbody>
	    		<?php if($rows): ?>
		    		<?php foreach($rows as $row): ?>
		    			<tr>
		    				<td><?php echo $row['idaerolinea'] ?></td>
		    				<td><?php echo $row['aerolinea'] ?></td>
		    				<td>
		    					<a href="<?php echo base_url();?>editaerolinea/<?php echo $row['idaerolinea'];?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
		    					<a href="<?php echo base_url();?>deleteaerolinea/<?php echo $row['idaerolinea'];?>" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a>
		    				</td>
		    			</tr>
		    		<?php endforeach; ?>
	    		<?php endif; ?>
	    	</tbody>
	</table>
</div>