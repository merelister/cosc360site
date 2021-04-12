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

        <form method="post" action="script/recover_script.php">
            <div class="signupcontainer">
              <h1>Recover Password</h1>
                <br>
              <label for="username"><b>Email Address</b></label>
              <input type="text" placeholder="Enter the Email associated with your account" name="email" id="email" class="regentry" required>

            </div>
            <button type="submit" class="registerbtn" onclick="">Recover</button>
            <div class="signupcontainer">
            </div>
          </form>


          <?php echo $footer ?>
</body>
</html>