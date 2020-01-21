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

if (isset($_POST['reg_user'])){
    //receive all input values from the form
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password_1=mysqli_real_escape_string($con,$_POST['password_1']);
    $password_2=mysqli_real_escape_string($con,$_POST['password_2']);
    $firstname=mysqli_real_escape_string($con,$_POST['firstname']);
    $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    if(isset($_POST['availability'])){
        $availability=mysqli_real_escape_string($con,$_POST['availability']);
    }
    $department=mysqli_real_escape_string($con,$_POST['department']);
   
    //form validation:ensure that the form is correctily filled... 
    //by adding (array_push()) corresponding error unto $errors array
    if(empty($username)){array_push($errors,"Username required");}
    if(empty($email)){array_push($errors,"email required");}
    if(empty($password_1)){array_push($errors,"password required");}
    if($password_1 !=$password_2){
        array_push($errors,"The two pasword do no match");
    }
  //first check the database to make sure a user not already exist with the sam username/email
  $user_check_query="SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
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

      $query= "INSERT INTO users (username,firstname,lastname,email,password,availability,Department,phone) VALUES ('$username','$firstname','$lastname','$email','$password','$availability','$department','$phone') ";

      mysqli_query($con,$query);
      $_SESSION['username']=$username;
      $_SESSION['success']="you are now logged in";
      $message = "Successfully registered, now log in ";
    echo "<script type='text/javascript'>alert('$message');</script>";
      header('location:form.php');
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
        $query= "SELECT * FROM users WHERE username='$username' AND password='$password'";
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

// hire or book a user
if(isset($_POST['hire'])){
    $status=$_POST['hire'];
    $status="busy";
    $query="UPDATE users SET availability='$status'";
    $result=mysqli_query($con,$result);
    if($result){
        if($result['availability']!="available"){
            echo"already hired";
        }
    }
}


//user edit information
if (isset($_POST['edit_user'])){
    //receive all input values from the form
    $firstname=mysqli_real_escape_string($con,$_POST['firstname']);
    $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    if(isset($_POST['availability'])){
        $availability=mysqli_real_escape_string($con,$_POST['availability']);
    }
    $department=mysqli_real_escape_string($con,$_POST['department']);
    $description=mysqli_real_escape_string($con,$_POST['description']);
   
    //form validation:ensure that the form is correctily filled... 
    //by adding (array_push()) corresponding error unto $errors array
    if(empty($firstname)){array_push($errors,"firstname required");}
    if(empty($lastname)){array_push($errors,"lastname required");}
    if(empty($phone)){array_push($errors,"phone number required");}
    if(empty($department)){array_push($errors,"department required");}
    if(empty($availability)){array_push($errors,"availability status required");}
    
  //first check the database to make sure a user not already exist with the sam username/email
  $user_check_query="SELECT * FROM users WHERE firstname='$firstname' OR lastname='$lastname' LIMIT 1";
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
   //already exist and want to update
   if($user){
       if(!empty($user['firstname'])){
         $updatequery="UPDATE users SET firstname='$firstname',lastname='$lastname',availability='$availability',Department='$department',Description='$description',phone='$phone'";
         $res=mysqli_query($con,$updatequery);

       }
   }

  //finally, register user if ther are no errors in the form
  if(count($errors)==0){
      
      $query= "INSERT INTO users (firstname,lastname,availability,Department,Description,phone) VALUES ('$firstname','$lastname','$availability','$department','$description','$phone') ";
      $resu=mysqli_query($con,$query);
      header('location:http://localhost/try/final/php/user.php');

      if(!$resu){
          echo"data not inserted";
       }
      else{
          echo"data inserted successfully";
      }
      
  }
}



?>