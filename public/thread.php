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
        $sql = "SELECT * FROM comments WHERE threadId='" . $threadId . "'";
        // todo: get thread title and category
        echo "<div class=\"layout\">
    <div class=\"postblock\">
    <h1>Thread title (todo)</h1>";
        $results = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($results)) {
            echo "<div class=\"post\">";
            // todo: can also include timestamps, userId, rating
            echo $row["content"];
            echo "</div>";
        }
        echo "</div></div>";
        mysqli_free_result($results);
        include "createComment.php";
        echo $comment;
        // todo: if logged in: show comment box. else, show message "you must be logged in to comment"
        mysqli_close($connection);
    } else header("Location: error_page.php"); // redirect to error page if the thread doesn't exist
    ?>

    <body>

</html>