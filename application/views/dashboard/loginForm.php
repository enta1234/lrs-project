<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login Page</title>
	<!--CSS-->
	<link rel="stylesheet" href="<?php echo base_url('assets/dashboard/'); ?>css/bootstrap.min.css">
	<!--Font-->
	<link href="https://fonts.googleapis.com/css?family=Roboto|Trirong" rel="stylesheet">
	<!-- Icon -->
	<link rel="stylesheet" href="https://use.fontawesome.com/ba567eae7a.css">
	<!-- Custom Css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/dashboard/'); ?>css/custom.css">
</head>
<body>

	<header class="header">
    	<div class="text-vertical-center">
        	<div class="container">
				<div class="row align-items-start justify-content-center" style="height: 180px;">
			    	<div class="col-3"></div>
				    <div class="col">
				    	<?php 
				    		$logo = array('src' => 'assets/dashboard/images/RLPD_logo.png','width' => '140' , 'height' => '140');				    		
				    	 ?>
						<?php echo img($logo); echo nbs();?>
					</div>
					<div class="col-5 RLPD">
						<div class="row align-items-center" style="height: 140px;">
							<div class="col">
								กรมคุ้มครองสิทธิและเสรีภาพ กระทรวงยุติธรรม
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
	<script src="<?php echo base_url('assets/dashboard/'); ?>js/jquery-slim.min.js"></script>
	<script src="<?php echo base_url('assets/dashboard/'); ?>js/popper.min.js"></script>
	<script src="<?php echo base_url('assets/dashboard/'); ?>js/bootstrap.min.js"></script>
</body>
</html>