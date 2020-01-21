<?php 
session_start();
$user=$_SESSION['username'];
$conn= mysqli_connect("127.0.0.1", "root", "", "conzult");
if ($conn-> connect_error) {
   die("Connection failed:". $conn-> connect_error);
                                       }

   $sql = "SELECT * from users where username='$user'";
   $result =mysqli_query($conn,$sql); 
  
                  
                                         
 
    
    
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
                                        
                                        <a class="nav-link text-warning" href="logout.php" >Logout</a>
                                        
                                      </nav>
                                     
                        </div>
                     
                        
                        <div class="col-6" style="margin-left:-10px;">
                                <div class="col-md-12" >
                                        <div class="card bg-dark nvg2" style="width:900px;margin-left:10px;" >
                                         
                                              
                                                <h2 class="card-header text-warning hd">  <span class="badge badge-pill badge-warning"  >Profile</span></h2>
                                                <div class="card-body text-white bd" >
                                                <?php  
                                                while ($row = $result-> fetch_assoc()) {
                                                    $firstname =$row['firstname'];
                                                    $lastname =$row['lastname'];
                                                    $availability =$row['availability'];
                                                    $department =$row['Department'];
                                                    $email = $row['email'];
                                                    $phone =$row['phone'];
                                                    $description =$row['description'];
                                                 
                                                 } 
                                                 echo"<i class='fa fa-circle'>:</i> " .$availability."</br>";
                                                echo "<i class='fa fa-tag'>:</i>" .$firstname."  ";
                                                echo $lastname."</br>"; 
                                                 echo "<i class='fa fa-building'>:</i> " .$department."</br>";
                                                 echo " <i class='fa fa-envelope'>:</i> " .$email."</br>";
                                                 echo "<i class='fa fa-phone'>:</i>" .$phone."</br>";
                                                 echo "  ".$description."</br>";
                                                 
                                                 ?><br>                                                
                                                  <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-user-edit"></i> Complete Profile</button>
                                                  <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-user-edit"></i> Edit Profile</button>



                                                </div>

                                                
                                            </div> 
                                        </div>
                                        
                                            
                                    </div> 
                                    
                        
                         </div>               
                                    
                        </div>
                      </div>
                      
             

        </div>
        <div>
          

<!-- Modal coplete profile -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:orange;">
        <h5 class="modal-title" id="exampleModalLabel">Complete profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color:grey;">
      <?php  
      $errors=array();
$con= mysqli_connect("127.0.0.1", "root", "", "conzult");
if ($con-> connect_error) {
   die("Connection failed:". $con-> connect_error);
  }
           
             if (isset($_POST['edit_user'])) {
              $description=mysqli_real_escape_string($con,$_POST['description']);
              if(empty($description)){array_push($errors,"Description required");}
               //SQL query for deletion.
               if(count($errors==0)){
            $query1 ="UPDATE  users set description='$description' where username='$user'";
            $result2=mysqli_query($con,$query1);
          }

            if($result2===true){
                $message = "Updated";
                    echo "<script type='text/javascript'>alert('$message');</script>";               
                    header('location:user.php');                                 
             
             }                                            
            else{ 
              $message = "Failed to update";
              echo "<script type='text/javascript'>alert('$message');</script>";         
                } 
                  
            }  ?>
            <?php include("errors.php");?>
        <form action="user.php" method="POST">
        <textarea class="form-control" rows="5" id="comment" placeholder="Description" name="description"></textarea>
          
          <input type="submit"  value="Update" class="btn-Register btn-warning" name="edit_user" /><br>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
        </div>

                                               <!-- Modal  -->
  <div  class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" >
      <div class="modal-content"   >
        <div class="modal-header " style="background-color:orange;" >
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background-color:grey;">
          <!-- register form   -->
          <div class="containerform">
     <?php  
     $errors=array();
$con= mysqli_connect("127.0.0.1", "root", "", "conzult");
if ($con-> connect_error) {
   die("Connection failed:". $con-> connect_error);
  }
           
  if (isset($_POST['update'])){
    //receive all input values from the form
    
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $firstname=mysqli_real_escape_string($con,$_POST['firstname']);
    $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);    
    $department=mysqli_real_escape_string($con,$_POST['department']);
    $description=mysqli_real_escape_string($con,$_POST['description']);
    //form validation:ensure that the form is correctily filled... 
    //by adding (array_push()) corresponding error unto $errors array
    if(empty($firstname)){array_push($errors,"Username required");}
    if(empty($lastname)){array_push($errors,"Username required");}
    if(empty($email)){array_push($errors,"Username required");}
    if(empty($description)){array_push($errors,"Description required");}
    
  //first check the database to make sure a user not already exist with the sam username/email
//   $user_check_query="SELECT * FROM users WHERE firstname='$firstname' OR email='$email' LIMIT 1";
//   $result= mysqli_query($con,$user_check_query);
//   $user =mysqli_fetch_assoc($result);

//   if($user){
//       //if exists
//       if($user['firstname']==$username){
//  array_push($errors,"Username already exists");
//       }
//       if($user['email']==$email){
//           array_push($errors,"Email already exists");

//       }
//   }
  //finally, register user if ther are no errors in the form
  if(count($errors)==0){
      // $password=md5($password_1);//encrypt the pasword before saving in the database

      $query= "UPDATE  users set firstname='$firstname',lastname='$lastname',email='$email',Department='$department',phone='$phone',description='$description' where username='$user' ";

      $result11=mysqli_query($con,$query);
      if($result11===true){
        $message = "Updated";
            echo "<script type='text/javascript'>alert('$message');</script>";               
                                             
     
     }                                            
    else{ 
      $message = "Failed to update";
      echo "<script type='text/javascript'>alert('$message');</script>";         
        } 
  }
}
  ?>   <?php include("errors.php");?>
      <form action="user.php" method="POST">
         
        <div class="form-input">
         
         
          <input type="text"  placeholder="First Name" name="firstname" />
          <input type="text"  placeholder="Last Name" name="lastname" />
          <input type="email"  placeholder="e-mail" name="email" />

          <input type="phone"  placeholder="Phone" name="phone" /><br>
          
        
          <div class="form-row align-items-center">
    <div class="col-auto my-1">
   
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="department">
        <option selected>Department</option>
        <option value="IT consultant">IT consultant </option>
        <option value="HR consultant">HR consultant</option>
        <option value="Operations consultant">Operations consultant</option>
        <option value="Strategy consultant">Strategy consultant</option>
        <option value="Management consultant">Management consultant</option>
        <option value="Financial Advisory consultant">Financial Advisory consultant</option>
      </select>
    </div><br>
    
  <textarea class="form-control" rows="5" id="comment" placeholder="Description" name="description"></textarea>
          
          <input type="submit"  value="Update" class="btn-Register btn-warning" name="update" /><br>
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