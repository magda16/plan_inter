<?php
session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");

if(isset($_POST['id'])){
  $id_demandante=$_POST['id'];
      $stmt2= $pdo->prepare("SELECT * FROM demandantes WHERE id_demandante=:id_demandante");
      $stmt2->bindParam(":id_demandante",$id_demandante,PDO::PARAM_INT);
      $stmt2->execute();
      $result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
      foreach($result2 as $lista_demandante){     
          $nombre=$lista_demandante['nombre_apellido'];
      }

} 
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
                    <h2>Lista Ofertas Demandantes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Regresar" href="lista_demandantes_ofertas.php"><i class="fa fa-arrow-circle-left"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                         
                    <h3><strong>Demandante: <small><?php echo $nombre; ?></small></strong></h3><br />
                  
                    <input type="hidden" name="bandera" id="bandera">
                    <input type="hidden" id="id_demandante" name="id_demandante" value="<?php echo $id_demandante; ?>">

                
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nombre del Puesto</th>
                          <th>Nivel Escolaridad</th>
                          <th>Experiencia</th>
                          <th>Habilidades</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         
                        $contador=1;
                        $stmt= $pdo->prepare("SELECT o.id_oferta,o.nombre_puesto, o.ultimo_grado, o.experiencia_laboral, o.habilidades_destrezas, IF(EXISTS (SELECT * FROM aplicaciones AS a WHERE a.id_oferta=o.id_oferta AND a.id_demandante=:id_demandante), 'no', 'si') AS editar FROM ofertas AS o WHERE o.numero_plazas>0");
                        $stmt->bindParam(":id_demandante",$id_demandante,PDO::PARAM_INT);
                        $stmt->execute();
                        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach($result as $lista_ofertas){
                             
                              echo "<tr>";
                              echo "<td>" .$contador. "</td>";
                              echo "<td>" . $lista_ofertas['nombre_puesto'] . "</td>";
                              echo "<td>" . $lista_ofertas['ultimo_grado'] . "</td>";
                              echo "<td>" . $lista_ofertas['experiencia_laboral'] . "</td>";
                              echo "<td>" . $lista_ofertas['habilidades_destrezas'] . "</td>";

                              echo "<td>";
                              $editar=$lista_ofertas['editar'];
                              if($editar=="si"){
                                echo "<a class='btn btn-info' onclick='aplicar_oferta(".$lista_ofertas['id_oferta'].")' data-toggle='tooltip' data-placement='top' title='Aplicar Oferta'><i class='fa fa-paper-plane-o'></i> Aplicar Oferta</a>";
                              }else{
                                echo "<a class='btn btn-default' data-toggle='tooltip' data-placement='top' title='Enviado' disabled><i class='fa fa-paper-plane-o'></i> Enviado</a>";
                              }
                              echo "</td>";
                              echo "</tr>";
                              $contador++;
                          }
                        ?>
                      </tbody>
                    </table>
                
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

   
    <!-- Validaciones Form Demandante Oferta-->
    <script src="../build/js/validaciones/form_list_d_o.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
  </body>
</html>
<?php 

}else{

  header('location: login.php');
}

?>