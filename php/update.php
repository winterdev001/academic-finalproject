<?php 

 $con=mysqli_connect('localhost','root','','conzult');
 if(!$con){
     echo"failed to connect to the database" .mysqli_connect_error();
 }
 else{
    $message = "connected successfully";
    // echo "<script type='text/javascript'>alert('$message');</script>";
    
 }
 $sql="SELECT * FROM users ";
 $sql1=mysqli_query($con,$sql);
 $user=mysqli_fetch_assoc($sql1);
 $username=$user['username'];
 if (isset($_POST['hire'])){
 if($user['availability']=="available"){
    
  $query="UPDATE users SET availability='Busy' where username='$username' ";
  $res=mysqli_query($con,$query);
 
}
else{
    $message = "He is already hired";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
}
?>