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

if(isset($_SESSION["role"])) $role = $_SESSION["role"];
$email = "";
$postHistory = "";

include "script/connect.php";
$connection = connect();

$sql = "SELECT * FROM user WHERE userId ='$thisId'";
$results = mysqli_query($connection, $sql);
$count = mysqli_num_rows($results);

if ($count == 0) {
    header("Location: error_page.php");
} else {
    $row = mysqli_fetch_assoc($results);
    if ($thisId == $userid) $email = $row['email'];
    $username = $row['displayName'];
    $profilerole = $row['role'];
    $joinDate = $row['joinDate'];

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

            $postHistory = $postHistory ."<a href=\"thread.php?thread=" . $row['threadId'] . "\">". $row2['title'] ."</a>
            <div style='float:right; font-size:11px'>" . $row['date'] . "</div> : <p>" . $row['content'] . "</p>";
        }
    }
    else {
        $postHistory = "<p>User has no post history!</p>";
    }
    
//close connection
mysqli_free_result($results);
mysqli_close($connection);
    

    echo '
    <img src="script/images/' . $thisId . '.jpg" width="150" height="150" class="usericon" alt="User Image" id="profilepage" style="z-index:0"><br><br><br><br><br><br>
    <h1>' . $username . '</h1>
    <p> Joined on ' . $joinDate . '</p>
    <p>' . $email . '</p>';

    if ($thisId == $userid) echo '<i class="fa fa-pencil" aria-label="Edit username"></i> <a href="update.php/?id=' . $userid . '">Edit username or profile pic</a><br><br>';
    
    echo '<br>
    <h3 style="border-bottom:none"> Comment History </h3>
    <div class="posthistory">
        ' . $postHistory . '
    </div>
    ';

    
    ?>

<?php echo $footer; ?>
</body></html>
