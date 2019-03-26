<?php
session_start();
include_once 'includes/dbconnect.php';
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
			<a class="navbar-brand" href="admin.php">Admin Dashboard</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_name'])) { ?>
				
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

<div style="width: 50px; height: 50px;"></div>
<div class="col-lg-2">
	<ul class="navbar navbar-default nav" style="height: 650px;">

		<li><a href="x/addaccount.php"><span style="margin-left: 25px; margin-top:20px; font-size: 20px;"><b>Update customer</b></span></a></li>
		<li><a href="x/deleteaccount.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Close account</b></span></a></li>
		<li><a href="x/grantloan.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Block account</b></span></a></li>
		<li><a href="x/viewaccounts.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Reset password</b></span></a></li>
		<li><a href="x/depositmoney.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Total balance</b></span></a></li>
		<li><a href="x/withdrawmoney.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Transfer recoard</b></span></a></li>
		<li><a href="x/viewloans.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Total loan</b></span></a></li>
		</ul>
		</div>
		
		<div class="container">
	<article class="row">
		<section class="col-lg-8">
			<div class="page-header">
				<h2>Admin dashboard</h2>
			</div>
	<?php
	
		$login_name = $_SESSION['usr_name'];
		$ins_sql = "SELECT * FROM `admin` WHERE name = '$login_name'";
		$run_sql = mysqli_query($con, $ins_sql);
		while($rows = mysqli_fetch_array($run_sql)){

			echo '

				<table class="table table-bordered">
				   	<tbody>
				      <tr>
				        <td>Account name</td>
				        <td>'.$rows['name'].'</td>
				      </tr>
				      <tr>
				        <td>Account no</td>
				        <td>'.$rows['id'].'</td>
				      </tr>
				      <tr>
				        <td>Email-address</td>
				        <td>'.$rows['email'].'</td>
				      </tr>
				      
				      <tr>
				        <td>Open date</td>
				        <td>'.$rows['date'].'</td>
				      </tr>
				    </tbody>
				</table>
				
			';

		}
	?>
		

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>