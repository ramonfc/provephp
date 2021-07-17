<?php 

session_cache_limiter('nocache');
session_start();

$name= $_GET['nombre'];
$age= $_GET['edad'];

//echo htmlspecialchars($name); 
//echo (int)$age; 

//$myArr = array();
//$myArr[] = array("name"=>$name, "age"=>$age);

$myArr= array("name"=>$name, "age"=>$age);

$myJSON = json_encode($myArr);
//echo $myJSON;

$file = fopen('data1.txt', 'a+');
fwrite($file, $myJSON."\n");
fclose($file); 
/*
$fichero = 'data1.txt';
$cadena = implode(",",$myArr);

// Abre el fichero para obtener el contenido existente
$actual = file_get_contents($fichero);
// Añade una nueva persona al fichero
$actual .= $myArr;
// Escribe el contenido al fichero
file_put_contents($fichero, $actual);
*/

$fichero = 'data1.txt';
$d= array();
$datos = file($fichero);
foreach($datos as $dato){
    //$line= array($dato);
    $d[]= json_decode($dato);
}
echo json_encode($d);
?>