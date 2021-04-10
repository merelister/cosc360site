<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="https://fonts.xz.style/serve/inter.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@exampledev/new.css@1.1.2/new.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/360_site.css">
    <script type="text/javascript" src="script/mainpage.js"></script>
</head>

<body>

    <?php
    include "header.php";
    echo $header;
    
    include "script/connect.php";
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["thread"])) {
        $threadId = $_GET["thread"];

        $connection = connect();

        echo "<div class=\"layout\">
    <div class=\"postblock\">";

        // get thread title and category
        $sql = "SELECT * FROM threads WHERE threadId='" . $threadId . "'";
        $results = mysqli_query($connection, $sql);
        if($row = mysqli_fetch_assoc($results)) {
            echo "<h1>" . $row["title"] . "</h1>";
            echo "<h2>" . $row["category"] . "</h2>";
        } else {
            echo "<h1>Error: Thread title not found</h1>";
            echo "<h2>Error: Thread category not found</h2>";
        }
        mysqli_free_result($results);

        // get all comments belonging to thread
       $sql = "SELECT user.displayName, comments.content, comments.userId FROM comments INNER JOIN user ON comments.userId=user.userId 
       WHERE threadId='" . $threadId . "' ORDER BY date ASC";
       // $sql = "SELECT * FROM comments WHERE threadId='" . $threadId . "' ORDER BY date ASC";
        $results = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($results)) {
            echo "<div class=\"post\">";
            // todo: can also include timestamps, rating if needed
            echo "<a href='profile.php?id=" . $row["userId"] . "'>"  . $row["displayName"] . "</a>";
            echo "<p>" . $row["content"] . "</p>";
            echo "</div>";
        }
        echo "</div></div>";
        mysqli_free_result($results);
        if(isset($_SESSION["userid"])) {
            // if logged in show comment box
            include "createComment.php";
            echo $comment;
        } else {
            echo "You must be logged in to comment. <a href='signin.php'>Log in here</a>, or <a href='signup.php'>sign up</a> for an account.";
        }
        
        mysqli_close($connection);
    } else header("Location: error_page.php"); // redirect to error page if the thread doesn't exist
    ?>

    <body>

</html>