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
<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/ctrl_recargo/recargo_service">
  <div class="form-group <?php if(form_error('clave') != '') echo 'has-error';?>">
    <label for="clave" class="col-sm-2 control-label">Clave</label>
    <div class="col-sm-10">
      <input name="clave" type="text" class="form-control" id="clave" placeholder="" value="<?php echo set_value('clave'); ?>">
      <input name="idrecargo" type="hidden" class="form-control" value="<?php echo set_value('idrecargo'); ?>">
      <input name="opxaction" type="hidden" class="form-control" value="<?php echo set_value('opxaction'); ?>">
    </div>
  </div>
  <div class="form-group <?php if(form_error('descripcion') != '') echo 'has-error';?> ">
    <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
    <div class="col-sm-10">
      <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripción" value="<?php echo set_value('descripcion'); ?>">
    </div>
  </div>
  <div class="form-group <?php if(form_error('costo') != '') echo 'has-error';?>">
    <label for="costo" class="col-sm-2 control-label">Costo</label>
    <div class="col-sm-10">
      <input name="costo" type="text" class="form-control" id="costo" placeholder="Provedor" value="<?php echo set_value('costo'); ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>
<div style="height: 30px;"></div>
<!-- Catálogo de Naviera -->
<table id="example" class="display table table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Clave</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>opt</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Clave</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>opt</th>
        </tr>
    </tfoot>
    <?php if(isset($rows)): ?>
    	<tbody>
    		<?php foreach($rows as $row): ?>
    			<tr>
    				<td><?php echo $row['idrecargo'] ?></td>
    				<td><?php echo $row['clave'] ?></td>
    				<td><?php echo $row['costo'] ?></td>
    				<td><?php echo $row['descripcion'] ?></td>
    				<td>
    					<button id="opx_btn_edit" type="button" class="btn btn-primary btn-xs opx_btn_edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
    					<button id="opx_btn_delete" type="button" class="btn btn-danger btn-xs opx_btn_delete"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
    				</td>		        				
    			</tr>
    		<?php endforeach; ?>
    	</tbody>
    <?php endif; ?>
</table>		        
