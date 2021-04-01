<?php 
$host="localhost";
$db="fp";
$user="root";
$passwd="";
$link= mysqli_connect($host,$user,$passwd,$db);
function query($query){
	global $link;
	$result = mysqli_query($link, $query) ;
	return $result;
}
?>