<?php

require("auth.php");
if(isset($_GET["id"]) && ctype_digit($_GET["id"])){

	$id = $_GET["id"];

}
else{ 

	header("location:select.php");
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


      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "php"; 


$name="";
$gender="";
$color="";


$ok = true;
   if (!(isset($_POST["name"])) || $_POST["name"] ==="") {

   	$ok = false;
   	# code...
   }
   else{

   	$name = $_POST["name"];
   } 


   if (!isset($_POST["color"]) || $_POST["color"] ===""){

   	$ok = false;
   	# code...
   }
   else{
   	$color = $_POST["color"];
   }

   
   if (!isset($_POST["gender"]) || $_POST["gender"] ==="") {

   	$ok = false;
   	# code...
   }
   else{
   	$gender = $_POST["gender"];
   }




if ($ok) {
	# code...
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "php";
      $conn = new mysqli($servername,$username,$password,$dbname);
      $sql = sprintf("update users set name= '%s', gender= '%s', color='%s' where id = '%s'",
                        mysqli_real_escape_string($conn,$name),
                        mysqli_real_escape_string($conn,$gender),
                        mysqli_real_escape_string($conn,$color),
                        $id
  );

      $conn ->query($sql);
      echo "User Updated, name is".$name." gender is: ".$gender."color is: ".$color;
      $conn -> close();

}
else{
           $conn = new mysqli($servername,$username,$password,$dbname);
           $sql = sprintf("select * from users  where id = %s",$id);
           $result = $conn -> query($sql);

           foreach ($result as $row) {
           	$name = $row["name"];
           	$gender = $row["gender"];
           	$color = $row["color"];
           	# code...

          $conn -> close();
           }
       }



?>

<form action="" method="post">
			
			User Name: <input type="text" name="name"  value="<?php 
            echo  htmlspecialchars($name);
			?>"><br>
			
			Gender: <input type="radio" name="gender" value="m" <?php 
                        if ( $gender === "m") {
                        	# code...
                      echo "checked";
                        }
			?>>Male
			        <input type="radio" name="gender" value="f" <?php 
                        if ( $gender === "f") {
                        	# code...
                      echo "checked";
                        }
			?>>Female<br>

			Favorite Color: <select name="color">
				    <option value="#f00"<?php 
                          if ($color === "#f00") {
                          	# code...
                          	echo "selected";
                          }
				    ?>>Red</option>
				    <option value="#0f0" <?php 
                          if ($color === "#0f0") {
                          	# code...
                          	echo "selected";
                          }
				    ?>>Green</option>
				    <option value="#00f"  <?php 
                          if ($color === "#00f") {
                          	# code...
                          	echo "selected";
                          }
				    ?>>Blue</option>
			</select><br>

		      
			<input type="submit" value="Submit" name="submit">
		</form>
</body>
</html>