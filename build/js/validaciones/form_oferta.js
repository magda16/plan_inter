$(document).ready(function(){
  $("#div_fp").hide();
  $("#div_pp").hide();
  $("#div_op").hide();
  $("#div_ve").hide();
  $("#div_pve").hide();
  $("#div_di").hide();
  $("#div_oi").hide();
  $("#div_emp").hide();
  $("#div_mfp").hide();
  $("#div_mpp").hide();
  $("#div_min").hide();
  $("#div_mpres").hide();
  $("#div_mdpre").hide();
  $("#div_moreq").hide();
  $("#div_mdis").hide();

  var current = 1,current_step,next_step,steps;
  steps = $("fieldset").length;
  
  $(".siguiente").click(function(){
    if($("#form_oferta").valid()){
    current_step = $(this).parent();
    next_step = $(this).parent().next();
    next_step.show();
    current_step.hide();
    setProgressBar(++current);
    }
  });
  $(".anterior").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().prev();
    next_step.show();
    current_step.hide();
    setProgressBar(--current);
  });
  setProgressBar(current);
  // Change progress bar action
  function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")
      .html(percent+"%");   
  }

    $.ajax({
    type: 'POST',
    url: '../build/sql/lista_empresas.php'
    })
    .done(function(lista_empresas){
      $('#empresa').html(lista_empresas)
    })
    .fail(function(){
      alert('Error al cargar la Pagina')
    })

    $("#forma_pago").on("change", function(){
      if($("#forma_pago").val()==="otro_fp"){
        $("#div_fp").show();
      }else{
        $("#div_fp").hide();
        $("#otro_forma_pago").val("");
      }
    });

    $("#periodo_pago").on("change", function(){
      if($("#periodo_pago").val()==="otro_pp"){
        $("#div_pp").show();
      }else{
        $("#div_pp").hide();
        $("#otro_periodo_pago").val("");
      }
    });

    $("input[id='prestaciones_1']").click(function(){
      if($("input[id='prestaciones_1']").is(":checked")){
        $("#div_prestaciones").hide();
      }else{
        $("#div_prestaciones").show();
      }
   });

   $("input[id='otras_p']").click(function(){
    if($("input[id='otras_p']").is(":checked")){
      $("#div_op").show();
      $("#div_op").append('<div class="col-md-6 col-sm-6 col-xs-12" id="div_opinput" name="div_opinput"><input type="text" class="form-control has-feedback-left" id="prestaciones_21" name="prestaciones[]" required="required" placeholder="Ingrese Otras Prestaciones"><span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span></div>');
    }else{
      $("#div_op").hide();
      $("#div_opinput").remove();
    }
    
 });

  $("input[id='licencia_conducir']").click(function(){
    if($("input[id='licencia_conducir']").is(":checked")){
      $("#div_ve").show();
      $("#div_orinput").append('<input type="hidden" class="" id="otros_requerimientos_12" name="otros_requerimientos[]" value="Licencia de Conducir">');
    }else{
      $("#div_ve").hide();
      $("#div_orinput").remove();
      $("#clase_licencia").val("");

    }
  });

  $("input[id='switch1']").on("change", function() {
    if ($(this).is(':checked') ) {
      $("#div_pve").show();
    } else {
      $("#div_pve").hide();
      $("#clase_vehiculo").val("");
      $("#anio_vehiculo").val("");
    }
  });

  $("input[id='otra_disponibilidad']").click(function(){
    if($("input[id='otra_disponibilidad']").is(":checked")){
      $("#div_di").show();
      $("#div_di").append('<div class="col-md-6 col-sm-6 col-xs-12" id="div_diinput" name="div_opinput"><input type="text" class="form-control has-feedback-left" id="disponibilidad[]" name="disponibilidad[]" required="required" placeholder="Ingrese Disponibilidades"><span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span></div><span class="help-block"></span>');
    }else{
      $("#div_di").hide();
      $("#div_diinput").remove();
    }
    
 });

 $("#incorporacion").on("change", function(){
  if($("#incorporacion").val()==="otra_in"){
    $("#div_oi").show();
  }else{
    $("#div_oi").hide();
    $("#otra_incorporacion").val("");
  }
});

$('input[id=em]').on('change', function() {
  if ($(this).is(':checked') ) {
      $("#div_emp").show();
  } else {
      $("#div_emp").hide();
      $("#empresa").val("");
  }
});

$('input[id=cfp]').on('change', function() {
  if ($(this).is(':checked') ) {
      $("#div_mfp").show();
  } else {
      $("#div_mfp").hide();
      //$("#empresa").val("");
  }
});

$('input[id=cpp]').on('change', function() {
  if ($(this).is(':checked') ) {
      $("#div_mpp").show();
  } else {
      $("#div_mpp").hide();
      //$("#empresa").val("");
  }
});

$('input[id=cpr]').on('change', function() {
  if ($(this).is(':checked') ) {
      $("#div_mpres").show();
  } else {
      $("#div_mpres").hide();
      //$("#empresa").val("");
  }
});

$('input[id=cdp]').on('change', function() {
  if ($(this).is(':checked') ) {
      $("#div_mdpre").show();
  } else {
      $("#div_mdpre").hide();
      //$("#empresa").val("");
  }
});

$('input[id=cor]').on('change', function() {
  if ($(this).is(':checked') ) {
      $("#div_moreq").show();
  } else {
      $("#div_moreq").hide();
      //$("#empresa").val("");
  }
});


$('input[id=cdis]').on('change', function() {
  if ($(this).is(':checked') ) {
      $("#div_mdis").show();
  } else {
      $("#div_mdis").hide();
      //$("#empresa").val("");
  }
});





$('input[id=cin]').on('change', function() {
  if ($(this).is(':checked') ) {
      $("#div_min").show();
  } else {
      $("#div_min").hide();
      //$("#empresa").val("");
  }
});

$.validator.addMethod("letrasOespacio", function(value, element) {
  return /^[ a-záéíóúüñ]*$/i.test(value);
}, "Ingrese sólo letras o espacios.");

$.validator.addMethod("alfanumOespacio", function(value, element) {
  return /^[ a-z0-9áéíóúüñ.,]*$/i.test(value);
}, "Ingrese sólo letras, números o espacios.");

$.validator.addMethod("mvdireccion", function(value, element) {
return /^[ a-z0-9áéíóúüñ.,#]*$/i.test(value);
}, "Carácter Inválido.");

$.validator.addMethod("grado_apro", function(value, element) {
return /^[ a-z0-9áéíóúüñ.,º]*$/i.test(value);
}, "Ingrese sólo letras, números o espacios.");

$.validator.addMethod("numero", function(value, element) {
  return /^[ 0-9-(),.]*$/i.test(value);
}, "Ingrese sólo números");

$.validator.addMethod("correo", function(value, element) {
  return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i.test(value);
}, "Ingrese un correo válido.");


$("#form_oferta").validate({
errorPlacement: function (error, element) {
      $(element).closest('.form-group').find('.help-block').html(error.html());
  },
  highlight: function (element) {
      $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
  },
  unhighlight: function (element, errorClass, validClass) {
      $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
      $(element).closest('.form-group').find('.help-block').html('');
  },
rules: {
  empresa:{
    required: true
  },
  nombre_puesto: {
    letrasOespacio: true,
    required: true,
    minlength: 6
  },
  numero_plazas: {
    numero: true,
    required: true,
    minlength: 1
  },
  salario: {
    numero: true,
    required: true,
    minlength: 2
  },
  forma_pago:{
    required: true
  },
  otro_forma_pago: {
    letrasOespacio: true,
    required: true,
    minlength: 3
  },
  periodo_pago:{
    required: true
  },
  otro_periodo_pago: {
    letrasOespacio: true,
    required: true,
    minlength: 3
  },
  forma_contratacion:{
    required: true
  },
  'prestaciones[]': { 
    required: true, 
    minlength: 1 
  },
  jornada_trabajo:{
    required: true
  },
  horario_trabajo: {
    alfanumOespacio: true,
    required: true,
    minlength: 3
  }, 
  periodo_prueba:{
    numero: true,
    required: true
  },
  descrip_puesto: {
    alfanumOespacio: true,
    required: true,
    minlength: 6
  }, 
  funciones: {
    alfanumOespacio: true,
    required: true,
    minlength: 6
  },
  experiencia_laboral: {
    alfanumOespacio: true,
    required: true,
    minlength: 3
  },
  rango_edad: {
    alfanumOespacio: true,
    required: true,
    minlength: 3
  },
  estado_familiar:{
    required: true
  },
  caracteristicas_personales: {
    alfanumOespacio: true,
    required: true,
    minlength: 6
  },
  'documentos_requeridos[]': { 
    required: true, 
    minlength: 1 
  },
  'otros_requerimientos[]': { 
    required: true, 
    minlength: 1 
  },
  clase_vehiculo: {
    alfanumOespacio: true,
    required: true,
    minlength: 3
  },
  anio_vehiculo: {
    numero: true,
    required: true,
    minlength: 4
  },
  clase_licencia: {
    alfanumOespacio: true,
    required: true,
    minlength: 3
  },
  'disponibilidad[]': { 
    required: true, 
    minlength: 1 
  },
  incorporacion:{
    required: true
  },
  otra_incorporacion: {
    letrasOespacio: true,
    required: true,
    minlength: 3
  },
  ult_gra_apr: {
    grado_apro: true,
    required: true,
    minlength: 1
  },
  idioma: {
    letrasOespacio: true,
    required: true,
    minlength: 6
  },
  conocimientos: {
    alfanumOespacio: true,
    required: true,
    minlength: 6
  }, 
  hab_des: {
    alfanumOespacio: true,
    required: true,
    minlength: 6
  }
},
messages: {
  empresa: {
    required: "Por favor, seleccione empresa."
  },
  nombre_puesto: {
    required: "Por favor, ingrese nombre puesto.",
    minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
  },
  numero_plazas: {
    required: "Por favor, ingrese número plazas.",
    minlength: "Debe ingresar m&iacute;nimo 1 carácter."
  },
  salario: {
    required: "Por favor, ingrese salario.",
    minlength: "Debe ingresar m&iacute;nimo 2 carácteres."
  },
  forma_pago: {
    required: "Por favor, seleccione forma pago."
  },
  otro_forma_pago: {
    required: "Por favor, ingrese forma pago.",
    minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
  },
  periodo_pago: {
    required: "Por favor, seleccione periodo pago."
  },
  otro_periodo_pago: {
    required: "Por favor, ingrese periodo pago.",
    minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
  },
  forma_contratacion: {
    required: "Por favor, seleccione forma contratación."
  },
  'prestaciones[]': {
    required:"Debe seleccionar mínimo una prestación"
  },
  jornada_trabajo: {
    required: "Por favor, seleccione jornada trabajo."
  },
  horario_trabajo: {
    required: "Por favor, ingrese horario trabajo.",
    minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
  },
  periodo_prueba: {
    required: "Por favor, seleccione periodo prueba."
  },
  descrip_puesto: {
    required: "Por favor, ingrese descripción puesto.",
    minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
  },
  funciones: {
    required: "Por favor, ingrese funciones.",
    minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
  },
  experiencia_laboral: {
    required: "Por favor, ingrese experiencia laboral.",
    minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
  },
  rango_edad: {
    required: "Por favor, ingrese rango edad.",
    minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
  },
  estado_familiar: {
    required: "Por favor, seleccione estado familiar."
  },
  caracteristicas_personales: {
    required: "Por favor, ingrese características personales.",
    minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
  },
  'documentos_requeridos[]': {
    required:"Debe seleccionar mínimo un documento requerido"
  },
  'otros_requerimientos[]': {
    required:"Debe seleccionar mínimo un requerimiento"
  },
  clase_vehiculo: {
    required: "Por favor, ingrese clase vehículo.",
    minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
  },
  anio_vehiculo: {
    required: "Por favor, ingrese año vehículo.",
    minlength: "Debe ingresar m&iacute;nimo 4 carácteres."
  },
  clase_licencia: {
    required: "Por favor, ingrese clase licencia.",
    minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
  },
  'disponibilidad[]': {
    required:"Debe seleccionar mínimo una disponibilidad"
  },
  incorporacion: {
    required: "Por favor, seleccione incorporación."
  },
  otra_incorporacion: {
    required: "Por favor, ingrese incorporación.",
    minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
  },
  ult_gra_apr: {
    required: "Por favor, ingrese último grado aprobado.",
    minlength: "Debe ingresar m&iacute;nimo 1 carácteres."
  },
  idioma: {
    required: "Por favor, ingrese idioma.",
    minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
  },
  conocimientos: {
    required: "Por favor, ingrese conocimientos.",
    minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
  },
  hab_des: {
    required: "Por favor, ingrese habilidades y destrezas.",
    minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
  }
}
});



  


    $("#btnguardar").click(function(){
      if($("#form_oferta").valid()){
       $('#bandera').val("add");
       $.ajax({
         type: 'POST',
         url: '../build/sql/crud_ofertas.php',
         data: $("#form_oferta").serialize()
       })
       .done(function(resultado_ajax){
         alert(resultado_ajax);
         if(resultado_ajax === "Exito"){
          PNotify.success({
            title: 'Éxito',
            text: 'Registro almacenado.',
            styling: 'bootstrap3',
            icons: 'bootstrap3',
            hide: false,
            modules: {
              Confirm: {
                confirm: true,
                buttons: [{
                  text: 'Aceptar',
                  primary: true,
                  click: function(notice) {
                    notice.close();
                    location.href='../production/ingreso_oferta.php';
                  }
                }]
              },
              Buttons: {
                closer: false,
                sticker: false
              },
              History: {
                history: false
              }
            }
          });
        }
        if(resultado_ajax === "Error"){
          PNotify.error({
            title: 'Error',
            text: 'Sin conexión a la base de datos.',
            styling: 'bootstrap3',
            icons: 'bootstrap3',
            hide: false,
            modules: {
              Confirm: {
                confirm: true,
                buttons: [{
                  text: 'Aceptar',
                  primary: true,
                  click: function(notice) {
                    notice.close();
                    location.href='../production/ingreso_oferta.php';
                  }
                }]
              },
              Buttons: {
                closer: false,
                sticker: false
              },
              History: {
                history: false
              }
            }
          });
   
        }             
      })
      .fail(function(){
        alert('Error al cargar la Pagina')
      })
    }else{
      PNotify.info({
        title: 'Información',
        text: 'Revise que los datos esten completos.',
        styling: 'bootstrap3',
        icons: 'bootstrap3'
      });

    }
      
    });

      $("#btneditar").click(function(){
        if($("#form_oficina").valid()){
         $('#bandera').val("edit");
         $.ajax({
           type: 'POST',
           url: '../build/sql/crud_oficinas.php',
           data: $("#form_oficina").serialize()
         })
         .done(function(resultado_ajax){
           if(resultado_ajax === "Exito"){
              
              PNotify.success({
                title: 'Éxito',
                text: 'Registro actualizado.',
                styling: 'bootstrap3',
                icons: 'bootstrap3',
                hide: false,
                modules: {
                  Confirm: {
                    confirm: true,
                    buttons: [{
                      text: 'Aceptar',
                      primary: true,
                      click: function(notice) {
                        notice.close();
                        location.href='../production/lista_oficinas.php';
                      }
                    }]
                  },
                  Buttons: {
                    closer: false,
                    sticker: false
                  },
                  History: {
                    history: false
                  }
                }
              });
              
           }
           if(resultado_ajax === "Error"){
            
            PNotify.error({
              title: 'Error',
              text: 'Sin conexión a la base de datos.',
              styling: 'bootstrap3',
              icons: 'bootstrap3',
              hide: false,
              modules: {
                Confirm: {
                  confirm: true,
                  buttons: [{
                    text: 'Aceptar',
                    primary: true,
                    click: function(notice) {
                      notice.close();
                      location.href='../production/lista_oficinas.php';
                    }
                  }]
                },
                Buttons: {
                  closer: false,
                  sticker: false
                },
                History: {
                  history: false
                }
              }
            });
                   
           }             
         })
         .fail(function(){
           alert('Error al cargar la Pagina')
         })
            
      
        }
         
        });
    
    });

    function mostrar_oferta(id){
      $("#mostrar").val(id);
      $("#from_mostrar_oferta").submit();
    }
    
    function editar_oferta(id){
      var notice = PNotify.notice({
        title: 'Advertencia',
        text: '¿Esta seguro que desea modificar el registro?',
        styling: 'bootstrap3',
        icons: 'bootstrap3',
        icon: true,
        hide: false,
        stack: {
          'dir1': 'down',
          'modal': true,
          'firstpos1': 25
        },
        modules: {
          Confirm: {
            confirm: true
          },
          Buttons: {
            closer: false,
            sticker: false
          },
          History: {
            history: false
          },
        }
      });
      notice.on('pnotify.confirm', function() {
        $("#id").val(id);
        $("#from_editar_oferta").submit();
      });
      notice.on('pnotify.cancel', function() {
        PNotify.success({
          title: 'Éxito',
          text: 'Proceso Cancelado.',
          styling: 'bootstrap3',
          icons: 'bootstrap3'
        });
      });
      
    }
    
    function eliminar_oferta(id){
    
      var notice = PNotify.notice({
        title: 'Advertencia',
        text: '¿Esta seguro que desea eliminar el registro?',
        styling: 'bootstrap3',
        icons: 'bootstrap3',
        icon: true,
        hide: false,
        stack: {
          'dir1': 'down',
          'modal': true,
          'firstpos1': 25
        },
        modules: {
          Confirm: {
            confirm: true
          },
          Buttons: {
            closer: false,
            sticker: false
          },
          History: {
            history: false
          },
        }
      });
      notice.on('pnotify.confirm', function() {
          var bandera = "delete";
          $.ajax({
           type: 'POST',
           url: '../build/sql/crud_ofertas.php',
           data: {'bandera' : bandera, 'id' : id}
          })
          .done(function(resultado_ajax){
    
           if(resultado_ajax === "Exito"){
              
              PNotify.success({
                title: 'Éxito',
                text: 'Registro eliminado.',
                styling: 'bootstrap3',
                icons: 'bootstrap3',
                hide: false,
                modules: {
                  Confirm: {
                    confirm: true,
                    buttons: [{
                      text: 'Aceptar',
                      primary: true,
                      click: function(notice) {
                        notice.close();
                        location.href='../production/lista_ofertas.php';
                      }
                    }]
                  },
                  Buttons: {
                    closer: false,
                    sticker: false
                  },
                  History: {
                    history: false
                  }
                }
              });
              
           }
           if(resultado_ajax === "Error"){
            PNotify.error({
              title: 'Error',
              text: 'Sin conexión a la base de datos.',
              styling: 'bootstrap3',
              icons: 'bootstrap3'
            });
                   
           }             
         })
         .fail(function(){
           alert('Error al cargar la Pagina')
         })
      });
      notice.on('pnotify.cancel', function() {
        PNotify.success({
          title: 'Éxito',
          text: 'Proceso Cancelado.',
          styling: 'bootstrap3',
          icons: 'bootstrap3'
        });
      });
      
            
     
    }