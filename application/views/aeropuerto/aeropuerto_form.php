<div class="container">
	<!-- Formulario  Naviero -->
	<div class="row">
		<div class="col-md-8">
			<?php if(isset($message) && $message != ''): ?>
				<div class="alert alert-<?php echo $class ?>" role="alert">
					<?php echo $message; ?>
				</div>
			<?php endif; ?>
			<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/ctrl_aeropuerto/add_aeropuerto">
			  <div class="form-group">
			    <label for="code" class="col-sm-2 control-label">IATA CODE</label>
			    <div class="col-sm-10">
			      <input name="code" type="text" class="form-control" id="iata_code" placeholder="ej: MEX">
			      <input name="idaeropuerto" type="hidden" class="form-control" >
			    </div>
			  </div>			
			  <div class="form-group">
			    <label for="aeropuerto" class="col-sm-2 control-label">Aeropuerto</label>
			    <div class="col-sm-10">
			      <input name="aeropuerto" type="text" class="form-control" id="aeropuerto" placeholder="Aeropuerto">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="ciudad" class="col-sm-2 control-label">Ciudad</label>
			    <div class="col-sm-10">
			      <input name="ciudad" type="text" class="form-control" id="ciudad" placeholder="ej: México">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="pais" class="col-sm-2 control-label">País</label>
			    <div class="col-sm-10">
			      <input name="pais" type="text" class="form-control" id="pais" placeholder="ej: México">
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
		                <th>IATA CODE</th>
		                <th>Aeropuerto</th>
		                <th>Ciudad</th>
		                <th>País</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
		                <th>ID</th>
		                <th>IATA CODE</th>
		                <th>Aeropuerto</th>
		                <th>Ciudad</th>
		                <th>País</th>
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
		        			</tr>
		        		<?php endforeach; ?>
		        	</tbody>
		        <?php endif; ?>
			</table>		        
		</div><!-- .col-md-6 -->
	</div>
</div>