<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">IntermodalExpress</a>
    </div>
	<?php if(isset($menu_items)): ?>
	  <ul class="nav navbar-nav navbar-right">
	    <li><a href="<?php echo base_url();?>index.php/ctrl_flete_aereo">Fletes Aéreos</a></li>
	    <li><a href="<?php echo base_url();?>index.php/ctrl_flete_maritimo">Fletes Marítimos</a></li>
	    <li><a href="<?php echo base_url();?>index.php/opusx">Catálogos</a></li>
	    <li class="dropdown">
	      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario <span class="caret"></span></a>
	      <ul class="dropdown-menu">
	        <li><a href="#"><spam class="glyphicon glyphicon-cog" aria-hidden="true"></spam> Settings</a></li>
	        <li><a href="#"><spam class="glyphicon glyphicon-user" aria-hidden="true"></spam> Profile</a></li>
	        <li role="separator" class="divider"></li>
	        <li><a href="<?php echo base_url();?>index.php/opusx/logout"><spam class="glyphicon glyphicon-minus-sign" aria-hidden="true"></spam> logout</a></li>
	      </ul>
	    </li>
	  </ul>
	<?php endif; ?>  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>