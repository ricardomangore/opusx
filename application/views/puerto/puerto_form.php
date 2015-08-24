<div class="container">
	<!-- Formulario  puertoes -->
	<div class="row">
		<div class="col-md-6">
			<?php if(isset($message) && $message != ''): ?>
				<div class="alert alert-<?php echo $class ?>" role="alert">
					<?php echo $message; ?>
				</div>
			<?php endif; ?>
			<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/ctrl_puerto/add_puerto">
			  <div class="form-group">
			    <label for="locode" class="col-sm-2 control-label">locode</label>
			    <div class="col-sm-10">
			      <input name="locode" type="text" class="form-control" id="locode" placeholder="MEX">
			      <input name="idpuerto" type="hidden" class="form-control" >
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="puerto" class="col-sm-2 control-label">Puerto</label>
			    <div class="col-sm-10">
			      <input name="puerto" type="text" class="form-control" id="puerto" placeholder="Nombre del Puerto">
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
		                <th>locode</th>
		                <th>Puerto</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
		                <th>ID</th>
		                <th>locode</th>
		                <th>Puerto</th>
		            </tr>
		        </tfoot>
		        <?php if(isset($rows)): ?>
		        	<tbody>
		        		<?php foreach($rows as $row): ?>
		        			<tr>
		        				<td><?php echo $row['idpuerto'] ?></td>
		        				<td><?php echo $row['locode'] ?></td>
		        				<td><?php echo $row['puerto'] ?></td>
		        			</tr>
		        		<?php endforeach; ?>
		        	</tbody>
		        <?php endif; ?>
			</table>		        
		</div><!-- .col-md-6 -->
	</div>
</div>