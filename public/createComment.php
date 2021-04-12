<?php
$comment = "<form method=\"GET\" action=\"script/submitComment.php\">
<label for=\"content\">Comment</label>
<br>
<textarea name=\"comment\" style='width:33em'required></textarea>
<input type=\"hidden\" name=\"thread\" value=\"$threadId\">
<br>
<button type=\"submit\" style='background-color:grey'>Post comment</button>
</form>";
?>