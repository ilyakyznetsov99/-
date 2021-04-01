<?php 
$host="localhost";
$db="fp";
$user="root";
$passwd="";
$pdo=new pdo('mysql:host=localhost;dbname=fp;charset=utf8',$user,$passwd);//подключение
function filter()
{
 if (isset($_POST["year"])) {

    $query ="SELECT * FROM `users` WHERE `bdate` between '".$_POST["year"]."-01-01' and '".$_POST["year"]."-12-31' ";
    //var_dump($query);
    global $pdo;
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
   }

}
?>