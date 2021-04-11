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
    echo $header; 

    $thisId = $_GET['id'];

    $email = "";
    $postHistory = "";

    $host = "localhost";
    $database = "360site";
    $user = "webuser";
    $password = "P@ssw0rd";

    $connection = mysqli_connect($host, $user, $password, $database);

    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } 
    
    else {
        //signed in do your thing

        $sql = "SELECT * FROM user WHERE userId ='$thisId';";
            $results = mysqli_query($connection, $sql);
            $count = mysqli_num_rows($results);

            if ($count == 0) {
                header("Location: error_page.php");
            } else {
                $row = mysqli_fetch_assoc($results);
                if ($thisId == $userid) $email = $row['email'];
                $username = $row['displayName'];
            }

        if (isset($_SESSION['userid'])) {
            $postHistory = "";

            //now query the post history
            $sql = "SELECT * FROM comments WHERE userId ='$thisId';";
            $results = mysqli_query($connection, $sql);
            $count = mysqli_num_rows($results);

            if ($count != 0) {
                //get all the users comments
                while ($row = mysqli_fetch_assoc($results)){

                    $sql2 = "SELECT title FROM threads WHERE threadId = " . $row['threadId'] . "";
                    $results2 = mysqli_query($connection, $sql2);
                    $row2 = mysqli_fetch_assoc($results2);

                    $postHistory = $postHistory ."<a href=\"thread.php?thread=" . $row['threadId'] . "\">". $row2['title'] ."</a> : " . $row['content'] . "<br><br>";
                }
            }
            else{
                $postHistory = "<p>User has no post history!</p>";
            }
        }
        //close connection
        mysqli_free_result($results);
        mysqli_close($connection);
    }

    $body = '
    <img src="script/images/' . $thisId . '.jpg" width="150" height="150" class="usericon" id="profilepage"><br><br><br><br><br><br>
    <h1>' . $username . '</h1>
    <p>' . $email . '</p>

    <i class="fa fa-pencil" aria-label="Edit username"></i> Edit username<br>
    <i class="fa fa-pencil" aria-label="Edit profile picture"></i> Edit profile pic
    <br><br>
    <h3 style="border-bottom:none"> Comment History </h3>
    <div class="posthistory">
        ' . $postHistory . '
    </div>
    ';

    echo($body);
    ?>


</body>

</html>