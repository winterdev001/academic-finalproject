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
request report
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
		<body class="bg-secondary text-white">
            <div class="" style="background-color:rgb(236, 194, 7);">
                <span class="" style="margin-left:500px;"><img src="../images/conzult1.png" alt=""></span>
            </div>
    <div class="col-9"> 
  <div class=" report " >
 
                                <center>
<h3 class="text-black"><u> Hired Consultants Report</u> </h3>
<table class="table table-bordered table-secondary border-warning text-dark tbl" style="margin:0 3px;">
<thead class="text-white" style="background-color:black;">
<tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">availability</th>
      <th scope="col">Department</th>
      
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
            <!-- <th><button  class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete" name="delete_user" ><span class="glyphicon glyphicon-trash"></span></button></th> -->
    </tr>
    <?php 
    }
    ?>
  </tbody>
</table>
</center> 
 </div>

</div>



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