<?php
    
    function obtenerOficinas(){
        require '../conexion.php';
        $stmt= $pdo->prepare("SELECT * FROM oficinas ORDER BY nombre");
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);  
        $listas = "<option value=''>Seleccione Oficina</option>";
        if ($result) {
            foreach($result as $lista_oficinas){
            $listas .= "<option value='".$lista_oficinas['id_oficina']."'>".$lista_oficinas['nombre']."</option>";
            }//fin for
            return $listas;
        }
    }

    echo obtenerOficinas();
?>  