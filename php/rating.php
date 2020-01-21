<?php
$con=mysqli_connect("127.0.0.1", "root", "", "conzult");
if ($con-> connect_error) {
    die("Connection failed:". $con-> connect_error);
                                        }
        else{
        //     $message = " connected successfully";
        //     echo "<script type='text/javascript'>alert('$message');</script>";
        // }                                
if(isset($_POST['rates'])){
    $ratings=mysqli_real_escape_string($conn,$_POST['ratings']);
         if(empty($ratings)){array_push($errors,"Rates required");}
    //  $sql="SELECT * FROM rating";
    //  $querry=mysqli_query($con,$sql);
    //  $data=mysqli_fetch_assoc($querry);
    //  $norm=$data['rate_percentage'];
    //  $newrate=(($rating+$norm)*100)/2;
    
     if(count($errors)==0){
         $sql1="INSERT INTO ratings (rates) VALUES ('$ratings')";
         $querry2=mysqli_query($con,$sql1);
         if($querry2){
            $message = " Rated successfully";
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
         else{
            $message = " failed to rate";
            echo "<script type='text/javascript'>alert('$message');</script>";
         }
     }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
    <form action="rating.php" method="POST">
        <input type="text" name="ratings" style="width:300px;"  placeholder="Enter ratings on scale of 1-100" required/><?php echo"<br>"; ?>
        <button  type="button"  value="submit" name="rates">Rate</button>
    </form>
    </div>
    <!-- <p>< -->
</body>
</html>