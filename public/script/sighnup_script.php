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
            $query = "INSERT INTO user (displayName,email,password) VALUES ('$username','$email','$password');";
            $result = mysqli_query($connection, $query);
            echo("account for user $username has been created.");
        }
        else
        {
            //there is an existing account so let the user know
            echo("user already exists with this name and or email");
            echo("<p><a href=\"http://localhost/lab-9/lab9-1.html\">return to user entry</a></p>");
        }
        
        //close connection
        mysqli_free_result($results);
        mysqli_close($connection);
    }
}


?>
</html>
