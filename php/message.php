<?php 
session_start();
$user=$_SESSION['username'];
$conn= mysqli_connect("127.0.0.1", "root", "", "conzult");
if ($conn-> connect_error) {
   die("Connection failed:". $conn-> connect_error);
                                       }

   $sql = "SELECT message from users where username='$user'";
   $result =mysqli_query($conn,$sql);               
  // delete message
  if (isset($_GET['del'])) {
    $del=$_GET['del'];
      //SQL query for deletion.
   $query10 ="delete from users where ID='$del'";
   $result20=mysqli_query($conn,$query10);
   if($result20===true){
    $message = "deleted";
    echo "<script type='text/javascript'>alert('$message');</script>";
    }
                                       
                                   
   else{ 
    $message = "delete failed";
    echo "<script type='text/javascript'>alert('$message');</script>"; 
       } 
                           
  
   }  
    
?>

<html>
    <head>
        <title>
            USER
        </title>
        <link rel="stylesheet" href="../css2/bootstrap.min.css">
        <link rel="stylesheet" href="../css2/userdash1.css">
        <link rel="stylesheet" href="../css2/animate.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    </head>
    <body class="wrapper" style="margin:2px;">
        <div class="section" ng-app="index" ng-controller="indexCtrl">
                <div class="row">
                        
                        <div class="col-3  " >
                            
                                <nav class="nav flex-column bg-dark nvg">
                                        <a class="nav-link  text-warning active" href="#"><h1>CONZULT</h1></a>
                                        <div class=" card user-proo bg-dark">
                                            <img src="../images/user_profile.png" alt="" class="thumbnail" style="border-radius:50%;">
                                            <h1 style="text-align:center;">Name : <?php echo $_SESSION['username'] ; ?> </h1>
                                        </div>
                                        <a class="nav-link text-warning" href="../index.html">Home</a>
                                        <a class="nav-link text-warning" href="message.php">Notifications(<?php
$connn=mysqli_connect("localhost","root","","conzult");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql3="SELECT message from users where username='$user'" ;

if ($result3=mysqli_query($connn,$sql3))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result3);
  printf("  %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result3);
  }

mysqli_close($connn);
?>)</a>
                                        <a class="nav-link text-warning" href="logout.php" >Logout</a>
                                        
                                      </nav>
                                     
                        </div>
                     
                        
                        <div class="col-6" style="margin-left:-10px;">
                                <div class="col-md-12" >
                                        <div class="card bg-dark nvg2" style="width:900px;margin-left:10px;" >
                                         
                                              
                                                <h2 class="card-header text-warning hd">  <span class="badge badge-pill badge-warning"  >Profile</span></h2>
                                                <div class="card-body text-white bd" >
                                                                    <!-- table -->
                                <h3 class="hd">Users</h3>
<table class="table table-dark tbl" style="margin:0 3px;">
  <!-- <thead style="background-color:black;">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">availability</th>
      <th scope="col">Department</th>
      <th>Delete</th>
    </tr>
  </thead> -->
  <tbody>
    <?php  
    while ($row = $result-> fetch_assoc()) {
        ?>
                  
            <td><?php echo $row['message']; ?></td>
            
            <!-- <th><button  class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete" name="delete_user" ><span class="glyphicon glyphicon-trash"></span></button></th> -->
    </tr>
    <?php 
    }
    ?>
  </tbody>
</table><br>


                                                </div>

                                                
                                            </div> 
                                        </div>
                                        
                                            
                                    </div> 
                                    
                        
                         </div>               
                                    
                        </div>
                      </div>
                      
             

        </div>
        <div>
          

        <script src="../js/angular.js"></script>
        <script src="../js/connector.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/Chart.bundle.min.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/sweetalert2.js"></script>

        <!--  -->
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