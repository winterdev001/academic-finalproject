<?php include('login2.php'); ?>
<html>
    <head>
        <title>

        </title>
    </head>
    <body>
        <div id="register">
            <form method="post" action="register.php">
                <!-- display validation errors here -->
                    <?php include('errors.php'); ?>
                    username:<br>
                    <input type="text" name="username" ><br>
                    Email:<br>
                    <input type="email" name="email" ><br>
                    Password:<br>
                    <input type="password" name="password_1" ><br>
                    confirm password:<br>
                    <input type="password" name="password_2" ><br><br>
                    <input type="submit" value="Register" name="reg_user"/>
                  
            </form>
        </div>


</body>

</html>