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
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto|Trirong" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/ba567eae7a.css">
	<!-- Custom Css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/dashboard/'); ?>css/custom.css">
</head>
<body>

	<header class="header">
    	<div class="text-vertical-center">
        	<div class="container">
				<div class="row " style="height: 180px;">
			    	<div class="col-3"></div>
					<div class="col-6 rlpd">
						<div class="row align-items-center" style="height: 140px;">
							<div class="col-3">
								<?php 
						    		$logo = array('src' => 'assets/dashboard/images/RLPD_logo.png', 'height' => '140');				    		
						    		echo img($logo);
						    	?>
							</div>
							<div class="col-9">
								<?php echo nbs(2); ?> กรมคุ้มครองสิทธิและเสรีภาพ <br> 
								<?php echo nbs(2); ?> กระทรวงยุติธรรม
							</div>
						</div>
					</div>
				    <div class="col"></div>
				</div>
			
			    <div class="row">
			    	<div class="col-3"></div>
				    <div class="col-6">    
				        <form>
				        	<div class="form-group">
				        		<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
				        			<input type="email" class="form-control" id="email" placeholder="Username" required>
				        		</div>
				        	</div>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
									<input type="password" class="form-control" id="password" placeholder="Password" pattern=".{3,6}" required oninvalid="this.setCustomValidity('รหัสผ่านอย่างน้อย 3 ถึง 6 ตัวอักษร')">
								</div>
							</div>
							<div class="form-row align-items-center">
								<div class="col">
									<div class="form-check">
									    <label class="form-check-label">
									      	<input type="checkbox" class="form-check-input">
									      	Remember me
									    </label>
									</div>
								</div>
								<div class="col" style="text-align: right;">
								    <button type="submit" class="btn btn-primary">Sign In</button>
								</div>
						  	</div>
				        </form>
				    </div>
				    <div class="col-3"></div>
				</div>
		    </div>
  		</div>
    </header>

	<!-- Javascript files-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>