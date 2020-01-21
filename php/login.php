<?php
$getdata=file_get_contents("php://input");
$data=json_decode($getdata);
$uemail=$data->email;
$pass=$data->password;
$con=mysqli_connect('localhost','root','');
if(!$con)
{
  die('connection failed'.mysql_error());
}
if($uemail==null || $pass==null){
  echo'fill them all first';
}
mysqli_select_db($con,'arch');
$r="SELECT * FROM users WHERE email='$uemail' OR username='$uemail' AND password='$pass'";
$q=mysqli_query($con,$r);
$row=mysqli_fetch_array($q);
if($row['email']==$uemail || $row['username']==$uemail){
  if($row['blocked']==1){
    echo "Your account have been blocked,please contact us(+788209061) for more informarion!";
  }
  elseif($row['password']==$pass){
    if($row["auth"]==1){
      $i="UPDATE users SET count=count+1 WHERE email='$uemail' OR username='$uemail'";
      $dbq=mysqli_query($con,$i);
      if($dbq){
        @session_start();
        $_SESSION['USER_ID']=$row['_id'];
        echo"admin";
      }
    }
    else{
      $i="UPDATE users SET count=count+1 WHERE email='$uemail' OR username='$uemail'";
      $dbq=mysqli_query($con,$i);
      if($dbq){
        @session_start();
        $_SESSION['USER_ID']=$row['_id'];
        echo"user";
      }
    }
  }
  else{
    echo"Email or password is Incorrect";
  }
}
else{
  echo"Email or password is Incorrect";
}
?>