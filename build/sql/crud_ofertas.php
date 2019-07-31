<?php
    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="add"){
        $msj="Error";
        
        function obtenerResultado(){
          include ("../conexion.php");
          
          $nombre_puesto=$_POST["nombre_puesto"];
          $numero_plazas=$_POST["numero_plazas"];
          $salario=$_POST["salario"];
          $forma_pago=$_POST["forma_pago"];
          if($_POST["otro_forma_pago"]!=""){
            $forma_pago=$_POST["otro_forma_pago"];
          }
          $periodo_pago=$_POST["periodo_pago"];
          if($_POST["otro_periodo_pago"]!=""){
            $periodo_pago=$_POST["otro_periodo_pago"];
          }
          $forma_contratacion=$_POST["forma_contratacion"];
    
          $prestaciones=json_encode($_POST["prestaciones"]);
          
          $jornada_trabajo=$_POST["jornada_trabajo"];
          $horario_trabajo=$_POST["horario_trabajo"];
          $periodo_prueba=$_POST["periodo_prueba"];
          $discapacidad=$_POST["discapacidad"];
          $descrip_puesto=$_POST["descrip_puesto"];
          $funciones=$_POST["funciones"];
          $experiencia_laboral=$_POST["experiencia_laboral"];
          $rango_edad=$_POST["rango_edad"];
          $genero=$_POST["genero"];
          $estado_civil=$_POST["estado_familiar"];
          $caracteristicas_personales=$_POST["caracteristicas_personales"];
          $documentos_requeridos=json_encode($_POST["documentos_requeridos"]);
          $otros_requerimientos=json_encode($_POST["otros_requerimientos"]);
          $clase_vehiculo="";
          if($_POST["clase_vehiculo"]!=""){
            $clase_vehiculo=json_encode($_POST["clase_vehiculo"]);
          }
          $anio_vehiculo="";
          if($_POST["anio_vehiculo"]!=""){
            $anio_vehiculo=json_encode($_POST["anio_vehiculo"]);
          }

          $clase_licencia="";
          if($_POST["clase_licencia"]!=""){
            $clase_licencia=json_encode($_POST["clase_licencia"]);
          }

          $disponibilidad=json_encode($_POST["disponibilidad"]);

          $incorporacion=$_POST["incorporacion"];
          if($_POST["otra_incorporacion"]!=""){
            $incorporacion=$_POST["otra_incorporacion"];
          }

          $ult_gra_apr=$_POST["ult_gra_apr"];
          $idioma=$_POST["idioma"];

          $conocimientos=$_POST["conocimientos"];
          $hab_des=$_POST["hab_des"];


          $id_empresa=$_POST["empresa"];

          $id_usuario=$_POST["id_usuario"];

          date_default_timezone_set('America/El_Salvador');
        
          $fecha_ingreso= date('Y-m-d');
          $estado="activo";

        
          $stmt=$pdo->prepare("INSERT INTO ofertas (nombre_puesto,numero_plazas,salario,forma_pago,periodo_pago,forma_contrato,prestaciones,jornada_trabajo,horario_trabajo,periodo_prueba,discapacidad,descrip_puesto,funciones,experiencia_laboral,rango_edad,sexo,estado_civil,caracteristicas_personales,documentos_requeridos,otros_requerimientos,clase_vehiculo,anio_vehiculo,clase_licencia,disponibilidad,incorporacion,ultimo_grado,idioma_extranjero,conocimientos,habilidades_destrezas,id_empresa,fecha_ingreso,estado,id_usuario) 
          VALUES (:nombre_puesto,:numero_plazas,:salario,:forma_pago,:periodo_pago,:forma_contratacion,:prestaciones,:jornada_trabajo,:horario_trabajo,:periodo_prueba,:discapacidad,:descrip_puesto,:funciones,:experiencia_laboral,:rango_edad,:genero,:estado_civil,:caracteristicas_personales,:documentos_requeridos,:otros_requerimientos,:clase_vehiculo,:anio_vehiculo,:clase_licencia,:disponibilidad,:incorporacion,:ult_gra_apr,:idioma,:conocimientos,:hab_des,:id_empresa,:fecha_ingreso,:estado,:id_usuario)");

          $stmt->bindParam(":nombre_puesto",$nombre_puesto,PDO::PARAM_STR);
          $stmt->bindParam(":numero_plazas",$numero_plazas,PDO::PARAM_INT);
          $stmt->bindParam(":salario",$salario,PDO::PARAM_STR);
          $stmt->bindParam(":forma_pago",$forma_pago,PDO::PARAM_STR);
          $stmt->bindParam(":periodo_pago",$periodo_pago,PDO::PARAM_STR);
          $stmt->bindParam(":forma_contratacion",$forma_contratacion,PDO::PARAM_STR);
          $stmt->bindParam(":prestaciones",$prestaciones,PDO::PARAM_STR);
          $stmt->bindParam(":jornada_trabajo",$jornada_trabajo,PDO::PARAM_STR);
          $stmt->bindParam(":horario_trabajo",$horario_trabajo,PDO::PARAM_STR);
          $stmt->bindParam(":periodo_prueba",$periodo_prueba,PDO::PARAM_STR);
          $stmt->bindParam(":discapacidad",$discapacidad,PDO::PARAM_STR);
          $stmt->bindParam(":descrip_puesto",$descrip_puesto,PDO::PARAM_STR);
          $stmt->bindParam(":funciones",$funciones,PDO::PARAM_STR);
          $stmt->bindParam(":experiencia_laboral",$experiencia_laboral,PDO::PARAM_STR);
          $stmt->bindParam(":rango_edad",$rango_edad,PDO::PARAM_STR);
          $stmt->bindParam(":genero",$genero,PDO::PARAM_STR);
          $stmt->bindParam(":estado_civil",$estado_civil,PDO::PARAM_STR);
          $stmt->bindParam(":caracteristicas_personales",$caracteristicas_personales,PDO::PARAM_STR);
          $stmt->bindParam(":documentos_requeridos",$documentos_requeridos,PDO::PARAM_STR);
          $stmt->bindParam(":otros_requerimientos",$otros_requerimientos,PDO::PARAM_STR);
          $stmt->bindParam(":clase_vehiculo",$clase_vehiculo,PDO::PARAM_STR);
          $stmt->bindParam(":anio_vehiculo",$anio_vehiculo,PDO::PARAM_STR);
          $stmt->bindParam(":clase_licencia",$clase_licencia,PDO::PARAM_STR);
          $stmt->bindParam(":disponibilidad",$disponibilidad,PDO::PARAM_STR);
          $stmt->bindParam(":incorporacion",$incorporacion,PDO::PARAM_STR);
          $stmt->bindParam(":ult_gra_apr",$ult_gra_apr,PDO::PARAM_STR);
          $stmt->bindParam(":idioma",$idioma,PDO::PARAM_STR);
          $stmt->bindParam(":conocimientos",$conocimientos,PDO::PARAM_STR);
          $stmt->bindParam(":hab_des",$hab_des,PDO::PARAM_STR);
          $stmt->bindParam(":id_empresa",$id_empresa,PDO::PARAM_INT);
          $stmt->bindParam(":fecha_ingreso",$fecha_ingreso,PDO::PARAM_STR);
          $stmt->bindParam(":estado",$estado,PDO::PARAM_STR);
          $stmt->bindParam(":id_usuario",$id_usuario,PDO::PARAM_INT);

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
          $id_oferta=$_POST["actualizar"];
          $nombre_puesto=$_POST["nombre_puesto"];
          $numero_plazas=$_POST["numero_plazas"];
          $salario=$_POST["salario"];
          $forma_pago=$_POST["forma_pago"];
          if($_POST["otro_forma_pago"]!=""){
            $forma_pago=$_POST["otro_forma_pago"];
          }
          $periodo_pago=$_POST["periodo_pago"];
          if($_POST["otro_periodo_pago"]!=""){
            $periodo_pago=$_POST["otro_periodo_pago"];
          }
          $forma_contratacion=$_POST["forma_contratacion"];
          $prestaciones="";
          
          if(isset($_POST["ninguna_pres"])){
            $prestaciones=json_encode($_POST["ninguna_pres"]);
          }else{
            $prestaciones=json_encode(isset($_POST["prestaciones"]));
          }

          $jornada_trabajo=$_POST["jornada_trabajo"];
          $horario_trabajo=$_POST["horario_trabajo"];
          $periodo_prueba=$_POST["periodo_prueba"];
          $discapacidad=$_POST["discapacidad"];
          $descrip_puesto=$_POST["descrip_puesto"];
          $funciones=$_POST["funciones"];
          $experiencia_laboral=$_POST["experiencia_laboral"];
          $rango_edad=$_POST["rango_edad"];
          $genero=$_POST["genero"];
          $estado_civil=$_POST["estado_familiar"];
          $caracteristicas_personales=$_POST["caracteristicas_personales"];
          $documentos_requeridos=json_encode(isset($_POST["documentos_requeridos"]));
          $otros_requerimientos=json_encode(isset($_POST["otros_requerimientos"]));
          $clase_vehiculo="";
          if($_POST["clase_vehiculo"]!=""){
            $clase_vehiculo=json_encode($_POST["clase_vehiculo"]);
          }
          $anio_vehiculo="";
          if($_POST["anio_vehiculo"]!=""){
            $anio_vehiculo=json_encode($_POST["anio_vehiculo"]);
          }

          $clase_licencia="";
          if($_POST["clase_licencia"]!=""){
            $clase_licencia=json_encode($_POST["clase_licencia"]);
          }

          $disponibilidad=json_encode(isset($_POST["disponibilidad"]));

          $incorporacion=$_POST["incorporacion"];
          if($_POST["otra_incorporacion"]!=""){
            $incorporacion=$_POST["otra_incorporacion"];
          }

          $ult_gra_apr=$_POST["ult_gra_apr"];
          $idioma=$_POST["idioma"];

          $conocimientos=$_POST["conocimientos"];
          $hab_des=$_POST["hab_des"];


          $id_empresa=$_POST["empresa"];

        
          $stmt=$pdo->prepare("UPDATE ofertas SET nombre_puesto=:nombre_puesto,numero_plazas=:numero_plazas,salario=:salario,forma_pago=:forma_pago,periodo_pago=:periodo_pago,forma_contrato=:forma_contratacion,prestaciones=:prestaciones,jornada_trabajo=:jornada_trabajo,horario_trabajo=:horario_trabajo,periodo_prueba=:periodo_prueba,discapacidad=:discapacidad,descrip_puesto=:descrip_puesto,funciones=:funciones,experiencia_laboral=:experiencia_laboral,rango_edad=:rango_edad,sexo=:genero,estado_civil=:estado_civil,caracteristicas_personales=:caracteristicas_personales,documentos_requeridos=:documentos_requeridos,otros_requerimientos=:otros_requerimientos,clase_vehiculo=:clase_vehiculo,anio_vehiculo=:anio_vehiculo,clase_licencia=:clase_licencia,disponibilidad=:disponibilidad,incorporacion=:incorporacion,ultimo_grado=:ult_gra_apr,idioma_extranjero=:idioma,conocimientos=:conocimientos,habilidades_destrezas=:hab_des,id_empresa=:id_empresa,estado=:estado WHERE id_oferta=:id_oferta");

          $stmt->bindParam(":nombre_puesto",$nombre_puesto,PDO::PARAM_STR);
          $stmt->bindParam(":numero_plazas",$numero_plazas,PDO::PARAM_INT);
          $stmt->bindParam(":salario",$salario,PDO::PARAM_STR);
          $stmt->bindParam(":forma_pago",$forma_pago,PDO::PARAM_STR);
          $stmt->bindParam(":periodo_pago",$periodo_pago,PDO::PARAM_STR);
          $stmt->bindParam(":forma_contratacion",$forma_contratacion,PDO::PARAM_STR);
          $stmt->bindParam(":prestaciones",$prestaciones,PDO::PARAM_STR);
          $stmt->bindParam(":jornada_trabajo",$jornada_trabajo,PDO::PARAM_STR);
          $stmt->bindParam(":horario_trabajo",$horario_trabajo,PDO::PARAM_STR);
          $stmt->bindParam(":periodo_prueba",$periodo_prueba,PDO::PARAM_STR);
          $stmt->bindParam(":discapacidad",$discapacidad,PDO::PARAM_STR);
          $stmt->bindParam(":descrip_puesto",$descrip_puesto,PDO::PARAM_STR);
          $stmt->bindParam(":funciones",$funciones,PDO::PARAM_STR);
          $stmt->bindParam(":experiencia_laboral",$experiencia_laboral,PDO::PARAM_STR);
          $stmt->bindParam(":rango_edad",$rango_edad,PDO::PARAM_STR);
          $stmt->bindParam(":genero",$genero,PDO::PARAM_STR);
          $stmt->bindParam(":estado_civil",$estado_civil,PDO::PARAM_STR);
          $stmt->bindParam(":caracteristicas_personales",$caracteristicas_personales,PDO::PARAM_STR);
          $stmt->bindParam(":documentos_requeridos",$documentos_requeridos,PDO::PARAM_STR);
          $stmt->bindParam(":otros_requerimientos",$otros_requerimientos,PDO::PARAM_STR);
          $stmt->bindParam(":clase_vehiculo",$clase_vehiculo,PDO::PARAM_STR);
          $stmt->bindParam(":anio_vehiculo",$anio_vehiculo,PDO::PARAM_STR);
          $stmt->bindParam(":clase_licencia",$clase_licencia,PDO::PARAM_STR);
          $stmt->bindParam(":disponibilidad",$disponibilidad,PDO::PARAM_STR);
          $stmt->bindParam(":incorporacion",$incorporacion,PDO::PARAM_STR);
          $stmt->bindParam(":ult_gra_apr",$ult_gra_apr,PDO::PARAM_STR);
          $stmt->bindParam(":idioma",$idioma,PDO::PARAM_STR);
          $stmt->bindParam(":conocimientos",$conocimientos,PDO::PARAM_STR);
          $stmt->bindParam(":hab_des",$hab_des,PDO::PARAM_STR);
          $stmt->bindParam(":id_empresa",$id_empresa,PDO::PARAM_INT);
          $stmt->bindParam(":estado",$estado,PDO::PARAM_STR);
          $stmt->bindParam(":id_oferta",$id_oferta,PDO::PARAM_INT);

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
          $id_oferta=$_POST["id"];
      
          $stmt=$pdo->prepare("DELETE FROM ofertas WHERE id_oferta=:id_oferta");
          $stmt->bindParam(":id_oferta",$id_oferta,PDO::PARAM_INT);

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