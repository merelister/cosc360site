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
    <script type="text/javascript" src="script/signup.js"></script>
    <script type="text/javascript" src="script/mainpage2.js"></script>
</head>

<body>
      <?php include "header.php"; echo $header; 
      
      if ($auth != true) header("Location: error_page.php");
      if (isset($_GET['id'])) $thisId = $_GET['id'];
      if ($thisId != $userid) header("Location: error_page.php");
      
      ?>

        <form method="post" action="script/update_script.php" enctype="multipart/form-data">
            <div class="signupcontainer">
              <h1 id="toptext">Update account</h1>
              <hr>

              <label for="username"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" id="username" class="regentry">

              <label for="image"><b>Profile Picture</b></label>
              <input type="file" name="image" id="image" class="regentry" accept=".jpg" style="background:none">

              <input type="text" value="<?php echo $thisId ?>" name="id" style="display:none">

              <hr>

              <label for="pass"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password" id="password" class="regentry" required>
          
              <p>Please confirm your password to make changes.</p>
              <button type="submit" class="registerbtn">Update</button>
            </div>
          </form>
</body>
</html>
