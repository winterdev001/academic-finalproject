
<?php
$conn= mysqli_connect("127.0.0.1", "root", "", "conzult");
if ($conn-> connect_error) {
   die("Connection failed:". $conn-> connect_error);
  }

            $sql = "SELECT * FROM request";
            $result = $conn-> query($sql); 
              // delete user
             if (isset($_GET['del'])) {
             $del=$_GET['del'];
               //SQL query for deletion.
            $query1 ="delete from request where id='$del'";
            $result2=mysqli_query($conn,$query1);
            if($result2===true){
                $message = "Deleted";
                    echo "<script type='text/javascript'>alert('$message');</script>";               
                    header("Location:request.php");                                 
             
             }
                                                
                                            
            else{ 
                 echo "ERROR: Could not able to execute $sql. "   . $mysqli->error; 
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
<h3 class="text-black"><u> Request Report</u> </h3>
<table class="table table-bordered table-secondary border-warning text-dark tbl" style="margin:0 3px;">
  <thead class="thead-warning " >
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Comany Name</th>
      <th scope="col">Consultant Name</th>
      <th scope="col">Duration</th>
      <th scope="col">Request</th>
      
    </tr>
  </thead>
  <tbody>
    <?php  
    while ($row = $result-> fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['companyname']; ?></td>
            <td><?php echo $row['consultantname']; ?></td>
            <td><?php echo $row['duration']; ?></td> 
            <td><?php echo $row['request']; ?></td>            
            
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