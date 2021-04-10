<!DOCTYPE html>
<html>
<?php

$host = "localhost";
$database = "360site";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}
else
{
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

            echo("<p>Welcome $username, your account has been created!</p>");
            echo("<p>redirecting...</p>");
            header( "refresh:5;url=../home.php" );
        }
        else
        {
            //there is an existing account so let the user know
            echo("user already exists with this name and or email");
            echo("<p><a href=\"http://localhost/cosc360site/public/signup.php\">return to user entry</a></p>");
        }
        
        //close connection
        mysqli_free_result($results);
        mysqli_close($connection);
    }
}


?>
</html>
