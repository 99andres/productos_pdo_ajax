<?php 
class conexion{
    public $conexion;
    function conexion(){
        $this->conexion=new PDO('mysql:host=localhost;dbname=productos','root','ColomSop1.1.3*_');
        if($this->conexion){
            return $this->conexion;
            // echo "correcto";

        }

    }
}
?>