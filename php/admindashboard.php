<?php 
    session_start();
?>
<?php
$conn= mysqli_connect("127.0.0.1", "root", "", "conzult");
if ($conn-> connect_error) {
   die("Connection failed:". $conn-> connect_error);
  }

            $sql = "SELECT * FROM users limit 500 OFFSET 1";
            $result = $conn-> query($sql); 
              // delete user
             if (isset($_GET['del'])) {
             $del=$_GET['del'];
               //SQL query for deletion.
            $query1 ="delete from users where ID='$del'";
            $result2=mysqli_query($conn,$query1);
            if($result2===true){
                                                
             echo"deleted";
             }
                                                
                                            
            else{ 
                 echo "ERROR: Could not able to execute $sql. "   . $mysqli->error; 
                } 
                                    
            header("Location:admindash.php");
            }
   
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
		<body class="">
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
         <img src="../images/user_profile.png" alt="" class="thumbnail">
          <h1 style="color:black"><?php echo $_SESSION['username']; ?> </h1>
         </div>
        <ul class="nav">
          <!-- <li class="active ">
            <a href="admindash.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="userdashadmin.php">
              <i class="now-ui-icons users_single-02 "></i>
              <p >user profiles</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons location_map-big"></i>
              <p>companies</p>
            </a>
          </li> -->
          
        
          
        </ul>
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
      
           
      <li class="nav-item" style="margin-left:700px;">
        <a class="nav-link  active bg-default text-light" href="logout.php" >Logout</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    
    <div class="content  ">
              
		<div ng-app='index' ng-controller='indexCtrl' >
            			
			<div class="row">
            <div class="col-lg-12 ">
		

   
<!-- user and company -->

</div>
<div><?php
echo "<p>Copyright &copy; 1999-" . date("Y") . " Conzult.com</p>";
?></div>
                
  <!-- Button trigger modal -->
<button id="add" type="button"  class='float shadow d-flex flex-row justify-content-center border-0 btn admin_add_btn' data-toggle="modal" data-target="#2">
<img src="../images/add_admin.png" class="admin_add_pic align-self-center">
  </button>
  
  <!-- Modal -->
  <div  class="modal fade" id="2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" >
      <div class="modal-content"   >
        <div class="modal-header " style="background-color:orange;" >
          <h5 class="modal-title" id="exampleModalCenterTitle">ADD USER</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background-color:grey;">
          <!-- register form   -->
          <div class="containerform">
    
      <form action="admindash.php" method="POST">
         
        <div class="form-input">
         
         
          <input type="text"  placeholder="user Name" name="username" />
          <input type="email"  placeholder="e-mail" name="email" />
          <input type="password"  placeholder="password" name="password_1" />
          <input type="password" placeholder="confirm password" name="password_2" /><br><br>
          <input type="submit"  value="Register" class="btn-Register" name="reg_user2" /><br>
          </div>
          
  
      </form>
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Register</button> -->
        </div>
      </div>
    </div>
  </div>

 

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
