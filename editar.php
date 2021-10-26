<?php 
header('Access-Control-Allow-Origin: *');
require 'sc/intermedio.php';
// 


$valor=json_decode(file_get_contents('php://input'));
if($valor->valor){
    $objeto=new intermedio();
    $resulado=$objeto->getOneData($valor->valor);
    echo json_encode( $resulado);
}


?>
