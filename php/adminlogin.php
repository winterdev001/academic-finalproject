<?php


//initializing variables
$username="";
$email="";
$errors=array();
 
//connect to the database
$con=mysqli_connect("localhost","root","","conzult");

if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if(empty($username)){
        array_push($errors,"Username  required");
    }
    if(empty($password)){
        array_push($errors,"password  required");
    }
    if(count($errors==0)){
        $password=md5($password);
        $query= "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $results= mysqli_query($con,$query);
        if(mysqli_num_rows($results)==1){
            $_SESSION['username']=$username;
            $_SESSION['success']="you are now logged in";
            header('location:http://localhost/try/final/php/admindash.php');

        }
        else{
            array_push($errors,"wrong username or password combination");

        }
    }
}
?>