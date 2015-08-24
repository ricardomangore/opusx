<div class="container">
	<!-- Formulario  recargoes -->
	<div class="row">
		<div class="col-md-6">
			<?php if(isset($message) && $message != ''): ?>
				<div class="alert alert-<?php echo $class ?>" role="alert">
					<?php echo $message; ?>
				</div>
			<?php endif; ?>
			<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/ctrl_recargo/add_recargo">
			  <div class="form-group">
			    <label for="clave" class="col-sm-2 control-label">Clave</label>
			    <div class="col-sm-10">
			      <input name="clave" type="text" class="form-control" id="clave" placeholder="">
			      <input name="idrecargo" type="hidden" class="form-control" >
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
			    <div class="col-sm-10">
			      <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripción">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="provedor" class="col-sm-2 control-label">Provedor</label>
			    <div class="col-sm-10">
			      <input name="provedor" type="text" class="form-control" id="provedor" placeholder="Provedor">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">Agregar</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
	<div style="height: 30px;"></div>
	<!-- Catálogo de Naviera -->
	<div class="row">
		<div class="col-md-6">
			<table id="example" class="display table table-hover" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ID</th>
		                <th>Clave</th>
		                <th>Provedor</th>
		                <th>Descripción</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
		                <th>ID</th>
		                <th>Clave</th>
		                <th>Provedor</th>
		                <th>Descripción</th>
		            </tr>
		        </tfoot>
		        <?php if(isset($rows)): ?>
		        	<tbody>
		        		<?php foreach($rows as $row): ?>
		        			<tr>
		        				<td><?php echo $row['idrecargo'] ?></td>
		        				<td><?php echo $row['clave'] ?></td>
		        				<td><?php echo $row['provedor'] ?></td>
		        				<td><?php echo $row['descripcion'] ?></td>
		        			</tr>
		        		<?php endforeach; ?>
		        	</tbody>
		        <?php endif; ?>
			</table>		        
		</div><!-- .col-md-6 -->
	</div>
</div>