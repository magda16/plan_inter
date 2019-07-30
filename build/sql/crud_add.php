<?php
    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="add"){
        $msj="Error";
        
        function obtenerResultado(){
          include ("../conexion.php");
          $nombre=$_POST["nombre"];
          $departamento=$_POST["departamento"];/*
          $responsable=$_POST["responsable"];
          $telefono=$_POST["telefono"];
          $correo=$_POST["correo"];*/

        
          $stmt=$pdo->prepare("INSERT INTO municipios (nombre,id_departamento)  VALUES (:nombre, :departamento)");
          $stmt->bindParam(":nombre",$nombre,PDO::PARAM_STR);
          $stmt->bindParam(":departamento",$departamento,PDO::PARAM_INT);
         /* $stmt->bindParam(":responsable",$responsable,PDO::PARAM_STR);
          $stmt->bindParam(":telefono",$telefono,PDO::PARAM_STR);
          $stmt->bindParam(":email",$correo,PDO::PARAM_STR);*/

          if($stmt->execute()){
            return "Exito";
          }else{
            return "Error";
          }
          $stmt->close();
        
          return $msj;
        }
    }else if($bandera=="edit"){
      $msj="Error";
    
      function obtenerResultado(){
        include ("../conexion.php");
          $id_oficina=$_POST["actualizar"];
          $nombre=$_POST["nombre"];
          /*$direccion=$_POST["direccion"];
          $responsable=$_POST["responsable"];
          $telefono=$_POST["telefono"];
          $correo=$_POST["correo"];*/

        
          $stmt=$pdo->prepare("UPDATE oficinas SET nombre=:nombre,direccion=:direccion,responsable=:responsable,telefono=:telefono,email=:email WHERE id_oficina=:id_oficina");
          $stmt->bindParam(":nombre",$nombre,PDO::PARAM_STR);
         /* $stmt->bindParam(":direccion",$direccion,PDO::PARAM_STR);
          $stmt->bindParam(":responsable",$responsable,PDO::PARAM_STR);
          $stmt->bindParam(":telefono",$telefono,PDO::PARAM_STR);
          $stmt->bindParam(":email",$correo,PDO::PARAM_STR);
          $stmt->bindParam(":id_oficina",$id_oficina,PDO::PARAM_INT);*/

          if($stmt->execute()){
            return "Exito";
          }else{
            return "Error";
          }
          $stmt->close();
      
        return $msj;
      }
  }else if($bandera=="delete"){
      $msj="Error";
    
      function obtenerResultado(){
          include ("../conexion.php");
          $id_oficina=$_POST["id"];
      
          $stmt=$pdo->prepare("DELETE FROM oficinas WHERE id_oficina=:id_oficina");
          $stmt->bindParam(":id_oficina",$id_oficina,PDO::PARAM_INT);

          if($stmt->execute()){
            return "Exito";
          }else{
            return "Error";
          }
          $stmt->close();
      
        return $msj;
      }
    }

  }
 
    echo obtenerResultado();
?>