<?php 

session_cache_limiter('nocache');
session_start();

$name= $_GET['nombre'];
$age= $_GET['edad'];

//echo htmlspecialchars($name); 
//echo (int)$age; 
$myArr = array();
$myArr[] = array("name"=>$name, "age"=>$age);


$myJSON = json_encode($myArr);
echo $myJSON;

$file = fopen('data1.txt', 'w');
fwrite($file, $myJSON);
fclose($file);

?>