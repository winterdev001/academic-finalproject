
<?php 

$conn= mysqli_connect("127.0.0.1", "root", "", "conzult");
if ($conn-> connect_error) {
   die("Connection failed:". $conn-> connect_error);
                                       }

   $sql = "SELECT * from users";
   $result = $conn-> query($sql); 
    session_start();
?>
<?php include('php/update.php'); ?>

<html>
    <head>
        <title>
            USER
        </title>
        <link rel="stylesheet" href="css2/bootstrap.min.css">
        <link rel="stylesheet" href="css2/userdash1.css">
        <link rel="stylesheet" href="css2/animate.css"/>
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
                                            <img src="images/user_profile.png" alt="" class="thumbnail bg-dark" style="border-radius:50%;"><?php echo'<br>';?> 
                                            <h1 style="text-align:center;">Name : <?php echo $_SESSION['username']; ?> </h1>
                                            <?php echo "<br>";?> 
                                        </div>
                                        <a class="nav-link text-warning" href="index.html">Home</a>
                                        <a class="nav-link text-warning " href="userdash1.php">Users</a>
                                        <a class="nav-link text-warning" href="php/logout.php" >Logout</a>
                                      </nav>
                          
                        </div>
                        <div class="col-6" style="margin-left:-25px;">
                                <div class="col-md-12" >
                                    
                                        <div class="card bg-dark nvg3" style="height:40%;" ng-repeat="user in data  ">
                                                <h2 class="card-header text-warning hd"> {{user.username}} <span class="badge badge-pill badge-warning" id="status" >Status:{{user.availability}}</span></h2>
                                                <div class="card-body text-white bd" >
                                                    <p >
                                                   
                                               <b><i class='fa fa-tag'></i>:</b> {{user.firstname}} {{user.lastname}} <br>  
                                               <b><i class='fa fa-building'></i> : </b>{{user.Department}} <br>
                                               <b><i class='fa fa-envelope'></i> : </b>{{user.email}} <br> 
                                               <b><i class='fa fa-phone'></i> : </b>{{user.phone}}  <br>
                                                {{user.description}}
                                                                                                                    
                                                </p>
                                                  <a href="bookuser.php" type="button" class="btn btn-outline-warning btn-lg btn-block " name="hire" onclick="Hire()"  ><i class="fas fa-bookmark"></i> Hire</a>                                             
                                                  <!-- <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-eye"></i> View Profile</button> -->
                                              
                                                </div>

                                                
                                            </div> 
                                        </div>
                                       
                                    </div> 
                                    <!-- modal viewprofile -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"  >
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content" ng-repeat="user in dataz">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalCenterTitle">{{user.username}}</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                        Department : {{user.Department}}<br>
                                                        Email : {{user.email}}<br>
                                                        Phone : {{user.phone}}<br>
                                                        {{user.Description}}
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                   
                         </div>               
                                    
                        </div>
                      </div>
             

        </div>
                            
                                            
        <script src="js/angular.js"></script>
        <script src="js/connector.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/Chart.bundle.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/sweetalert2.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>