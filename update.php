<?php
if(isset($_POST["update"])){
    exec("git pull");
}
?>
<html>
HOLA
<form method="post">
<input type="hidden" name="update" value="">
<button type="submit">GIT PULL</button>
</form>
</html>