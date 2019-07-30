<?php
    
    
    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="add"){
        $msj="Error";
        
        function obtenerResultado(){
          include ("../conexion.php");
          $razon_social=$_POST["razon_social"];
          $nombre_comercial=$_POST["nombre_comercial"];
          $nit=$_POST["nit"];
          $numero_patronal=$_POST["numero_patronal"];
          $numero_contribuyente=$_POST["numero_contribuyente"];
          $descrip_gral_act_econo=$_POST["descrip_gral_act_econo"];
          $descrip_espec_act_econo=$_POST["descrip_espec_act_econo"];
          $total_empleados=$_POST["total_empleados"];
          $direccion=$_POST["direccion"];
          $zona=$_POST["zona"];
          $telefono=$_POST["telefono"];
          $correo=$_POST["correo"];
          $usuario=1;
          $oficina=1;
          $estado="activo";

          date_default_timezone_set('America/El_Salvador');
        
          $fecha_ingreso= date('Y-m-d');
          
          $stmt=$pdo->prepare("INSERT INTO empresas (razon_social, nombre_comercial, nit, numero_patronal, numero_contribuyente, descrip_gral_act_econo, descrip_espec_act_econo, total_empleados, direccion, zona, telefono, email, fecha_ingreso, estado, id_usuario, id_oficna) 
          VALUES (:razon_social,:nombre_comercial,:nit,:numero_patronal,:numero_contribuyente,:descrip_gral_act_econo,:descrip_espec_act_econo,:total_empleados,:direccion,:zona,:telefono,:email,:fecha_ingreso,:estado,:usuario,:oficina)");
          $stmt->bindParam(":razon_social",$razon_social,PDO::PARAM_STR);
          $stmt->bindParam(":nombre_comercial",$nombre_comercial,PDO::PARAM_STR);
          $stmt->bindParam(":nit",$nit,PDO::PARAM_STR);
          $stmt->bindParam(":numero_patronal",$numero_patronal,PDO::PARAM_STR);
          $stmt->bindParam(":numero_contribuyente",$numero_contribuyente,PDO::PARAM_STR);
          $stmt->bindParam(":descrip_gral_act_econo",$descrip_gral_act_econo,PDO::PARAM_STR);
          $stmt->bindParam(":descrip_espec_act_econo",$descrip_espec_act_econo,PDO::PARAM_STR);
          $stmt->bindParam(":total_empleados",$total_empleados,PDO::PARAM_INT);
          $stmt->bindParam(":direccion",$direccion,PDO::PARAM_STR);
          $stmt->bindParam(":zona",$zona,PDO::PARAM_STR);
          $stmt->bindParam(":telefono",$telefono,PDO::PARAM_STR);
          $stmt->bindParam(":email",$correo,PDO::PARAM_STR);
          $stmt->bindParam(":fecha_ingreso",$fecha_ingreso,PDO::PARAM_STR);
          $stmt->bindParam(":estado",$estado,PDO::PARAM_STR);
          $stmt->bindParam(":usuario",$usuario,PDO::PARAM_INT);
          $stmt->bindParam(":oficina",$oficina,PDO::PARAM_INT);
          

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
          $id_empresa=$_POST["actualizar"];
          $razon_social=$_POST["razon_social"];
          $nombre_comercial=$_POST["nombre_comercial"];
          $nit=$_POST["nit"];
          $numero_patronal=$_POST["numero_patronal"];
          $numero_contribuyente=$_POST["numero_contribuyente"];
          $descrip_gral_act_econo=$_POST["descrip_gral_act_econo"];
          $descrip_espec_act_econo=$_POST["descrip_espec_act_econo"];
          $total_empleados=$_POST["total_empleados"];
          $direccion=$_POST["direccion"];
          $zona=$_POST["zona"];
          $telefono=$_POST["telefono"];
          $correo=$_POST["correo"];
        
          $stmt=$pdo->prepare("UPDATE empresas SET razon_social=:razon_social,nombre_comercial=:nombre_comercial,nit=:nit,numero_patronal=:numero_patronal,numero_contribuyente=:numero_contribuyente, descrip_gral_act_econo=:descrip_gral_act_econo,descrip_espec_act_econo=:descrip_espec_act_econo,total_empleados=:total_empleados,direccion=:direccion,zona=:zona,telefono=:telefono,email=:email WHERE id_empresa=:id_empresa");
          $stmt->bindParam(":razon_social",$razon_social,PDO::PARAM_STR);
          $stmt->bindParam(":nombre_comercial",$nombre_comercial,PDO::PARAM_STR);
          $stmt->bindParam(":nit",$nit,PDO::PARAM_STR);
          $stmt->bindParam(":numero_patronal",$numero_patronal,PDO::PARAM_STR);
          $stmt->bindParam(":numero_contribuyente",$numero_contribuyente,PDO::PARAM_STR);
          $stmt->bindParam(":descrip_gral_act_econo",$descrip_gral_act_econo,PDO::PARAM_STR);
          $stmt->bindParam(":descrip_espec_act_econo",$descrip_espec_act_econo,PDO::PARAM_STR);
          $stmt->bindParam(":total_empleados",$total_empleados,PDO::PARAM_INT);
          $stmt->bindParam(":direccion",$direccion,PDO::PARAM_STR);
          $stmt->bindParam(":zona",$zona,PDO::PARAM_STR);
          $stmt->bindParam(":telefono",$telefono,PDO::PARAM_STR);
          $stmt->bindParam(":email",$correo,PDO::PARAM_STR);
          $stmt->bindParam(":id_empresa",$id_empresa,PDO::PARAM_INT);

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
          $id_empresa=$_POST["id"];
      
          $stmt=$pdo->prepare("DELETE FROM empresas WHERE id_empresa=:id_empresa");
          $stmt->bindParam(":id_empresa",$id_empresa,PDO::PARAM_INT);

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