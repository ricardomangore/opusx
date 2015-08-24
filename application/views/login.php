<div class="container" style="height: 100%;">
	<div class="row">
		<div class="col-md-4 col-md-offset-6 well">
			<legend>Sign in to Intermodalexpress</legend>
			<?php if(isset($message) && $message != ''): ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $message; ?>
				</div>
			<?php endif; ?>
			<form action="<?php echo base_url(); ?>index.php/opusx/login" method="POST">
			  <div class="form-group">
			    <label for="username">User Name</label>
			    <input name="username" type="username" class="form-control" id="username" placeholder="UserName">
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->
<div style="height: 300px;"></div>