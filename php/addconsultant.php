<?php
session_start();
//initializing variables
$username="";
$email="";
$errors=array();
 
//connect to the database
$con=mysqli_connect("localhost","root","","conzult");
// if(mysqli_connect_errno()){
//     echo "Failed to connect to the database :"	. mysqli_connect_error();
// }
//  else{
//      echo "successfully connected" ."<br>";
//  }

//register user

if (isset($_POST['reg_user'])){
    //receive all input values from the form
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password_1=mysqli_real_escape_string($con,$_POST['password_1']);
    $password_2=mysqli_real_escape_string($con,$_POST['password_2']);
    $firstname=mysqli_real_escape_string($con,$_POST['firstname']);
    $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    if(isset($_POST['availability'])){
        $availability=mysqli_real_escape_string($con,$_POST['availability']);
    }
    $department=mysqli_real_escape_string($con,$_POST['department']);
   
    //form validation:ensure that the form is correctily filled... 
    //by adding (array_push()) corresponding error unto $errors array
    if(empty($username)){array_push($errors,"Username required");}
    if(empty($email)){array_push($errors,"email required");}
    if(empty($password_1)){array_push($errors,"password required");}
    if($password_1 !=$password_2){
        array_push($errors,"The two pasword do no match");
    }
  //first check the database to make sure a user not already exist with the sam username/email
  $user_check_query="SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result= mysqli_query($con,$user_check_query);
  $user =mysqli_fetch_assoc($result);

  if($user){
      //if exists
      if($user['username']==$username){
 array_push($errors,"Username already exists");
      }
      if($user['email']==$email){
          array_push($errors,"Email already exists");

      }
  }
  //finally, register user if ther are no errors in the form
  if(count($errors)==0){
      $password=md5($password_1);//encrypt the pasword before saving in the database

      $query= "INSERT INTO users (username,firstname,lastname,email,password,availability,Department,phone) VALUES ('$username','$firstname','$lastname','$email','$password','$availability','$department','$phone') ";

     $result2=mysqli_query($con,$query);
     if($result2){
        $message = " User Added successfully";
 echo "<script type='text/javascript'>alert('$message');</script>";               
    }
else{
    $message = "Failed to Add a user";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}
     
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
    add user
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
		<body class="bg-dark">
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
         <div style="padding-top:30px;">
        <ul class="nav">
          <li >
            <a  href="allusers.php">    
            <i class="fa fa-users "> </i>  
            <h3>Consultants</h3>
            </a>
          </li>
          <li class=" ">
              
            <a href="allcompanies.php">
            <i class="fas fa-building "> </i>  
            <h3>Companies</h3>
            </a>
          </li>      
          </div>
        </ul>
      </div>
    </div>
    <div class="main-panel  ">
      <div class=""></div>

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
        <a class="nav-link active bg-default text-light" href="admindash.php" >Request(<?php
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
           
      <li class="nav-item" style="margin-left:700px;">
        <a class="nav-link  active bg-default text-light" href="logout.php" >Logout</a>
      </li>
    </ul>
  </div>
  <div class="card-body bg-dark cont ">
    
    <div class="content  ">
              
		<div ng-app='index' ng-controller='indexCtrl' >
            			
			<div class="row bg-dark">
            <div class="col-lg-12 ">
             <!-- add user -->
                

            
            <div class="col-md-6"> 
                <div class="cont3">            
                        <div class="container1">                                
                    <span class="title text-warning" style="font-size:25px;">Add a user</span>
                                                        
    <form action="addconsultant.php" method="POST">
       
       <div class="form-input1" style="margin-top:-20px;">
       
        
         <input type="text"  placeholder="userName" name="username" />
         
         <input type="text"  placeholder="First Name" name="firstname" />
         <input type="text"  placeholder="Last Name" name="lastname" />
         <input type="email"  placeholder="e-mail" name="email" />
         <input type="password"  placeholder="password" name="password_1" />
         <input type="password" placeholder="confirm password" name="password_2" />         
         <input type="number" min="0"  placeholder="Phone" name="phone" />    
      <select class=" dep" id="inlineFormCustomSelect" name="department" style="width:300px;">
        <option selected>Department</option>
        <option value="IT consultant">IT consultant </option>
        <option value="HR consultant">HR consultant</option>
        <option value="Operations consultant">Operations consultant</option>
        <option value="Strategy consultant">Strategy consultant</option>
        <option value="Management consultant">Management consultant</option>
        <option value="Financial Advisory consultant">Financial Advisory consultant</option>
      </select>
    <br>
    <div class="form-check" style="font-size:15px;"><b>Status:</b>
  <input class="form-check-input" type="radio" name="availability" id="exampleRadios1" value="Available" checked>
  <label class="form-check-label" for="exampleRadios1">
 Available
  </label>
  <input class="form-check-input" type="radio" name="availability" id="exampleRadios2" value="Busy">
  <label class="form-check-label" for="exampleRadios2">
   Busy
  </label><br>
  <input type="submit"  value="Register" class="btn" name="reg_user" />
    <input type="button" value="Return " class="btn" onClick="javascript:history.go(-1)" />
</div> 

    
</div>    
          </div>
         
         <div class="error" style="margin-left:300px,padding:1px;">
           <!-- display validation errors here -->
        <?php include('errors.php'); ?></div>
 
    </form>
                              </div>
                </div>

            </div>

        
   

        
            </div>
<div class="bg-dark" >
                
  
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


