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
    current_step = $(this).parent();
    next_step = $(this).parent().next();
    next_step.show();
    current_step.hide();
    setProgressBar(++current);
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

    $("input[id='ninguna_pres']").click(function(){
      if($("input[id='ninguna_pres']").is(":checked")){
        $("#div_prestaciones").hide();
      }else{
        $("#div_prestaciones").show();
      }
   });

   $("input[id='otras_p']").click(function(){
    if($("input[id='otras_p']").is(":checked")){
      $("#div_op").show();
      $("#div_op").append('<div class="col-md-6 col-sm-6 col-xs-12" id="div_opinput" name="div_opinput"><input type="text" class="form-control has-feedback-left" id="prestaciones[]" name="prestaciones[]" required="required" placeholder="Ingrese Otras Prestaciones"><span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span></div>');
    }else{
      $("#div_op").hide();
      $("#div_opinput").remove();
    }
    
 });

  $("input[id='licencia_conducir']").click(function(){
    if($("input[id='licencia_conducir']").is(":checked")){
      $("#div_ve").show();
      $("#div_orinput").append('<input type="hidden" class="flat" id="otros_requerimientos[]" name="otros_requerimientos[]" value="Licencia de Conducir">');
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
      $("#div_di").append('<div class="col-md-6 col-sm-6 col-xs-12" id="div_diinput" name="div_opinput"><input type="text" class="form-control has-feedback-left" id="disponibilidad[]" name="disponibilidad[]" required="required" placeholder="Ingrese Disponibilidades"><span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span></div>');
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



  


    $("#btnguardar").click(function(){
     // if($("#form_oferta").valid()){
       $('#bandera').val("add");
       $.ajax({
         type: 'POST',
         url: '../build/sql/crud_ofertas.php',
         data: $("#form_oferta").serialize()
       })
       .done(function(resultado_ajax){
         alert(resultado_ajax);
         if(resultado_ajax === "Exito"){
            $("#form_oferta")[0].reset();
            $(".form-group").removeClass("has-success").addClass("");
            PNotify.success({
              title: 'Éxito',
              text: 'Registro almacenado.',
              styling: 'bootstrap3',
              icons: 'bootstrap3'
            });
         }
         if(resultado_ajax === "Error"){
          $("#form_oferta")[0].reset();
          $(".form-group").removeClass("has-success").addClass("");
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
          
     // }
       
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