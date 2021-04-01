<?php
include 'DB_moves.php';
//var_dump($link);
	
	
?>
<html lang="en">
<head>
	
</head>
<body>
	<?php

	$query ="SELECT * FROM `users` WHERE `bdate` >= '1990-08-08' ";
	$result=$pdo->query($query);

	
    echo "<table><tr><th>Id</th><th>first_name</th><th>last_name</th><th>bdate</th></tr>";
    while ($row=$result->fetch()) {
    	 $rows = count($row)/2;
    	 echo "</tr>";
    	for ($i=0; $i < $rows; ++$i) { 
    		echo "<td>$row[$i]</td>";
    	}
    }
   
    echo "</table>";
 ?>
</body>
</html>