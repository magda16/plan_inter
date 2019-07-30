<?php

    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="add"){
        $msj="Error";
        
        function obtenerResultado(){
          include ("../conexion.php");
          
          $nombre=$_POST["nombre"];
          $apellido=$_POST["apellido"];
          $dui=$_POST["dui"];
          $nit=$_POST["nit"];
          $usuario=$_POST["usuario"];
          $clave=$_POST["clave"];
          $correo=$_POST["correo"];
          $nivel=$_POST["nivel"];
          $respuesta_secreta="";
          
          $id_empresa=0;
          if($_POST["empresa"]!=""){
            $id_empresa=$_POST["empresa"];
          }
          
          $id_oficina=$_POST["oficina"];
          $estado="activo";

               
          $stmt=$pdo->prepare("INSERT INTO usuarios (nombre, apellido, dui, nit, usuario, clave, correo, id_oficina, estado, nivel, id_empresa, respuesta_secreta) VALUES (:nombre, :apellido, :dui, :nit, :usuario, :clave, :correo, :id_oficina, :estado, :nivel, :id_empresa, :respuesta_secreta)");
          $stmt->bindParam(":nombre",$nombre,PDO::PARAM_STR);
          $stmt->bindParam(":apellido",$apellido,PDO::PARAM_STR);
          $stmt->bindParam(":dui",$dui,PDO::PARAM_STR);
          $stmt->bindParam(":nit",$nit,PDO::PARAM_STR);
          $stmt->bindParam(":usuario",$usuario,PDO::PARAM_STR);
          $stmt->bindParam(":clave",$clave,PDO::PARAM_STR);
          $stmt->bindParam(":correo",$correo,PDO::PARAM_STR);
          $stmt->bindParam(":id_oficina",$id_oficina,PDO::PARAM_INT);
          $stmt->bindParam(":estado",$estado,PDO::PARAM_STR);
          $stmt->bindParam(":nivel",$nivel,PDO::PARAM_STR);
          $stmt->bindParam(":respuesta_secreta",$respuesta_secreta,PDO::PARAM_STR);
          $stmt->bindParam(":id_empresa",$id_empresa,PDO::PARAM_INT);

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
        $id_usuario=$_POST["actualizar"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $dui=$_POST["dui"];
        $nit=$_POST["nit"];
        $usuario=$_POST["usuario"];
        $estado=$_POST["estado"];
        $clave=$_POST["clave"];
        $correo=$_POST["correo"];
        $nivel=$_POST["nivel"];
        
        if($_POST["oficina"]!=""){
          $id_oficina=$_POST["oficina"];
        }else{
          $id_oficina=$_POST["id_oficina"];
        }

        if($_POST["empresa"]!=""){
          $id_empresa=$_POST["empresa"];
        }else{
          $id_empresa=$_POST["id_empresa"];
        }
        
          $stmt=$pdo->prepare("UPDATE usuarios SET nombre=:nombre,apellido=:apellido,dui=:dui,nit=:nit,usuario=:usuario,clave=:clave,correo=:correo,id_oficina=:id_oficina,estado=:estado,nivel=:nivel,id_empresa=:id_empresa WHERE id_usuario=:id_usuario");
          $stmt->bindParam(":nombre",$nombre,PDO::PARAM_STR);
          $stmt->bindParam(":apellido",$apellido,PDO::PARAM_STR);
          $stmt->bindParam(":dui",$dui,PDO::PARAM_STR);
          $stmt->bindParam(":nit",$nit,PDO::PARAM_STR);
          $stmt->bindParam(":usuario",$usuario,PDO::PARAM_STR);
          $stmt->bindParam(":clave",$clave,PDO::PARAM_STR);
          $stmt->bindParam(":correo",$correo,PDO::PARAM_STR);
          $stmt->bindParam(":id_oficina",$id_oficina,PDO::PARAM_INT);
          $stmt->bindParam(":estado",$estado,PDO::PARAM_STR);
          $stmt->bindParam(":nivel",$nivel,PDO::PARAM_STR);
          $stmt->bindParam(":id_empresa",$id_empresa,PDO::PARAM_INT);
          $stmt->bindParam(":id_usuario",$id_usuario,PDO::PARAM_INT);

          if($stmt->execute()){
            return "Exito";
          }else{
            return "Error";
          }
          $stmt->close();
      
        return $msj;
      }
  }else if($bandera=="edit_clave"){
    $msj="Error";
  
    function obtenerResultado(){
      include ("../conexion.php");
      $id_usuario=$_POST["actualizar"];
      $clave=$_POST["clave"];
      $nueva_clave=$_POST["nueva_clave"];
      
      
      
        $stmt=$pdo->prepare("UPDATE usuarios SET clave=:nueva_clave WHERE clave=:clave AND id_usuario=:id_usuario");
        $stmt->bindParam(":clave",$clave,PDO::PARAM_STR);
        $stmt->bindParam(":nueva_clave",$nueva_clave,PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario",$id_usuario,PDO::PARAM_INT);
        $stmt->execute();
        $fila=$stmt->rowCount();
        if($fila > 0){
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
          $id_usuario=$_POST["id"];
      
          $stmt=$pdo->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");
          $stmt->bindParam(":id_usuario",$id_usuario,PDO::PARAM_INT);

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