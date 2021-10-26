<?php
require './conexion/conexion.php';
class intermedio extends conexion{
    private $stmt;
    private $consulta;
    function __construct(){
        parent::__construct();
    }
    function setData($nombre,$precio){
        $this->consulta="insert into producto(nombre,precio) values(:nombre,:precio)";
        $this->stmt=$this->conexion->prepare($this->consulta);
        if($this->stmt->execute(array(':nombre'=>$nombre,':precio'=>$precio))){
            echo "<script>alert('se guardaron los datos');window.location='./index.php'</script>";
            
        }
        else{
            echo "error";
        }
    }
    function getData(){
        $this->consulta="select * from producto";
        $this->stmt=$this->conexion->prepare($this->consulta);
        if($this->stmt->execute()){
        
            $data=[];
            while($row=$this->stmt->fetch(PDO::FETCH_ASSOC)){
                $data[]=$row;
            }
            return $data;
        }

    }
    function deleteData($elimininar){
        
        $this->consulta="
        delete from producto where id=$elimininar;
        alter table producto auto_increment=0;
        set @numero=0;
        update producto set id=@numero:=@numero+1;";
        $this->stmt=$this->conexion->prepare($this->consulta);
        
        if($this->stmt->execute()){
            
                echo "<script>alert('el dato se borro');window.location='./'</script>";
            
            
        }

    }
    function getOneData($id){
        $this->consulta="select * from producto where id=:id";
        $this->stmt=$this->conexion->prepare($this->consulta);
        $this->stmt->execute(array(":id"=>$id));
        $resultado=$this->stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado;
    }
    function updateData($nombre,$precio,$id){
        $this->consulta="update producto set nombre=:nombre,precio=:precio where id=:id";
        $this->stmt=$this->conexion->prepare($this->consulta); 
        if($this->stmt->execute(array(":nombre"=>$nombre,":precio"=>$precio,":id"=>$id))){
            echo "<script>alert('se guardaron los datos');window.location='./'</script>";
        }
    }   


}
?>