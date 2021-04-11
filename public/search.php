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
   <?php include "header.php"; echo $header; 
    
   
    if(isset($_GET['search'])) $searchTerm = $_GET['search'];
    else $searchTerm = '';

    if(isset($_GET['category'])) $category = $_GET['category'];
    else $category = '';

    if(isset($_GET['type'])) $searchType = $_GET['type'];
    else $searchType = 'posts';

    if ($searchTerm != '' && $searchType != 'users') echo "<h1 id='toptext'>Searching for " . $searchType . " containing '" . $searchTerm . "'</h1><br>";
    if ($category != '' && $searchType != 'users') echo "<h1 id='toptext'>Showing all results for " . $category . "</h1><br>";
    if ($searchTerm == '' && $category == '' && $searchType != 'users') echo "<h1 id='toptext'>Showing all posts</h1><br>";
    if ($searchType == 'users') echo "<h1 id='toptext'>Showing users</h1><br>";

    echo "<form action='search.php'>
            <input type='text' name='search' value='".$searchTerm."' style='display:none'>
            <select id=\"category\" name=\"type\">
                <option value=\"posts\" disabled selected>Search...</option>
                <option value=\"posts\">Posts</option>
                <option value=\"users\">Users</option>
            </select>";

    if ($searchType == 'posts') echo "<select id=\"category\" name=\"category\">
                                        <option value=\"\" disabled selected>Category...</option>
                                        <option value=\"Sports\">Sports</option>
                                        <option value=\"News\">News</option>
                                        <option value=\"Art\">Art</option>
                                        <option value=\"Nature\">Nature</option>
                                    </select>";
        
    echo "<button type=\"submit\" style='margin-left:0.2em'><i class=\"fa fa-search\"></i></button></form>";

    searchPosts($searchTerm, $searchType, $category);
   
    function searchPosts($searchTerm, $searchType, $cat) {
        
        switch($searchType) {
            case 'posts':
                $sql = "SELECT * FROM threads WHERE title LIKE '%" . $searchTerm . "%' AND category LIKE '%" . $cat. "%'";
                break;

            case 'users':
                $sql = "SELECT * FROM user WHERE displayName LIKE '%" . $searchTerm . "%' OR email LIKE '%" . $searchTerm . "%'";
                break;

            default:
                echo "Error: invalid search";
                return;
                break;
            }
                
        include "script/connect.php";
        $connection = connect();
        $results = mysqli_query($connection, $sql);
        $searchResults = 0; // were any results found?
        echo "<div class=\"layout\">
        <div class=\"postblock\">";

        switch($searchType){
            case 'posts':
                while($row = mysqli_fetch_assoc($results)) {
                    $searchResults += 1;
                   
                    $sql2 = "SELECT content FROM comments WHERE threadId = " . $row['threadId'] . "";
                    $results2 = mysqli_query($connection, $sql2);
                    $row2 = mysqli_fetch_assoc($results2);

                    echo "<a href=\"thread.php?thread=" . $row['threadId'] . "\">
                            <div class=\"post\" id='search'>
                                <h3>" . $row['title'] . "</h3>
                                <p>". $row2['content'] ."</p>
                            </a>
                        </div>";
                }
                    break;


            case 'users':
                while($row = mysqli_fetch_assoc($results)) {
                    $searchResults += 1;
                    echo "<div class='post' id='search'>";
                    echo "<img class=\"usericon\" width=\"50\" height=\"50\" src=\"script/images/" . $row["userId"] . ".jpg\">";
                    echo "<h3 style='margin-left:3em'><a href=profile.php?id=" . $row["userId"] . ">" . $row["displayName"] . "</a></h3></div>";
                }
                break;

            default:
                break;
        }

        echo "</div></div>";
        echo "<p style='text-align:center; margin-left:-4em'>".$searchResults . " ". $searchType . " found.</p>";
    }
   
   ?>

   </body>

</html>