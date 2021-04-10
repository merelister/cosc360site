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

    <div class="layout">
        <div class="postblock">
            <a href="thread.php?thread=5">
                <div class="post">
                    <h3>Airplanes?</h3>
                    <p>Lorem ipsum</p>
            </a>
        </div>

        <div class="post">
            <h3>No More iPhones :(</h3>
            <p>Lorem ipsum et calmor</p>
        </div>

        <div class="post">
            <h3>Check out this sunrise!!</h3>
            <p>Lorem ipsum et calmor</p>
        </div>

        <div class="post">
            <h3>Check out this sunrise!!</h3>
            <p>Lorem ipsum et calmor</p>
        </div>

        <div class="post">
            <h3>Check out this sunrise!!</h3>
            <p>Lorem ipsum et calmor</p>
        </div>

        <div class="post">
            <h3>Check out this sunrise!!</h3>
            <p>Lorem ipsum et calmor</p>
        </div>

        <div class="post">
            <h3>Check out this sunrise!!</h3>
            <p>Lorem ipsum et calmor</p>
        </div>

    </div>


    <?php if ($auth == true) echo "<div class='sidebar'>
        <div class='posthistory'>
            <a href='profile.php/?id='" . $userid . "''><h4>@". $username ."</h4></a>
            <p>Welcome back!</p>
        </div>"; 
        ?>
    
    <?php if ($auth == false) echo "<div class='sidebar'>
        <div class='posthistory'>
            <h3> Welcome to Rabbit! </h3>
            <p> Please sign in or create a free account today in order to access the full array of Rabbit features! </p>
            <a href='signup.php'>Sign Up</a><br>
            <a href='signin.php'>Sign In</a>
        </div>"; 
        ?>

        <div class="categorybar">
            <div class="categories" id="sports">
                Sports
            </div>
            <div class="categories" id="news">
                News
            </div>
            <div class="categories" id="art">
                Art
            </div>
            <div class="categories" id="nature">
                Nature
            </div>
        </div>
    </div>
    </div>

</body>

</html>