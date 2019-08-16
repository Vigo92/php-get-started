<?php 


$name = "";
$pwd = "";
$hash = "";
$ok = true;
if (!isset($_POST["name"]) || $_POST["name"] ===" ") {
	$ok = false;
}
else{
	$name = $_POST["name"];
}

if (!isset($_POST["pwd"]) || $_POST["pwd"] ===" ") {
	$ok = false;
}
else{
	$pwd = $_POST["pwd"];
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
	<title>Login</title>
	<style type="text/css">
		
		body{
			background-color: aquamarine;
			margin-left: 350px;
			font-family: "Helvetica";
		}
	</style>
</head>
<body>
	    <form action="" method="post">

          <fieldset>
          	
          	<legend>Register</legend>

          	<label>Name: </label><input type="text" name="name" required=""><br>
          	

          	<label>Password</label><input type="password" name="pwd" required="">
         
          	<input type="submit" value="Submit">
          </fieldset>

	    </form>

</body>
</html>