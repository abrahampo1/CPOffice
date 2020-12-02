<html>
<h1>Página palleira (en obras...)</h1>
<br>
<form method="POST" action="plantilla/index.php"> 
<select name="b">
<?php
include("conectar.php");
$sql = "SELECT * FROM bodegas";
$do = mysqli_query($link, $sql);
while($v = $mysqli_fetch_assoc){}
echo'<option value="'.$v[""].'"></option>';
?>
</select>
</form>
</html>