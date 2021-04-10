<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://use.fontawesome.com/bd4a5de489.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="https://fonts.xz.style/serve/inter.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@exampledev/new.css@1.1.2/new.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/360_site.css">
    <script type="text/javascript" src="script/mainpage2.js"></script>
</head>

<body>
    <?php include "header.php";
    echo $header; ?>


    <?php

    $thisId = $_GET['id'];

    include "script/connect.php";
    $connection = connect();

  
 
    if(isset($_SESSION["role"])) $role = $_SESSION["role"];
        //signed in do your thing
        if (isset($_SESSION['userid'])) {
            $postHistory = "";

            //query the login info
            $sql = "SELECT * FROM user WHERE userId ='$thisId'";
            $results = mysqli_query($connection, $sql);
            $count = mysqli_num_rows($results);

            if ($count == 0) {
                echo ("invalid results");
                echo ("<p><a href=\"http://localhost/cosc360site/public/signin.php\">Return to login</a></p>");
            } else {
                $row = mysqli_fetch_assoc($results);
                $email = $row['email'];
                $username = $row['displayName'];
                $profilerole = $row['role'];

                // admin can disable/enable users
                 if($role == 1 && $profilerole != -1) {
                 echo '<form action="script/toggleUserEnable.php" method="GET">
                 <input type="hidden" name="id" value="'.$thisId.'">
                 <input type="hidden" name="toggle" value="disable">
                 <button type="submit">Disable user</button> </form>';
             } else if($role == 1 && $profilerole == -1) {
                echo '<form action="script/toggleUserEnable.php" method="GET">
                <input type="hidden" name="id" value="'.$thisId.'">
                <input type="hidden" name="toggle" value="enable">
                <button type="submit">Enable user</button> </form>';
             }
        }
            

            //now query the post history
            $sql = "SELECT * FROM comments WHERE userId ='$thisId';";
            $results = mysqli_query($connection, $sql);
            $count = mysqli_num_rows($results);

            if ($count == 0) {
                $postHistory = "<p>User has no post history!</p>";
            } else {

                //get all the users comments
                while ($row = mysqli_fetch_assoc($results)){
                    $postHistory = $postHistory . "<p>" . $row['content'] . "</p>";
                }

            }

            //close connection
            mysqli_free_result($results);
            mysqli_close($connection);
        }
    

    $body = '
    <img src="https://thispersondoesnotexist.com/image" width="150" height="150" class="user-icon">
    <i class="fa fa-pencil" aria-label="Edit profile picture"></i>
    <h1>' . $username . '</h1>
    <i class="fa fa-pencil" aria-label="Edit username"></i>
    <p>' . $email . '</p>
    <div class="posthistory sidebar">
        ' . $postHistory . '
    </div>
    ';

    echo($body);
    ?>


</body>

</html>