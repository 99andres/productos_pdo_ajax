<?php 
require 'sc/intermedio.php';
if(isset($_POST['btnGuardar'])){
    $objeto=new intermedio();
    $objeto->setData($_POST['nombre'],$_POST['precio']);

}
else if(isset($_GET['eliminar'])){
    $objeto=new intermedio();
    $objeto->deleteData($_GET['eliminar']);
}
else if(isset($_POST['btnEditar'])){
    $objeto=new intermedio();
    $objeto->updateData($_POST['nombre'],$_POST['precio'],$_POST['id']);
    
}
?>