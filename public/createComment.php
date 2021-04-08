<?php
$comment = "<form method=\"GET\" action=\"submitComment.php\">
<label for=\"content\">Comment</label>
<br>
<textarea name=\"comment\" required></textarea>
<input type=\"hidden\" name=\"thread\" value=\"$threadId\">
<br>
<button type=\"submit\">Post comment</button>
</form>";
?>