<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>Login</title>


	<!-- Bootstrap core CSS -->
	<link href="<?=base_url('3rdparty/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?=base_url('3rdparty/bootstrap/dist/css/signin.css')?>" rel="stylesheet">


	<!-- Jquery -->
	<script src="<?=base_url('3rdparty/jquery-2.1.4.js')?>" ></script>
	
</head>

<body>

	<div class="container">
<?php

if($this->session->flashdata('login_success')!='')
{
	?>
	<div class="alert alert-success" role="alert">
	<?=$this->session->flashdata('login_success')?></div>
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


</body>
</html>
