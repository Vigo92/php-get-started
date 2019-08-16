<?php

      session_start();
             readfile("navigation.tmp.html");
      $message = "";
       if (isset($_POST["name"]) && isset($_POST["pwd"])) {

            // $name = $_POST["name"];
             //

             $conn = new mysqli("localhost","root","","php");
                       //echo "string";
             $sql = sprintf("select * from users where name = '%s'",
                  mysqli_real_escape_string($conn,$_POST["name"]));

             $result = $conn -> query($sql);
             $row = mysqli_fetch_assoc($result);
             if($row){
                $isAdmin = $row["isAdmin"];
                $hash = $row["password"];
                
                if(password_verify($_POST["pwd"], $hash)){
                	$message = "Login Successfull";

                	$_SESSION["user"] = $row["name"];
                	$_SESSION["isAdmin"] = $isAdmin;
                }
                else{
                	$message = "Login failed" ;

             }
         }
             else{
             	   $message = "Login failed";
             }
                $conn -> close();
                  }
       else{
      // 	echo "Nothing";
       }
?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<?php
       
      

       echo "<p>$message</p>";
       	# code...
     

?>
	<form method="post" action="">
		
		Name: <input type="text" name="name"><br>
		Password: <input type="password" name="pwd"><br>
		<input type="submit" value="Login">
	</form>

</body>
</html>