<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "freecsresources";

// create connection

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    ?>
     <script>
        alert("Connection not Establish, please check your Database!");
     </script>
     <?php
}
 else{
     /*
     ?>
     <script>
        alert("Connection Succesfully Established :)");
     </script>
     <?php
     */
 }
// mysqli_close($conn);
?>