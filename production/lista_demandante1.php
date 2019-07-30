<?php

session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");
$demandantes=0;
?>
<!DOCTYPE html>
<html lang="en">
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
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"> <img src="images/plan_internacional.png" width="100%" height="100%"></a>
            </div>

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
            $nivel_actual=$_SESSION['nivel_g'];
            if($nivel_actual=="administrador")
            {
            include("menu_administrador.php");
            }

            if($nivel_actual=="tecnico")
            {
            include("menu_tecnico.php");
            }
            if($nivel_actual=="tecnico_plan")
            {
            include("menu_tecnico_plan.php");
            }
            if($nivel_actual=="ofertante")
            {
            include("menu_ofertante.php");
            }
            ?>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user2.png" alt=""><?php echo $_SESSION['usuario_g']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                  <li><a href="ayuda.php"><i class=""></i> Ayuda</a></li>
                    <li><a href="salir.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesion</a></li>
                  </ul>
                </li>

               
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->

        <?php
        date_default_timezone_set('America/El_Salvador');
        
        // contar demandantes del mes actual
        $month=date("m");
        $year=date("Y");
        $ultimo_dia= date("d",(mktime(0,0,0,$month+1,1,$year)-1));
        $fecha_inicial= ($year."-".$month."-1");
        $fecha_final=($year."-".$month."-".$ultimo_dia);
        $sentencia1= $pdo->prepare("Select count(id_demandante) as demandantes_t from demandantes WHERE fecha_ingreso BETWEEN  '$fecha_inicial' AND '$fecha_final'");
        $sentencia1->execute();
        $datos_demandantes=$sentencia1->fetchAll(PDO::FETCH_ASSOC);
      foreach($datos_demandantes as $demandantes_a){
        $demandantes=$demandantes_a['demandantes_t'];
      }


      //contar ofertantes registrados el mes actual

      
      $sentencia2= $pdo->prepare("Select count(id_empresa) as empresas_t from empresas WHERE fecha_ingreso BETWEEN  '$fecha_inicial' AND '$fecha_final'");
      $sentencia2->execute();
      $datos_empresas=$sentencia2->fetchAll(PDO::FETCH_ASSOC);
    foreach($datos_empresas as $empresas_a){
      
      $empresas=$empresas_a['empresas_t'];
    }

    //contar ofertas registradas el mes actual

      
    $sentencia3= $pdo->prepare("Select count(id_oferta) as ofertas_t from ofertas WHERE fecha_ingreso BETWEEN  '$fecha_inicial' AND '$fecha_final'");
    $sentencia3->execute();
    $datos_ofertas=$sentencia3->fetchAll(PDO::FETCH_ASSOC);
  foreach($datos_ofertas as $ofertas_a){
    
    $ofertas=$ofertas_a['ofertas_t'];
  }


   //contar ofertas registradas el mes actual

      
   $sentencia4= $pdo->prepare("Select count(id_aplicacion) as aplicaciones_t from aplicaciones WHERE fecha_ingreso BETWEEN  '$fecha_inicial' AND '$fecha_final'");
   $sentencia4->execute();
   $datos_aplicaciones=$sentencia4->fetchAll(PDO::FETCH_ASSOC);
 foreach($datos_aplicaciones as $aplicaciones_a){
   
   $aplicaciones=$aplicaciones_a['aplicaciones_t'];
 }
  ?>

        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
            </div>
            

            <div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>Código</th>
					<th>Nombre</th>
                    <th>Nivel de Estudio</th>
                    <th>Conocimientos</th>
					<th>Direccion</th>
					<th>Teléfono</th>
					<th>Correo</th>
                    <th>Acciones</th>
				</tr>
				<?php
				$no=1;
        $sentencia5= $pdo->prepare("Select * from demandantes ");
        $sentencia5->execute();
        $lista_demandantes1=$sentencia5->fetchAll(PDO::FETCH_ASSOC);
      foreach($lista_demandantes1 as $lista_demandantes){
        
        
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$lista_demandantes['id_demandante'].'</td>
							<td><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$lista_demandantes['nombre_apellido'].'</td>
                            <td>'.$lista_demandantes['ultimo_grado'].'</td>
                            <td>'.$lista_demandantes['conocimientos'].'</td>
							<td>'.$lista_demandantes['direccion'].'</td>
                            <td>'.$lista_demandantes['telefono'].'</td>
							<td>'.$lista_demandantes['email'];
							
						echo '
							</td>
							<td>

								<a href="edit.php?nik='.$lista_demandantes['id_demandante'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&nik='.$lista_demandantes['id_demandante'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos ?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				
				?>
			</table>



            
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright 2019
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
<?php 

}else{

  header('location: login.php');
}

?>