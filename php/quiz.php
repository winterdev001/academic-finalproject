<?php
$con = mysqli_connect("localhost","root","","user1");
//check connection
if(mysqli_connect_errno()){
    echo "Failed to connect to the database :"	. mysqli_connect_error();
}
 else{
     echo "successfully connected" ."<br>";
 }

 //retrieve data
 $sql="SELECT  ID,User,pass FROM supreme";
 $result = $con->query($sql);

if($result-> num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["ID"]."</td><td>"  . $row["User"]."</td><td>".  $row["pass"]. "</td></tr>";}
    }
  else
 {echo "fetched data successfully \n";}

 //function to avoid sql injection
 
// This function will run within each post array including multi-dimensional arrays 


// function ExtendedAddslash(&$params)
// { 
//         foreach ($params as &$var) {
//             // check if $var is an array. If yes, it will start another ExtendedAddslash() function to loop to each key inside.
//             is_array($var) ? ExtendedAddslash($var) : $var=addslashes($var);
//         }
// }

//      // Initialize ExtendedAddslash() function for every $_POST variable
//     ExtendedAddslash($_POST);  
 
//registering 
    // $username =$_POST['User'];
    // $password =$_POST['pass'];
    

    
    //     //$sql2=("update `supreme` set `username=$username`,`password`=`$password` ");
    //     $sql="INSERT INTO loginform (User,pass) VALUES('$username','$password')";
        
    //        if(!mysqli_query($con,$sql)){
    //            echo'input data FAILED';
    //        }
    //        else{
    //            echo 'input data faile SUCCED';
    //        }
        
    

           

?>
