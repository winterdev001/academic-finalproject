<?php
    error_reporting(0);
    $json=file_get_contents("php://input");
    $json_decoded=json_decode($json);
    $email=$json_decoded->email;
    $password=$json_decoded->password;
    $con = mysqli_connect("localhost","root","","conzult");
    $insert = "insert into `test` (`email`,`pass`) values ('$email','$password')";
    $query = mysqli_query($con,$insert);
    header("Content-Type: application/json");
    if($query){
        echo 'inserted';
    }
    else{
        echo 'not done';
    }
?>