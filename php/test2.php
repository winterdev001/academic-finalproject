<?php
error_reporting(0);
$ced=file_get_contents("php://input");
$cedu=json_decode($ced);
$usernm=$cedu->username;
$con= mysqli_connect("localhost","root","","conzult");
$ins= "insert into `users`(`username`) values('$usernm')";
$query= mysqli_query($con,$ins);
header("Content-Type: application/json");

$result= "select * from users where username='$usernm";
$query= mysqli_query($con,$result);
if($query)
{
    echo $result;
    echo'inserted';
}
else{
    echo"not inserted";
}
?>