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
    if( isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password= $_POST['password'];
        //hash the password
        $pass = md5($password);
        
        //query the login info
        $sql = "SELECT * FROM user WHERE displayName ='$username' AND password = '$password';";
        //$sql = "SELECT displayName, password FROM user;";
        $results = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($results);

        if($count==0)
        {
            echo("Username and/or password are invalid");
            echo("<p><a href=\"http://localhost/cosc360site/public/signin.php\">Return to login</a></p>");
        }
        else
        {
            echo("<p>You are logged in!</p>");
            echo("<p>redirecting...</p>");
            header( "refresh:5;url=../home.php" );
        }
        
        //close connection
        mysqli_free_result($results);
        mysqli_close($connection);
    }
}


?>
</html>