<?php
  require("auth.php");
  if (isset($_GET["id"]) && ctype_digit($_GET["id"])) {

  	$id = $_GET["id"];
  	# code...
  }
  else{

  	header("Location: select.php");
  }
?>



<!DOCTYPE html>
<html>
<head>
	<title>PHP</title>
</head>
<body>
<?php

      readfile("navigation.tmp.html");

   $conn = new mysqli("localhost","root","","php");
   $sql = "delete from users where id=$id";
   $conn -> query($sql);
   echo "<p>User deleted</p>";
   $conn -> close();



?>
</body>
</html>