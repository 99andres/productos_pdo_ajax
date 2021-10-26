<?php 
require_once 'sc/intermedio.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="contenedor_principal">
        <div class="contenedor_principal-form">
            <form action="valida.php" method="POST">
                <input type="text" placeholder="ingrese el nombre del producto" name="nombre" class="principal">
                <br>
                <input type="text" placeholder="ingrese el precio" name="precio" class="principal">
                <br>
                <input type="submit" value="guardar" name="btnGuardar">
                
            </form>

        </div>
        
        <div class="resultado">
            <div>
            <?php 
            $objeto=new intermedio();
            $resultado=$objeto->getData();
            ?>
            <table>
                <tbody>
                    
                
                <?php 
                foreach($resultado as $item){
                ?>
                <tr class="filas">
                    <td><?php echo $item['nombre']?></td>
                    <td><?php echo $item['precio']?></td>
                    <td><a href="valida.php?eliminar=<?php echo $item['id'] ?>">eliminar</a></td>
                    <td><a class="editar" href="" data-id="<?php echo $item['id'] ?>">editar</a></td>


                </tr>
                <?php }?>    
                </tbody>                        
            </table>
            </div>
        </div>
    </div>
    
<div id="tvesModal" class="modalContainer">
 <div class="modal-content">
 <span class="close">×</span> <h2>Modal</h2>
 <form method="POST" action="valida.php">
    <input type="text" name="nombre" id="nombre">                    
    <br>
    <input type="text" name="precio" id="precio">
    <br>
    <input type="hidden" value="" id="parametro" name="id">
    <input type="submit" value="guardar" name="btnEditar">

 </form> 
 </div>
 </div>
 <script src="index.js" type="module"></script> 
</body>
</html>