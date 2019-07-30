<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{

    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="add"){
        $msj="Error";
        
        function obtenerResultado(){
           include ("../conexion.php");

           $nombre_apellido=$_POST["nombre"];
           $fecha=$_POST["fecha"];
           $lugar_nacimiento=$_POST["lugar_nacimiento"];
           $nacionalidad=$_POST["nacionalidad"];
           $estado_familiar=$_POST["estado_familiar"];
           $direccion=$_POST["direccion"];
           $departamento=$_POST["departamento"];
           $municipio=$_POST["municipio"];

           $genero=$_POST["genero"];
           $estatura=$_POST["estatura"];
           $peso=$_POST["peso"];
           $dui=$_POST["dui"];
           $nit=$_POST["nit"];
           $telefono=$_POST["telefono"];
           $correo=$_POST["correo"];
           $curso_ansp=$_POST["curso_ansp"];
           $discapacidades=$_POST["discapacidades"];
           if($_POST["tipo_discapacidad"]!=""){
            $discapacidades=$_POST["tipo_discapacidad"];
           }
          

            $licencia_arma=$_POST["licencia_arma"];
            $posee_arma=$_POST["posee_arma"];
            $licencia_motocicleta=$_POST["licencia_motocicleta"];
            $licencia_vehiculo=$_POST["licencia_vehiculo"];
            $num_per_dep_ust=$_POST["num_per_dep_ust"];
            $ult_gra_apr=$_POST["ult_gra_apr"];
            $idioma=$_POST["idioma"];
            $conocimientos=$_POST["conocimientos"];
            $hab_des=$_POST["hab_des"];
            $experiencia=$_POST["experiencia"];
            $zona=$_POST["zona"];
            $vinculo_plan=$_POST["vinculo_plan"];
            if($_POST["detalle_vp"]!=""){
              $vinculo_plan=$_POST["detalle_vp"];
            }
            $vehico_propio=$_POST["vehico_propio"];
            $observaciones=$_POST["observaciones"];
            $ocupacion=$_POST["ocupacion"];
            $dato = "";

            if(($_FILES['archivo']['tmp_name'])!=""){
           $ruta = "../../Archivos";
           $ruta2 = "../../Archivos/".$dui;
          
            
          
           function llenarArchivos($ruta3){
            $cv = null;
    
            $cv = $_FILES['archivo']['tmp_name'];
            
            if(move_uploaded_file($cv, $ruta3."/curriculum.pdf")){
                $dbcurriculum = $ruta3."/curriculum.pdf";
            }
  
            return $dbcurriculum;    
            }
         
    
         

         if(!file_exists($ruta)){
          mkdir($ruta, 0777,true);
             if(!file_exists($ruta2)){
                 mkdir($ruta2, 0777,true);
                 if(file_exists($ruta2)){
         
                     $dato = llenarArchivos($ruta2);
                 }
             }else{
                 
                 $dato = llenarArchivos($ruta2);
                 
 
             }
        }else{
          if(!file_exists($ruta2)){
              mkdir($ruta2, 0777,true);
              if(file_exists($ruta2)){
      
                  $dato = llenarArchivos($ruta2);
              }
          }else{
              
              $dato = llenarArchivos($ruta2);
          }
        }
      }

           
          $id_usuario=$_POST["id_usuario"];
          date_default_timezone_set('America/El_Salvador');
        
          $fecha_ingreso= date('Y-m-d');

          $fecha_nac=$fecha;
          list($dia, $mes, $year)=explode("/", $fecha);
          $fecha_nac=$year."-".$mes."-".$dia;

        
          $stmt=$pdo->prepare("INSERT INTO demandantes (nombre_apellido, direccion, zona, vinculo_plan, telefono, email, fecha_nac, lugar_nac, nacionalidad, sexo, estado_civil, peso, estatura, DUI, NIT, licencia_arma, arma, curso_ansp, licencia_vehiculo, licencia_moto, vehico_propio, discapacidades, personas_dependientes, observaciones, ultimo_grado, idiomas, conocimientos, habilidades_deztrezas, ocupacion, experiencia, fecha_ingreso, curriculum, municipio, departamento, id_usuario) 
          VALUES (:nombre_apellido, :direccion, :zona, :vinculo_plan, :telefono, :email, :fecha_nac, :lugar_nac, :nacionalidad, :sexo, :estado_civil, :peso, :estatura, :DUI, :NIT, :licencia_arma, :arma, :curso_ansp, :licencia_vehiculo, :licencia_moto, :vehico_propio, :discapacidades, :personas_dependientes, :observaciones, :ultimo_grado, :idiomas, :conocimientos, :habilidades_deztrezas, :ocupacion, :experiencia, :fecha_ingreso, :curriculum, :municipio, :departamento, :id_usuario)");
          $stmt->bindParam(":nombre_apellido",$nombre_apellido,PDO::PARAM_STR);
          $stmt->bindParam(":direccion",$direccion,PDO::PARAM_STR);
          $stmt->bindParam(":zona",$zona,PDO::PARAM_STR);
          $stmt->bindParam(":vinculo_plan",$vinculo_plan,PDO::PARAM_STR);
          $stmt->bindParam(":telefono",$telefono,PDO::PARAM_STR);
          $stmt->bindParam(":email",$correo,PDO::PARAM_STR);
          $stmt->bindParam(":fecha_nac",$fecha_nac,PDO::PARAM_STR);
          $stmt->bindParam(":lugar_nac",$lugar_nacimiento,PDO::PARAM_STR);
          $stmt->bindParam(":nacionalidad",$nacionalidad,PDO::PARAM_STR);
          $stmt->bindParam(":sexo",$genero,PDO::PARAM_STR);
          $stmt->bindParam(":estado_civil",$estado_familiar,PDO::PARAM_STR);
          $stmt->bindParam(":peso",$peso,PDO::PARAM_STR);
          $stmt->bindParam(":estatura",$estatura,PDO::PARAM_STR);
          $stmt->bindParam(":DUI",$dui,PDO::PARAM_STR);
          $stmt->bindParam(":NIT",$nit,PDO::PARAM_STR);
          $stmt->bindParam(":licencia_arma",$licencia_arma,PDO::PARAM_STR);
          $stmt->bindParam(":arma",$posee_arma,PDO::PARAM_STR);
          $stmt->bindParam(":curso_ansp",$curso_ansp,PDO::PARAM_STR);
          $stmt->bindParam(":licencia_vehiculo",$licencia_vehiculo,PDO::PARAM_STR);
          $stmt->bindParam(":licencia_moto",$licencia_motocicleta,PDO::PARAM_STR);
          $stmt->bindParam(":vehico_propio",$vehico_propio,PDO::PARAM_STR);
          $stmt->bindParam(":discapacidades",$discapacidades,PDO::PARAM_STR);
          $stmt->bindParam(":personas_dependientes",$num_per_dep_ust,PDO::PARAM_INT);
          $stmt->bindParam(":observaciones",$observaciones,PDO::PARAM_STR);
          $stmt->bindParam(":ultimo_grado",$ult_gra_apr,PDO::PARAM_STR);
          $stmt->bindParam(":idiomas",$idioma,PDO::PARAM_STR);
          $stmt->bindParam(":conocimientos",$conocimientos,PDO::PARAM_STR);
          $stmt->bindParam(":habilidades_deztrezas",$hab_des,PDO::PARAM_STR);
          $stmt->bindParam(":ocupacion",$ocupacion,PDO::PARAM_STR);
          $stmt->bindParam(":experiencia",$experiencia,PDO::PARAM_INT);
          $stmt->bindParam(":fecha_ingreso",$fecha_ingreso,PDO::PARAM_STR);
          $stmt->bindParam(":curriculum",$dato,PDO::PARAM_STR);
          $stmt->bindParam(":municipio",$municipio,PDO::PARAM_INT);
          $stmt->bindParam(":departamento",$departamento,PDO::PARAM_INT);
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
            $id_demandante=$_POST["actualizar"];
            $nombre_apellido=$_POST["nombre"];
            $fecha=$_POST["fecha"];
            $lugar_nacimiento=$_POST["lugar_nacimiento"];
            $nacionalidad=$_POST["nacionalidad"];
            $estado_familiar=$_POST["estado_familiar"];
            $direccion=$_POST["direccion"];
            
            
            if($_POST["departamento"]!=""){
              $departamento=$_POST["departamento"];
              $municipio=$_POST["municipio"];
            }else{
              $departamento=$_POST["id_departamento"];
              $municipio=$_POST["id_municipio"];
            }

 
            $genero=$_POST["genero"];
            $estatura=$_POST["estatura"];
            $peso=$_POST["peso"];
            $dui=$_POST["dui"];
            $nit=$_POST["nit"];
            $telefono=$_POST["telefono"];
            $correo=$_POST["correo"];
            $curso_ansp=$_POST["curso_ansp"];
            $discapacidades=$_POST["discapacidades"];
            if($_POST["tipo_discapacidad"]!=""){
             $discapacidades=$_POST["tipo_discapacidad"];
            }
           
 
             $licencia_arma=$_POST["licencia_arma"];
             $posee_arma=$_POST["posee_arma"];
             $licencia_motocicleta=$_POST["licencia_motocicleta"];
             $licencia_vehiculo=$_POST["licencia_vehiculo"];
             $num_per_dep_ust=$_POST["num_per_dep_ust"];
             $ult_gra_apr=$_POST["ult_gra_apr"];
             $idioma=$_POST["idioma"];
             $conocimientos=$_POST["conocimientos"];
             $hab_des=$_POST["hab_des"];
             $experiencia=$_POST["experiencia"];
             $zona=$_POST["zona"];
             $vinculo_plan=$_POST["vinculo_plan"];
              if($_POST["detalle_vp"]!=""){
                $vinculo_plan=$_POST["detalle_vp"];
              }
             $vehico_propio=$_POST["vehico_propio"];
             $observaciones=$_POST["observaciones"];
             $ocupacion=$_POST["ocupacion"];
             $dato = "";

            if(($_FILES['archivo']['tmp_name'])!=""){
           $ruta = "../../Archivos";
           $ruta2 = "../../Archivos/".$dui;
          
            
          
           function llenarArchivos($ruta3){
            $cv = null;
    
            $cv = $_FILES['archivo']['tmp_name'];
            
            if(move_uploaded_file($cv, $ruta3."/curriculum.pdf")){
                $dbcurriculum = $ruta3."/curriculum.pdf";
            }
  
            return $dbcurriculum;    
            }
         
    
         

         if(!file_exists($ruta)){
          mkdir($ruta, 0777,true);
             if(!file_exists($ruta2)){
                 mkdir($ruta2, 0777,true);
                 if(file_exists($ruta2)){
         
                     $dato = llenarArchivos($ruta2);
                 }
             }else{
                 
                 $dato = llenarArchivos($ruta2);
                 
 
             }
        }else{
          if(!file_exists($ruta2)){
              mkdir($ruta2, 0777,true);
              if(file_exists($ruta2)){
      
                  $dato = llenarArchivos($ruta2);
              }
          }else{
              
              $dato = llenarArchivos($ruta2);
          }
        }
      }

 
 
           $fecha_nac=$fecha;
           list($dia, $mes, $year)=explode("/", $fecha);
           $fecha_nac=$year."-".$mes."-".$dia;
 
         
           $stmt=$pdo->prepare("UPDATE demandantes SET nombre_apellido=:nombre_apellido,direccion=:direccion,zona=:zona,vinculo_plan=:vinculo_plan,telefono=:telefono,email=:email,fecha_nac=:fecha_nac,lugar_nac=:lugar_nac,nacionalidad=:nacionalidad,sexo=:sexo,estado_civil=:estado_civil,peso=:peso,estatura=:estatura,DUI=:DUI,NIT=:NIT,licencia_arma=:licencia_arma,arma=:arma,curso_ansp=:curso_ansp,licencia_vehiculo=:licencia_vehiculo,licencia_moto=:licencia_moto,vehico_propio=:vehico_propio,discapacidades=:discapacidades,personas_dependientes=:personas_dependientes,observaciones=:observaciones,ultimo_grado=:ultimo_grado,idiomas=:idiomas,conocimientos=:conocimientos,habilidades_deztrezas=:habilidades_deztrezas,ocupacion=:ocupacion,experiencia=:experiencia,curriculum=:curriculum,municipio=:municipio,departamento=:departamento WHERE id_demandante=:id_demandante");
           $stmt->bindParam(":nombre_apellido",$nombre_apellido,PDO::PARAM_STR);
           $stmt->bindParam(":direccion",$direccion,PDO::PARAM_STR);
           $stmt->bindParam(":zona",$zona,PDO::PARAM_STR);
           $stmt->bindParam(":vinculo_plan",$vinculo_plan,PDO::PARAM_STR);
           $stmt->bindParam(":telefono",$telefono,PDO::PARAM_STR);
           $stmt->bindParam(":email",$correo,PDO::PARAM_STR);
           $stmt->bindParam(":fecha_nac",$fecha_nac,PDO::PARAM_STR);
           $stmt->bindParam(":lugar_nac",$lugar_nacimiento,PDO::PARAM_STR);
           $stmt->bindParam(":nacionalidad",$nacionalidad,PDO::PARAM_STR);
           $stmt->bindParam(":sexo",$genero,PDO::PARAM_STR);
           $stmt->bindParam(":estado_civil",$estado_familiar,PDO::PARAM_STR);
           $stmt->bindParam(":peso",$peso,PDO::PARAM_STR);
           $stmt->bindParam(":estatura",$estatura,PDO::PARAM_STR);
           $stmt->bindParam(":DUI",$dui,PDO::PARAM_STR);
           $stmt->bindParam(":NIT",$nit,PDO::PARAM_STR);
           $stmt->bindParam(":licencia_arma",$licencia_arma,PDO::PARAM_STR);
           $stmt->bindParam(":arma",$posee_arma,PDO::PARAM_STR);
           $stmt->bindParam(":curso_ansp",$curso_ansp,PDO::PARAM_STR);
           $stmt->bindParam(":licencia_vehiculo",$licencia_vehiculo,PDO::PARAM_STR);
           $stmt->bindParam(":licencia_moto",$licencia_motocicleta,PDO::PARAM_STR);
           $stmt->bindParam(":vehico_propio",$vehico_propio,PDO::PARAM_STR);
           $stmt->bindParam(":discapacidades",$discapacidades,PDO::PARAM_STR);
           $stmt->bindParam(":personas_dependientes",$num_per_dep_ust,PDO::PARAM_INT);
           $stmt->bindParam(":observaciones",$observaciones,PDO::PARAM_STR);
           $stmt->bindParam(":ultimo_grado",$ult_gra_apr,PDO::PARAM_STR);
           $stmt->bindParam(":idiomas",$idioma,PDO::PARAM_STR);
           $stmt->bindParam(":conocimientos",$conocimientos,PDO::PARAM_STR);
           $stmt->bindParam(":habilidades_deztrezas",$hab_des,PDO::PARAM_STR);
           $stmt->bindParam(":ocupacion",$ocupacion,PDO::PARAM_STR);
           $stmt->bindParam(":experiencia",$experiencia,PDO::PARAM_INT);
           $stmt->bindParam(":curriculum",$dato,PDO::PARAM_STR);
           $stmt->bindParam(":municipio",$municipio,PDO::PARAM_INT);
           $stmt->bindParam(":departamento",$departamento,PDO::PARAM_INT);
           $stmt->bindParam(":id_demandante",$id_demandante,PDO::PARAM_INT);
 
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
          $id_demandante=$_POST["id"];
          $url=$_POST["url"];
          echo $url;
      
          $stmt=$pdo->prepare("DELETE FROM demandantes WHERE id_demandante=:id_demandante");
          $stmt->bindParam(":id_demandante",$id_demandante,PDO::PARAM_INT);

          if($stmt->execute()){
            return "Exito";
            unlink($url);
          }else{
            return "Error";
          }
          $stmt->close();
      
        return $msj;
      }
    }

  }

}else{
  throw new Exception("Error Processing Request", 1);   
}
 
    echo obtenerResultado();
?>