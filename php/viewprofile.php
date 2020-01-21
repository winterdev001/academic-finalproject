<?php
	$con = mysqli_connect("localhost","root","","conzult");
	//check connection
	if(mysqli_connect_errno()){
		echo "Failed to connect to the database :"	. mysqli_connect_error();
	}
    // $username="select * from users";
    // $r=mysqli_query($con,$username);
	$fetch = "SELECT * FROM users WHERE username='cedrick'";
	$result = mysqli_query($con,$fetch);

	header("Content-Type: application/json");

	//incase you want to display an object
	while($data = mysqli_fetch_array($result))
		$array[]=$data;
		echo json_encode($array);
?>