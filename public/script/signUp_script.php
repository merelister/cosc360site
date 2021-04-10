<!DOCTYPE html>
<html>
<?php

$host = "localhost";
$database = "360site";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
} else {
    //good connection do your thing
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        //initialize count
        $count = 0;

        //get user email from post
        $username = $_POST['username'];
        $email = $_POST['email'];

        // get password
        $password = $_POST['password'];
        //hash the password
        $pass = md5($password);

        //define path where our avatar image will be stored
        $avatar_path = $connection->real_escape_string('images/' . $_FILES['avatar']['name']);

        //copy image to images/ folder 
        if (copy($_FILES['avatar']['tmp_name'], $avatar_path)) {
            //set session variables to display on welcome page   -----------------SESSION STUFF!!!!!!!
            //$_SESSION['username'] = $username;
            //$_SESSION['avatar'] = $avatar_path;

            //create SQL query string for inserting data into the database
            $sql = "SELECT * FROM user WHERE displayName='$username' OR email = '$email';";
            $results = mysqli_query($connection, $sql);
            $count = mysqli_num_rows($results);
        }


        //count is 0 if there is no account and can create one
        if ($count == 0) {
            //query the user info
            $query = "INSERT INTO user (displayName,email,password,avatar) VALUES ('$username','$email','$password','$avatar_path');";
            $result = mysqli_query($connection, $query);
            echo ("<p>Welcome $username, your account has been created!</p>");
            echo ("<p>redirecting...</p>");
            header("refresh:5;url=../home.php");
        } else {
            //there is an existing account so let the user know
            echo ("user already exists with this name and or email");
            echo ("<p><a href=\"http://localhost/cosc360site/public/signup.php\">return to user entry</a></p>");
        }

        //close connection
        mysqli_free_result($results);
        mysqli_close($connection);
    }
}


?>

</html>