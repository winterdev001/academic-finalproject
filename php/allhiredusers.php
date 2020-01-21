<?php 
    session_start();
?>
<?php
$errors=array();
$conn= mysqli_connect("127.0.0.1", "root", "", "conzult");
if ($conn-> connect_error) {
   die("Connection failed:". $conn-> connect_error);
  }

            $sql = "SELECT * FROM users where availability='Busy'";
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
             //update user
             if (isset($_GET['updat'])) {
                $del=$_GET['updat'];
                  //SQL query for updating.
               $query4 ="update users set availability='Available' where ID='$del'";
               $result4=mysqli_query($conn,$query4);
               if($result4===true){
                                                   
               
                $message = " Hired";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Location:allavailableusers.php");

                }
                                                   
                                               
               else{ 
                    echo "ERROR: Could not able to execute $query4. "   . $mysqli->error; 
                   } 
                                       
              
               }
               //comfirm user
               $sql2 = "SELECT * FROM confirm ";
               $result6 = $conn-> query($sql2); 
                if(isset($_POST['confirm'])){
                   $companyname=mysqli_real_escape_string($conn,$_POST['companyname']);
                   $consultantname=mysqli_real_escape_string($conn,$_POST['consultantname']);
                   $department=mysqli_real_escape_string($conn,$_POST['department']);
                   $duration=mysqli_real_escape_string($conn,$_POST['duration']);   
                   
                   if(empty($companyname)){array_push($errors,"Company name required");}
                   if(empty($consultantname)){array_push($errors,"consultant name required");}
                   if(empty($department)){array_push($errors,"Department required");}
                   if(empty($duration)){array_push($errors,"Duration required");}
                   if(count($errors)==0){
                       $sql1="INSERT into confirm (companyname,consultantname,department,duration) VALUES ('$companyname','$consultantname','$department','$duration')";
                       $confres=mysqli_query($conn,$sql1);            
                       if($confres){
                           $message = " Confirmed";
                    echo "<script type='text/javascript'>alert('$message');</script>";               
                    header("Location:allhiredusers.php");
                       }
           
                   
                   else{
                       $message = "Failed to confirm";
               echo "<script type='text/javascript'>alert('$message');</script>";
                   }
               }
               if (isset($_GET['del'])) {
                   $del=$_GET['del'];
                     //SQL query for deletion.
                  $delete ="delete from confirm where ID='$del'";
                  $delres=mysqli_query($conn,$delete);
                  if($delres===true){                                                      
                    $message = " deleted";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("Location:allhiredusers.php");
                   }
                                                      
                                                  
                  else{ 
                       echo "ERROR: Could not able to execute $delete. "   . $mysqli->error; 
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
          <li class="active ">
            <a  href="allusers.php">
            
            <i class="fa fa-users"></i>
              <h3>
           Users</h3>

              
            </a>
          </li>
          <li >
              
            <a href="allcompanies.php">
              <i class="fa fa-building "></i>
              <h3 >Companies</h3>
            </a>
          </li>
          
        </ul>
        </div>
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
        <a class="nav-link active bg-default text-light" href="https://www.gmail.com" >Mail</a>
      </li> 
           
      <li class="nav-item" style="margin-left:600px;">
        <a class="nav-link  active bg-default text-light" href="logout.php" >Logout</a>
      </li>
    </ul>
  </div>
  <div class="card-body bg-dark cont ">
    
    <div class="content  ">
              
		<div ng-app='index' ng-controller='indexCtrl' >
            			
			<div class="row bg-dark">
            <div class="col-lg-12 ">
		     <!-- all users -->
        <!-- table -->
<h3 class="hd text-warning"><span class="use-link1"><a  href="allusers.php">All Users</a></span><span class="use-link2"><a  href="allavailableusers.php">Available Users</a></span><span class="use-link3"><a class="active" href="allhiredusers.php">Hired Users</a></span></h3>
<h3 style="font-size:25px;"><a href="../adminto/dark_menu/fpdf181/hiredpdf.php">View & Download Report</a></h3>

<table class="table table-dark tbl" style="margin:0 3px;">
  <thead style="background-color:black;">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">availability</th>
      <th scope="col">Department</th>
      <th>Complete</th>
      <th>Remove</th>
    </tr>
  </thead>
  <tbody>
    <?php  
    while ($row = $result-> fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['availability']; ?></td>
            <td><?php echo $row['Department']; ?></td>
            <td><?php echo "<b><a href='allhiredusers.php?updat={$row['ID']}'>complete</a></b>"; ?></td>
            <td><?php echo "<b><a href='allhiredusers.php?del={$row['ID']}'>delete</a></b>"; ?></td>
            <!-- <th><button  class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete" name="delete_user" ><span class="glyphicon glyphicon-trash"></span></button></th> -->
    </tr>
    <?php 
    }
    ?>
  </tbody>
</table>
</div>
<div class="card  confirm col-md-6" style="background-color:grey;">
    <div class="card-header">
        <h2>Comfirm Hiring</h2>
                                
        
        <form action="allhiredusers.php" method="POST" style="" >
        <div class="form-input">
        <input  type="text" name="companyname"  placeholder="Enter company's Username" required/> <?php echo"<br>";?>
        <input  type="text" name="consultantname"  placeholder="Enter consultant's Username" required/><?php echo"<br>";?>
        <select class=" dep" id="inlineFormCustomSelect" name="department" style="width:200px;">
        <option selected>Department</option>
        <option value="IT consultant">IT consultant </option>
        <option value="HR consultant">HR consultant</option>
        <option value="Operations consultant">Operations consultant</option>
        <option value="Strategy consultant">Strategy consultant</option>
        <option value="Management consultant">Management consultant</option>
        <option value="Financial Advisory consultant">Financial Advisory consultant</option>
        </select><?php echo"<br>";?>
        <input  type="text" name="duration"  placeholder="Enter Duration period" required/><?php echo"<br>";?>
        </div>      
        <button type="submit" class="btn btn-warning" value="submit" name="confirm"></a></b>Confirm</button>
        <?php include('errors.php'); ?>
        </form>
           
     </div>                       
     </div>                            
     <div class="confirmtable" >
         <!-- table confirm -->
         <span> Confirmed</span>
     <table class="table table-dark tbl" style="margin:0 3px;">
  <thead style="background-color:black;"> 
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Company Username</th>
      <th scope="col">Consultant Username</th>
      <th scope="col">Department</th>
      <th scope="col">Duration</th>        
      <th>Remove</th>
    </tr>
  </thead>
  <tbody>
    <?php  
 
    while ($row = $result6-> fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['companyname']; ?></td>
            <td><?php echo $row['consultantname']; ?></td>
            <td><?php echo $row['department']; ?></td>           
            <td><?php echo $row['duration']; ?></td>            
            <td><?php echo "<b><a href='allhiredusers.php?del={$row['ID']}'>delete</a></b>"; ?></td>
            <!-- <th><button  class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete" name="delete_user" ><span class="glyphicon glyphicon-trash"></span></button></th> -->
    </tr>
    <?php 
    }
    ?>
  </tbody>
</table>

                              

<div class="bg-dark" >
                
  
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