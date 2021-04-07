<!DOCTYPE html>
<!-- Create a new thread. 
todo: make this not look ugly
todo: check userId (must be logged in)
todo: javascript validate form
todo: category is drop down -->
<html>
<body>
<form method="GET" action="submitThread.php">
<input type="text" placeholder="Thread title" name="title" required>
<input type="text" placeholder="Post body" name="content" required>
<input type="text" placeholder="Category" name="category" required>

    <button type="submit">Create new thread</button>
</form>
</body>
</html>