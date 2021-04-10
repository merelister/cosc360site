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
    if( isset($_POST['email']))
    {
        $email= $_POST['email'];
        
        $sql = "SELECT * FROM user WHERE email = '$email';";
        $results = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($results);
        $row = mysqli_fetch_assoc($results);
        
        if($count==0)
        {
            echo("<p>There is no account associated with that email address.</p>");
            echo("<p><a href=\"../recover.php\">Back to recover</a></p>");
        }
        else
        {

            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
            $input_length = strlen($permitted_chars);
            $random_string = '';
            for($i = 0; $i < 16; $i++) {
                $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }

            $hashpass = md5($random_string);

            $query = "UPDATE user SET password = '$hashpass' WHERE email = '$email';";
            $result = mysqli_query($connection, $query);
    
            require "PHPMailer/PHPMailer-master/src/PHPMailer.php";
            require "PHPMailer/PHPMailer-master/src/SMTP.php";
            //require "PHPMailer/PHPMailer-master/src/Exception.php";
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); 

            $mail->CharSet="UTF-8";
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPDebug = 0; 
            $mail->Port = 587 ; //465 or 587

            $mail->SMTPSecure = 'tls';  
            $mail->SMTPAuth = true; 
            $mail->IsHTML(true);

            //Authentication
            $mail->Username = 'rabbitrecover@gmail.com';
            $mail->Password = "cosc360site";

            //Set Params
            $mail->SetFrom("rabbitrecover@gmail.com");
            $mail->AddAddress($email);
            $mail->Subject = "Password reset for " . $row['displayName'];
            $mail->Body = "Hello,<br><br>
            As per your request for your credentials on Rabbit<br>
                Your User Id: ".$row['displayName']."<br>
                Your new password: " . $random_string;

            if ($mail->Send()){
                echo("<p>An email has been sent to your account with instructions on how to reset your password.</p>");
                echo("<p><a href=\"../signin.php\">Return to login</a></p>");
            }

        }
        
        //close connection
        mysqli_free_result($results);
        mysqli_close($connection);
    }
}


?>
</html>
