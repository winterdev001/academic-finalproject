 <?php
 $conn= mysqli_connect("127.0.0.1", "root", "", "conzult");
 if ($conn-> connect_error) {
    die("Connection failed:". $conn-> connect_error);
                                        }

    $sql = "SELECT id, username, email  from users";
    $result = $conn-> query($sql);

    f($result-> num_rows > 0) {
     while ($row = $result-> fetch_assoc()) {
     echo "<tr><td>". $row["id"] ."</td><td>". $row["username"] ."</td><td>". $row["email"]  ."</td></tr>";
                                            }
            echo "</table>";
                                        }
    else {
             echo "0 result";
                                        }

    $conn-> close();

?>