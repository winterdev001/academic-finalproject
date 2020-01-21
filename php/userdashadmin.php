<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
	    <link rel="apple-touch-icon" sizes="76x76" href="../images/apple-icon.png">
  <link rel="icon" type="image/png" href="../images/favicon.png">
  <link href="../css2/bootstrap.min.css" rel="stylesheet"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <!-- another link -->
  <link rel="stylesheet" href="../css2/bootstrap.min.css"/>
        <link rel="stylesheet" href="../css2/animate.css"/>
        <link rel="stylesheet" href="../css2/circle.css"/>
        <link rel="stylesheet" href="../css2/main.css"/>
        <link rel="stylesheet" href="../css2/userdashadmin.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
      <!-- addition -->
      <link rel="stylesheet" type="text/css" href="../css2/index.css"> 
	    <link rel="apple-touch-icon" sizes="76x76" href="../images/apple-icon.png">
  <link rel="icon" type="image/png" href="../images/favicon.png">
  <link href="../css2/bootstrap.min.css" rel="stylesheet"/>


  <!-- another link -->
  <link rel="stylesheet" href="../css2/bootstrap.min.css"/>
        <link rel="stylesheet" href="../css2/animate.css"/>
        <link rel="stylesheet" href="../css2/circle.css"/>
        <link rel="stylesheet" href="../css2/main.css"/>
        <link rel="stylesheet" href="../css2/form.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
      
  <title>
    user profiles
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons -->    
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- CSS Files -->
 
  <link href="../css2/now-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
  

  
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
  <!-- CSS Files -->
  
  
  
	</head>
    <body style="background-color:aliceblue;">
    
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
      <div class="sidebar-wrapper bg-dark">
        <ul class="nav">
          <li>
            <a href="admindash.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li  class="active ">
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
          </li>
          <li>
            <a href="tabletable.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Table List</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
  <div class="main-panel">
      

      <!-- fullcard -->
      <div class="card text-center navu bg-dark">
  <div class="card-header  bg-dark text-light " >
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item ">
        <a class="nav-link active bg-warning text-light" href="userdashadmin.php">All users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="available.php">Available users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="hired.php" >hired</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    
    <div class="content  " ng-app='index' ng-controller='indexCtrl'>
              
		<div  >
            			
			<div class="row">
            <div class="col-md-12 ">
		
      
    <section class="user-card">
        <div class="container1"  >
                      <div class="row">
                <div class="col-md-9">
                        <div class="members">
                                                        
                                   
                                    
                        <div  >   
                                <div class="row member-row  usr-det" ng-repeat='user in data'>
                                    
                                 <div class="col-md-3">
                                     <img src="../images/user_profile.png" class="img-thumbnail ">
                                     <div class="text-center"><h3>{{user.username}}</h3></div>
                                 </div> 
                                  
                                 <div class="col-md-3 ">
                                   <p>
                                       <a href="#" class="btn btn-warning btn-block"><i class="fa fa-user"></i>View Profile</a>
                                   </p>
                                 </div> 
                                 <div class="col-md-3 ">
                                        <p>
                                            <a href="#" class="btn btn-warning btn-block"><i class="fa fa-edit"></i>Edit Profile</a>
                                        </p>
                                      </div> 
                                  <div class="col-md-3 ">
                                            <p>
                                                <a href="#" class="btn btn-warning btn-block"><i class="fa fa-bookmark" aria-hidden="true"></i> Hire</a>
                                            </p>
                                            
                                          </div>
                                          
                                          <div class="alert alert-success col-sm-9  desc1" role="alert" style="background-color:rgb(215, 249, 250);">
                                                <h4 class="alert-heading"><span class="badge badge-pill badge-warning"  >Status:{{user.availability}}</span></h4>
                                                <br>
                                                <p>{{user.Department}}.<br> {{user.Description}}<br> {{user.Email}}<br></p>
                                                                                         
                                            </div>               
                                           
                                </div> 
                                 
                        </div>  
                </div>  
          </div> 
          
          <div class="rates" >
          <div class=" text-white bg-dark mb-3" >
  <div class="card-header" >Rates</div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">
      ...
    </p>
  </div>
</div>
          </div>
          
    </section>

    <!-- Button trigger modal -->
<button id="add" type="button"  class='float shadow d-flex flex-row justify-content-center border-0 btn admin_add_btn' data-toggle="modal" data-target="#exampleModalCenter">
<img src="../images/add_admin.png" class="admin_add_pic align-self-center">
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

            
    
    
     
      <script src="../js/connector.js"></script>

      <script src="../js/angular.js"></script>
            <script src="../js/Chart.bundle.min.js"></script>
            <script src="../js/jquery.js"></script>
            <!-- <script src="../js/custom.js"></script> -->
            <script src="../js/sweetalert2.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <!-- addition -->

          
		
		<!--   Core JS Files   -->
 
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../js/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../js/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../js/now-ui-dashboard.min.js?v=1.2.0" type="text/javascript"></script>
  

       
        </body>
    </html>