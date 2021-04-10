<!DOCTYPE html>
<html>
<?php

include "connect.php";
$connection = connect();
    //good connection do your thing
    if( isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $email= $_POST['email'];
        $password= $_POST['password'];
        //hash the password
        $pass = md5($password);
        
        $sql = "SELECT * FROM user WHERE displayName='$username' OR email = '$email';";
        $results = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($results);
        //count is 0 if there is no account and can create one
        if($count==0)
        {
            //query the user info
            $query = "INSERT INTO user (displayName,email,password) VALUES ('$username','$email','$pass');";
            $result = mysqli_query($connection, $query);

            session_start();
            $_SESSION['authenticated'] = true;
            $_SESSION['userid'] = mysqli_insert_id($connection);
            $_SESSION['username'] = $username;

            header( "Location: url=../home.php");
        }
        else
        {
            //there is an existing account so let the user know
            echo("user already exists with this name and or email");
            echo("<p><a href=\"../signup.php\">Return to user entry</a></p>");
        }
        
        //close connection
        mysqli_free_result($results);
        mysqli_close($connection);
    }



?>
</html>
