<?php
session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");
$nivel_usu=$_SESSION['nivel_g'];

if(isset($_POST['mostrar'])){
    $id_demandante=$_POST['mostrar'];
        $stmt= $pdo->prepare("SELECT de.id_demandante, de.nombre_apellido, de.direccion, de.zona, de.vinculo_plan, de.telefono, de.email, de.fecha_nac, de.lugar_nac, de.nacionalidad, de.sexo, de.estado_civil, de.peso, de.estatura, de.DUI, de.NIT, de.licencia_arma, de.arma, de.curso_ansp, de.licencia_vehiculo, de.licencia_moto, de.vehico_propio, de.discapacidades, de.personas_dependientes, de.observaciones, de.ultimo_grado, de.idiomas, de.conocimientos, de.habilidades_deztrezas, de.ocupacion, de.experiencia, de.curriculum, de.municipio, de.departamento, mu.nombre AS nmunicipio, d.nombre AS ndepartamento FROM demandantes AS de, municipios AS mu, departamentos AS d WHERE de.municipio=mu.id_municipio AND mu.id_departamento=d.id_departamento AND de.id_demandante=:id_demandante");
        $stmt->bindParam(":id_demandante",$id_demandante,PDO::PARAM_INT);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $lista_demandante){     
            $nombre_apellido=$lista_demandante['nombre_apellido'];
            $direccion=$lista_demandante['direccion'];
            $zona=$lista_demandante['zona'];
            $vinculo_plan=$lista_demandante['vinculo_plan'];
            $telefono=$lista_demandante['telefono'];
            $correo=$lista_demandante['email'];
            $fecha=$lista_demandante['fecha_nac'];
            $lugar_nac=$lista_demandante['lugar_nac'];
            $nacionalidad=$lista_demandante['nacionalidad'];
            $sexo=$lista_demandante['sexo'];
            $estado_civil=$lista_demandante['estado_civil'];
            $peso=$lista_demandante['peso'];
            $estatura=$lista_demandante['estatura'];
            $dui=$lista_demandante['DUI'];
            $nit=$lista_demandante['NIT'];
            $licencia_arma=$lista_demandante['licencia_arma'];
            $arma=$lista_demandante['arma'];
            $curso_ansp=$lista_demandante['curso_ansp'];
            $licencia_vehiculo=$lista_demandante['licencia_vehiculo'];
            $licencia_moto=$lista_demandante['licencia_moto'];
            $vehico_propio=$lista_demandante['vehico_propio'];
            $discapacidades=$lista_demandante['discapacidades'];
            $personas_dependientes=$lista_demandante['personas_dependientes'];
            $observaciones=$lista_demandante['observaciones'];
            $ultimo_grado=$lista_demandante['ultimo_grado'];
            $idiomas=$lista_demandante['idiomas'];
            $conocimientos=$lista_demandante['conocimientos'];
            $habilidades_deztrezas=$lista_demandante['habilidades_deztrezas'];
            $ocupacion=$lista_demandante['ocupacion'];
            $experiencia=$lista_demandante['experiencia'];
            $curriculum=$lista_demandante['curriculum'];
            $id_municipio=$lista_demandante['municipio'];
            $id_departamento=$lista_demandante['departamento'];
            $nmunicipio=$lista_demandante['nmunicipio'];
            $ndepartamento=$lista_demandante['ndepartamento'];
            
        }

        $stmt= $pdo->prepare("SELECT * FROM departamentos WHERE id_demandante=:demandante");
        $stmt->bindParam(":demandante",$demandante,PDO::PARAM_INT);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $lista_demandante1){     
            $departamento=['nombre'];
        }

        $fecha_nac=$fecha;
        list($year, $mes, $dia)=explode("-", $fecha);
        $fecha_nac=$dia."/".$mes."/".$year;

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

    <!-- bootstrap-datepicker -->
    <link href="../vendors/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">

    <style type="text/css">
      #form_demandante fieldset:not(:first-of-type) {
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
                <h2><i class="fa fa-folder-open-o"></i> Demandantes</h2>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Mostrar Demandante</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <?php
                        if($nivel_usuario=="Gestor Empresarial"){
                      ?>
                        <li><a data-toggle="tooltip" data-placement="top" title="Lista Demandantes" href="lista_demandantes.php" ><i class="fa fa-list"></i></a>
                        </li>
                      <?php
                        }else if($nivel_usuario=="Gestor Empleo"){ 
                      ?>
                        <li><a data-toggle="tooltip" data-placement="top" title="Lista Demandantes" href="lista_demandantes_ge.php" ><i class="fa fa-list"></i></a>
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

                  <form id="form_demandante" name="form_demandante" method="POST" class="form-horizontal form-label-left">
                      
                      <input type="hidden" id="id_departamento" name="id_departamento" value="<?php echo $id_departamento; ?>">
                      <input type="hidden" id="id_municipio" name="id_municipio" value="<?php echo $id_municipio; ?>">
                      <input type="hidden" id="curriculum" name="curriculum" value="<?php echo $curriculum; ?>">

                    <fieldset>
                        <h3><strong>Paso 1: <small>Datos Personales</small></strong></h3>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="nombre">Nombre Completo: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-user"></i>
                                <label class="control-label"><?php echo $nombre_apellido; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ocupacion">Ocupación: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                                <i class="fa fa-circle-o"></i>
                                <label class="control-label"><?php echo $ocupacion; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha de Nacimiento: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12 lcolor">
                              <i class="fa fa-calendar-o"></i>
                              <input type="hidden" class="form-control has-feedback-left" id="fecha" name="fecha" required="required" class="form-control col-md-7 col-xs-12" data-date-end-date = "0d" value="<?php echo $fecha_nac; ?>">
                              <label class="control-label"><?php echo $fecha_nac; ?></label>
                            </div>
                          </div>

                          <div class="form-group" >
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edad">Edad: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                            <i class="fa fa-user"></i>
                            <label class="control-label edad"></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="lugar_nacimiento">Lugar de Nacimiento: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $lugar_nac; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="nacionalidad">Nacionalidad: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $nacionalidad; ?></label>
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                            <button class="btn btn-round btn-default siguiente" type="button" id="btnsiguiente" name="btnsiguiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                        </fieldset>

                        <fieldset>
                        <h3><strong>Paso 2: <small>Datos Personales</small></strong></h3>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Familiar: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $estado_civil; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-truck"></i>
                              <label class="control-label"><?php echo $direccion; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Zona: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-globe"></i>
                              <label class="control-label"><?php echo $zona; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Vinculo Plan: <span style="color:	#000080;"> '</span></label>
                            <div class=" col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <?php if($vinculo_plan=="No") echo "<label class='control-label'> No </label>";
                               else echo "<label class='control-label'> Si </label>"; ?>
                            </div>
                          </div>

                          <div class="form-group" id="div_vp" name="div_vp">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="detalle_vp">Detalle: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $vinculo_plan; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="estatura">Estatura: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-user"></i>
                              <label class="control-label"><?php echo $estatura." Centímetros"; ?></label>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="peso">Peso: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-user"></i>
                              <label class="control-label"><?php echo $peso." Libras"; ?></label>
                            </div>
                            <span class="help-block"></span>
                          </div>
                    
                          <div class="ln_solid"></div>
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                        </fieldset>

                        <fieldset>
                        <h3><strong>Paso 3: <small>Datos Personales</small></strong></h3>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Departamento: <span style="color:	#000080;"> '</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                            <i class="fa fa-globe"></i>
                            <label class="control-label"><?php echo $ndepartamento; ?></label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Municipio:  <span style="color:	#000080;"> '</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                            <i class="fa fa-globe"></i>
                            <label class="control-label"><?php echo $nmunicipio; ?></label>
                          </div>
                        </div>
 
                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Genero: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-user"></i>
                              <?php if($sexo=="Masculino") echo "<label class='control-label'> Masculino </label>";
                               else echo "<label class='control-label'> Femenino </label>"; ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dui">DUI: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-list-alt"></i>
                              <label class="control-label"><?php echo $dui; ?></label>
                            </div>
                          </div> 

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nit">NIT: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-list-alt"></i>
                              <label class="control-label"><?php echo $nit; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-phone"></i>
                              <label class="control-label"><?php echo $telefono; ?></label>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo">Correo Electrónico: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-envelope-o"></i>
                              <label class="control-label"><?php echo $correo; ?></label>
                            </div>
                            <span class="help-block"></span>
                          </div>

                        
                          <div class="ln_solid"></div>
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                        </fieldset>

                        <fieldset>
                        <h3><strong>Paso 4: <small>Datos Personales</small></strong></h3>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Curso de ANSP: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <?php if($curso_ansp=="No") echo "<label class='control-label'> No </label>";
                              else echo "<label class='control-label'> Si </label>"; ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Discapacidades: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                             <?php if($discapacidades=="No") echo "<label class='control-label'> No </label>";
                              else echo "<label class='control-label'> Si </label>"; ?>
                            </div>
                          </div>

                          <div class="form-group" id="div_d" name="div_d">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="tipo_discapacidad">Tipo Discapacidad: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $discapacidades; ?></label>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Licencia de Arma: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-list-alt"></i>
                              <?php if($licencia_arma=="No") echo "<label class='control-label'> No </label>";
                              else echo "<label class='control-label'> Si </label>"; ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Posee Arma: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <?php if($arma=="No") echo "<label class='control-label'> No </label>";
                              else echo "<label class='control-label'> Si </label>"; ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Licencia de Motocicleta: <span style="color:	#000080;"> '</span></label>
                            <br />
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-list-alt"></i>
                              <?php if($licencia_moto=="No") echo "<label class='control-label'> No </label>";
                              else echo "<label class='control-label'> Si </label>"; ?>
                            </div>
                          </div>
                          
                          <div class="ln_solid"></div>
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior2" name="btnanteior2"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente3" name="btnsigiente3"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                        </fieldset>

                        <fieldset>
                        <h3><strong>Paso 5: <small>Datos Personales</small></strong></h3>

                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Licencia de Vehículo: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-list-alt"></i>
                              <?php if($licencia_vehiculo=="No") echo "<label class='control-label'> No </label>";
                              else echo "<label class='control-label'> Si </label>"; ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Vehículo Propio: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <?php if($vehico_propio=="No") echo "<label class='control-label'> No </label>";
                              else echo "<label class='control-label'> Si </label>"; ?>
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="num_per_dep_ust">Número de Personas que Dependen de Usted: <span style="color:	#000080;"> '</span>
                            </label><br />
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-calculator"></i>
                              <label class="control-label"><?php echo $personas_dependientes; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="ult_gra_apr">Último Grado Aprobado: <span style="color:	#000080;"> '</span>
                            </label><br />
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $ultimo_grado; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idioma">Idioma: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $idiomas; ?></label>
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior2" name="btnanteior2"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente3" name="btnsigiente3"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                        </fieldset>

                        <fieldset>
                        <h3><strong>Paso 6: <small>Datos Personales</small></strong></h3>

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
                              <label class="control-label"><?php echo $habilidades_deztrezas; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observaciones">Observaciones: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $observaciones; ?></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experiencia">Experiencia: <span style="color:	#000080;"> '</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label"><?php echo $experiencia; ?></label>
                            </div>
                          </div>
                          

                          <div class="ln_solid"></div>
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <?php
                            if($nivel_usuario=="Gestor Empresarial"){
                          ?>
                          <button class="btn btn-round btn-default" type="button" onclick="location.href='../production/lista_demandantes.php'"><i class="fa fa-undo"></i>  Regresar</button>
                          <?php
                            }else if($nivel_usuario=="Gestor Empleo"){ 
                          ?>
                            <button class="btn btn-round btn-default" type="button" onclick="location.href='../production/lista_demandantes_ge.php'"><i class="fa fa-undo"></i>  Regresar</button>
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

    <!-- bootstrap-datepicker -->
    <script src="../vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Validaciones -->
    <script src="../vendors/validar/jquery.validate.js"></script>
    <!-- Validaciones Form Demandante -->
    <script src="../build/js/validaciones/form_demandante.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
  </body>
</html>
<?php 

}else{

  header('location: login.php');
}

?>