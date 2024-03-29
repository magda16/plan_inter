<?php
session_start();
$logueo=$_SESSION['logueado'];
if($logueo=='si'){
include ("../build/conexion.php");

if(isset($_POST['id'])){
    $id_oferta=$_POST['id'];

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
                    <h2>Editar Oferta</h2>
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
                      <input type="hidden" id="actualizar" name="actualizar" value="<?php echo $id_oferta; ?>">
                      <input type="hidden" id="emp" name="emp" value="<?php echo $empresa; ?>">
                        <fieldset>
                        <h3><strong>Paso 1: <small>Datos de la Oferta</small></strong></h3>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Empresa: <span style="color:	#000080;"> '</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                            <i class="fa fa-building"></i>
                            <label class="control-label  "><?php echo $emp; ?></label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >¿Desea Cambiar Empresa?
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            </br>
                            <input type="checkbox" class="" id="em" name="em"/>
                          </div>
                        </div>

                          <div id="div_emp" name="div_emp">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Empresa: <span class="required" style="color: #CD5C5C;"> *</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control" id="empresa" name="empresa">
                                  </select>
                                </div>
                                <span class="help-block"></span>
                            </div>
                          </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="nombre_puesto">Puesto Ofrecido: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="nombre_puesto" name="nombre_puesto" required="required" placeholder="Ingrese Puesto Ofrecido" value="<?php echo $nombre_puesto; ?>">
                              <span class="fa fa-sitemap form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>
                  
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero_plazas">Cantidad de Plazas: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="numero_plazas" name="numero_plazas" required="required" placeholder="Ingrese Cantidad de Plazas" value="<?php echo $numero_plazas; ?>">
                            <span class="fa fa-calculator form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                        </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="salario">Salario: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="salario" name="salario" required="required" placeholder="Ingrese Salario" value="<?php echo $salario; ?>">
                              <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                         
                            <button class="btn btn-round btn-default siguiente" type="button" id="btnsiguiente" name="btnsiguiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>
                          
                        </fieldset>

                          <fieldset>
                        <h3><strong>Paso 2: <small>Datos de la Oferta</small></strong></h3>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Forma de Pago: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label  "><?php echo $forma_pago; ?> </label>
                            </div>
                          </div>

                          <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >¿Desea Cambiar Forma de Pago?
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            </br>
                            <input type="checkbox" class="" id="cfp" name="cfp"/>
                          </div>
                        </div>

                          
                        <div class="form-group" id="div_mfp" name="div_mfp">
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Periodo de Pago: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label  "><?php echo $periodo_pago; ?> </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >¿Desea Cambiar Periodo de Pago?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              </br>
                              <input type="checkbox" class="" id="cpp" name="cpp"/>
                            </div>
                          </div>


                        <div class="form-group" id="div_mpp" name="div_mpp">
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
                                <option value="Eventual" <?php if($forma_contratacion=="Eventual") echo "selected"; ?> >Eventual</option>
                                <option value="Permanente" <?php if($forma_contratacion=="Permanente") echo "selected"; ?> >Permanente</option>
                              </select>
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

                          <h3><strong>Paso 3: <small>Datos de la Oferta</small></strong></h3>

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
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>                   

                        <fieldset>

                          <h3><strong>Paso 4: <small>Datos de la Oferta</small></strong></h3>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >¿Desea Cambiar Prestaciones?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              </br>
                              <input type="checkbox" class="" id="cpr" name="cpr"/>
                            </div>
                          </div>

                          <div class="form-group" id="div_mpres" name="div_mpres">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Prestaciones: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="checkbox col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="checkbox" class=" " id="ninguna_pres[]" name="ninguna_pres[]" value="Ninguna"> Ninguna </label>
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

                        <h3><strong>Paso 5: <small>Datos de la Oferta</small></strong></h3>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jornada de Trabajo: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="jornada_trabajo" name="jornada_trabajo">
                              <option selected="selected" value="">Seleccione Jornada de Trabajo</option>
                                <option value="Medio Tiempo" <?php if($jornada_trabajo=="Medio Tiempo") echo "selected"; ?> >Medio Tiempo</option>
                                <option value="Tiempo Completo" <?php if($jornada_trabajo=="Tiempo Completo") echo "selected"; ?> >Tiempo Completo</option>
                                <option value="Rotación de Turnos" <?php if($jornada_trabajo=="Rotación de Turnos") echo "selected"; ?> >Rotación de Turnos</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="horario_trabajo">Horario de Trabajo: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="horario_trabajo" name="horario_trabajo" required="required" placeholder="Ingrese Horario de Trabajo" value="<?php echo $horario_trabajo; ?>">
                              <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="periodo_prueba">Periodo de Prueba: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="periodo_prueba" name="periodo_prueba" required="required" placeholder="Ingrese Periodo de Prueba" value="<?php echo $periodo_prueba; ?>">
                              
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
                              <input type="radio" class=" " id="discapacidad" name="discapacidad" value="No" <?php if($discapacidad=="No") echo "checked"; ?> > No </label>
                              <label>
                              <input type="radio" class=" " id="discapacidad" name="discapacidad" value="Si" <?php if($discapacidad=="Si") echo "checked"; ?> > Si </label>
                            </div>
                          </div>

                         
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descrip_puesto">Descripción del Puesto <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="descrip_puesto" name="descrip_puesto" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Descripción del Puesto"><?php echo $descrip_puesto; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="funciones">Funciones <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="funciones" name="funciones" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Funciones"><?php echo $funciones; ?></textarea>
                            </div>
                        </div>

                        
                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>
                          <h3><strong>Paso 6: <small>Requisitos Generales del Puesto</small></strong></h3>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experiencia_laboral">Experiencia Laboral: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="experiencia_laboral" name="experiencia_laboral" required="required" placeholder="Ingrese Experiencia Laboral" value="<?php echo $experiencia_laboral; ?>">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rango_edad">Rango de Edad: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="rango_edad" name="rango_edad" required="required" placeholder="Ingrese Rango de Edad" value="<?php echo $rango_edad; ?>">
                              <span class="fa fa-arrows-h form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Genero: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class=" " id="genero" name="genero" value="Indistinto" <?php if($genero=="Indistinto") echo "checked"; ?> > Indistinto </label>
                              <label>
                              <input type="radio" class=" " id="genero" name="genero" value="Masculino" <?php if($genero=="Masculino") echo "checked"; ?> > Masculino </label>
                              <label>
                              <input type="radio" class=" " id="genero" name="genero" value="Femenino" <?php if($genero=="Femenino") echo "checked"; ?> > Femenino </label>
                            </div>
                          </div>

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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="caracteristicas_personales">Características Personales  <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="caracteristicas_personales" name="caracteristicas_personales" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Características Personales"><?php echo $caracteristicas_personales; ?></textarea>
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>
                          <h3><strong>Paso 7: <small>Requisitos Generales del Puesto</small></strong></h3>
                          

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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >¿Desea Cambiar Documentos a Presentar?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              </br>
                              <input type="checkbox" class="" id="cdp" name="cdp"/>
                            </div>
                          </div>
                          
                          <div class="form-group" id="div_mdpre" id="div_mdpre">
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
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>
                          <h3><strong>Paso 8: <small>Requisitos Generales del Puesto</small></strong></h3>
                          
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

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >¿Desea Cambiar Otros Requerimientos?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              </br>
                              <input type="checkbox" class="" id="cor" name="cor"/>
                            </div>
                          </div>

                          <div class="form-group" id="div_moreq" name="div_moreq">
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
                                <input type="text" class="form-control has-feedback-left" id="clase_vehiculo" name="clase_vehiculo" required="required" placeholder="Ingrese Clase de Vehículo" value="<?php echo $clase_vehiculo; ?>">
                                <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                              </div>
                              <span class="help-block"></span>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="anio_vehiculo">Año del Vehículo: <span class="required" style="color: #CD5C5C;"> *</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="anio_vehiculo" name="anio_vehiculo" required="required" placeholder="Ingrese Año del Vehículo" value="<?php echo $anio_vehiculo; ?>">
                                <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                              </div>
                              <span class="help-block"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="clase_licencia">Clase de Licencia: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="clase_licencia" name="clase_licencia" required="required" placeholder="Ingrese Clase de Licencia" value="<?php echo $clase_licencia; ?>">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>
                        </div>

                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>
                          <h3><strong>Paso 9: <small>Requisitos Generales del Puesto</small></strong></h3>
                          
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

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >¿Desea Cambiar Disponibilidad?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              </br>
                              <input type="checkbox" class="" id="cdis" name="cdis"/>
                            </div>
                          </div>

                          <div class="form-group" id="div_mdis" name="div_mdis">
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
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button class="btn btn-round btn-default anterior" type="button" id="btnanteior" name="btnanteior"><i class="fa fa-arrow-circle-left"></i>  Anterior</button>
                          <button class="btn btn-round btn-default siguiente" type="button" id="btnsigiente" name="btnsigiente"><i class="fa fa-arrow-circle-right"></i>  Siguiente</button>

                        </fieldset>

                        <fieldset>
                          <h3><strong>Paso 10: <small>Requisitos Generales del Puesto</small></strong></h3>
                          

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Incorporación: <span style="color:	#000080;"> '</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 lcolor">
                              <i class="fa fa-circle-o"></i>
                              <label class="control-label  "><?php echo $incorporacion; ?> </label>
                            </div>
                          </div>

                          <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >¿Desea Cambiar Incorporación?
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            </br>
                            <input type="checkbox" class="" id="cin" name="cin"/>
                          </div>
                        </div>


                        <div class="form-group" id="div_min" name="div_min">
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
                              <input type="text" class="form-control has-feedback-left" id="ult_gra_apr" name="ult_gra_apr" required="required" placeholder="Ingrese Último Grado Aprobado" value="<?php echo $ult_gra_apr; ?>">
                              <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idioma">Idioma: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="idioma" name="idioma" required="required" placeholder="Ingrese Idioma" value="<?php echo $idioma; ?>">
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

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hab_des">Habilidades y Destrezas: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="hab_des" name="hab_des" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ingrese Habilidades y Destrezas"><?php echo $hab_des; ?></textarea>
                            </div>
                            <span class="help-block" ></span>
                          </div>

                          
                          <div class="ln_solid"></div>
                          <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
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