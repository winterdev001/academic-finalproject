<?php 
    session_start();
?>


<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <link rel="stylesheet" type="text/css" href="../css2/index.css"> 
	    <link rel="apple-touch-icon" sizes="76x76" href="../images/apple-icon.png">
  <link rel="icon" type="image/png" href="../images/favicon.png">
  <link href="css/bootstrap.min.css" rel="stylesheet"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <!-- another link -->
  <link rel="stylesheet" href="css2/bootstrap.min.css"/>
        <link rel="stylesheet" href="../css2/animate.css"/>
        <link rel="stylesheet" href="../css2/circle.css"/>
        <link rel="stylesheet" href="../css2/font-awesome.min.css"/>
        <link rel="stylesheet" href="../css2/main.css"/>
        <link rel="stylesheet" href="../css2/form.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
      
  <title>
    Conzult
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">-->
  <!-- CSS Files -->
  <link href="../css2/bootstrap.min.css" rel="stylesheet" />
  <link href="../css2/now-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
  
	</head>
	<body>
		<body class="bg-dark" style="background-color:black;">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow" style="text-color:black;">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        
        <a href="#" class="simple-text logo-normal">
              <span class="" style="font-size:200%;">Conzult</span>
        </a>
      </div>
      <div class="sidebar-wrapper bg-dark">
      <div class="card bg-dark admin-pro">
         <img src="../images/user_profile.png" alt="" class="thumbnail" style="border-radius:50%;">
          <h1 style="color:black"><?php echo $_SESSION['username']; ?> </h1>
         </div>
         <div style="padding-top:35px;">
         <ul class="nav">
          <li class=" ">
            <a class="links" href="allusers.php">          
            <i class="fas fa-users "> </i>  
            <h3>Consultants</h3>       
              </a>
          </li>
          <li>              
            <a href="allcompanies.php">
            <i class="fas fa-building"></i>
              <h3>Companies</h3>
            </a>
          </li>
         
        </ul>
      </div>
    </div>
    </div>
    <div class="main-panel">
      

      <!-- fullcard -->
      <div class="card text-center navu bg-dark">
  <div class="card-header  bg-dark text-light " >
    <ul class="nav nav-tabs card-header-tabs">
      <!-- <li class="nav-item ">
        <a class="nav-link active bg-warning text-light" href="userdashadmin.php">All users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="available.php">Available users</a>
      </li>-->
      <li class="nav-item">
        <a class="nav-link active bg-default text-light" href="../index.html" >Home</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link active bg-default text-light" href="admindash.php" >Dashboard</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link active bg-default text-light" href="addconsultant.php" >Add user</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link active bg-default text-light" href="request.php" >Request(<?php
$con=mysqli_connect("localhost","root","","conzult");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql3="SELECT * from request" ;

if ($result3=mysqli_query($con,$sql3))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result3);
  printf("  %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result3);
  }

mysqli_close($con);
?>)</a>
      </li> 
           
      <li class="nav-item" style="margin-left:500px;">
        <a class="nav-link  active bg-default text-light" href="logout.php" >Logout</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    
    <div class="content  ">
              
		<div ng-app='index' ng-controller='indexCtrl' >
            			
			<div class="row">
            <div class="col-lg-12 ">
		

   
      <div class="dashb">
       
        <h3 style="color:rgb(243, 202, 20);">ADMIN DASHBOARD</h3>
        <div class="card bg-secondary mb-3 crd" style="width: 18rem;color:rgb(243, 202, 20);">
         <h4>All Consultants</h4>  
        <h2><i class="fas fa-users x5"></i></h2>
       <h2> <?php
$con=mysqli_connect("localhost","root","","conzult");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * from users limit 100 offset 1";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("  %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

mysqli_close($con);
?></h2> 
</div>

<div class="card bg-secondary mb-3 b crd" style="width:37rem;color:rgb(243, 202, 20);">
<h4>Available Consultants</h4>
<h2><i class="fas fa-user-friends"></i></i></h2>
  <h2><?php
  $con=mysqli_connect("localhost","root","","conzult");
  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
$sql1="SELECT * from users where availability='available'";

if ($result1=mysqli_query($con,$sql1))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result1);
  printf(" %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result1);
  }

mysqli_close($con);
?></h2>
</div><?php echo"<br>"; ?>
<div class="card mb-3 bg-secondary crd"style="width: 18rem;color:rgb(243, 202, 20);">
<h4>Hired Consultants</h4>
<h2><i class="fas fa-bookmark"></i></i></h2>
  <h2>
  <?php
  $con=mysqli_connect("localhost","root","","conzult");
  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
$sql1="SELECT * from users where availability='Busy'";

if ($result1=mysqli_query($con,$sql1))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result1);
  printf(" %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result1);
  }

mysqli_close($con);
?>
  </h2>
</div>
<div class="card bg-secondary mb-3 b crd" style="width:18rem;color:rgb(243, 202, 20);">
<h4>Confirmed </h4>
<h2><i class="fas fa-calendar-check"></i></h2>
  <h2><?php
  $con=mysqli_connect("localhost","root","","conzult");
  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
$sql1="SELECT * from confirm ";

if ($result1=mysqli_query($con,$sql1))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result1);
  printf(" %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result1);
  }

mysqli_close($con);
?></h2>
</div>

<div class="card bg-secondary mb-3 b crd"style="width: 18rem;color:rgb(243, 202, 20);">
<h4>Companies</h4>
<h2><i class="fas fa-building"></i></h2>
  <h2>
  <?php
  $con=mysqli_connect("localhost","root","","conzult");
  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
$sql1="SELECT * from company";

if ($result1=mysqli_query($con,$sql1))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result1);
  printf(" %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result1);
  }

mysqli_close($con);
?>
  </h2>
</div>

      </div>

</div>

<footer class="footer">
<div class=" text-warning" style="text-align:center;">
  <center >
  <?php
echo "<p>Copyright &copy; " . date("Y") . " Conzult.com</p>";
?>
</center>
</div>
</footer>             
 


  <!-- modals end -->

   	<script src="../js/angular.js"></script>
		<script src="../js/connector.js"></script>
		<!--   Core JS Files   -->
 
  <script src="../js/core/jquery.min.js"></script>
  <script src="../js/core/popper.min.js"></script>
  <script src="..//core/bootstrap.min.js"></script>
  <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../js/now-ui-dashboard.min.js?v=1.2.0" type="text/javascript"></script>
  <Script src="../js/bootstrap.min.js"></Script>

  <!-- another links -->

  <script src="../js/angular.js"></script>
        <script src="../js/Chart.bundle.min.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/custom.js"></script>
        <script src="../js/sweetalert2.js"></script>
        <script src="../js/bootstrap.min.js"></script>
	</body>
</html>
