<?php


session_start();

  $name = $_SESSION["user"];
  $pwd = $_SESSION["pwd"];

echo "Welcome " . $name . $pwd;
?>



<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
</head>
<body>




    <h1>Welcome User</h1>


    <a href="logout.php">Logout</a>
</body>
</html>