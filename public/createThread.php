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
    <script type="text/javascript" src="script/mainpage2.js"></script>
    <script type="text/javascript" src="script/signup.js"></script>
</head>

<body onload="closeForm()">
    <?php include "header.php";
    echo $header; 

    if ($auth) echo "<h2 id='toptext'> Create a new thread </h2><form method=\"GET\" action=\"script/submitThread.php\">
    <input type=\"text\" placeholder=\"Thread title\" name=\"title\" style='width:32em' required> <br>
    <textarea name=\"content\" placeholder=\"Post body\" cols=\"25\" rows=\"10\" style='width:32em'  required> </textarea>
    <br>
    <select id=\"category\" name=\"category\">
        <option value=\"General\">General</option>
        <option value=\"Sports\">Sports</option>
        <option value=\"News\">News</option>
        <option value=\"Art\">Art</option>
        <option value=\"Nature\">Nature</option>
    </select>
    <br>
    <p>By posting you agree to our <a href=\"#\" onclick=\"openForm()\">Terms & Policies</a>.</p>
    <button type=\"submit\">Create new thread</button>
    </form>
    <div class=\"popup\" id=\"myPopup\">
              <h3>Terms of Service</h3>
              <p>
                Here's where we would put terms of service for posting.
              </p>
              <button type=\"button\" class=\"btn cancel\" onclick=\"closeForm()\">Close</button>
          </div>";

    else echo "<h2 style=\"float:left\">Cannot create a thread if not logged in.</h2><br><br><br><br><a href='signin.php'>Log in</a>";
    
    ?>
    <?php echo $footer ?>
</body>

</html>