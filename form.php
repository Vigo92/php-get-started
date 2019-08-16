
	<!DOCTYPE html>
	<html>
	<head>
		<title>PHP</title>
	</head>
	<body>


<?php
   

      

$name="";
$pwd="";
$gender="";
$color="";
$languages = array();
$comment = "";
$tc="";


$ok = true;
   if (!(isset($_POST["name"])) || $_POST["name"] ==="") {

   	$ok = false;
   	# code...
   }
   else{

   	$name = $_POST["name"];
   }

   if (!isset($_POST["pwd"]) || $_POST["pwd"] === "") {
   	# code...
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

   if (!isset($_POST["languages"]) || count($_POST["languages"]) === 0 || (is_array($_POST["languages"])) === false) {

   	$ok = false;
   	# code...
   }
   else{

   	$languages = $_POST["languages"];
   }


   if (!isset($_POST["tc"]) || $_POST["tc"] ==="") {

   	$ok = false;
   	# code...
   }
   else{
   	$tc = $_POST["tc"];
   }




if ($ok) {
	# code...


     if (isset($_POST["submit"])) {


     	printf("User Name: %s <br>
     		    Password: %s <br>
     		    Gender: %s <br>
     		    Color: %s <br>
     		    Languages: %s<br>
     		    Comment: %s <br>
     		    T&amp;C: %s.", htmlspecialchars($name),htmlspecialchars($pwd),
     		    htmlspecialchars($gender),
     		    htmlspecialchars($color),
     		    htmlspecialchars(implode(" ", $languages)),
     		    htmlspecialchars($comment),
     		    htmlspecialchars($tc));
     	# code...

     	/* htmlspecialchars($_POST["name"]),htmlspecialchars($_POST["pwd"]),
     		    htmlspecialchars($_POST["gender"]),
     		    htmlspecialchars($_POST["color"]),
     		    htmlspecialchars(implode(" ", $_POST["languages"])),
     		    htmlspecialchars($_POST["comment"]),
     		    htmlspecialchars($_POST["tc"]));*/
     }
 }

?>
		<form action="" method="post">
			
			User Name: <input type="text" name="name"  value="<?php 
            echo  htmlspecialchars($name);
			?>"><br>
			Password: <input type="password" name="pwd" value="<?php
             echo  htmlspecialchars($pwd);
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
				    <option value="##00f"  <?php 
                          if ($color === "#00f") {
                          	# code...
                          	echo "selected";
                          }
				    ?>>Blue</option>
			</select><br>

			Language: <select name="languages[]" multiple="2" size="3" 
			>
				<option value="" >Please select an option</option>
				<option value="en"  <?php 
                          if (in_array("en", $languages)) {
                          	# code...
                          	echo "selected";
                          }
				    ?>>English</option>
				<option value="esp"    <?php 
                          if (in_array("esp", $languages)) {
                          	# code...
                          	echo "selected";
                          }
				    ?>>Spanish</option>
				<option value="fr"    <?php 
                          if (in_array("fr", $languages)) {
                          	# code...
                          	echo "selected";
                          }
				    ?>>French</option>
			</select><br>

			Comment: <textarea name="comment" value="<?php 
               echo  htmlspecialchars($comment); ?>
			"></textarea><br>

			<input type="checkbox" name="tc" value="ok"
			<?php 
			if ($tc === "ok") {
			 	# code...
			 	echo "checked";
			 } 
			?>/>I accept the Terms and Condition<br>

			<input type="submit" value="Submit" name="submit">
		</form>
	
	</body>
	</html>
