<?php
session_start();
include_once 'includes/dbconnect.php';
$name = addslashes($_SESSION['usr_name']);

?>
<!DOCTYPE html>
<html>
<head>
	<title>ABC Bank</title>
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
			<a class="navbar-brand" href="index.php">ABC Bank</a>
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
<div style="color: blue;" class="container-fluid">

<h3>Welcome, <?php echo $_SESSION['usr_name']; ?></h3>
</div>

<div style="width: 50px; height: 50px;"></div>
<div class="col-lg-2">
	<ul class="navbar navbar-default nav" style="height: 650px;">

		<li><a href="accountdetails.php"><span style="margin-left: 25px; margin-top:20px; font-size: 20px;"><b>Account details</b></span></a></li>
		<li><a href="transactions.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>My Transactions</b></span></a></li>
		<li><a href="transfer.php"><span style="margin-left: 25px; margin-top: 20px; font-size: 20px;"><b>Transfer Amount</b></span></a></li>
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
				<h2>Transaction Details</h2>
			</div>
				
	<?php
	
		/*$in_sql = "SELECT * FROM accounts WHERE accname = $name";
		$ru_sql = mysqli_query($con, $in_sql);

		$rows = mysqli_fetch_array($ru_sql);
		$accno = $rows['accno'];*/

		$ins_sql = "SELECT * FROM `transactions` WHERE payee_name = '$name'";
		$run_sql = mysqli_query($con, $ins_sql);
		$rows = mysqli_fetch_array($run_sql);
	
		while($rows){
			echo "dfhjkgdjfk";

			echo 

				'<table class="table table-bordered">
				   	<tbody>
				      <tr>
				        <td>Account name</td>
				        <td>'.$rows['payee_name'].'</td>
				      </tr>
				      <tr>
				        <td>Account no</td>
				        <td>'.$rows['from_acc'].'</td>
				      </tr>
				      <tr>
				        <td>Amount</td>
				        <td>'.$rows['Amount'].'</td>
				      </tr>
				      <tr>
				        <td>Transfer date</td>
				        <td>'.$rows['trans_date'].'</td>
				      </tr>
				      
				    </tbody>
				</table>
				
			';
			

		}
	?>
	</table></section></article></div>
		

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

