<?php include 'includes/dbconnect.php' ?>
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

    <!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">FRIENDS BANK</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="friends_bank.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="contact.php">Contact us</a></li>
      </ul>
    </div>
  </div>
</nav>
    
  
	
	<!-- Team Section -->
<div id="team" class="text-center">
  <div class="container">
    <div class="col-md-8 col-md-offset-2 section-title">
      <h2>Meet the Team</h2>
      
    </div>
    <div id="column">
      <div class="col-md-3 col-sm-6 team">
        <div class="thumbnail"> <img src="img/team/rahat.jpg" alt="..." class="team-img">
          <div class="caption">
            <h4>Rahat Islam </h4>
            <p>Leader</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 team">
        <div class="thumbnail"> <img src="img/team/alomgir.jpg" alt="..." class="team-img">
          <div class="caption">
            <h4>Alomgir Hossain</h4>
            <p>Web Developer</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 team">
        <div class="thumbnail"> <img src="img/team/polok.png" alt="..." class="team-img">
          <div class="caption">
            <h4>Jonakur Rohan Polok</h4>
            <p>Web Designer</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 team">
        <div class="thumbnail"> <img src="img/team/nur.jpg" alt="..." class="team-img">
          <div class="caption">
            <h4>Nur Hossain</h4>
            <p>Team Member</p>
          </div>
        </div>
      </div>
	  <div class="col-md-3 col-sm-6 team">
        <div class="thumbnail"> <img src="img/team/johirul.jpg" alt="..." class="team-img">
          <div class="caption">
            <h4>Jahirul Islam</h4>
            <p>Team Member</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        

</body>
</html>
