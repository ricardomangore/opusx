<div class="row">
	<ul class="nav nav-pills">
	  <li role="presentation" class="active"><a href="<?php echo base_url();?>addarecargo_aereo"><i class="fa fa-plus-square"></i> Agregar</a></li>
	  <li role="presentation"><a href="<?php echo base_url();?>editrecargo_aereo/0"><i class="fa fa-pencil"></i> Editar</a></li>
	  <li role="presentation"><a href="<?php echo base_url();?>deleterecargo_aereo/0"><i class="fa fa-trash"></i> Eliminar</a></li>
	</ul>
</div>
<div class="row">
	<div style="height:20px;"></div>
	<div class="panel panel-default">
		<div style="height:20px;"></div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-2">
			<?php echo validation_errors('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ','</div>'); ?>
			</div>
		</div>
		<form class="form-horizontal" method="POST" action="<?php echo base_url();?>addflete_aereo">
		
		
		  <div class="form-group <?php if(form_error('idaerolinea')!='') echo 'has-error';?>">
		    <label for="aeropuerto" class="col-sm-2 control-label">Aerolínea</label>
		    <div class="col-sm-4">
		      <select class="select_aerolinea" data-live-search='true' name="idaerolinea">
		      	<option value="none">Seleccione una aerolínea</option>
		      	<?php foreach($aerolineas as $aerolinea):?>
		      		<option value="<?php echo $aerolinea['idaerolinea'];?>" <?php echo set_select('idaerolinea',$aerolinea['idaerolinea']); ?>><?php echo $aerolinea['aerolinea'];?></option>
		    	<?php endforeach; ?>
		      </select>
		    </div>
		  </div>		

		  <div class="form-group">
		  	<label for="recargos" class="col-sm-2 control-label">Recargos</label>
		  	<div class="col-sm-4">
			  	<select class="select_recargos" data-live-search="true" name="idrecargo" multiple>
			  		<option value="none">Seleccione los recargos</option>
			  		<?php foreach($recargos as $recargo): ?>
			  			<option value="<?php echo $recargo['idrecargo_aereo']?>"><?php echo $recargo['clave'] .' '. $recargo['costo'] .' '. $recargo['aerolinea'];?></option>
			  		<?php endforeach; ?>
			  	</select>
			</div>
		  </div>
		  
		  <div class="form-group">
		  	<label for="recargos" class="col-sm-2 control-label">Región</label>
		  	<div class="col-sm-4">
			  	<select class="select_region" data-live-search="true" name="idrecargo">
			  		<option value="none">Seleccione una Región</option>
			  		<?php foreach($regiones as $region): ?>
			  			<option value="<?php echo $region['idregion']?>"><?php echo $region['region'];?></option>
			  		<?php endforeach; ?>
			  	</select>
			</div>
		  </div>
		  
		  <div class="form-group">
		  	<label for="destino" class="col-sm-2 control-label">Origen</label>
		  	<div class="col-sm-4">
			  	<select class="select_origen" data-live-search="true" name="idorigen">
					<option value="none">Seleccione un Origen</option>			  	
			  		<?php foreach($aeropuertos as $aeropuerto): ?>
			  			<option value="<?php echo $aeropuerto['idaeropuerto']?>"><?php echo $aeropuerto['code'] .' '. $aeropuerto['aeropuerto'];?></option>
			  		<?php endforeach; ?>
			  	</select>
			</div>
		  </div>		  
		  
		  <div class="form-group">
		  	<label for="destino" class="col-sm-2 control-label">Destino</label>
		  	<div class="col-sm-4">
			  	<select class="select_destino" data-live-search="true" name="iddestino">
			  		<option value="none">Seleccione un Destino</option>
			  		<?php foreach($aeropuertos as $aeropuerto): ?>
			  			<option value="<?php echo $aeropuerto['idaeropuerto']?>"><?php echo $aeropuerto['code'] .' '. $aeropuerto['aeropuerto'];?></option>
			  		<?php endforeach; ?>
			  	</select>
			</div>
		  </div>
		  
		  <div class="form-group">
		  	<label for="destino" class="col-sm-2 control-label">Via</label>
		  	<div class="col-sm-4">
			  	<select class="select_via" data-live-search="true" name="idvia" multiple>
			  		<option value="none">Seleccione los transbordos</option>
			  		<?php foreach($aeropuertos as $aeropuerto): ?>
			  			<option value="<?php echo $aeropuerto['idaeropuerto']?>"><?php echo $aeropuerto['code'] .' '. $aeropuerto['aeropuerto'];?></option>
			  		<?php endforeach; ?>
			  	</select>
			</div>
		  </div>		  		  		  
		  
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button id="opx_btn_action" type="submit" class="btn btn-primary">Agregar</button>
		    </div>			    
		  </div>
		</form>
	</div>
	<div style="height: 30px;"></div>
	<!-- Catálogo de Aeropuertos -->
	<table id="opxtable" class="display table table-hover" cellspacing="0" width="100%">
	    <thead>
	        <tr>
	            <th>ID</th>
	            <th>Destino</th>
	            <th>Vigencia</th>
	            <th>Via</th>
	            <th>Mínimo</th>
	            <th>Normal</th>
	            <th>Precio</th>
	            <th>opt</th>
	        </tr>
	    </thead>
	    <tfoot>
	        <tr>
	            <th>ID</th>
	            <th>Destino</th>
	            <th>Vigencia</th>
	            <th>Via</th>
	            <th>Mínimo</th>
	            <th>Normal</th>
	            <th>Precio</th>
	            <th>opt</th>
	        </tr>
	    </tfoot>
	    	<tbody>
	    		<?php if($rows): ?>
		    		<?php foreach($rows as $row): ?>
		    		<?php print_r($row); echo "<br>";?>
		    			<tr>
		    				<td><?php echo $row['flete_aereo']['idflete_aereo']; ?></td>
		    				<td><?php echo $row['aod']['code'] .' '. $row['aod']['aeropuerto']; ?></td>
		    				<td><?php echo $row['flete_aereo']['vigencia']; ?></td>
		    				<td>
		    					<?php foreach($row['via'] as $value){
		    						echo $value['code'] .' '.  $value['pais']. '<br/>';	
		    					};?>
		    				</td>
		    				<td><?php echo $row['flete_aereo']['minimo']; ?></td>
		    				<td><?php echo $row['flete_aereo']['normal']; ?></td>
		    				<td>
		    					<?php 
		    						foreach($row['precios'] as $precio){
		    							echo $precio['min'] .' - '. $precio['max'] .'   $'. $precio['precio'];
		    						}
		    					?>
		    				</td>
		    				<td>
		    					<a href="<?php echo base_url();?>editflete_aereo/<?php echo $row['flete_aereo']['idflete_aereo'];?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
		    					<a href="<?php echo base_url();?>deleteflete_aereo/<?php echo $row['flete_aereo']['idflete_aereo'];?>" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a>
		    				</td>
		   					<td>
		   					</td>
		    			</tr>
		    		<?php endforeach; ?>
	    		<?php endif; ?>
	    	</tbody>
	</table>
</div>		        