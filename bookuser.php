
<?php 
session_start();
$errors=array();
$conn= mysqli_connect("127.0.0.1", "root", "", "conzult");
if ($conn-> connect_error) {
   die("Connection failed:". $conn-> connect_error);
                                       }

   $sql = "SELECT * from users";
   $result = $conn-> query($sql); 
   $user =mysqli_fetch_assoc($result);
    

    if(isset($_POST['send'])){
        $companyname=mysqli_real_escape_string($conn,$_POST['companyname']);
        $consultantname=mysqli_real_escape_string($conn,$_POST['consultantname']);
        $duration=mysqli_real_escape_string($conn,$_POST['duration']);
        $request=mysqli_real_escape_string($conn,$_POST['request']);   
        
        if(empty($companyname)){array_push($errors,"Company name required");}
        if(empty($consultantname)){array_push($errors,"consultant name required");}
        if(empty($duration)){array_push($errors,"Duration required");}
        if(empty($request)){array_push($errors,"request required");}
        if(count($errors)==0){
            $sql1="INSERT into request (companyname,consultantname,duration,request) VALUES ('$companyname','$consultantname','$duration','$request')";
            $result2=mysqli_query($conn,$sql1);            
            if($result2){
                $message = " request sent,next check your email for the further details ";
    echo "<script type='text/javascript'>alert('$message');</script>";
    
            }

        
        else{
            $message = "Failed to send request";
    echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }}
    
       
?>



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

                                        </div>
                                        <a class="nav-link text-warning" href="index.html">Home</a>
                                        <a class="nav-link text-warning " href="userdash1.php">Users</a>
                                        <a class="nav-link text-warning" href="php/logout.php" >Logout</a>
                                      </nav>
                          
                        </div>
                        <div class="col-6" style="margin-left:-25px;">
                       
                                <div class="col-md-12" >
                                <div class="card bg-dark book" >
                                <center>
        <div class="form-input">
        <form action="bookuser.php" method="POST" >
            <h3 class="text-warning">Send Request</h3>
        <input  class="bg-dark text-white" type="text" name="companyname"  placeholder="Enter ccompany Username" required/><?php echo'<br>';?> 
        <input class="bg-dark text-white" type="text" name="consultantname"  placeholder="Enter consultant's Username" required/> <?php echo'<br>';?> 
        <input class="bg-dark text-white" type="text" name="duration"  placeholder="Enter Duration period" required/><?php echo'<br>';?> 
        <textarea class="text bg-dark text-white" style="" name="request" id="" cols="30" rows="3" placeholder="enter your request..." required></textarea> 
        </div>
      
        <button type="submit" class="btn btn-warning" value="submit" name="send"></a></b>Send</button>
        <?php include('php/errors.php'); ?>
        </form>
                                </center>
                                    </div>
                                    
                         </div> 
                         <div>
    
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