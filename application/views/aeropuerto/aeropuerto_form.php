<div class="btn-group" role="group" aria-label="...">
  <button id="opx_btn_menu_add"type="button" class="btn btn-success">Agregar</button>
  <button id="opx_btn_menu_edit" type="button" class="btn btn-default" disabled>Editar</button>
</div>
<div style="height:20px;"></div>
<?php if(isset($message) && $message != ''): ?>
	<div class="alert alert-<?php echo $class ?>" role="alert">
		<?php echo $message; ?>
	</div>
<?php endif; ?>
<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/ctrl_aeropuerto/add_aeropuerto">
  <div class="form-group <?php if(form_error('code') != '') echo 'has-error';?>">
    <label for="code" class="col-sm-2 control-label">IATA CODE</label>
    <div class="col-sm-10">
      <input name="code" type="text" class="form-control" id="iata_code" placeholder="ej: MEX" value="<?php echo set_value('code'); ?>"> 
      <input name="idaeropuerto" type="hidden" class="form-control" value="<?php echo set_value('idaeropuerto'); ?>">
      <input name="opxaction" type="hidden" class="form-control" value="<?php echo set_value('opxaction'); ?>">
    </div>
  </div>			
  <div class="form-group <?php if(form_error('aeropuerto') != '') echo 'has-error';?>">
    <label for="aeropuerto" class="col-sm-2 control-label">Aeropuerto</label>
    <div class="col-sm-10">
      <input name="aeropuerto" type="text" class="form-control" id="aeropuerto" placeholder="Aeropuerto" value="<?php echo set_value('aeropuerto'); ?>">
    </div>
  </div>
  <div class="form-group <?php if(form_error('ciudad') != '') echo 'has-error';?>">
    <label for="ciudad" class="col-sm-2 control-label">Ciudad</label>
    <div class="col-sm-10">
      <input name="ciudad" type="text" class="form-control" id="ciudad" placeholder="ej: México" value="<?php echo set_value('ciudad'); ?>">
    </div>
  </div>
  <div class="form-group <?php if(form_error('pais') != '') echo 'has-error';?>">
    <label for="pais" class="col-sm-2 control-label">País</label>
    <div class="col-sm-10">
      <input name="pais" type="text" class="form-control" id="pais" placeholder="ej: México" value="<?php echo set_value('pais'); ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>
<div style="height: 30px;"></div>
<!-- Catálogo de aeropuerto -->
<table id="example" class="display table table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>IATA CODE</th>
            <th>Aeropuerto</th>
            <th>Ciudad</th>
            <th>País</th>
            <th>opt</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>IATA CODE</th>
            <th>Aeropuerto</th>
            <th>Ciudad</th>
            <th>País</th>
            <th>opt</th>
        </tr>
    </tfoot>
    <?php if(isset($rows)): ?>
    	<tbody>
    		<?php foreach($rows as $row): ?>
    			<tr>
    				<td><?php echo $row['idaeropuerto'] ?></td>
    				<td><?php echo $row['code'] ?></td>
    				<td><?php echo $row['aeropuerto'] ?></td>
    				<td><?php echo $row['ciudad'] ?></td>
    				<td><?php echo $row['pais'] ?></td>
    				<td>
    					<button id="opx_btn_edit" type="button" class="btn btn-primary btn-xs opx_btn_edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
    					<button id="opx_btn_delete" type="button" class="btn btn-danger btn-xs opx_btn_delete"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
    				</td>		        				
    			</tr>
    		<?php endforeach; ?>
    	</tbody>
    <?php endif; ?>
</table>		        
