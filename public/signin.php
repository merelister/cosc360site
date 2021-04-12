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
    <link rel="stylesheet" href="css/360_signup.css">
    <script type="text/javascript" src="script/mainpage2.js"></script>
</head>

<body>
    <?php include "header.php"; echo $header; ?>

        <form method="post" action="script/signin_script.php">
            <div class="signupcontainer">
              <h1>Sign in</h1>
              <p>Welcome back!</p>
              <hr>
          
              <label for="username"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" id="username" class="regentry" required>
          
              <label for="pass"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password" id="password" class="regentry" required>

            </div>
            <button type="submit" class="registerbtn" onclick="">Sign In</button>
            <div class="signupcontainer">
            <br>
              <p>Dont have an account yet? <a href="signup.php">Sign up</a>.</p>
              <p>Forgot your password? <a href="recover.php">Recover Password</a>.</p>
            </div>
          </form>


          <?php echo $footer ?>
</body>
</html>