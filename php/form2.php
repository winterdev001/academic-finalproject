<?php include('logincon2.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title> Login</title>
  <link rel="stylesheet" a href="../css2/form.css">
  <link rel="stylesheet" a href="../css2/font-awesome.min.css">
  <link rel="stylesheet" a href="../css2/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body class="bg-light">
    <div class="row">
      
            
            <div class="col-md-6">
                <div class="cont">
               <p class="logo">
                   CONZULT
               </p>
                </div>

            </div>
            <div class="col-md-6">
                <div class="cont1">
                        <div class="container">
                                <img src="../images/user.png"/><br>
                                <h2 class="title">Welcome</h2>
                                <div class="user-type">
                                  <a class="a1" href="form.php">User</a> 
                                  <a class="a2" href="form2.php">Company</a>
                                </div>
                                
                                <form action="form2.php" method="POST" >
       
      <div class="form-input">
          
        <input class="text-white" type="text" name="companyname" placeholder=" companyName"/>  
      </div>
      <div class="form-input">
        <input class="text-white" type="password" name="password"  placeholder="password"/>
      </div>
      <input type="submit" type="submit" value="LOGIN" class="btn-login" name="login_user2"/><br>
      <div class="error" style="color:white;">
           <!-- display validation errors here -->
          <?php include('errors.php'); ?> 
      </div> 
            <span><i style="color:black;">Not a member?  </i><a href="register1.php">Sign up now</a><br>
            </span>
    </form>
                                 
                              </div>
                </div>

            </div>

        
    </div>
</body>

</html>

