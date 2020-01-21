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
            <a href="index.php">
              <i class="now-ui-icons users_single-02 "></i>
              <p >user profiles</p>
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
      

      <!-- fullcard -->
      <div class="card text-center">
  <div class="card-header  " style="background-color:grey">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active bg-warning" href="#">All users</a>
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
    
    <div class="content  ">
              
		<div ng-app='index' ng-controller='indexCtrl' >
            			
			<div class="row">
            <div class="col-md-12 ">
		

<div class="card-group" ng-repeat='user in data' >
 
  <div class="card">
    <img class="card-img-top" src=".../100px180/" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">
      <h2 class="card-title"><span class="user"><h2>{{user.username}} <span id="status" class="status">Status:{{user.availability}}</span></h2></span></h2>
      </p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <!-- <div class="card">
    <img class="card-img-top" src=".../100px180/" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
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