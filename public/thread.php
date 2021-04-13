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
    <script type="text/javascript" src="script/mainpage2.js"></script>
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
            echo "<h1 style='border-bottom:none'>" . $row["title"] . "</h1>";
            echo "<div>Category: " . $row["category"] . "<div style='float:right'>" . $row['creationDate'] . "</div></div>";
        } else {
            header("Location: error_page.php"); // redirect to error page if the thread doesn't exist
        }
        mysqli_free_result($results);

        $threadContent = true;
        // get all comments belonging to thread
       $sql = "SELECT user.displayName, comments.content, comments.userId, comments.date FROM comments INNER JOIN user ON comments.userId=user.userId 
       WHERE threadId='" . $threadId . "' ORDER BY date ASC";
        $results = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($results);
        while ($row = mysqli_fetch_assoc($results)) {

            if ($threadContent == true) {
                echo '<br>
                <div>' . $row["displayName"] .'</div><a href="profile.php?id=' . $row["userId"] . '"><img class="usericon" width="50" height="50" style="z-index:1" src="script/images/' . $row["userId"] . '.jpg"></a><div style="position:relative; top:0.3em; left:4em"><p>' . $row["content"] . '</p></div>';
                echo "<br>";
                $threadContent = false;
                if ($count == 1) echo "<h4 style='border-bottom:none'> Be the first to comment!</h4><br>";
                else echo "<h4 style='border-bottom:none'> User comments</h4>";
            }

            else {
            echo "<div class=\"post\" style='margin-bottom:0'>";
            echo "<div style='float:right; font-size:11px'>" . $row['date'] . "</div><a href='profile.php?id=" . $row["userId"] . "'>
            <img alt=\"user image\" class=\"usericon\" width=\"40\" height=\"40\" style=\"z-index:1\" src=\"script/images/" . $row["userId"] . ".jpg\"></a>
            <div style='position:relative; top:2.5em; left:0em'>"  . $row["displayName"] . "</div></a>";
            echo "<p style='position:relative; top:-1.3em; left:4em;
            max-width: 28vw;'>" . $row["content"] . "</p>";
            echo "</div>";
            }
        }


        echo "<br></div></div>";
        mysqli_free_result($results);


        if(isset($_SESSION["userid"])) {
            // if logged in show comment box
            include "createComment.php";
            echo $comment;
        } else {
            echo "You must be logged in to comment. <a href='signin.php'>Log in here</a>, or <a href='signup.php'>Sign up</a> for an account.";
        }
        mysqli_close($connection);
    }
    ?>

    <body>
    <?php echo $footer ?>
</html>