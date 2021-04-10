<!DOCTYPE html>
<!-- Create a new thread. 
todo: make this not look ugly
todo: check userId (must be logged in)
todo: javascript validate form
todo: category is drop down -->
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
    <script type="text/javascript" src="script/mainpage.js"></script>
</head>

<body>
    <?php include "header.php";
    echo $header; ?>


    <form method="GET" action="script/submitThread.php">
        <input type="text" placeholder="Thread title" name="title" required> <br>
        <textarea name="content" placeholder="Post body" cols="25" rows="10" required> </textarea>
        <br>

        <input type="text" placeholder="Category" name="category" required>
        <br>
        <button type="submit">Create new thread</button>
    </form>
</body>

</html>