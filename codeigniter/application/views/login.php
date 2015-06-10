<!-- load header-->
<?=$header?>
	<div class="container">
<?php

if($this->session->flashdata('login_success')!='')
{
	?>
	<div class="alert alert-success" role="alert">
	<?=$this->session->flashdata('login_success')?></div>
<?php
}

if($this->session->flashdata('login_fail')!='')
{
	?>
	<div class="alert alert-warning" role="alert">
	<?=$this->session->flashdata('login_fail')?></div>
<?php
}

?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<?php

				if(form_error('email')!='')
				{
					?>
					<div class="alert alert-danger" role="alert"><?php echo form_error('email'); ?></div>

					<?php
				}
				
				if(form_error('password')!='')
				{
					?>
					<div class="alert alert-danger" role="alert"><?php echo form_error('password'); ?></div>

					<?php
				}
				?>
				
			</div>
		</div>


		<?php
		$attributes = array('class' => 'form-signin');

		echo form_open('login/doLogin', $attributes);
		?>
		<h2 class="form-signin-heading">Please sign in</h2>
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="text" id="inputEmail" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email address" autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password">
		<div class="checkbox">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<?php
		echo form_close();
		?>

	</div> <!-- /container -->

	<?=$footer?>
<!-- load footer -->
