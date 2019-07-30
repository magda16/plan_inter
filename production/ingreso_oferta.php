
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
                    <h2>Registro Oferta</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Ofertas" href="lista_ofertas" ><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                    <form id="form_oferta" name="form_oferta" method="POST" class="form-horizontal form-label-left">
                      <input type="hidden" name="bandera" id="bandera">
                      <input type="hidden" id="id_usuario" name="id_usuario"  value="<?php echo $_SESSION['id_usuario']; ?>">
                        <fieldset>
                        <h3><strong>Paso 1: <small>Datos de la Oferta</small></strong></h3>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Empresa: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="empresa" name="empresa">
                              </select>
                            </div>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="nombre_puesto">Puesto Ofrecido: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="nombre_puesto" name="nombre_puesto" required="required" placeholder="Ingrese Puesto Ofrecido">
                              <span class="fa fa-sitemap form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>
                  
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_plazas">Cantidad de Plazas: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="numero_plazas" name="numero_plazas" required="required" placeholder="Ingrese Cantidad de Plazas">
                            <span class="fa fa-calculator form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                        </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="salario">Salario: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="salario" name="salario" required="required" placeholder="Ingrese Salario">
                              <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Forma de Pago: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="forma_pago" name="forma_pago">
                              <option selected="selected" value="">Seleccione Forma de Pago</option>
                                <option value="Destajo">Destajo</option>
                                <option value="Por Obra">Por Obra</option>
                                <option value="Base más Comisión">Base más Comisión</option>
                                <option value="A Definir">A Definir</option>
                                <option value="Hora">Hora</option>
                                <option value="otro_fp">Otro</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group" id="div_fp" name="div_fp">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="otro_forma_pago">Otra Forma de Pago: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="otro_forma_pago" name="otro_forma_pago" required="required" placeholder="Ingrese Forma de Pago">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Periodo de Pago: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="periodo_pago" name="periodo_pago">
                              <option selected="selected" value="">Seleccione Periodo de Pago</option>
                                <option value="Catorcenal">Catorcenal</option>
                                <option value="Mensual">Mensual</option>
                                <option value="Semanal">Semanal</option>
                                <option value="Diario">Diario</option>
                                <option value="Quincenal">Quincenal</option>
                                <option value="otro_pp">Otro</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group" id="div_pp" name="div_pp">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="otro_periodo_pago">Otro Periodo de Pago: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label><br />
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="otro_periodo_pago" name="otro_periodo_pago" required="required" placeholder="Ingrese Periodo de Pago">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Forma de Contratación: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <br />
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="forma_contratacion" name="forma_contratacion">
                              <option selected="selected" value="">Seleccione Forma de Contratación</option>
                                <option value="Eventual">Eventual</option>
                                <option value="Permanente">Permanente</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                         
                            <button class="btn btn-round btn-default siguiente" type="button" id="btnsiguiente" name="btnsiguiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                          
                        </fieldset>

                        <fieldset>

                          <h3><strong>Paso 2: <small>Datos de la Oferta</small></strong></h3>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Prestaciones: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="checkbox col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="checkbox" class=" " id="ninguna_pres" name="ninguna_pres" value="Ninguna"> Ninguna </label>
                              <br />
                              <div id="div_prestaciones" name="div_prestaciones">
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="De Ley"> De Ley </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Seguro de Vida y Accidentes"> Seguro de Vida y Accidentes </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Depreciación y gastos de gasolina"> Depreciación y gastos de gasolina </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Medicamentos"> Medicamentos </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Bonificaciones"> Bonificaciones </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Cooperativa de Empleados"> Cooperativa de Empleados </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Alimentación"> Alimentación </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Seguro de Vehículos"> Seguro de Vehículos </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Uniforme"> Uniforme </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Descuentos en compras"> Descuentos en compras </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Calzado"> Calzado </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Indemnización Anual"> Indemnización Anual </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Programa de Capacitación"> Programa de Capacitación </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Transporte"> Transporte </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Canasta Básica"> Canasta Básica </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Seguro Médico"> Seguro Médico </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Viáticos"> Viáticos </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Seguro de Vehículos"> Clínica Empresarial </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="prestaciones[]" name="prestaciones[]" value="Horas Extra"> Horas Extra </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="otras_p" name="otras_p" value="Otras"> Otras </label>
                              </div>
                            </div>
                            
                          </div>

                          <div class="form-group" id="div_op" name="div_op">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left">Otras Prestaciones: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            
                            <span class="help-block"></span>
                          </div>
                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>


                        <fieldset>

                        <h3><strong>Paso 3: <small>Datos de la Oferta</small></strong></h3>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jornada de Trabajo: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="jornada_trabajo" name="jornada_trabajo">
                              <option selected="selected" value="">Seleccione Jornada de Trabajo</option>
                                <option value="Medio Tiempo">Medio Tiempo</option>
                                <option value="Tiempo Completo">Tiempo Completo</option>
                                <option value="Rotación de Turnos">Rotación de Turnos</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="horario_trabajo">Horario de Trabajo: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="horario_trabajo" name="horario_trabajo" required="required" placeholder="Ingrese Horario de Trabajo">
                              <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="periodo_prueba">Periodo de Prueba: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="periodo_prueba" name="periodo_prueba" required="required" placeholder="Ingrese Periodo de Prueba">
                              
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <label class="control-label col-md-1 col-sm-1 col-xs-12 text-left" >Días
                              </label>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Requiere Discapacidad: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <br />
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="discapacidad" name="discapacidad" value="No" checked> No </label>
                              <label>
                              <input type="radio" class=" " id="discapacidad" name="discapacidad" value="Si"> Si </label>
                            </div>
                          </div>

                         
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descrip_puesto">Descripción del Puesto <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="descrip_puesto" name="descrip_puesto" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Descripción del Puesto"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="funciones">Funciones <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="funciones" name="funciones" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Funciones"></textarea>
                            </div>
                        </div>

                        
                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>
                          <h3><strong>Paso 4: <small>Requisitos Generales del Puesto</small></strong></h3>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experiencia_laboral">Experiencia Laboral: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="experiencia_laboral" name="experiencia_laboral" required="required" placeholder="Ingrese Experiencia Laboral">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rango_edad">Rango de Edad: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="rango_edad" name="rango_edad" required="required" placeholder="Ingrese Rango de Edad">
                              <span class="fa fa-arrows-h form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Genero: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="genero" name="genero" value="Indistinto" checked> Indistinto </label>
                              <label>
                              <input type="radio" class=" " id="genero" name="genero" value="Masculino"> Masculino </label>
                              <label>
                              <input type="radio" class=" " id="genero" name="genero" value="Femenino"> Femenino </label>
                            </div>
                          </div>

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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="caracteristicas_personales">Características Personales  <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="caracteristicas_personales" name="caracteristicas_personales" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Características Personales"></textarea>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Documentos a Presentar: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="checkbox col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="checkbox" class=" " id="documentos_requeridos[]" name="documentos_requeridos[]" value="Carné de Residente"> Carné de Residente </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="documentos_requeridos[]" name="documentos_requeridos[]" value="Permiso de Trabajo"> Permiso de Trabajo </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="documentos_requeridos[]" name="documentos_requeridos[]" value="Pasaporte"> Pasaporte </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="documentos_requeridos[]" name="documentos_requeridos[]" value="DUI"> DUI </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="documentos_requeridos[]" name="documentos_requeridos[]" value="NUP"> NUP </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="documentos_requeridos[]" name="documentos_requeridos[]" value="ISSS"> ISSS </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="documentos_requeridos[]" name="documentos_requeridos[]" value="Licencia de Conducir"> Licencia de Conducir </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="documentos_requeridos[]" name="documentos_requeridos[]" value="Currículo Vitae"> Currículo Vitae </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="documentos_requeridos[]" name="documentos_requeridos[]" value="NIT"> NIT </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="documentos_requeridos[]" name="documentos_requeridos[]" value="Licencia de Portación de Armas"> Licencia de Portación de Armas </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="documentos_requeridos[]" name="documentos_requeridos[]" value="Licencia de Motocicleta"> Licencia de Motocicleta </label>
        
                            </div>
                            
                          </div>

                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>
                          <h3><strong>Paso 5: <small>Requisitos Generales del Puesto</small></strong></h3>
                          
                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Otros Requerimientos: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="checkbox col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="checkbox" class=" " id="otros_requerimientos[]" name="otros_requerimientos[]" value="Recomendación Laboral"> Recomendación Laboral </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="otros_requerimientos[]" name="otros_requerimientos[]" value="Recomendación Personal"> Recomendación Personal </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="otros_requerimientos[]" name="otros_requerimientos[]" value="Foto"> Foto </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="otros_requerimientos[]" name="otros_requerimientos[]" value="Solvencia PNC"> Solvencia PNC </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="otros_requerimientos[]" name="otros_requerimientos[]" value="Resultado PAES"> Resultado PAES </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="otros_requerimientos[]" name="otros_requerimientos[]" value="Examen de Tórax y Pulmones"> Examen de Tórax y Pulmones </label>
                              <br />
                                <label>
                                <input type="checkbox" class=" " id="licencia_conducir" name="licencia_conducir" value="Licencia de Conducir"> Licencia de Conducir </label>
                                <div id="div_orinput" name="div_orinput">
                                </div>
                            </div>
                            
                          </div>
                          <div id="div_ve" id="div_ve">
                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Vehículo Propio: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <input type="checkbox" class="" id="switch1" name="switch1"/>
                            </div>
                          </div>


                          <div id="div_pve" name="div_pve">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="clase_vehiculo">Clase de Vehículo: <span class="required" style="color: #CD5C5C;"> *</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="clase_vehiculo" name="clase_vehiculo" required="required" placeholder="Ingrese Clase de Vehículo">
                                <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                              </div>
                              <span class="help-block"></span>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="anio_vehiculo">Año del Vehículo: <span class="required" style="color: #CD5C5C;"> *</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="anio_vehiculo" name="anio_vehiculo" required="required" placeholder="Ingrese Año del Vehículo">
                                <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                              </div>
                              <span class="help-block"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="clase_licencia">Clase de Licencia: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="clase_licencia" name="clase_licencia" required="required" placeholder="Ingrese Clase de Licencia">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>
                        </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Disponibilidad: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="checkbox col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="checkbox" class=" " id="disponibilidad[]" name="disponibilidad[]" value="Dispuesto (a) a viajar"> Dispuesto (a) a viajar </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="disponibilidad[]" name="disponibilidad[]" value="Trabajar en horas nocturnas"> Trabajar en horas nocturnas </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="disponibilidad[]" name="disponibilidad[]" value="Vivir en el lugar de trabajo"> Vivir en el lugar de trabajo </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="disponibilidad[]" name="disponibilidad[]" value="Residir fuera menos de 1 semana"> Residir fuera menos de 1 semana </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="disponibilidad[]" name="disponibilidad[]" value="Residir fuera más de 1 semana"> Residir fuera más de 1 semana </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="disponibilidad[]" name="disponibilidad[]" value="Trabajar los fines de semana"> Trabajar los fines de semana </label>
                              <br />
                              <label>
                              <input type="checkbox" class=" " id="otra_disponibilidad" name="otra_disponibilidad" value="Otras"> Otras </label>
                             
                            </div>
                            
                          </div>

                          <div class="form-group" id="div_di" name="div_di">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left">Otras Disponibilidades: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label><br />
                            <span class="help-block"></span>
                          </div>

                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>
                          <h3><strong>Paso 6: <small>Requisitos Generales del Puesto</small></strong></h3>
                          

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Incorporación: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="incorporacion" name="incorporacion">
                              <option selected="selected" value="">Seleccione Incorporación</option>
                                <option value="Inmediata">Inmediata</option>
                                <option value="Dentro de 8 días">Dentro de 8 días</option>
                                <option value="Dentro de 15 días">Dentro de 15 días</option>
                                <option value="Dentro de 30 días">Dentro de 30 días</option>
                                <option value="otra_in">Otra</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group" id="div_oi" name="div_oi">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="otra_incorporacion">Otra Incorporación: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="otra_incorporacion" name="otra_incorporacion" required="required" placeholder="Ingrese Incorporación">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="ult_gra_apr">Último Grado Aprobado: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
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
                                <textarea id="conocimientos" name="conocimientos" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese conocimientos"></textarea>
                            </div>
                            <span class="help-block" ></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hab_des">Habilidades y Destrezas: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="hab_des" name="hab_des" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Habilidades y Destrezas"></textarea>
                            </div>
                            <span class="help-block" ></span>
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
    <script src="../vendors/PNotify/dist/iife/PNotifyMobile.js"></script>

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