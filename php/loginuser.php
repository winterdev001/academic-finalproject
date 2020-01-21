<?php include('login2.php'); ?>
<html>
    <head>
        <title>

        </title>
    </head>
    <body><div>
       <form action="loginuser.php" method="POST">
               <!-- display validation errors here -->
               <?php include('errors.php'); ?>
                    username:<br>
                    <input type="text" name="username" ><br>
                    Password:<br>
                    <input type="password" name="password" ><br><br>
                    <input type="submit" value="Submit" name="login_user" >
                    <Span ><a href="register.html"  >REGISTER</a></Span>
                  
        </form></div>
        

</body>

</html>