<?php
session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");

if(isset($_POST['id'])){
    $id_demandante=$_POST['id'];
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
            $DUI=$lista_demandante['DUI'];
            $NIT=$lista_demandante['NIT'];
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
                    <h2>Editar Demandante</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Demandantes" href="lista_demandantes.php" ><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                  <form id="form_demandante" name="form_demandante" method="POST" class="form-horizontal form-label-left">
                      <input type="hidden" name="bandera" id="bandera">
                      <input type="hidden" id="actualizar" name="actualizar" value="<?php echo $id_demandante; ?>">
                      <input type="hidden" id="id_departamento" name="id_departamento" value="<?php echo $id_departamento; ?>">
                      <input type="hidden" id="id_municipio" name="id_municipio" value="<?php echo $id_municipio; ?>">
                      <input type="hidden" id="curriculum" name="curriculum" value="<?php echo $curriculum; ?>">

                    <fieldset>
                        <h3><strong>Paso 1: <small>Datos Personales</small></strong></h3>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="nombre">Nombre Completo: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="nombre" name="nombre" required="required" placeholder="Ingrese Nombre Completo" value="<?php echo $nombre_apellido; ?>">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ocupacion">Ocupación: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="ocupacion" name="ocupacion" required="required" placeholder="Ingrese Ocupación" value="<?php echo $ocupacion; ?>">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block" ></span>
                          </div>

                          <div class="form-group" id="error_e">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha de Nacimiento: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="fecha" name="fecha" required="required" class="form-control col-md-7 col-xs-12" data-date-end-date = "0d" value="<?php echo $fecha_nac; ?>">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block" id="error"></span>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="lugar_nacimiento">Lugar de Nacimiento: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="lugar_nacimiento" name="lugar_nacimiento" required="required" placeholder="Ingrese Lugar de Nacimiento" value="<?php echo $lugar_nac; ?>">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="nacionalidad">Nacionalidad: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="nacionalidad" name="nacionalidad" required="required" placeholder="Ingrese Nacionalidad" value="<?php echo $nacionalidad; ?>">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                            <button class="btn btn-round btn-default siguiente" type="button" id="btnsiguiente" name="btnsiguiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                        </fieldset>

                        <fieldset>
                        <h3><strong>Paso 2: <small>Datos Personales</small></strong></h3>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Familiar: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="estado_familiar" name="estado_familiar">
                              <option selected="selected" value="">Seleccione Estado Familiar</option>
                                <option value="Soltero (a)" <?php if($estado_civil=="Soltero (a)") echo "selected"; ?> >Soltero (a)</option>
                                <option value="Casado (a)" <?php if($estado_civil=="Casado (a)") echo "selected"; ?> >Casado (a)</option>
                                <option value="Acompañado (a)" <?php if($estado_civil=="Acompañado (a)") echo "selected"; ?> >Acompañado (a)</option>
                                <option value="Divorciado (a)" <?php if($estado_civil=="Divorciado (a)") echo "selected"; ?> >Divorciado (a)</option>
                                <option value="Viudo (a)" <?php if($estado_civil=="Viudo (a)") echo "selected"; ?> >Viudo (a)</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="direccion" name="direccion" required="required" placeholder="Ingrese Dirección" value="<?php echo $direccion; ?>">
                              <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block" id="error"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Zona: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="zona" name="zona">
                              <option selected="selected" value="">Seleccione Zona</option>
                                <option value="Rural" <?php if($zona=="Rural") echo "selected"; ?> >Rural</option>
                                <option value="Urbana" <?php if($zona=="Urbana") echo "selected"; ?> >Urbana</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Vinculo Plan: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class=" col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio"  id="vinculo_plan" name="vinculo_plan" value="No" <?php if($vinculo_plan=="No") echo "checked"; ?> > No </label>
                              <label>
                              <input type="radio"  id="vinculo_plan" name="vinculo_plan" value="Si" <?php if($vinculo_plan!="No") echo "checked"; ?> > Si </label>
                            </div>
                          </div>

                          <div class="form-group" id="div_vp" name="div_vp">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="detalle_vp">Detalle: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="detalle_vp" name="detalle_vp" required="required" placeholder="Ingrese Detalle" value="<?php echo $vinculo_plan; ?>">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="estatura">Estatura: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="estatura" name="estatura" required="required" placeholder="Ingrese Estatura" value="<?php echo $estatura; ?>">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12 text-left">Centímetros</label>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="peso">Peso: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="peso" name="peso" required="required" placeholder="Ingrese Peso" value="<?php echo $peso; ?>">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12 text-left">Libras</label>
                            <span class="help-block"></span>
                          </div>
                    
                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >¿Desea Cambiar Departamento?
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            </br>
                            <input type="checkbox" class="" id="depto" name="depto"/>
                          </div>
                        </div>
                          <div id="div_depto" name="div_depto">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="departamento">Departamento: <span class="required" style="color: #CD5C5C;"> *</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="departamento" name="departamento">
                                </select>
                              </div>
                              <span class="help-block"></span>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="municipio">Municipio: <span class="required" style="color: #CD5C5C;"> *</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="municipio" name="municipio">
                                </select>
                              </div>
                              <span class="help-block"></span>
                            </div>
                          </div>
                          

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Genero: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="genero" name="genero" value="Masculino" <?php if($sexo=="Masculino") echo "checked"; ?> > Masculino </label>
                              <label>
                              <input type="radio" class=" " id="genero" name="genero" value="Femenino" <?php if($sexo=="Femenino") echo "checked"; ?> > Femenino </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dui">DUI: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="dui" name="dui" data-inputmask="'mask': '99999999-9'" required="required" class="form-control col-md-7 col-xs-12" placeholder="Digite DUI" value="<?php echo $DUI; ?>">
                              <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div> 

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nit">NIT: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="nit" name="nit" data-inputmask="'mask': '9999-999999-999-9'" required="required" class="form-control col-md-7 col-xs-12" placeholder="Digite NIT" value="<?php echo $NIT; ?>">
                              <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="telefono" name= "telefono" data-inputmask="'mask': '9999-9999'" required="required" placeholder="Ingrese Número de Teléfono" value="<?php echo $telefono; ?>">
                              <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo">Correo Electrónico: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="correo" name= "correo" required="required" placeholder="Ingrese Correo Electrónico" value="<?php echo $correo; ?>">
                              <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                        
                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                        </fieldset>

                        <fieldset>
                        <h3><strong>Paso 4: <small>Datos Personales</small></strong></h3>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Curso de ANSP: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="curso_ansp" name="curso_ansp" value="No" <?php if($curso_ansp=="No") echo "checked"; ?> > No </label>
                              <label>
                              <input type="radio" class=" " id="curso_ansp" name="curso_ansp" value="Si" <?php if($curso_ansp=="Si") echo "checked"; ?> > Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Discapacidades: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class=" col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio"  id="discapacidades" name="discapacidades" value="No" <?php if($discapacidades=="No") echo "checked"; ?> > No </label>
                              <label>
                              <input type="radio"  id="discapacidades" name="discapacidades" value="Si" <?php if($discapacidades!="No") echo "checked"; ?> > Si </label>
                            </div>
                          </div>

                          <div class="form-group" id="div_d" name="div_d">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="tipo_discapacidad">Tipo Discapacidad: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="tipo_discapacidad" name="tipo_discapacidad" required="required" placeholder="Ingrese Tipo Discapacidad" value="<?php echo $discapacidades; ?>">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Licencia de Arma: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="licencia_arma" name="licencia_arma" value="No" <?php if($licencia_arma=="No") echo "checked"; ?> > No </label>
                              <label>
                              <input type="radio" class=" " id="licencia_arma" name="licencia_arma" value="Si" <?php if($licencia_arma=="Si") echo "checked"; ?> > Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Posee Arma: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="posee_arma" name="posee_arma" value="No" <?php if($arma=="No") echo "checked"; ?> > No </label>
                              <label>
                              <input type="radio" class=" " id="posee_arma" name="posee_arma" value="Si" <?php if($arma=="Si") echo "checked"; ?> > Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Licencia de Motocicleta: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <br />
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="licencia_motocicleta" name="licencia_motocicleta" value="No" <?php if($licencia_moto=="No") echo "checked"; ?> > No </label>
                              <label>
                              <input type="radio" class=" " id="licencia_motocicleta" name="licencia_motocicleta" value="Si" <?php if($licencia_moto=="Si") echo "checked"; ?> > Si </label>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Licencia de Vehículo: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="licencia_vehiculo" name="licencia_vehiculo" value="No" <?php if($licencia_vehiculo=="No") echo "checked"; ?> > No </label>
                              <label>
                              <input type="radio" class=" " id="licencia_vehiculo" name="licencia_vehiculo" value="Si" <?php if($licencia_vehiculo=="Si") echo "checked"; ?> > Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Vehículo Propio: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="vehico_propio" name="vehico_propio" value="No" <?php if($vehico_propio=="No") echo "checked"; ?> > No </label>
                              <label>
                              <input type="radio" class=" " id="vehico_propio" name="vehico_propio" value="Si" <?php if($vehico_propio=="Si") echo "checked"; ?> > Si </label>
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior2" name="btnanteior2"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente3" name="btnsigiente3"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                        </fieldset>

                        <fieldset>
                        <h3><strong>Paso 5: <small>Datos Personales</small></strong></h3>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="num_per_dep_ust">Número de Personas que Dependen de Usted: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label><br />
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="num_per_dep_ust" name="num_per_dep_ust" required="required" placeholder="Ingrese Número de Personas" value="<?php echo $personas_dependientes; ?>">
                              <span class="fa fa-calculator form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="ult_gra_apr">Último Grado Aprobado: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label><br />
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="ult_gra_apr" name="ult_gra_apr" required="required" placeholder="Ingrese Último Grado Aprobado" value="<?php echo $ultimo_grado; ?>">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idioma">Idioma: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="idioma" name="idioma" required="required" placeholder="Ingrese Idioma" value="<?php echo $idiomas; ?>">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="conocimientos">Conocimientos: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="conocimientos" name="conocimientos" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese conocimientos"><?php echo $conocimientos; ?></textarea>
                            </div>
                            <span class="help-block" ></span>
                          </div>

                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior2" name="btnanteior2"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente3" name="btnsigiente3"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                        </fieldset>

                        <fieldset>
                        <h3><strong>Paso 6: <small>Datos Personales</small></strong></h3>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hab_des">Habilidades y Destrezas: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="hab_des" name="hab_des" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Habilidades y Destrezas"><?php echo $habilidades_deztrezas; ?></textarea>
                            </div>
                            <span class="help-block" ></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observaciones">Observaciones: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="observaciones" name="observaciones" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Observaciones"><?php echo $observaciones; ?></textarea>
                            </div>
                            <span class="help-block" ></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experiencia">Experiencia: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="experiencia" name="experiencia" required="required" placeholder="Ingrese Experiencia" value="<?php echo $experiencia; ?>">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block" ></span>
                          </div>
                          <br />
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="archivo">Archivo:
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <input type="file" id="archivo" name="archivo"  accept=".pdf" value="<?php echo $curriculum; ?>">
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-primary" type="button" id="btneditar" name="btneditar"><i class="fa fa-refresh"></i>  Actualizar</button>
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
  
    
    <!-- PNotify -->
    <script src="../vendors/PNotify/dist/iife/PNotify.js"></script>
    <script src="../vendors/PNotify/dist/iife/PNotifyButtons.js"></script>
    <script src="../vendors/PNotify/dist/iife/PNotifyConfirm.js"></script>
    <script src="../vendors/PNotify/dist/iife/PNotifyMobile.js"></script>

    <!-- bootstrap-datepicker -->
    <script src="../vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Validaciones -->
    <script src="../vendors/validar/jquery.validate.js"></script>
    <!-- Validaciones Form Demandante -->
    <script src="../build/js/validaciones/form_demandante.js"></script>
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