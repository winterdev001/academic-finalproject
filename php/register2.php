
<?php include('server2.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title> Register</title>
  <link rel="stylesheet" a href="../css2/form.css">
  <link rel="stylesheet" a href="../css2/font-awesome.min.css">
  <link rel="stylesheet" a href="../css2/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body class="bg-light">
    <div class="row">
      
            
            <div class="col-md-6">
                <div class="cont" style="height:700px;">
               <p class="logo">
                   CONZULT
               </p>
                </div>

            </div>
            <div class="col-md-6">
                <div class="cont1" style="height:700px;">
                        <div class="container">
                                <img src="../images/user.png"/><br>
                                <h2 class="title">Welcome</h2>
                                <div class="user-type">
                                  <a class="a1" href="register1.php">User</a> 
                                  <a class="a2" href="register2.php">Company</a>
                                </div>
                                
                                
    <form action="register2.php" method="POST">
       
       <div class="form-input" style="margin-left:-20px;">
       
        
       <input type="text"  placeholder="CompanyName" name="companyname" />  
        <input type="email"  placeholder=" e-mail" name="email" />
        <input type="password"  placeholder="password" name="password_1" /><br>
        <input type="password" placeholder="confirm password" name="password_2" /><br>
        <input type="number"  min="0" placeholder="Phone" name="phone" /><br>
        <input type="submit"  value="Register" class="btn-Register" name="reg_user"/>
        <a href="form.php" type="submit"  value="" class="btn-Register" name="" >Login</a><br>  
        
         </div>
         <div class="error" style="margin-left:300px,padding:1px;">
           <!-- display validation errors here -->
        <?php include('errors.php'); ?></div>
 
    </form>
                              </div>
                </div>

            </div>

        
    </div>
</body>

</html>

