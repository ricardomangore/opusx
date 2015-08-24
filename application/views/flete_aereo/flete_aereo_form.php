<div class="container">
	<!-- Formulario  Naviero -->
	<div class="row">
		<div class="col-md-8">
			<?php if(isset($message) && $message != ''): ?>
				<div class="alert alert-<?php echo $class ?>" role="alert">
					<?php echo $message; ?>
				</div>
			<?php endif; ?>
			<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/ctrl_flte_aereo/add_flete_aereo">
			  <!-- Region -->
			  <div class="form-group">
			    <label for="aeropuertos" class="col-sm-2 control-label">Región</label>
			    <div class="col-sm-10">
			      <select id="opx_regiones">
			      	<?php foreach($regiones as $region): ?>
			      		<option value="<?php echo $region['idregion']; ?>">
			      			<?php echo $region['region']; ?>
			      		</option>
			      	<?php endforeach; ?>
			      </select>
			    </div>
			  </div>
			  <!-- Precio -->
			  <div class="form-group">
			    <label for="precio" class="col-sm-2 control-label">Precio</label>
			    <div class="col-sm-10">
			      <input name="precio" type="text" class="form-control" id="precio" placeholder="Precio">
			    </div>
			  </div>			  	
			  <!-- Aerolineas-->
			  <div class="form-group">
			    <label for="aerolineas" class="col-sm-2 control-label">Aerolinea</label>
			    <div class="col-sm-10">
			      <select id="opx_aerolineas">
			      	<?php foreach($aerolineas as $aerolinea): ?>
			      		<option value="<?php echo $aerolinea['idaerolinea']; ?>">
			      			<?php echo $aerolinea['aerolinea']; ?>
			      		</option>
			      	<?php endforeach; ?>
			      </select>
			    </div>
			  </div>			  		  
			  <!-- Aeropuerto de Carga -->
			  <div class="form-group">
			    <label for="aeropuertos" class="col-sm-2 control-label">Aeropuerto de Carga</label>
			    <div class="col-sm-10">
			      <select id="opx_aol">
			      	<?php foreach($aeropuertos as $aeropuerto): ?>
			      		<option value="<?php echo $aeropuerto['idaeropuerto']; ?>">
			      			<?php echo $aeropuerto['aeropuerto']; ?>
			      		</option>
			      	<?php endforeach; ?>
			      </select>
			    </div>
			  </div>			  
			  <!-- Aeropuerto de Descarga -->
			  <div class="form-group">
			    <label for="aeropuertos" class="col-sm-2 control-label">Aeropuerto de Descarga</label>
			    <div class="col-sm-10">
			      <select id="opx_aod">
			      	<?php foreach($aeropuertos as $aeropuerto): ?>
			      		<option value="<?php echo $aeropuerto['idaeropuerto']; ?>">
			      			<?php echo $aeropuerto['aeropuerto']; ?>
			      		</option>
			      	<?php endforeach; ?>
			      </select>
			    </div>
			  </div>
			  <!-- Via -->
			  <div class="form-group">
			    <label for="via" class="col-sm-2 control-label" multiple>Via</label>
			    <div class="col-sm-10">
			      <select id="opx_via" name="via[]" multiple>
			      	<?php foreach($aeropuertos as $aeropuerto): ?>
			      		<option value="<?php echo $aeropuerto['idaeropuerto']; ?>">
			      			<?php echo $aeropuerto['aeropuerto']; ?>
			      		</option>
			      	<?php endforeach; ?>
			      </select>
			    </div>
			  </div>
			  <!-- Recargos -->	
			  <div class="form-group">
			    <label for="recargos" class="col-sm-2 control-label">Recargos</label>
			    <div class="col-sm-10">
			      <select id="opx_recargos" name="recargos[]" multilple>
			      	<?php foreach($recargos as $recargo): ?>
			      		<option value="<?php echo $recargo['idrecargo']; ?>">
			      			<?php echo $recargo['clave']; ?>
			      		</option>
			      	<?php endforeach; ?>
			      </select>
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
		                <th>Región</th>
		                <th>AOL</th>
		                <th>AOD</th>
		                <th>Via</th>
		                <th>Min</th>
		                <th>Max</th>
		                <th>Precio</th>
		            </tr>
		        </thead>
		        <tfoot>
		            <tr>
		                <th>ID</th>
		                <th>Región</th>
		                <th>AOL</th>
		                <th>AOD</th>
		                <th>Via</th>
		                <th>Min</th>
		                <th>Max</th>
		                <th>Precio</th>
		            </tr>
		        </tfoot>
		        <?php if(isset($rows)): ?>
		        	<tbody>
		        		<?php foreach($rows as $row): ?>
		        			<tr>
		        				<td><?php echo $row['idcarga2'] ?></td>
		        				<td><?php echo $row['region'] ?></td>
		        				<td><?php echo $row['aol'] ?></td>
		        				<td><?php echo $row['aod'] ?></td>
		        				<td><?php echo $row['volumen'] ?></td>
		        			</tr>
		        		<?php endforeach; ?>
		        	</tbody>
		        <?php endif; ?>
			</table>		        
		</div><!-- .col-md-6 -->
	</div>
</div>