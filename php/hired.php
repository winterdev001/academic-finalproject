<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <link rel="stylesheet" type="text/css" href="index.css"> 
	    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <link href="css/bootstrap.min.css" rel="stylesheet"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <!-- another link -->
  <link rel="stylesheet" href="css2/bootstrap.min.css"/>
        <link rel="stylesheet" href="css2/animate.css"/>
        <link rel="stylesheet" href="css2/circle.css"/>
        <link rel="stylesheet" href="css2/main.css"/>
        <link rel="stylesheet" href="css2/form.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
      
  <title>
    Conzult
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">-->
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/now-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
  
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
          Conzult
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.html">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons users_single-02"></i>
              <p>user profiles</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons location_map-big"></i>
              <p>companies</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Table List</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <!-- <nav class="navbar navbar-expand-lg fixed-top navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="./http://localhost/try/index.html#">all users</a>
            <a class="navbar-brand" href="#">available users</a>
            <a class="navbar-brand" href="#">hired users</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              
              
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav> -->

      <!-- fullcard -->
      <div class="card text-center">
  <div class="card-header  " style="background-color:grey">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active bg-warning" href="index.php">All users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="available.php">Available users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="hired.php" >hired</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">
    <div class="content  ">
        <div class="row">
          <div class="col-md-4 ">
              
         
		<div ng-app='hired' ng-controller='hiredCtrl' >
            
			
			<div class="row">
            <div class="col-xl-12">
			<div ng-repeat='user in dataz' >

            
             <!-- 1st card -->
             <div class="row">
             <div class="col-xl-12 ">
             <div class="card " style="width:10rem,background-color:grey, display:inline-block;">
  <img src="user_profile.png" class="card-img" style="width:100%,height:100%;" alt="image goes here">
  <div class="card-body" style="background-color:grey;">
    <h2 class="card-title"><span class="user"><h2>{{user.username}} <span id="status" class="status">Status:{{user.availability}}</span></h2></span></h2>
    <p class="card-text"></p>
  
  
  {{user.Department}}.<br> {{user.Description}}<br> {{user.Email}}<br> <br><br>
					
  <div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-warning">hire</button>
  <button type="button" class="btn btn-warning">view profile</button>
  <button type="button" class="btn btn-warning">edit profile</button>
</div>
</div>
  </div>
  
</div>
</div>
</div>
    </p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">
        
      </div> -->
      



                
  <!-- Button trigger modal -->
<button id="add" type="button"  class='float shadow d-flex flex-row justify-content-center border-0 btn admin_add_btn' data-toggle="modal" data-target="#exampleModalCenter">
<img src="images/add_admin.png" class="admin_add_pic align-self-center">
  </button>
  
  <!-- Modal -->
  <div  class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    
      <form action="register1.php" method="POST">
         
        <div class="form-input">
        <!-- <div class="error"> -->
            <!-- display validation errors here -->
        <!-- <?php include('errors.php'); ?></div> -->
         
          <input type="text"  placeholder="user Name" name="username" />
          <input type="email"  placeholder="e-mail" name="email" />
          <input type="password"  placeholder="password" name="password_1" />
          <input type="password" placeholder="confirm password" name="password_2" /><br><br>
          <input type="submit"  value="Register" class="btn-Register" name="reg_user" /><br>
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
 
		<script src="js/angular.js"></script>
		<script src="js/connector.js"></script>
		<!--   Core JS Files   -->
 
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.2.0" type="text/javascript"></script>
  <Script src="js/bootstrap.min.js"></Script>

  <!-- another links -->

  <script src="js2/angular.js"></script>
        <script src="js2/Chart.bundle.min.js"></script>
        <script src="js2/jquery.js"></script>
        <script src="js2/custom.js"></script>
        <script src="js2/sweetalert2.js"></script>
        <script src="js2/bootstrap.min.js"></script>
	</body>
</html>