<?php 
$host="localhost";
$db="fp";
$user="root";
$passwd="";
$pdo=new pdo('mysql:host=localhost;dbname=fp;charset=utf8',$user,$passwd);//подключение
function filter()
{
 if (isset($_POST["year"])) {
    $year=$_POST["year"];
    $yearfrst=$year."-01-01";
    $yearsec=$year."-12-31";
    global $pdo;
    $stmt=$pdo->prepare("SELECT * FROM `users` WHERE `bdate` between ? and ?");

       $stmt->execute(array( $yearfrst,$yearsec ));

       $row=$stmt->fetchAll();
    echo "<table><tr><th>Id</th><th>first_name</th><th>last_name</th><th>bdate</th></tr>";
 foreach ($row as $row1) {
    
         $rows = count($row1)/2;

         echo "</tr>";
        for ($i=0; $i < $rows; ++$i) { 
            echo "<td>$row1[$i]</td>";
        }
    }
    echo "</table>";
   }

}
?>