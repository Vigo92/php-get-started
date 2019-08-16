<?php
session_start();
$name= $_SESSION["user"];

if (isset($name)){

	unset($_SESSION["user"]);

	echo "You have successfilly Logged out";

	//echo $name;
	# code...
}
else{
	header("Location: session.php");
}


?>