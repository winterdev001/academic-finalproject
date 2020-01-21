<?php
session_start();


//initializing variables
$username="";
$email="";
$errors=array();
 
//connect to the database
$con=mysqli_connect("localhost","root","","conzult");
// if(mysqli_connect_errno()){
//     echo "Failed to connect to the database :"	. mysqli_connect_error();
// }
//  else{
//      echo "successfully connected" ."<br>";
//  }

//register user


//LOGIN USER
if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if(empty($username)){
        array_push($errors,"*Username  required");
    }
    if(empty($password)){
        array_push($errors,"*password  required");
    }
    if(count($errors==0)){
        $password=md5($password);
        $query= "SELECT * FROM users WHERE username='$username' AND password='$password'";        
        $results= mysqli_query($con,$query);
        $user =mysqli_fetch_assoc($results);

       
        if(mysqli_num_rows($results)==1){
            $_SESSION['username']=$username;
            $_SESSION['success']="you are now logged in";
            if(($user['username']=="admin")|| ($user['password']=="admin")){
                header('location:http://localhost/try/final/php/admindash.php#');}
           else{
            $message = "Welcome, complete your profile first";
            echo "<script type='text/javascript'>alert('$message');</script>";
               header('location:http://localhost/try/final/php/user.php#'); 
               
           } 
        }
        
        else{
            if(($user['username']!=$username)|| ($user['password']!=$password)){
               
                     
            array_push($errors,"*wrong username or password combination");}

        }
    }
}

?>