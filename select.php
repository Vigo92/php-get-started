<!DOCTYPE html>
<html>
<head>
	<title>PHP</title>
</head>
<body>

	<ul>

		<?php
require("auth.php");

      readfile("navigation.tmp.html");

		$conn = new mysqli("localhost","root","","php");

         $sql = "select id, name, gender, color from users";

         
         $result = $conn -> query($sql);

         


         foreach ($result as $row) {

         	printf("<li><span style='color:%s;'>%s(%s)<a href='update.php?id=%s'>Edit</a>
               <a href='delete.php?id=%s'>Delete</a></span></li>",
               htmlspecialchars($row['color']),
         		htmlspecialchars($row["name"]),
               htmlspecialchars($row["gender"]),
         		htmlspecialchars($row["id"]),
               htmlspecialchars($row["id"]));
         	# code...
         }
     
     

         $conn -> close();
		?>
	</ul>

</body>
</html>