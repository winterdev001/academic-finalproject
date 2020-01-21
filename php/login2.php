<?php
session_start();

//initializing variables
$username="";
$email="";
$errors=array();
 
//connect to the database
$con=mysqli_connect("localhost","root","","registration");
// if(mysqli_connect_errno()){
//     echo "Failed to connect to the database :"	. mysqli_connect_error();
// }
//  else{
//      echo "successfully connected" ."<br>";
//  }

//register user

if (isset($_POST['reg_user'])){
    //receive all input values from the form
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password_1=mysqli_real_escape_string($con,$_POST['password_1']);
    $password_2=mysqli_real_escape_string($con,$_POST['password_2']);
   
    //form validation:ensure that the form is correctily filled... 
    //by adding (array_push()) corresponding error unto $errors array
    if(empty($username)){array_push($errors,"Username required");}
    if(empty($email)){array_push($errors,"email required");}
    if(empty($password_1)){array_push($errors,"password required");}
    if($password_1 !=$password_2){
        array_push($errors,"The two pasword do no match");
    }
  //first check the database to make sure a user not already exist with the sam username/email
  $user_check_query="SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result= mysqli_query($con,$user_check_query);
  $user =mysqli_fetch_assoc($result);

  if($user){
      //if exists
      if($user['username']==$username){
 array_push($errors,"Username already exists");
      }
      if($user['email']==$email){
          array_push($errors,"Email already exists");

      }
  }
  //finally, register user if ther are no errors in the form
  if(count($errors)==0){
      $password=md5($password_1);//encrypt the pasword before saving in the database

      $query= "INSERT INTO user (username,email,password) VALUES ('$username','$email','$password')";
      mysqli_query($con,$query);
      $_SESSION['username']=$username;
      $_SESSION['success']="you are now logged in";
      header('location:loginuser.php');
  }
}

//....

//LOGIN USER
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
        $query= "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $results= mysqli_query($con,$query);
        if(mysqli_num_rows($results)==1){
            $_SESSION['username']=$username;
            $_SESSION['success']="you are now logged in";
            header('location:http://localhost/try/userdashbrd.html');

        }
        else{
            array_push($errors,"wrong username or password combination");

        }
    }
}
?>