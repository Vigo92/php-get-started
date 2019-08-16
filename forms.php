<?php

$name = "";
$mail= "";
$pwd = "";
$hash = "";

$ok = true;
if( !(isset($_POST["name"])) || $_POST["name"] ===" "){
  $ok = false;
}
else{
	$name = $_POST["name"];
}
    
    if( !(isset($_POST["mail"])) || $_POST["mail"] ===" "){
  $ok = false;
}
else{
	$mail = $_POST["mail"];
}
         
         if( !(isset($_POST["pwd"])) || $_POST["pwd"] ===" "){
  $ok = false;
}
else{
	$pwd = $_POST["pwd"];
}
      if ($ok) {

      	# code...
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "ifeanyi";


      	$conn = new mysqli($servername,$username,$password,$dbname);
if($conn -> connect_error){
	die("Connection failed: " . $conn -> connect_error);
}
      $hash = password_hash($pwd, PASSWORD_DEFAULT);
      	$sql = sprintf("insert into users(name,email,password) values('%s','%s','%s')",
      		mysqli_real_escape_string($conn,$name),
      	    mysqli_real_escape_string($conn,$mail),
      	    mysqli_escape_string($conn,$hash));
   $result = $conn -> query($sql);


if ($result) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

      }
      else{
      	echo "Input fields not complete";
      }
?>
     	


<!DOCTYPE html>
<html>
<head>
	<title>First PHP</title>
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
          	<label>Email: </label><input type="email" name="mail" required=""><br>
          	<label>Password</label><input type="password" name="pwd" required="">
          	<label>Confirm Password: </label><input type="password" name="cpwd" required=""><br>
          	<input type="submit" value="Submit">
          </fieldset>

	    </form>

</body>
</html>