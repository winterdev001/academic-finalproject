<?php
// Including database connections
require_once 'dbcon.php';
// mysqli query to fetch all data from database
// $query = "SELECT * from users ORDER BY ID ASC";
// $result = mysqli_query($con, $query);
// $arr = array();
// if(mysqli_num_rows($result) != 0) {
// while($row = mysqli_fetch_assoc($result)) {
// $arr[] = $row;
// }
// }
// // Return json array containing data from the databasecon
// echo $json_info = json_encode($arr);
$fetch = "SELECT * From users ORDER BY ID ASC ";
	$result = mysqli_query($con,$fetch);

	header("Content-Type: application/json");

	//incase you want to display an object
	while($data = mysqli_fetch_array($result))
		$array[]=$data;
		echo json_encode($array);

?>