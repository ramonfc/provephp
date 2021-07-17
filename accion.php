<?php 

session_cache_limiter('nocache');
session_start();

function addToFile($archivo, $datum){ 
    $myJSON = json_encode($datum);
    $file = fopen($archivo, 'a+');
    fwrite($file, $myJSON."\n");
    fclose($file); 
}


$name= $_GET['nombre'];
$age= $_GET['edad'];

$fichero = 'data1.txt';

$myArr= array("name"=>$name, "age"=>$age);
addToFile($fichero, $myArr);



$d= array();
$datos = file($fichero);
foreach($datos as $dato){
    $d[]= json_decode($dato);
}
echo json_encode($d);
?>