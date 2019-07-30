<?php
session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");

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
                <h2><i class="fa fa-folder-open-o"></i> Demandantes</h2>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista Demandantes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Agregar Demandante" href="ingreso_demandante.php"><i class="fa fa-plus-circle"></i></a>
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
                          <th>Nombre</th>
                          <th>Nivel de Estudio</th>
                          <th>Conocimientos</th>
                          <th>Dirección</th>
                          <th>Teléfono</th>
                          <th>Correo</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         
                        $contador=1;
                        $stmt= $pdo->prepare("SELECT *, IF(EXISTS (SELECT * FROM aplicaciones AS a WHERE a.id_demandante=demandantes.id_demandante ), 'no', 'si') AS editar FROM demandantes ORDER BY nombre_apellido");
                        $stmt->execute();
                        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach($result as $lista_demandantes){
                          $cv = $lista_demandantes['curriculum'];
                          $urlcv= substr($cv, 3);
                              echo "<tr>";
                              echo "<td>" .$contador. "</td>";
                              echo "<td><span class='glyphicon glyphicon-user' aria-hidden='true'></span> " . $lista_demandantes['nombre_apellido'] . "</td>";
                              echo "<td>" . $lista_demandantes['ultimo_grado'] . "</td>";
                              echo "<td>" . $lista_demandantes['conocimientos'] . "</td>";
                              echo "<td>" . $lista_demandantes['direccion'] . "</td>";
                              echo "<td>" . $lista_demandantes['telefono'] . "</td>";
                              echo "<td>" . $lista_demandantes['email'] . "</td>";
                              echo "<td>";
                              $editar=$lista_demandantes['editar'];
                              if($editar=="si"){
                                echo "<a class='btn btn-success' onclick='mostrar_demandante(".$lista_demandantes['id_demandante'].")' data-toggle='tooltip' data-placement='top' title='Mostrar Demandante'><i class='fa fa-eye'></i></a>";
                                echo "<a class='btn btn-info' onclick='editar_demandante(".$lista_demandantes['id_demandante'].")' data-toggle='tooltip' data-placement='top' title='Editar Demandante'><i class='fa fa-edit'></i></a>";
                                if($cv!=""){
                                  if (file_exists($urlcv)) {
                                  echo "<a class='btn btn-default' href=".$urlcv." target='_blank' data-toggle='tooltip' data-placement='top' title='Mostrar CV'><i class='fa fa-file-o'></i> CV</a>";
                                  }
                                }
                                echo "<a class='btn btn-danger' onclick='eliminar_demandante(".$lista_demandantes['id_demandante'].", \".$cv.\")' data-toggle='tooltip' data-placement='top' title='Eliminar Demandante'><i class='fa fa-trash-o'></i></a>";
                              }else{
                                echo "<a class='btn btn-success' onclick='mostrar_demandante(".$lista_demandantes['id_demandante'].")' data-toggle='tooltip' data-placement='top' title='Mostrar Demandante'><i class='fa fa-eye'></i></a>";
                                echo "<a class='btn btn-info' onclick='editar_demandante(".$lista_demandantes['id_demandante'].")' data-toggle='tooltip' data-placement='top' title='Editar Demandante'><i class='fa fa-edit'></i></a>";
                                if($cv!=""){
                                  if (file_exists($urlcv)) {
                                    echo "<a class='btn btn-default' href=".$urlcv." target='_blank' data-toggle='tooltip' data-placement='top' title='Mostrar CV'><i class='fa fa-file-o'></i> CV</a>";
                                  }
                                }
                              }
                              echo "</td>";
                              echo "</tr>";
                              $contador++;
                          }
                        ?>
                      </tbody>
                    </table>
                    <form id="from_editar_demandante" name="from_editar_demandante" action="editar_demandante.php" method="POST">
                      <input type="hidden" id="id" name="id">
                    </form>
                    <form id="from_mostrar_demandante" name="from_mostrar_demandante" action="mostrar_demandante.php" method="POST">
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

   
    <!-- Validaciones Form Demandante -->
    <script src="../build/js/validaciones/form_list_demandantes.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
  </body>
</html>
<?php 

}else{

  header('location: login.php');
}

?>