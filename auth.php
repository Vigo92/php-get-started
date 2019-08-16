<?php
session_start();

if (!(isset($_SESSION["isAdmin"])) && (!($_SESSION["isAdmin"]))) {
	# code...

	header("Location:login.php");
}
?>