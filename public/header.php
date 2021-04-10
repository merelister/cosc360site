<?php

$auth = false;
$userid = 0;
$role = 0; // user:0 admin:1
$username = "";

session_start();
if (isset($_SESSION['authenticated'])) $auth = $_SESSION['authenticated'];
if (isset($_SESSION['userid'])) $userid = $_SESSION['userid'];
if (isset($_SESSION['username'])) $username = $_SESSION['username'];
// todo: set session variable for role in signIn_script
if (isset($_SESSION['role'])) $role = $_SESSION['role'];


if ($auth == true && $role == 0) {
    $header = '<header id="header">
            <a href="home.php" style="position: relative; z-index : 10;"><img src="images/rabbit.png" id="logo"></a>

            <div class="dropdown">
                <a onclick="dropdown()"><img src="https://thispersondoesnotexist.com/image" class="usericon"></a>
                <div id="myDropdown" class="dropdown-content">
                    <a href="profile.php/?id=' . $userid . '">Profile</a>
                    <a href="createThread.php">➕ New Thread</a>
                    <a href="signout.php">Sign Out</a>
                    <a onclick="toggleNightMode()" id="nightMode">Night Mode</a>
                    <img id="drop" style="display:none">
                </div>
            </div>

            <form class="example" action="search.php" method="GET">
                <input type="text" placeholder="Search.." name="search" class="searchbar">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </header>';
} else if ($auth == true && $role == 1) {
    // admin header
    $header = '<header id="header">
            <a href="home.php" style="position: relative; z-index : 10;"><img src="images/rabbit.png" id="logo"></a>
            <div class="dropdown">
                <a onclick="dropdown()"><img src="https://thispersondoesnotexist.com/image" class="usericon"></a>
                <div id="myDropdown" class="dropdown-content">
                    <a href="profile.php?id=' . $userid . '">Profile</a>
                    <a href="createThread.php">➕ New Post</a>
                    <a onclick="toggleNightMode()" id="nightMode">Night Mode</a>
                </div>
            </div>

            <form class="example" action="search.php" method="GET">
                <input type="text" placeholder="Search.." name="search" class="searchbar">
                <br>
                <select name="type">
                <option value="posts">Posts</option>
                <option value="usernames">Username</option>
                <option value="emails">Email</option>
                </select>
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </header>';
}

if ($auth != true) {
    $header = '<header id="header">
    <a href="home.php" style="position: relative; z-index : 10;"><img src="images/rabbit.png" id="logo"></a>

    <div class="dropdown">
        <a onclick="dropdown()"><img src="images/downarrow.png" class="usericon" id="drop"></a>
        <div id="myDropdown" class="dropdown-content">
            <a href="signin.php">Sign In</a>
            <a href="signup.php">Sign Up</a>
            <a onclick="toggleNightMode()" id="nightMode">Night Mode</a>
        </div>
    </div>

        <form class="example" action="search.php" method="GET">
            <input type="text" placeholder="Search.." name="search" class="searchbar">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </header>';
}
