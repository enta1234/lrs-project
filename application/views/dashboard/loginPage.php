<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login Page</title>
	<!-- Bootstrap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<!-- Bootstrap 3 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/dashboard/'); ?>bootstrap/css/bootstrap.css">
	<!-- Theme style -->
 	<link rel="stylesheet" href="<?php echo base_url('assets/dashboard/'); ?>themelte/css/AdminLTE.css">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto|Trirong" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/ba567eae7a.css">
	<!-- Custom Css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/dashboard/'); ?>css/custom.css">
	<!-- CheckBox Css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/dashboard/'); ?>icheck/css/blue.css">

</head>
<body class="hold-transition login-page">
  	<div class="login-box">
  		<div class="row align-items-center">
	  		<div class="col-sm-4">
	  			<div class="text-center">
	  				<?php 
						$logo = array('src' => 'assets/dashboard/images/RLPD_logo.png', 'height' => '140');				    		
				  		echo img($logo);
					?>
				</div>
	 		</div>
	  		<div class="col-sm-8 rlpd">
	  			กรมคุ้มครองสิทธิและเสรีภาพ <br> 
					กระทรวงยุติธรรม
	  		</div>
	 	</div>
	 	<?php echo br(); ?>
  		<div>
  			<!-- <form action="#" method="post"> -->
  			<?php echo form_open('Dashboard/logincheck'); ?>
  				<div class="form-group">
  					<?php echo validation_errors(); ?>
  					<div class="input-group">
  						<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
 						<!-- <input type="text" class="form-control" id="email" name="email" placeholder="Username"> -->
 						<?php 
							echo form_input('email',set_value('email'),'class="form-control" id="email" placeholder="E-Mail"');
 						 ?>
 					</div>
  				</div>
  				<div class="form-group">
	  				<div class="input-group">
	  					<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
	  					<!-- <input type="password" class="form-control" id="password" name="password" placeholder="Password")> -->
	  					<?php 
							echo form_password('password',set_value('password'),'class="form-control" id="password" placeholder="Password"');
 						 ?>
	  				</div>		
	  			</div>
	  			<div class="row">
	  				<div class="col-xs-8">
	  					<div class="checkbox icheck">
	  						<label>
	  							<!-- <input type="checkbox"> Remember Me -->
	  							<?php echo form_checkbox(); ?> Remember Me
	  						</label>
	  					</div>
	  				</div>
	  				<div class="col-xs-4">
	  					<!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button> -->
						<?php echo form_submit('submit', 'Sign In','class="btn btn-primary btn-block btn-flat"'); ?>
	  				</div>
	  			</div>
	  		<?php form_close(); ?>
  			<!-- </form> -->
  		</div>
  	</div>
	<!-- Javascript files-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<!-- iCheck -->
	<script src="<?php echo base_url('assets/dashboard/'); ?>icheck/js/icheck.js"></script>
	<script>
	  $(function () {
	    $('input').iCheck({
	      checkboxClass: 'icheckbox_square-blue',
	      radioClass: 'iradio_square-blue',
	      increaseArea: '20%' // optional
	    });
	  });
	</script>
</body>
</html>