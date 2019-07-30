<?php
session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");
$nivel_usu=$_SESSION['nivel_g'];
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
                    <h2>Registro Demandante</h2>
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
                      <input type="hidden" name="bandera" id="bandera">
                      <input type="hidden" id="id_usuario" name="id_usuario"  value="<?php echo $_SESSION['id_usuario']; ?>">
                      
                    <fieldset>
                        <h3><strong>Paso 1: <small>Datos Personales</small></strong></h3>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="nombre">Nombre Completo: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="nombre" name="nombre" required="required" placeholder="Ingrese Nombre Completo">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ocupacion">Ocupación: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="ocupacion" name="ocupacion" required="required" placeholder="Ingrese Ocupación">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block" ></span>
                          </div>

                          <div class="form-group" id="error_e">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha de Nacimiento: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="fecha" name="fecha" required="required" class="form-control col-md-7 col-xs-12" data-date-end-date = "0d">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block" id="error"></span>
                          </div>

                          <div class="form-group">
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
                              <input type="text" class="form-control has-feedback-left" id="lugar_nacimiento" name="lugar_nacimiento" required="required" placeholder="Ingrese Lugar de Nacimiento">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="nacionalidad">Nacionalidad: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="nacionalidad" name="nacionalidad" required="required" placeholder="Ingrese Nacionalidad">
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
                                <option value="Soltero (a)">Soltero (a)</option>
                                <option value="Casado (a)">Casado (a)</option>
                                <option value="Acompañado (a)">Acompañado (a)</option>
                                <option value="Divorciado (a)">Divorciado (a)</option>
                                <option value="Viudo (a)">Viudo (a)</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="direccion" name="direccion" required="required" placeholder="Ingrese Dirección">
                              <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block" id="error"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Zona: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="zona" name="zona">
                              <option selected="selected" value="">Seleccione Zona</option>
                                <option value="Rural">Rural</option>
                                <option value="Urbana">Urbana</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Vinculo Plan: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class=" col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio"  id="vinculo_plan" name="vinculo_plan" value="No" checked> No </label>
                              <label>
                              <input type="radio"  id="vinculo_plan" name="vinculo_plan" value="Si"> Si </label>
                            </div>
                          </div>

                          <div class="form-group" id="div_vp" name="div_vp">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="detalle_vp">Detalle: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="detalle_vp" name="detalle_vp" required="required" placeholder="Ingrese Detalle">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="estatura">Estatura: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="estatura" name="estatura" required="required" placeholder="Ingrese Estatura">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12 text-left" >Centímetros</label>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="peso">Peso: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="peso" name="peso" required="required" placeholder="Ingrese Peso">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12 text-left" >Libras</label>
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

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Genero: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="genero" name="genero" value="Masculino" checked> Masculino </label>
                              <label>
                              <input type="radio" class=" " id="genero" name="genero" value="Femenino"> Femenino </label>
                            </div>
                          </div>

                          

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dui">DUI: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="dui" name="dui" data-inputmask="'mask': '99999999-9'" required="required" class="form-control col-md-7 col-xs-12" placeholder="Digite DUI">
                              <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div> 

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nit">NIT: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="nit" name="nit" data-inputmask="'mask': '9999-999999-999-9'" required="required" class="form-control col-md-7 col-xs-12" placeholder="Digite NIT">
                              <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="telefono" name= "telefono" data-inputmask="'mask': '9999-9999'" required="required" placeholder="Digite Número de Teléfono">
                              <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo">Correo Electrónico: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="correo" name= "correo" required="required" placeholder="Ingrese Correo Electrónico">
                              <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                        
                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                        </fieldset>

                        <fieldset>
                        <h3><strong>Paso 4: <small>Datos Personales</small></strong></h3>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Curso de ANSP: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="curso_ansp" name="curso_ansp" value="No" checked> No </label>
                              <label>
                              <input type="radio" class=" " id="curso_ansp" name="curso_ansp" value="Si"> Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Discapacidades: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class=" col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio"  id="discapacidades" name="discapacidades" value="No" checked> No </label>
                              <label>
                              <input type="radio"  id="discapacidades" name="discapacidades" value="Si"> Si </label>
                            </div>
                          </div>

                          <div class="form-group" id="div_d" name="div_d">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="tipo_discapacidad">Tipo Discapacidad: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="tipo_discapacidad" name="tipo_discapacidad" required="required" placeholder="Ingrese Tipo Discapacidad">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Licencia de Arma: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="licencia_arma" name="licencia_arma" value="No" checked> No </label>
                              <label>
                              <input type="radio" class=" " id="licencia_arma" name="licencia_arma" value="Si"> Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Posee Arma: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="posee_arma" name="posee_arma" value="No" checked> No </label>
                              <label>
                              <input type="radio" class=" " id="posee_arma" name="posee_arma" value="Si"> Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Licencia de Motocicleta: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <br />
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="licencia_motocicleta" name="licencia_motocicleta" value="No" checked> No </label>
                              <label>
                              <input type="radio" class=" " id="licencia_motocicleta" name="licencia_motocicleta" value="Si"> Si </label>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Licencia de Vehículo: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="licencia_vehiculo" name="licencia_vehiculo" value="No" checked> No </label>
                              <label>
                              <input type="radio" class=" " id="licencia_vehiculo" name="licencia_vehiculo" value="Si"> Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Vehículo Propio: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="vehico_propio" name="vehico_propio" value="No" checked> No </label>
                              <label>
                              <input type="radio" class=" " id="vehico_propio" name="vehico_propio" value="Si"> Si </label>
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
                              <input type="text" class="form-control has-feedback-left" id="num_per_dep_ust" name="num_per_dep_ust" required="required" placeholder="Ingrese Número de Personas">
                              <span class="fa fa-calculator form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="ult_gra_apr">Último Grado Aprobado: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label><br />
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="ult_gra_apr" name="ult_gra_apr" required="required" placeholder="Ingrese Último Grado Aprobado">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idioma">Idioma: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="idioma" name="idioma" required="required" placeholder="Ingrese Idioma">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="conocimientos">Conocimientos: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="conocimientos" name="conocimientos" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Conocimientos"></textarea>
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
                            <textarea id="hab_des" name="hab_des" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Habilidades y Destrezas"></textarea>
                            </div>
                            <span class="help-block" ></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observaciones">Observaciones: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="observaciones" name="observaciones" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Observaciones"></textarea>
                            </div>
                            <span class="help-block" ></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experiencia">Experiencia: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="experiencia" name="experiencia" required="required" placeholder="Ingrese Experiencia">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block" ></span>
                          </div>
                          <br />
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="archivo">Archivo:
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <input type="file" id="archivo" name="archivo" accept=".pdf">
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-primary" type="button" id="btnguardar" name="btnguardar"><i class="fa fa-save"></i>  Guardar</button>
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