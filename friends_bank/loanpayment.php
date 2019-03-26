<?php
session_start();
include 'includes/dbconnect.php';
	$name = $_SESSION['usr_name'];

	$success = "";
	if(isset($_POST['submit'])){
			

		$accno = $_POST['accno'];
		 $accname = $_POST['accname'];
		  $accdate = date('y-m-d');
		  
		if($accname==$name){
			$inm_sql = "SELECT * FROM loan_payee WHERE accname ='$accname'";
			 $rum_sql = mysqli_query($con, $inm_sql);
			  $tempt = mysqli_affected_rows($con);
			  
			if($tempt){

				$in_sql = "SELECT * FROM accounts WHERE accno = '$accno' and accname = '$accname'";
				 $ru_sql = mysqli_query($con, $in_sql);
				  $temp = mysqli_affected_rows($con);
				  
				if($temp){

					$rows = mysqli_fetch_array($ru_sql);
					 $balance = $rows['accbalance'];
					  $accname = $rows['accname'];
					   $accno = $rows['accno'];
						$amount = $_POST['loanamount'];

					if($amount>0){

						$total = $amount + $balance;					
						 $ins_sql = "UPDATE accounts
						  SET accbalance = $total
						   WHERE accname = '$accname' AND accno = '$accno'";
							$run_sql = mysqli_query($con, $ins_sql);
							 $temp1 = mysqli_affected_rows($con);
					
							//insert balance to loan
							
							$inx_sql = "UPDATE loan_payee
						  SET balance = $amount
						   WHERE accname = '$accname' AND accno = '$accno'";
							$ruy_sql = mysqli_query($con,$inx_sql);

						if($temp1){				
							$success = "Loan money successfully!";
						}else{
							
							$success = "Account name and number doesn't match!";
						}
				}else{

					$success = "You're fired!";
				}
			}else{

					$success = "Account name OR number doesn't exist!";
		}
		}else{
			$success = "Register first Then try";
			
	 }
	 }else{
		$success = "It's not your account";
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
			<a class="navbar-brand" href="index.php">FRIENDS BANK</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_name'])) { ?>
				
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
<div style="color: blue;" class="container-fluid">

<h3>Welcome, <?php echo $_SESSION['usr_name']; ?></h3>
</div>

<div style="width: 50px; height: 50px;"></div>
<div class="col-lg-2">
	<ul class="navbar navbar-default nav" style="height: 650px;">

		<li><a href="accountdetails.php"><span style="margin-left: 25px; margin-top:20px; font-size: 20px;"><b>Account details</b></span></a></li>
		<li><a href="depositmoney.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Deposit money</b></span></a></li>
		<li><a href="withdrawmoney.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Withdraw money</b></span></a></li>
		<li><a href="transfer.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Transfer money</b></span></a></li>
		<li><a href="payee.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Register a payee</b></span></a></li>
		<li><a href="removepayee.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Remove Payee</b></span></a></li>
		<li><a href="loanpayment.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Pay loans</b></span></a></li>
		<li><a href="loantransactions.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Loan payments</b></span></a></li>
		<li><a href="customerloans.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Loan info</b></span></a></li>
		</ul>
		</div>

<div class="container">
	<article class="row">
		<section class="col-lg-8">
			<div class="page-header">
				<h2>Pay loans</h2>
			</div>

	<form class="form-horizontal" action="loanpayment.php" method="post" role="form">
				<div class="form-group">
					<label for="number" class="col-sm-3 control-label">Account name*</label>
						<div class="col-sm-8">
							<input type="text" name="accname" class="form-control" placeholder="Enter account number" id="accnumber" required>
						</div>
				</div>
				<div class="form-group">
					<label for="number" class="col-sm-3 control-label">Account no*</label>
						<div class="col-sm-8">
							<input type="text" name="accno" class="form-control" placeholder="Enter account number" id="accnumber" required>
						</div>
				</div>
				
				<div class="form-group">
					<label for="number" class="col-sm-3 control-label">Amount *</label>
						<div class="col-sm-8">
							<input type="text" name="loanamount" class="form-control" placeholder="Enter the amount" id="loanamount" required>
						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
						<input type="submit" id="submit" name="submit" value = "Submit" class="btn btn-block btn-primary">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
						<h4><?php echo $success ?></h4>
					</div>
				</div>
</form></section></article></div>
		

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

