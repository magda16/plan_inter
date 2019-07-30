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
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-datepicker -->
    <link href="../vendors/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
       <br><br>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
             
            <h2><i class="fa fa-folder-open-o"></i> Demandantes</h2>
              
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos Personales</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- Smart Wizard -->
      
                    <!-- Tabs -->
                    <div id="wizard_verticle" class="form_wizard wizard_verticle">
                      <ul class="list-unstyled wizard_steps">
                        <li>
                          <a href="#step-11">
                            <span class="step_no">1</span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-22">
                            <span class="step_no">2</span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-33">
                            <span class="step_no">3</span>
                          </a>
                        </li>
                      </ul>

                      <div id="step-11">
                      <h3 class="StepTitle">Paso 1: <small>Registro</small></h3>
                        <form id="form_paso1" name="form_paso1" method="POST" action="../build/sql/crud_demandantes.php" class="form-horizontal form-label-left">
                        
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
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label">24 Años</label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="lugar_nacimiento">Lugar de Nacimiento: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="lugar_nacimiento" name="lugar_nacimiento" required="required" placeholder="Ingrese Lugar de Nacimiento">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="nacionalidad">Nacionalidad: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="nacionalidad" name="nacionalidad" required="required" placeholder="Ingrese Nacionalidad">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Familiar: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="estado_familiar" name="estado_familiar">
                              <option selected="selected" value="">Seleccione Estado Familiar</option>
                                <option value="1">Soltero (a)</option>
                                <option value="2">Casado (a)</option>
                                <option value="3">Viudo (a)</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="direccion" name="direccion" required="required" placeholder="Digite Dirección">
                              <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block" id="error"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="departamento">Departamento: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="departamento" name="departamento">
                              <option selected="selected" value="">Seleccione Departamento</option>
                                <option value="1">San Vicente</option>
                                <option value="2">San Salvador</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="municipio">Municipio: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="municipio" name="municipio">
                              <option selected="selected" value="">Seleccione Municipio</option>
                                <option value="1">San Lorenzo</option>
                                <option value="2">Apastepeque</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>
                          
                        </form>
                      </div>
                      <div id="step-22">
                      <h3 class="StepTitle">Paso 2: <small>Registro</small></h3>
                        <form id="form_paso2" name="form_paso2" method="POST" action="../build/sql/crud_demandantes.php" class="form-horizontal form-label-left">
                        
                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Genero: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class="flat" id="genero" name="genero" value="Masculino" checked> Masculino </label>
                              <label>
                              <input type="radio" class="flat" id="genero" name="genero" value="Femenino"> Femenino </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="estatura">Estatura: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="estatura" name="estatura" required="required" placeholder="Ingrese Estatura">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="peso">Peso: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="peso" name="peso" required="required" placeholder="Ingrese Peso">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dui">DUI: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="dui" name="dui" data-inputmask="'mask': '99999999-9'" required="required" class="form-control col-md-7 col-xs-12" tabindex="5" placeholder="Digite DUI">
                              <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div> 

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nit">NIT: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="nit" name="nit" data-inputmask="'mask': '9999-999999-999-9'" required="required" class="form-control col-md-7 col-xs-12" tabindex="4" placeholder="Digite NIT">
                              <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="telefono" name= "telefono" data-inputmask="'mask': '9999-9999'" required="required" placeholder="Ingrese Número de Teléfono">
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

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tiene Curso de ANSP: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class="flat" id="curso_ansp" name="curso_ansp" value="No" checked> No </label>
                              <label>
                              <input type="radio" class="flat" id="curso_ansp" name="curso_ansp" value="Si"> Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Discapacidades: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class="flat" id="discapacidades" name="discapacidades" value="No" checked> No </label>
                              <label>
                              <input type="radio" class="flat" id="discapacidades" name="discapacidades" value="Si"> Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_discapacidad">Tipo de Discapacidad: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" id="tipo_discapacidad" name="tipo_discapacidad">
                              <option selected="selected" value="">Seleccione Tipo de Discapacidad</option>
                                <option value="1">Audición</option>
                              </select>
                            </div>
                            <span class="help-block"></span>
                          </div>

                         </form>
                      </div>
                      <div id="step-33">
                      <h3 class="StepTitle">Paso 3: <small>Registro</small></h3>
                        <form id="form_paso3" name="form_paso3" method="POST" action="../build/sql/crud_demandantes.php" class="form-horizontal form-label-left">
                        <input type="hidden" name="bandera" id="bandera"> 
                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Licencia de Arma: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class="flat" id="licencia_arma" name="licencia_arma" value="No" checked> No </label>
                              <label>
                              <input type="radio" class="flat" id="licencia_arma" name="licencia_arma" value="Si"> Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Posee Arma: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class="flat" id="posee_arma" name="posee_arma" value="No" checked> No </label>
                              <label>
                              <input type="radio" class="flat" id="posee_arma" name="posee_arma" value="Si"> Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Licencia de Motocicleta: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class="flat" id="licencia_motocicleta" name="licencia_motocicleta" value="No" checked> No </label>
                              <label>
                              <input type="radio" class="flat" id="licencia_motocicleta" name="licencia_motocicleta" value="Si"> Si </label>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Licencia de Vehículo: <span class="required" style="color: #CD5C5C;"> *</span></label>
                            <div class="radio col-md-6 col-sm-6 col-xs-12">
                              <label>
                              <input type="radio" class="flat" id="licencia_vehiculo" name="licencia_vehiculo" value="No" checked> No </label>
                              <label>
                              <input type="radio" class="flat" id="licencia_vehiculo" name="licencia_vehiculo" value="Si"> Si </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="num_per_dep_ust">Número de Personas que Dependen de Usted: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="num_per_dep_ust" name="num_per_dep_ust" required="required" placeholder="Ingrese Número de Personas que Dependen de Usted">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-left" for="ult_gra_apr">Último Grado Aprobado: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="ult_gra_apr" name="ult_gra_apr" required="required" placeholder="Ingrese Último Grado Aprobado">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idioma">Idioma: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="idioma" name="idioma" required="required" placeholder="Ingrese Idioma">
                              <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block"></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="conocimientos">Conocimientos: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="conocimientos" name="conocimientos" required="required" placeholder="Ingrese Conocimientos">
                              <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block" ></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hab_des">Habilidades y Destrezas: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="hab_des" name="hab_des" required="required" placeholder="Ingrese Habilidades y Destrezas">
                              <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block" ></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experiencia">Experiencia: <span class="required" style="color: #CD5C5C;"> *</span>
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <input type="number" class="form-control has-feedback-left" id="experiencia" name="experiencia" required="required" placeholder="Ingrese Experiencia"><label>Años</label>
                              <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <span class="help-block" ></span>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="archivo">Archivo:
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <input type="file" id="archivo" name="archivo"  accept=".pdf,.jpg,.png">
                            </div>
                          </div>
                          
                        </form>
                      </div>
                
                    </div>
                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-datepicker -->
    <script src="../vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
    <!-- Validaciones -->
    <script src="../vendors/validar/jquery.validate.js"></script>
    <!-- Validaciones Form Demandantes -->
    <script src="../build/js/validaciones/form_demandantes.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

	
  </body>
</html>