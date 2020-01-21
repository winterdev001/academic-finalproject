<?php

$data = json_decode(file_get_contents("php://input"));
$email = mysql_real_escape_string($data->email);
$pwd = mysql_real_escape_string($data->pwd);
mysql_connect("localhost","root","","conzult");
mysql_query("INSERT INTO  users (`Email`,
 `password`) VALUES ('".$email."','".$pwd."')");


?>