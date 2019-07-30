<?php
session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");

$id_usuario=$_SESSION['id_usuario'];
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Plan Internacional | Bolsa de Trabajo</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/PNotify/dist/PNotifyBrightTheme.css" rel="stylesheet" type="text/css" />
    

    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <!-- logo -->
            <?php
              include("logo.php");
            ?>
            <!-- /logo -->

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <h3 style="color:#FFFFFF" align="center">Bolsa de Trabajo</h3>
              <div class="profile_pic">
                <img src="images/user2.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                
                <h4 style="color:#FFFFFF">Bienvenido</h4>
                <h2><?php echo $_SESSION['usuario_g']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php
              include("menu_principal.php");
            ?>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <?php
          include("menu_salir.php");
        ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2><i class="fa fa-folder-open-o"></i> Ofertas</h2>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista Ofertas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Agregar Oferta" href="ingreso_oferta.php"><i class="fa fa-plus-circle"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <br />
                  
                    <input type="hidden" name="bandera" id="bandera">
                    <input type="hidden" name="baccion" id="baccion">

                
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Puesto Ofrecido</th>
                          <th>Cantidad de Plazas</th>
                          <th>Salario</th>
                          <th>Forma de Pago</th>
                          <th>Periodo de Pago</th>
                          <th>Forma de Contratación</th>
                          <th>Jornada de Trabajo</th>
                          <th>Horario de Trabajo</th>
                          <th>Periodo de Prueba</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         
                        $contador=1;
                        $stmt= $pdo->prepare("SELECT o.id_oferta, o.nombre_puesto, o.numero_plazas, o.salario, o.forma_pago, o.periodo_pago, o.forma_contrato, o.prestaciones, o.jornada_trabajo, o.horario_trabajo, o.periodo_prueba, o.discapacidad, o.descrip_puesto, o.funciones, o.experiencia_laboral, o.rango_edad, o.sexo, o.estado_civil, o.caracteristicas_personales, o.documentos_requeridos, o.otros_requerimientos, o.clase_vehiculo, o.anio_vehiculo, o.clase_licencia, o.disponibilidad, o.incorporacion, o.ultimo_grado, o.idioma_extranjero, o.conocimientos, o.habilidades_destrezas, e.nombre_comercial, o.fecha_ingreso, o.estado FROM ofertas as o INNER JOIN empresas as e ON (o.id_empresa=e.id_empresa) WHERE o.id_usuario=:id_usuario ORDER BY o.nombre_puesto");
                        $stmt->bindParam(":id_usuario",$id_usuario,PDO::PARAM_INT);
                        $stmt->execute();
                        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach($result as $lista_oferta){
                             
                              echo "<tr>";
                              echo "<td>" .$contador. "</td>";
                              echo "<td>" . $lista_oferta['nombre_puesto'] . "</td>";
                              echo "<td>" . $lista_oferta['numero_plazas'] . "</td>";
                              echo "<td>" . $lista_oferta['salario'] . "</td>";
                              echo "<td>" . $lista_oferta['forma_pago'] . "</td>";
                              echo "<td>" . $lista_oferta['periodo_pago'] . "</td>";
                              echo "<td>" . $lista_oferta['forma_contrato'] . "</td>";
                              echo "<td>" . $lista_oferta['jornada_trabajo'] . "</td>";
                              echo "<td>" . $lista_oferta['horario_trabajo'] . "</td>";
                              echo "<td>" . $lista_oferta['periodo_prueba'] . " Días</td>";
                              echo "<td>";
                                echo "<a class='btn btn-success' onclick='mostrar_oferta(".$lista_oferta['id_oferta'].")' data-toggle='tooltip' data-placement='top' title='Mostrar Oferta'><i class='fa fa-eye'></i></a>";
                              echo "</td>";
                              echo "</tr>";
                              $contador++;
                          }
                        ?>
                      </tbody>
                    </table>

                    <form id="from_mostrar_oferta" name="from_mostrar_oferta" action="mostrar_oferta.php" method="POST">
                      <input type="hidden" id="mostrar" name="mostrar">
                    </form>
                      </div>  

                    </div>
                   </div>             
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /page content -->

        <!-- footer content -->
        <?php
          include("pie_pagina.php");
        ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- PNotify -->
    <script src="../vendors/PNotify/dist/iife/PNotify.js"></script>
    <script src="../vendors/PNotify/dist/iife/PNotifyButtons.js"></script>
    <script src="../vendors/PNotify/dist/iife/PNotifyConfirm.js"></script>
    <script src="../vendors/PNotify/dist/iife/PNotifyMobile.js"></script>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Validaciones -->
    <script src="../vendors/validar/jquery.validate.js"></script>
    <!-- Validaciones Form Oferta -->
    <script src="../build/js/validaciones/form_oferta.js"></script>
    

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
  </body>
</html>
<?php 

}else{

  header('location: login.php');
}

?>