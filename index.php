<?php
include 'DB_moves.php';
//var_dump($link);
	
	
?>
<html lang="en">
<head>
	
</head>
<body>
	<?php
	$query ="SELECT * FROM users";
	$result=query($query);
	 $rows = mysqli_num_rows($result); 
    echo "<table><tr><th>Id</th><th>first_name</th><th>last_name</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
 ?>
</body>
</html>