<div class="container">
	<!-- Formulario  Naviero -->
	<div class="row">
		<div class="col-md-8">
			<?php if(isset($message) && $message != ''): ?>
				<div class="alert alert-<?php echo $class ?>" role="alert">
					<?php echo $message; ?>
				</div>
			<?php endif; ?>
			<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/ctrl_carga_aerea/add_carga_aerea">
			  <div class="form-group">
			    <label for="min" class="col-sm-2 control-label">Min</label>
			    <div class="col-sm-10">
			      <input name="min" type="text" class="form-control" id="min" placeholder="">
			      <input name="idcarga2" type="hidden" class="form-control" >
			    </div>
			  </div>			
			  <div class="form-group">
			    <label for="max" class="col-sm-2 control-label">Max</label>
			    <div class="col-sm-10">
			      <input name="max" type="text" class="form-control" id="max" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="peso" class="col-sm-2 control-label">Peso</label>
			    <div class="col-sm-10">
			      <input name="peso" type="text" class="form-control" id="peso" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="volumen" class="col-sm-2 control-label">Volumen</label>
			    <div class="col-sm-10">
			      <input name="volumen" type="text" class="form-control" id="volumen" placeholder="">
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
	<!-- Catálogo de aeropuerto -->
	<div class="row">
		<div class="col-md-8">
			<table id="example" class="display table table-hover" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ID</th>
		                <th>Min</th>
		                <th>Max</th>
		                <th>Peso</th>
		                <th>Volumen</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
		                <th>ID</th>
		                <th>Min</th>
		                <th>Max</th>
		                <th>Peso</th>
		                <th>Volumen</th>
		            </tr>
		        </tfoot>
		        <?php if(isset($rows)): ?>
		        	<tbody>
		        		<?php foreach($rows as $row): ?>
		        			<tr>
		        				<td><?php echo $row['idcarga2'] ?></td>
		        				<td><?php echo $row['min'] ?></td>
		        				<td><?php echo $row['max'] ?></td>
		        				<td><?php echo $row['peso'] ?></td>
		        				<td><?php echo $row['volumen'] ?></td>
		        			</tr>
		        		<?php endforeach; ?>
		        	</tbody>
		        <?php endif; ?>
			</table>		        
		</div><!-- .col-md-6 -->
	</div>
</div>