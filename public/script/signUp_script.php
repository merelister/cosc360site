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
         }

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
            $userid =  mysqli_insert_id($connection);
            session_start();
            $_SESSION['authenticated'] = true;
            $_SESSION['userid'] = $userid;
            $_SESSION['username'] = $username;

            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"images/".$userid .".". $file_ext);
             }else{
                print_r($errors);
             }

           header("Location: ../home.php");
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
