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
   
   $searchTerm = $_GET['search'];
   
   if (!empty($searchTerm)) echo "<h3>Searching for: \" " . $searchTerm . " \" </h3>";
   else echo "<h3>Please enter a search term.</h3>"
   ?>

   </body>

</html>