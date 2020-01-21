<?php
session_start();

//initializing variables
$companyname="";
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

if (isset($_POST['reg_user'])){
    //receive all input values from the form
    $companyname=mysqli_real_escape_string($con,$_POST['companyname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password_1=mysqli_real_escape_string($con,$_POST['password_1']);
    $password_2=mysqli_real_escape_string($con,$_POST['password_2']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
   
    //form validation:ensure that the form is correctily filled... 
    //by adding (array_push()) corresponding error unto $errors array
    if(empty($companyname)){array_push($errors,"company name required");}
    if(empty($email)){array_push($errors,"email required");}
    if(empty($password_1)){array_push($errors,"password required");}
    if($password_1 !=$password_2){
        array_push($errors,"The two pasword do not match");
    }
    if(empty($phone)){array_push($errors,"Phone number required");}
  //first check the database to make sure a user not already exist with the sam companyname/email
  $user_check_query="SELECT * FROM company WHERE companyname='$companyname' OR email='$email' LIMIT 1";
  $result= mysqli_query($con,$user_check_query);
  $user =mysqli_fetch_assoc($result);

  if($user){
      //if exists
      if($user['companyname']==$companyname){
 array_push($errors,"companyname already exists");
      }
      if($user['email']==$email){
          array_push($errors,"Email already exists");

      }
  }
  //finally, register user if ther are no errors in the form
  if(count($errors)==0){
      $password=md5($password_1);//encrypt the pasword before saving in the database

      $query= "INSERT INTO company (companyname,email,password,phone) VALUES ('$companyname','$email','$password','$phone')";
      mysqli_query($con,$query);
      $_SESSION['companyname']=$companyname;
      $_SESSION['success']="you are now logged in";
      $message = "Successfully registered, now log in ";
    echo "<script type='text/javascript'>alert('$message');</script>";
      header('location:form2.php');
  }
}

//....

//LOGIN USER
if(isset($_POST['login_user2'])){
    $companyname = mysqli_real_escape_string($con,$_POST['companyname']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if(empty($companyname)){
        array_push($errors,"company name  required");
    }
    if(empty($password)){
        array_push($errors,"password  required");
    }
    if(count($errors==0)){
        $password=md5($password);
        $query= "SELECT * FROM users WHERE companyname='$companyname' AND password='$password'";
        $results= mysqli_query($con,$query);
        if(mysqli_num_rows($results)==1){
            $_SESSION['companyname']=$companyname;
            $_SESSION['success']="you are now logged in";
            header('location:http://localhost/try/index.html');

        }
        else{
            array_push($errors,"wrong companyname or password combination");

        }
    }
}
?>