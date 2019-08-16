<?php


//require("auth.php");
      readfile("navigation.tmp.html");
$pwd="";
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

   if(!(isset($_POST["pwd"]))  || $_POST["pwd"] === ""){
    $ok = false;
   }
   else{

   	$pwd = $_POST["pwd"];
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

      $hash = password_hash($pwd, PASSWORD_DEFAULT);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = sprintf("INSERT INTO users (name,gender,color,password) VALUES ('%s','%s','%s','%s')",
  mysqli_real_escape_string($conn,$name),
  mysqli_real_escape_string($conn,$gender),
  mysqli_real_escape_string($conn,$color),
  mysqli_real_escape_string($conn,$hash));
//"INSERT INTO users (name, gender, color)
//VALUES ('', 'f', 'red')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

      }
?>

<form action="" method="post">
			
			User Name: <input type="text" name="name"  value="<?php 
            echo  htmlspecialchars($name);
			?>"><br>
			

      Password: <input type="password" name="pwd"><br>


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
				    <option value="##00f"  <?php 
                          if ($color === "#00f") {
                          	# code...
                          	echo "selected";
                          }
				    ?>>Blue</option>
			</select><br>

		      
			<input type="submit" value="Submit" name="submit">
		</form>