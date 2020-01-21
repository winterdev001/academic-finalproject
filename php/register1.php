<?php include('server.php'); ?>
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
                                
                                
    <form action="register1.php" method="POST">
       
       <div class="form-input" style="margin-left:-20px;">
       
        
         <input type="text"  placeholder="userName" name="username" />
         
         <input type="text"  placeholder="First Name" name="firstname" />
         <input type="text"  placeholder="Last Name" name="lastname" />
         <input type="email"  placeholder="e-mail" name="email" />
         <input type="password"  placeholder="password" name="password_1" />
         <input type="password" placeholder="confirm password" name="password_2" />         
         <input type="number" min="0"  placeholder="Phone" name="phone" />    
      <select class=" dep" id="inlineFormCustomSelect" name="department" style="width:300px;">
        <option selected>Department</option>
        <option value="IT consultant">IT consultant </option>
        <option value="HR consultant">HR consultant</option>
        <option value="Operations consultant">Operations consultant</option>
        <option value="Strategy consultant">Strategy consultant</option>
        <option value="Management consultant">Management consultant</option>
        <option value="Financial Advisory consultant">Financial Advisory consultant</option>
      </select>
    <br>
    <div class="radio">
    <label for="inlineRadio1"style="padding-right:25px;">Status:</label><input class="form-check-input" type="radio" name="availability" id="inlineRadio" value="Available"><span>Available  </span>       
    <input class="form-check-input" type="radio" name="availability" id="inlineRadio" value="Busy"style="margin-left:4px;" ><span style="margin-left:18px;" >Busy</span>   <br>
    <input type="submit"  value="Register" class="btn-Register" name="reg_user" />
    <a href="form.php" type="submit"  value="" class="btn-Register" name="" >Login</a><br>  
</div>    
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


