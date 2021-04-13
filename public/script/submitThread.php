<!-- create a new thread with the submitted title and category.
then, create a new comment (that belongs to the thread) with the submitted content
 todo: error handling
-->
 <?php
include "../header.php";

$host = "localhost";
$database = "360site";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

if($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["title"]) && isset($_GET["content"]) && isset($_GET["category"])) {
        //todo: get actual userId
        $title = $_GET["title"];
        $title = mysqli_real_escape_string($connection, $title);
        $content = $_GET["content"];
        $content = mysqli_real_escape_string($connection, $content);
        $category = $_GET["category"];

        // create the new thread
        $sql = "INSERT INTO threads (title, category) VALUES ('" . $title . "','" . $category . "')";
        mysqli_query($connection, $sql);

        // get the threadId for the thread we just created
        $threadId = mysqli_insert_id($connection);
        
        // create the first comment of the thread
        $sql = "INSERT INTO comments (threadId, userId, content) VALUES ('" . $threadId . "','" . $userid . "','" . $content . "')"; 
        mysqli_query($connection, $sql);
        mysqli_close($connection);

        // go to the newly created thread
        header("Location: ../thread.php?thread=" . $threadId . "");
    } 
    
} 
?>
