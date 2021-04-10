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
   <?php include "header.php"; echo $header; ?>

   <?php 
   if(isset($_GET['search']) && isset($_GET['type']) && isset($_SESSION['role'])) {
        $searchType = $_GET['type'];
        $searchTerm = $_GET['search'];
        if($searchType == "posts") searchPosts($searchTerm);
        // admin can search for users by username or email
        if($_SESSION['role']) {
            
        }
   }
  
   if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    searchPosts($searchTerm);
   } else echo "<h3>Please enter a search term.</h3>";

   
  
   
    function searchPosts($searchTerm) {
        echo "<h1>Searching for: " . $searchTerm . "</h1>";
        // users can search for posts by keyword within title
        include "script/connect.php";
        $connection = connect();
        $sql = "SELECT * FROM threads WHERE title LIKE '%" . $searchTerm . "%'";
        $results = mysqli_query($connection, $sql);
        $searchResults = 0; // were any results found?
        echo "<div class=\"layout\">
        <div class=\"postblock\">";
        while($row = mysqli_fetch_assoc($results)) {
            $searchResults += 1;
            echo "<div class='post'>";
            echo "<h3><a href=thread.php?thread=" . $row["threadId"] . ">" . $row["title"] . "</a></h3>";
            echo "</div>";
        }
        echo "</div></div>";
        echo $searchResults . " threads found.";
    }
   
   ?>

   </body>

</html>