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
      <?php include "header.php"; echo $header; ?>

        <form method="post" action="script/signup_script.php" enctype="multipart/form-data">
            <div class="signupcontainer">
              <h1>Register</h1>
              <p>Fill in this form to get started.</p>
              <hr>
          
              <label for="email"><b>Email</b></label>
              <input type="email" placeholder="Enter Email" name="email" class="regentry" required>

              <label for="username"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" class="regentry" required>
          
              <label for="pass"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password" id="password" class="regentry" minlength="8" required>
          
              <label for="pass-repeat"><b>Repeat Password</b></label>
              <input type="password" placeholder="Repeat Password" name="pass-repeat" id="confirm_password" class="regentry" required>

              <label for="image"><b>Profile Picture</b></label>
              <input type="file" name="image" id="image" class="regentry" accept=".jpg" required>

              <hr>
          
              <p>By creating an account you agree to our <a href="#" onclick="openForm()">Terms & Privacy</a>.</p>
              <button type="submit" class="registerbtn" onclick="validatePassword()">Register</button>
            </div>
          
            <div class="signupcontainer">
              <p>Already have an account? <a href="signin.php">Sign in</a>.</p>
            </div>
          </form>

          <div class="popup" id="myPopup">
              <h1>Privacy Policy</h1>
              <p>
                example example example example example example example 
              </p>
              <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
          </div>
          <?php echo $footer ?>
</body>
</html>
