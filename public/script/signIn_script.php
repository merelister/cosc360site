<!DOCTYPE html>
<html>
<?php

include "connect.php";
$connection = connect();
    //good connection do your thing
    if( isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password= $_POST['password'];
        //hash the password
        $pass = md5($password);
        
        //query the login info
        $sql = "SELECT * FROM user WHERE displayName ='$username' AND password = '$pass';";
        //$sql = "SELECT displayName, password FROM user;";
        $results = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($results);

        if($count==0)
        {
            echo("Username and/or password are invalid");
            echo("<p><a href=\"../signin.php\">Return to login</a></p>");
        }
        else
        {
            $row = mysqli_fetch_assoc($results);
            if($row['role'] == -1) {
                echo 'This account has been disabled by the administrator.<br>';
                echo '<a href="../home.php">Return to site home.</a>';
            } else {
            session_start();
            $_SESSION['authenticated'] = true;
            $_SESSION['userid'] = $row['userId'];
            $_SESSION['username'] = $row['displayName'];
            // user: role=0     admin: role=1
            $_SESSION['role'] = $row['role'];
            
            header( "Location: ../home.php" );
        }
        }
        
        //close connection
        mysqli_free_result($results);
        mysqli_close($connection);
    }



?>
</html>
