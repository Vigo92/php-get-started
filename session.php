<?php

session_start();

$name="";
$pwd="";
$ok = true;

if (!isset($_POST["name"]) || $_POST["pwd"] === " ") {
	# code...
	$ok = false;
}
else{
	$name = $_POST["name"];
    $_SESSION["user"] = $_POST["name"];
}


if (!isset($_POST["pwd"]) || $_POST["pwd"] === " ") {
	# code...
	$ok = false;
}
else{
	$pwd = $_POST["pwd"];
    $_SESSION["pwd"] = $_POST["pwd"];
}
                    if ($ok) {
     	
     	$conn = new mysqli("localhost","root","","ifeanyi");
                    if ($conn -> connect_error) {
     		die("Connection error: " . $conn -> connect_error);
     		# code...
     	}
     	$sql = sprintf("select * from users where name = '%s'",mysqli_real_escape_string($conn,$name));
              $result = $conn -> query($sql);
              $row = mysqli_fetch_assoc($result);
              if ($row) {

              	$hash = $row["password"];
              	# code...
              }
              if(password_verify($pwd, $hash)){

              	echo "Welcome User";

              	header("Location: user.php");
              }
              else{
              	echo "Login failed";
              }

     }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Session Handling</title>
</head>
<body>
      <form method="post" action="">
      	
<label>Name: </label><input type="text" name="name"><br>

<label>Password: </label><input type="Password" name="pwd">

<input type="submit" value="Submit">
      </form>
</body>
</html>