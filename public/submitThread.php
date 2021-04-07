<!-- create a new thread with the submitted title and category.
then, create a new comment (that belongs to the thread) with the submitted content
 todo: error handling
-->
 <?php
include "script/connect.php";
if($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["title"]) && isset($_GET["content"]) && isset($_GET["category"])) {
        //todo: get actual userId
        $userId = 1;
        $title = $_GET["title"];
        $content = $_GET["content"];
        $category = $_GET["category"];

        $connection = connect();
        // create the new thread
        $sql = "INSERT INTO threads (title, category) VALUES ('" . $title . "','" . $category . "')";
        mysqli_query($connection, $sql);

        // get the threadId for the thread we just created
        $threadId = mysqli_insert_id($connection);
        
        // create the first comment of the thread
        // TODO: get real userId (instead of "1")
        $sql = "INSERT INTO comments (threadId, userId, content) VALUES ('" . $threadId . "','1'," . $content . "')"; 
        mysqli_query($connection, $sql);
        mysqli_close($connection);

        // go to the newly created thread
        header("Location: thread.php?=" . $threadId );
    } 
    
} 
?>
