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
    <script type="text/javascript" src="script/mainpage.js"></script>
</head>

<body>
    <?php include "header.php";
    echo $header; ?>

    <?php echo "<h1>". $_GET['id'] . "</h1>";
            echo "<br><h1>". $userid. "</h1>"; ?>

    <img src="https://thispersondoesnotexist.com/image" width="150" height="150" class="user-icon">
    <i class="fa fa-pencil" aria-label="Edit profile picture"></i>
    <h1>@username</h1>
    <i class="fa fa-pencil" aria-label="Edit username"></i>
    <p>email</p>
    <div class="posthistory sidebar">
        <p>No more iPhones?</p>
        <p>First Post! :)</p>
        <p>First Post! :)</p>
    </div>
</body>

</html>