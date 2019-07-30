<?php
    
    if(isset($_POST['fecha_desde'])){
        $fecha_desde = $_POST['fecha_desde'];
        $fecha_hasta = $_POST['fecha_hasta'];
    }

    include ("../build/conexion.php");
    $inicio="";
    $fin="";

    $inicio=$fecha_desde;
    list($dia, $mes, $year)=explode("/", $fecha_desde);
    $inicio=$year."-".$mes."-".$dia;

    $fin=$fecha_hasta;
    list($dia1, $mes1, $year1)=explode("/", $fecha_hasta);
    $fin=$year1."-".$mes1."-".$dia1;

    
    ?>

    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Razón Social</th>
                          <th>Nombre Comercial</th>
                          <th>NIT</th>
                          <th>Número Patronal</th>
                          <th>Número Contribuyente</th>
                          <th>Descrip. General de Act. Económica</th>
                          <th>Descrip. Específica de Act. Económica</th>
                          <th>Total Empleados</th>
                          <th>Dirección</th>
                          <th>Zona</th>
                          <th>Teléfono</th>
                          <th>Correo Electrónico</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         
                        $contador=1;
                        $stmt= $pdo->prepare("SELECT * FROM empresas WHERE  (fecha_ingreso BETWEEN :inicio AND :fin) ORDER BY razon_social");
                        $stmt->bindParam(":inicio",$inicio,PDO::PARAM_STR);
                        $stmt->bindParam(":fin",$fin,PDO::PARAM_STR);
                        $stmt->execute();
                        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach($result as $lista_empresa){
                             
                              echo "<tr>";
                              echo "<td>" .$contador. "</td>";
                              echo "<td>" . $lista_empresa['razon_social'] . "</td>";
                              echo "<td>" . $lista_empresa['nombre_comercial'] . "</td>";
                              echo "<td>" . $lista_empresa['nit'] . "</td>";
                              echo "<td>" . $lista_empresa['numero_patronal'] . "</td>";
                              echo "<td>" . $lista_empresa['numero_contribuyente'] . "</td>";
                              echo "<td>" . $lista_empresa['descrip_gral_act_econo'] . "</td>";
                              echo "<td>" . $lista_empresa['descrip_espec_act_econo'] . "</td>";
                              echo "<td>" . $lista_empresa['total_empleados'] . "</td>";
                              echo "<td>" . $lista_empresa['direccion'] . "</td>";
                              echo "<td>" . $lista_empresa['zona'] . "</td>";
                              echo "<td>" . $lista_empresa['telefono'] . "</td>";
                              echo "<td>" . $lista_empresa['email'] . "</td>";
                              echo "</tr>";
                              $contador++;
                          }
                        ?>
                      </tbody>
                    </table>