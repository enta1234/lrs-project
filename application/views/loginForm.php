<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login Page</title>
	<!--CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<!--Font-->
	<link href="https://fonts.googleapis.com/css?family=Roboto|Trirong" rel="stylesheet">
	<style>
		/* Global Styles */
		html, body {
		  	width: 100%;
		  	height: 100%;
		  	background-color: #E9E0D6;
		}

		body {
		  	font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
		}

		.text-vertical-center {
		  	display: table-cell;
		  	vertical-align: middle;
		}

		/* Header */
		.header {
			position: relative;
		  	display: table;
		  	width: 100%;
		  	height: 100%;
		  	-webkit-background-size: cover;
		  	-moz-background-size: cover;
		  	-o-background-size: cover;
		  	background-size: cover;
		}

		/* Name RLPD TH */
		.RLPD {
			font-family: 'Trirong', serif;
			font-size: 42;
			
		}
	</style>
</head>
<body>

	<header class="header">
    	<div class="text-vertical-center">
        	<div class="container">
				<div class="row align-items-center" style="height: 200px;">
			    	<div class="col"></div>
				    <div class="col-6">    

				    	<?php 
				    		$logo = array('src' => 'assets/images/RLPD_logo.png','width' => '140' , 'height' => '140');				    		
				    	 ?>
						<?php echo img($logo); echo nbs();?><div class="RLPD">กรมคุ้มครองสิทธิและเสรีภาพ</div>
					</div>
				    <div class="col"></div>
				</div>
			</div>

			<div class="container">
			    <div class="row">
			    	<div class="col"></div>
				    <div class="col-6">    
				        <form>
				        	<div class="form-group">
				        		<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
				        			<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Username">
				        		</div>
				        	</div>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
									<input type="password" class="form-control" id="inputPassword" placeholder="Password">
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
				    <div class="col"></div>
				</div>
		    </div>
  		</div>
    </header>

	<!-- Javascript files-->
	<script src="https://use.fontawesome.com/ba567eae7a.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>