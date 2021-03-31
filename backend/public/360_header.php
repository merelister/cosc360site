<?php $header = '<header id="header">
            <a href="360_site.php" style="position: relative; z-index : 10;"><img src="images/rabbit.png" id="logo"></a>

            <div class="dropdown">
                <a onclick="dropdown()"><img src="https://thispersondoesnotexist.com/image" class="usericon"></a>
                <div id="myDropdown" class="dropdown-content">
                    <a href="360_profile_page.html">Profile</a>
                    <a href="#">➕ New Post</a>
                    <a onclick="toggleNightMode()" id="nightMode">Night Mode</a>
                </div>
            </div>

            <form class="example" action="search.php" method="GET">
                <input type="text" placeholder="Search.." name="search" class="searchbar">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </header>'
?>