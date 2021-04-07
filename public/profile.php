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
</head>

<body>
<?php include "header.php"; echo $header; ?>
<!-- TODO: display blob as image  -->
    <img src="https://thispersondoesnotexist.com/image" width="150" height="150" class="user-icon">
    <i class="fa fa-pencil" aria-label="Edit profile picture"></i>

    <?php include "script/connect.php";
    $connection = connect();
   // TODO: get userId of logged in user
    $sql = "SELECT * FROM user WHERE userId='1'";
    $results = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($results);
    mysqli_free_result($results);
    mysqli_close($connection);


    echo "<h1>" . $row["displayName"] . "</h1>";
    echo "<p>" . $row["email"] . "</p>";
    ?>

    <i class="fa fa-pencil" aria-label="Edit username"></i>
   <!-- TODO: get posthistory of user  -->
    <div class="posthistory sidebar">
        <p>No more iPhones?</p>
        <p>First Post! :)</p>
        <p>First Post! :)</p>
    </div>
</body>

</html>