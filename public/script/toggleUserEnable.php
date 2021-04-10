<!DOCTYPE html>
<html>
<body>
<?php 
if(isset($_GET['id']) && isset($_GET['toggle'])) {
    $id = $_GET['id'];
    $toggle = $_GET['toggle'];
    include "connect.php";
    $connection = connect();

    if($toggle == 'disable') {
         // disable account
        $sql = 'UPDATE user SET role="-1" WHERE userId="'.$id.'"';
        mysqli_query($connection, $sql);
        if(mysqli_affected_rows($connection)) {
            echo "User account disabled<br>";  
        } else echo "Error: please try again.<br>"; 
    }

    else if($toggle == 'enable') {
         // enable account
        $sql = 'UPDATE user SET role="0" WHERE userId="'.$id.'"';
        mysqli_query($connection, $sql);
        if(mysqli_affected_rows($connection)) {
            echo "User account enabled<br>"; 
        } else echo "Error: please try again.<br>";
        
    }
} else {
    echo 'Please try again.';
}
echo 'Return to <a href="../home.php">home</a>';
//close connection

mysqli_close($connection);
  
?>
</body>
</html>