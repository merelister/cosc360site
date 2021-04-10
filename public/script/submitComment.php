<!-- <!doctype html>
<html>
    <body> -->
<?php
include "script/connect.php";
if($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "get";
    if(isset($_GET["comment"]) && isset($_GET["thread"])) {
       echo "set";
        session_start();
        $userId = $_SESSION['userid'];
        $content = $_GET["comment"];
        $threadId = $_GET["thread"];

        $connection = connect();

        $sql = "INSERT INTO comments (threadId, userId, content) VALUES ('$threadId', '$userId', '$content')"; 
        mysqli_query($connection, $sql);
        mysqli_close($connection);

        // go back to the thread
        header("Location: thread.php?thread=" . $threadId );
    }
}
?>
<!-- </body>
</html> -->