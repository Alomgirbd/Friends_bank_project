<?php
session_start();
include 'includes/dbconnect.php';

	$success = "";

	if(isset($_POST['submit'])){
		
		
		$accname = $_POST['accname'];
		$accemail = $_POST['accemail'];
		$accpassword = $_POST['accpassword'];
		$accdate = date('d-m-y');
		
		$ch_sql = "SELECT * FROM admin WHERE email = '$accemail'";
			$chc_sql = mysqli_query($con, $ch_sql);
			$temp = mysqli_affected_rows($con);
			if(!$temp){
		
				$ins_sql = "INSERT INTO admin(name, email, password, date) VALUES ('".$accname."', '".$accemail."', '".$accpassword."', '".$accdate."')";
				$run_sql = mysqli_query($con,$ins_sql);

				$temp2 = mysqli_affected_rows($con);
				
				header("Location: adminlogin.php");
			}else{
		
		$errormsg = "'E-mail' already have a account.'try another or login'";
				
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FRIENDS BANK</title>
	<link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="admin.php">Welcome to FRIENDS BANK</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['submit'])) { ?>
				
				<li><a href="friends_bank">Log Out</a></li>
				<?php } else { ?>
				<li><a href="adminlogin.php">Login</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<article class="row">
		<section class="col-lg-8">
			<div class="page-header">
				<h2>Add an account</h2>
			</div>
			<form class="form-horizontal" action="addadmin.php" method="post" role="form">
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">Full Name *</label>
						<div class="col-sm-8">
							<input type="text" name="accname" class="form-control" placeholder="Enter your name" id="accname" required>
						</div>
				</div>
				<div class="form-group">
					<label for="number" class="col-sm-3 control-label">Email-address *</label>
						<div class="col-sm-8">
							<input type="email" name="accemail" class="form-control" placeholder="Enter Email-address" id="accemail" required>
						</div>
				</div>
			
				<div class="form-group">
					<label for="number" class="col-sm-3 control-label">Password *</label>
						<div class="col-sm-8">
							<input type="password" name="accpassword" class="form-control" placeholder="Enter password" id="accpassword" required>
						</div>
				</div>
				<div class="form-group">
					<label for="number" class="col-sm-3 control-label">Re_Password *</label>
						<div class="col-sm-8">
							<input type="password" name="accpassword2" class="form-control" placeholder="Enter password" id="accpassword" required>
						</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
					<input type="submit" id="submit" name="submit" value = "Submit" class="btn btn-block btn-primary">
					</div>
				</div>
				<h3>
				<?php if (isset($errormsg)) { echo $errormsg; } ?>
				</h3>
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
					<h4><?php echo $success ?></h4>
					</div>
				</div>
				


	</article></form></section></article></div>
</body>
</html>