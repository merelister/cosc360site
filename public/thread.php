<!DOCTYPE html>
<html>
<body>
<?php
include "script/connect.php";
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["thread"])) {
    $threadId = $_GET["thread"];

    $connection = connect();
    $sql = "SELECT * FROM comments WHERE threadId='" . $threadId . "'";
    // todo: get thread title and category
    $results = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($results)) {
        echo "<br>";
        // todo: can also include timestamps, userId, rating
        echo $row["content"];
    }
    mysqli_free_result($results);
    echo "button to comment";
    mysqli_close($connection);
} else header("Location: error_page.php" ); // redirect to error page if the thread doesn't exist
?>
<body>
</html>