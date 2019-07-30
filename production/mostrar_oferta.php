<?php
session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");
$nivel_usu=$_SESSION['nivel_g'];
if(isset($_POST['mostrar'])){
    $id_oferta=$_POST['mostrar'];

        $stmt= $pdo->prepare("SELECT o.id_oferta, o.nombre_puesto, o.numero_plazas, o.salario, o.forma_pago, o.periodo_pago, o.forma_contrato, o.prestaciones, o.jornada_trabajo, o.horario_trabajo, o.periodo_prueba, o.discapacidad, o.descrip_puesto, o.funciones, o.experiencia_laboral, o.rango_edad, o.sexo, o.estado_civil, o.caracteristicas_personales, o.documentos_requeridos, o.otros_requerimientos, o.clase_vehiculo, o.anio_vehiculo, o.clase_licencia, o.disponibilidad, o.incorporacion, o.ultimo_grado, o.idioma_extranjero, o.conocimientos, o.habilidades_destrezas, o.id_empresa, e.razon_social, o.estado FROM ofertas AS o, empresas AS e WHERE o.id_empresa=e.id_empresa AND o.id_oferta=:id_oferta");
        $stmt->bindParam(":id_oferta",$id_oferta,PDO::PARAM_INT);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $lista_oferta){     
          $nombre_puesto=$lista_oferta['nombre_puesto'];
          $numero_plazas=$lista_oferta['numero_plazas'];
          $salario=$lista_oferta['salario'];
          $forma_pago=$lista_oferta['forma_pago'];
          $periodo_pago=$lista_oferta['periodo_pago'];
          $forma_contratacion=$lista_oferta['forma_contrato'];
          $prestaciones=json_decode($lista_oferta['prestaciones'], true);
          $jornada_trabajo=$lista_oferta['jornada_trabajo'];
          $horario_trabajo=$lista_oferta['horario_trabajo'];
          $periodo_prueba=$lista_oferta['periodo_prueba'];
          $discapacidad=$lista_oferta['discapacidad'];
          $descrip_puesto=$lista_oferta['descrip_puesto'];
          $funciones=$lista_oferta['funciones'];
          $experiencia_laboral=$lista_oferta['experiencia_laboral'];
          $rango_edad=$lista_oferta['rango_edad'];
          $genero=$lista_oferta['sexo'];
          $estado_civil=$lista_oferta['estado_civil'];
          $caracteristicas_personales=$lista_oferta['caracteristicas_personales'];
          $documentos_requeridos=json_decode($lista_oferta['documentos_requeridos'], true);
          $otros_requerimientos=json_decode($lista_oferta['otros_requerimientos'], true);
          $clase_vehiculo=$lista_oferta['clase_vehiculo'];
          $anio_vehiculo=$lista_oferta['anio_vehiculo'];
          $clase_licencia=$lista_oferta['clase_licencia'];
          $disponibilidad=json_decode($lista_oferta['disponibilidad'], true);
          $incorporacion=$lista_oferta['incorporacion'];
          $ult_gra_apr=$lista_oferta['ultimo_grado'];
          $idioma=$lista_oferta['idioma_extranjero'];
          $conocimientos=$lista_oferta['conocimientos'];
          $hab_des=$lista_oferta['habilidades_destrezas'];
          $empresa=$lista_oferta['id_empresa'];
          $emp=$lista_oferta['razon_social'];
          $estado=$lista_oferta['estado'];
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
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
   
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
     
    <!-- PNotify -->
    <link href="../vendors/PNotify/dist/PNotifyBrightTheme.css" rel="stylesheet" type="text/css" />

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">

    <style type="text/css">
      #form_oferta fieldset:not(:first-of-type) {
      display: none;
    }
    </style>
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
          <div class="col-sm-12 col-sm-offset-2 col-md-8 col-md-offset-2">
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
                    <h2>Mostrar Oferta</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <?php
                        if($nivel_usuario=="Gestor Empresarial"){
                      ?>
                        <li><a data-toggle="tooltip" data-placement="top" title="Lista Ofertas" href="lista_ofertas" ><i class="fa fa-list"></i></a>
                        </li>
                      <?php
                        }else if($nivel_usuario=="Gestor Empleo Plan"){ 
                      ?>
                        <li><a data-toggle="tooltip" data-placement="top" title="Lista Ofertas" href="lista_ofertas_gep" ><i class="fa fa-list"></i></a>
                        </li>
                      <?php
                        }
                      ?>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                    <form id="form_oferta" name="form_oferta" method="POST" class="form-horizontal form-label-left">
                        <fieldset>
                        <h3><strong>Paso 1: <small>Datos de la Oferta</small></strong></h3>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Empresa: <span style="color:	#000080;"> '</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                            <i class="fa fa-building"></i>
                            <label class="control-label"><?php echo $emp; ?></label>
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="nombre_puesto">Puesto Ofrecido: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-sitemap"></i>
                              <label class="control-label"><?php echo $nombre_puesto; ?></label>
                            </div>
                          </div>
                  
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_plazas">Cantidad de Plazas: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-calculator"></i>
                              <label class="control-label"><?php echo $numero_plazas; ?></label>
                            </div>
                        </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="salario">Salario: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-usd"></i>
                              <label class="control-label"><?php echo $salario; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Forma de Pago: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $forma_pago; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Periodo de Pago: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $periodo_pago; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Forma de Contratación: <span style="color:	#000080;"> '</span></label>
                            <br />
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $forma_contratacion; ?></label>
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                           <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                         
                            <button class="btn btn-round btn-default siguiente" type="button" id="btnsiguiente" name="btnsiguiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                          
                        </fieldset>

                        <fieldset>
                        <h3><strong>Paso 2: <small>Datos de la Oferta</small></strong></h3>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Prestaciones: <span style="color:	#000080;"> '</span></label>
                            <div class="checkbox col-md-6 col-sm-6 col-xs-12 lcolor">
                            <?php
                              foreach ($prestaciones as $value) {
                                echo "<i class='fa fa-check-square-o'></i>  ".$value."<br />";
                              }
                            ?>
                            </div>
                          </div>
                            
                          <div class="ln_solid"></div>
                           <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>

                        <h3><strong>Paso 3: <small>Datos de la Oferta</small></strong></h3>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jornada de Trabajo: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo  $jornada_trabajo; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="horario_trabajo">Horario de Trabajo: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-calendar"></i>
                              <label class="control-label"><?php echo $horario_trabajo; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="periodo_prueba">Periodo de Prueba: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $periodo_prueba." Días"; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Requiere Discapacidad: <span style="color:	#000080;"> '</span></label>
                            <br />
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $discapacidad; ?></label>
                            </div>
                          </div>

                         
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descrip_puesto">Descripción del Puesto <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $descrip_puesto; ?></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="funciones">Funciones <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $funciones; ?></label>
                            </div>
                        </div>

                        
                          <div class="ln_solid"></div>
                           <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>
                          <h3><strong>Paso 4: <small>Requisitos Generales del Puesto</small></strong></h3>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experiencia_laboral">Experiencia Laboral: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">  
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $experiencia_laboral; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rango_edad">Rango de Edad: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-arrows-h"></i>
                              <label class="control-label"><?php echo $rango_edad; ?></label>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Genero: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-user"></i>
                              <label class="control-label"><?php echo $genero; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Familiar: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $estado_civil; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="caracteristicas_personales">Características Personales  <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $caracteristicas_personales; ?></label>
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                           <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>
                          <h3><strong>Paso 5: <small>Requisitos Generales del Puesto</small></strong></h3>
                          

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Documentos a Presentar: <span style="color:	#000080;"> '</span></label>
                            <div class="checkbox col-md-6 col-sm-6 col-xs-12 lcolor">
                            <?php
                              foreach ($documentos_requeridos as $value) {
                                echo "<i class='fa fa-check-square-o'></i>  ".$value."<br />";
                              }
                            ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Otros Requerimientos: <span style="color:	#000080;"> '</span></label>
                            <div class="checkbox col-md-6 col-sm-6 col-xs-12 lcolor">
                            <?php
                              foreach ($otros_requerimientos as $value) {
                                echo "<i class='fa fa-check-square-o'></i>  ".$value."<br />";
                              }
                            ?>
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                           <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>
                          <h3><strong>Paso 6: <small>Requisitos Generales del Puesto</small></strong></h3>
                          
                          <?php
                            if($clase_vehiculo!=""){
                          ?>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Vehículo Propio: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label">Si</label>
                            </div>
                          </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="clase_vehiculo">Clase de Vehículo: <span style="color:	#000080;"> '</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                                <i class="fa fa-circle-o"></i>
                                <label class="control-label"><?php echo $clase_vehiculo; ?></label>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="anio_vehiculo">Año del Vehículo: <span style="color:	#000080;"> '</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                                <i class="fa fa-circle-o"></i>
                                <label class="control-label"><?php echo $anio_vehiculo; ?></label>
                              </div>
                            </div>
                          <?php
                            }
                            if($clase_vehiculo!=""){
                          ?>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="clase_licencia">Clase de Licencia: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                                <i class="fa fa-circle-o"></i>
                                <label class="control-label"><?php echo $clase_licencia; ?></label>
                            </div>
                          </div>
                          <?php
                            }
                          ?>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Disponibilidad: <span style="color:	#000080;"> '</span></label>
                            <div class="checkbox col-md-6 col-sm-6 col-xs-12 lcolor">
                            <?php
                              foreach ($disponibilidad as $value) {
                                echo "<i class='fa fa-check-square-o'></i>  ".$value."<br />";
                              }
                            ?>
                            </div>
                          </div>                       

                        <div class="ln_solid"></div>
                           <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>
                          <h3><strong>Paso 7: <small>Requisitos Generales del Puesto</small></strong></h3>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Incorporación: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $incorporacion; ?></label>
                            </div>
                          </div>
                         
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="ult_gra_apr">Último Grado Aprobado: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $ult_gra_apr; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idioma">Idioma: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $idioma; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="conocimientos">Conocimientos: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $conocimientos; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hab_des">Habilidades y Destrezas: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $hab_des; ?></label>
                            </div>
                          </div>

                          
                          <div class="ln_solid"></div>
                           <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <?php
                            if($nivel_usuario=="Gestor Empresarial"){
                          ?>
                          <button class="btn btn-round btn-default" type="button" onclick="location.href='../production/lista_ofertas.php'"><i class="fa fa-undo"></i>  Regresar</button>
                          <?php
                            }else if($nivel_usuario=="Gestor Empleo Plan"){ 
                          ?>
                            <button class="btn btn-round btn-default" type="button" onclick="location.href='../production/lista_ofertas_gep.php'"><i class="fa fa-undo"></i>  Regresar</button>
                          <?php
                            }
                          ?>
                        </fieldset>

                    </form> 
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
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Validaciones -->
    <script src="../vendors/validar/jquery.validate.js"></script>
    <!-- Validaciones Form Ofertas -->
    <script src="../build/js/validaciones/form_oferta.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
  </body>
</html>
<?php 

}else{

  header('location: login.php');
}

?>