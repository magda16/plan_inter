<?php
  if(isset($_REQUEST["id"])){

        require "../conexion.php"; 

        $id_oficina=$_REQUEST["id"];

        $stmt= $pdo->prepare("SELECT * FROM oficinas WHERE id_oficina =:id_oficina");
        $stmt->bindParam(":id_oficina",$id_oficina,PDO::PARAM_INT);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
        
        
        $datos = array(
          0 => $result["nombre"],
          1 => $result["direccion"],
          2 => $result["responsable"],
          3 => $result["telefono"],
          4 => $result["email"],
          
        );

        echo json_encode($datos);
        
}        
?>