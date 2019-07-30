<?php
    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="aplicacion_d"){
        $msj="Error";
        
        function obtenerResultado(){
          include ("../conexion.php");
          $id_oferta=$_POST["id_oferta"];
          $id_demandante=$_POST["id_demandante"];
          $estado="aplicacion";
         
          date_default_timezone_set('America/El_Salvador');
        
          $fecha_ingreso= date('Y-m-d');
        
          $stmt=$pdo->prepare("INSERT INTO aplicaciones (id_demandante, id_oferta, fecha_ingreso, estado) VALUES (:id_demandante, :id_oferta, :fecha_ingreso, :estado)");
          $stmt->bindParam(":id_demandante",$id_demandante,PDO::PARAM_INT);
          $stmt->bindParam(":id_oferta",$id_oferta,PDO::PARAM_STR);
          $stmt->bindParam(":fecha_ingreso",$fecha_ingreso,PDO::PARAM_STR);
          $stmt->bindParam(":estado",$estado,PDO::PARAM_STR);
         
          if($stmt->execute()){
            return "Exito";
          }else{
            return "Error";
          }
          $stmt->close();
        
          return $msj;
        }
    }else if($bandera=="seleccion_d"){
      $msj="Error";
    
      function obtenerResultado(){
        include ("../conexion.php");
          $id_oferta=$_POST["id_oferta"];
          $id_demandante=$_POST["id_demandante"];
          $estado="seleccion";

        
          $stmt=$pdo->prepare("UPDATE aplicaciones SET estado=:estado WHERE id_oferta=:id_oferta AND id_demandante=:id_demandante");
          $stmt->bindParam(":estado",$estado,PDO::PARAM_STR);
          $stmt->bindParam(":id_oferta",$id_oferta,PDO::PARAM_STR);
          $stmt->bindParam(":id_demandante",$id_demandante,PDO::PARAM_INT);
          
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