
<div style="height:20px;"></div>
<h3>Eliminar</h3>
<div style="height:20px;"></div>
<form class="form-horizontal" method="POST" action="<?php echo base_url();?>deleteregion/<?php echo $idregion; ?>">
  <div class="form-group">
  	<div class="aler alert-danger col-sm-4">Esta a punto de eliminar la siguiente región</div>
  </div>
  <div class="form-group">
    <label for="region" class="col-sm-2 control-label">Región</label>
    <div class="col-sm-4">
      <input name="region" type="text" class="form-control" id="region" placeholder="Región" value="<?php if(isset($region))echo $region; ?>">
      <input name="idregion" type="hidden" class="form-control" value="<?php echo $idregion; ?>">
      <?php if(form_error('region') != ''){
      	echo form_error('region','<div class="alert alert-warning">','</div>');
      } ?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button id="opx_btn_action" type="submit" class="btn btn-danger">OK</button>
      <a href="<?php echo base_url();?>regiones" class="btn btn-success">Cancelar</a>
    </div>			    
  </div>
</form>
<hr>
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
            <th>Región</th>
            <th>opt</th>
        </tr>
    </tfoot>
    	<tbody>
    		<?php if($rows): ?>
	    		<?php foreach($rows as $row): ?>
	    			<tr>
	    				<td><?php echo $row['idregion'] ?></td>
	    				<td><?php echo $row['region'] ?></td>
	    				<td>
	    					<a href="<?php echo base_url();?>editregion/<?php echo $row['idregion'];?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
	    					<a href="<?php echo base_url();?>deleteregion/<?php echo $row['idregion'];?>" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a>
	    				</td>
	    			</tr>
	    		<?php endforeach; ?>
    		<?php endif; ?>
    	</tbody>
</table>