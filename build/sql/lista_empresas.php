<?php
    
    function obtenerEmpresas(){
        require '../conexion.php';
        $stmt= $pdo->prepare("SELECT * FROM empresas ORDER BY nombre_comercial");
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);  
        $listas = "<option value=''>Seleccione Empresas</option>";
        if ($result) {
            foreach($result as $lista_empresas){
            $listas .= "<option value='".$lista_empresas['id_empresa']."'>".$lista_empresas['nombre_comercial']."</option>";
            }//fin for
            return $listas;
        }
    }

    echo obtenerEmpresas();
?>  