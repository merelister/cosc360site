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

else{
    //good connection do your thing
    if(isset($_POST['password']) && isset($_POST['id']))
    {
        if(isset($_POST['username'])) $username = $_POST['username'];
        $password= $_POST['password'];
        $thisId = $_POST['id'];

        if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext = @strtolower(end(explode('.',$_FILES['image']['name'])));
            
            $extensions= array("jpg");
            
            if(in_array($file_ext,$extensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"images/". $thisId .".". $file_ext);
             }
         }

         if(isset($_POST['username']) && $_POST['username'] != '') {
            //hash the passwords
            $pass = md5($password);
        
            $stmt = mysqli_prepare($connection, "UPDATE user SET displayName=? WHERE userId=? AND password=?");
            mysqli_stmt_bind_param($stmt, "sis", $username, $thisId, $pass);
            mysqli_stmt_execute($stmt);

            session_start();
            $_SESSION['username'] = $username;

            header('Clear-Site-Data: "cache"');
            header("Location: ../home.php");

            //close connection
            mysqli_close($connection);
        }
    }
}
?>
</html>