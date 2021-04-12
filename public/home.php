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
   <?php include "header.php"; echo $header; ?>

    <div class="layout">
    <div class="postblock">
    <h2 style="margin-left: 1em; border-bottom:none"> NEW POSTS </h2>

    <?php
    $host = "localhost";
    $database = "360site";
    $user = "webuser";
    $password = "P@ssw0rd";

    $connection = mysqli_connect($host, $user, $password, $database);

    $sql = "SELECT * FROM threads ORDER BY creationDate DESC";
    $results = mysqli_query($connection, $sql);
    

    while($row = mysqli_fetch_assoc($results)) {

    $sql2 = "SELECT content FROM comments WHERE threadId = " . $row['threadId'] . "";
    $results2 = mysqli_query($connection, $sql2);
    $row2 = mysqli_fetch_assoc($results2);

        echo "<a href=\"thread.php?thread=" . $row['threadId'] . "\">
                <div class=\"post\">
                    <h3>" . $row['title'] . "</h3>
                    <p>". $row2['content'] ."</p>
                </a>
            </div>";
    }

    mysqli_close($connection);
    ?>

     </div>
        

    <?php 
        if ($auth == true) echo "<div class='sidebar'>
        <div class='posthistory'>
            <a href=\"profile.php/?id=" . $userid . "\"\"><h4>@". $username ."</h4></a>
            <p>Welcome back!</p>
        </div>"; 
        
        if ($auth == false) echo "<div class='sidebar'>
        <div class='posthistory'>
            <h3> Welcome to Rabbit! </h3>
            <p> Please sign in or create a free account today in order to access the full array of Rabbit features! </p>
            <a href='signup.php'>Sign Up</a><br>
            <a href='signin.php'>Sign In</a>
        </div>"; 
        ?>

        <div class="categorybar">


        <a href="search.php?search=&category=Sports"><div class="categories" id="sports">
                Sports
            </div></a>


            <a href="search.php?search=&category=News"><div class="categories" id="news">
                News
            </div></a>


            <a href="search.php?search=&category=Art"><div class="categories" id="art">
                Art
            </div></a>


            <a href="search.php?search=&category=Nature"><div class="categories" id="nature">
                Nature
            </div></a>



        </div>
    </div>
    </div>

    <?php echo $footer ?>
</body>

</html>