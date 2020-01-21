
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
            echo "ERROR: Could not able to execute $sql. "  
                                                 . $mysqli->error; 
        } 

        header("Location:tabletable.php");
        }
   
   ?> 
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="apple-touch-icon" sizes="76x76" href="../images/apple-icon.png">
    <link rel="icon" type="image/png" href="../images/favicon.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- another link -->
    <link rel="stylesheet" href="../css2/bootstrap.min.css" />
    <link rel="stylesheet" href="../css2/animate.css" />
    <link rel="stylesheet" href="../css2/circle.css" />
    <link rel="stylesheet" href="../css2/main.css" />
    <link rel="stylesheet" href="../css2/userdashadmin.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <!-- addition -->
    <link rel="stylesheet" type="text/css" href="../css2/index.css">
    <link rel="apple-touch-icon" sizes="76x76" href="../images/apple-icon.png">
    <link rel="icon" type="image/png" href="../images/favicon.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- another link -->
    <link rel="stylesheet" href="../css2/bootstrap.min.css" />
    <link rel="stylesheet" href="../css2/animate.css" />
    <link rel="stylesheet" href="../css2/circle.css" />
    <link rel="stylesheet" href="../css2/main.css" />
    <link rel="stylesheet" href="../css2/form.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">

        <!--  -->
        <link rel="stylesheet" a href="../css/form.css">
    <link rel="stylesheet" a href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
        <link rel="stylesheet" href="../css2/bootstrap.min.css"/>
        <link rel="stylesheet" href="../css2/animate.css"/>
        <link rel="stylesheet" href="../css2/circle.css"/>
        <link rel="stylesheet" href="../css2/main.css"/>
        <link rel="stylesheet" href="../css/form.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
          

    <title>
       Table
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">-->
    <!-- CSS Files -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/now-ui-dashboard.css?v=1.2.0" rel="stylesheet" />



    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- CSS Files -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />


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
                            <a href="http://localhost/try/admindash.php">
                                <i class="now-ui-icons design_app"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li >
                            <a href="userdashadmin.php">
                                <i class="now-ui-icons users_single-02 "></i>
                                <p>user profiles</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="now-ui-icons location_map-big"></i>
                                <p>companies</p>
                            </a>
                        </li>
                        <li class="active ">
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
                <div class="card text-center navu bg-dark">
                    <div class="card-header  bg-dark text-light ">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item ">
                                <a class="nav-link active bg-warning text-light" href="userdashadmin.php">All users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="available.php">Available users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="hired.php">hired</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">

                        <div class="content  ">

                            <div ng-app='index' ng-controller='indexCtrl'>

                                <div class="row">
                                    <div class="col-md-12 ">

                                <!-- table -->
                                <h3 class="hd">Users</h3>
<table class="table table-dark tbl" style="margin:0 3px;">
  <thead style="background-color:black;">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">availability</th>
      <th scope="col">Department</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php  
    while ($row = $result-> fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['availability']; ?></td>
            <td><?php echo $row['Department']; ?></td>
            <td><?php echo "<b><a href='tabletable.php?del={$row['ID']}'>delete</a></b>'"; ?></td>
            <!-- <th><button  class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete" name="delete_user" ><span class="glyphicon glyphicon-trash"></span></button></th> -->
    </tr>
    <?php 
    }
    ?>
  </tbody>
</table><br>


                                        
                                        <!-- Button trigger modal -->
                                        <button id="add" type="button" 
                                            data-toggle="modal" data-target="#exampleModalCenter">
                                            <img src="images/add_admin.png" class="admin_add_pic align-self-center">
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header " style="background-color:orange;">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">ADD USER</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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

                                                                    <input type="text" placeholder="user Name" name="username" />
                                                                    <input type="email" placeholder="e-mail" name="email" />
                                                                    <input type="password" placeholder="password" name="password_1" />
                                                                    <input type="password" placeholder="confirm password"
                                                                        name="password_2" /><br><br>
                                                                    <input type="submit" value="Register" class="btn-Register"
                                                                        name="reg_user" /><br>
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


                                            <script src="../js2/angular.js"></script>
                                            <script src="../js2/connector.js"></script>


                                            <!-- another links -->

                                            <script src="../js2/angular.js"></script>
                                            <script src="../js2/Chart.bundle.min.js"></script>
                                            <script src="../js2/jquery.js"></script>
                                            <script src="../js2/custom.js"></script>
                                            <script src="../js2/sweetalert2.js"></script>
                                            <script src="../js2/bootstrap.min.js"></script>
                                            <!-- addition -->

                                            <script src="../js2/angular.js"></script>
                                            <script src="../js2/connector.js"></script>
                                            <!--   Core JS Files   -->

                                            <script src="../js2/core/jquery.min.js"></script>
                                            <script src="../js2/core/popper.min.js"></script>
                                            <script src="../js2/core/bootstrap.min.js"></script>
                                            <script src="../js2/plugins/perfect-scrollbar.jquery.min.js"></script>
                                            <!--  Google Maps Plugin    -->
                                            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
                                            <!-- Chart JS -->
                                            <script src="../js2/plugins/chartjs.min.js"></script>
                                            <!--  Notifications Plugin    -->
                                            <script src="../js2/plugins/bootstrap-notify.js"></script>
                                            <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
                                            <script src="../js2/now-ui-dashboard.min.js?v=1.2.0" type="text/javascript"></script>
                                            <Script src="../js2/bootstrap.min.js"></Script>

                                            <!-- another links -->

                                            <script src="../js2/angular.js"></script>
                                            <script src="../js2/Chart.bundle.min.js"></script>
                                            <script src="../js2/jquery.js"></script>
                                            <script src="../js2/custom.js"></script>
                                            <script src="../js2/sweetalert2.js"></script>
                                            <script src="../js2/bootstrap.min.js"></script>
    </body>

</html>