<?php 
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
$host="localhost";
$db="fp";
$user="root";
$passwd="";
$pdo=new pdo('mysql:host=localhost;dbname=fp;charset=utf8',$user,$passwd);
$content = file_get_contents('php://input');
$cont=json_decode($content,1);
    $year=$cont['data'];
    $yearfrst=$year."-01-01";
    $yearsec=$year."-12-31";
    
    global $pdo;
    $stmt=$pdo->prepare("SELECT * FROM `users` WHERE `bdate` between ? and ?");

       $stmt->execute(array( $yearfrst,$yearsec ));

       $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
       header('Content-Type: application/json'); 
         echo json_encode($row, JSON_PRETTY_PRINT);
  

?>