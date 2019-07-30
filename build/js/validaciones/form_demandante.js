$(document).ready(function(){
  $("#div_d").hide();
  $("#div_vp").hide();
  $("#div_depto").hide();

  var current = 1,current_step,next_step,steps;
  steps = $("fieldset").length;
  
  $(".siguiente").click(function(){
    if($("#form_demandante").valid()){
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

    //Date picker
     $('#fecha').datepicker({
       autoclose: true
     })


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


  $("#form_demandante").validate({
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
      nombre: {
        letrasOespacio: true,
        required: true,
        minlength: 7
      },
      ocupacion: {
        letrasOespacio: true,
        required: true,
        minlength: 6
      },
      fecha: {
          required: true
      },
      lugar_nacimiento: {
        letrasOespacio: true,
        required: true,
        minlength: 4
      },
      nacionalidad: {
        letrasOespacio: true,
        required: true,
        minlength: 4
      },
      estado_familiar:{
        required: true
      },
      direccion: {
        mvdireccion: true,
        required: true,
        minlength: 8
      }, 
      zona:{
        required: true
      },
      detalle_vp: {
        alfanumOespacio: true,
        required: true,
        minlength: 6
      }, 
      estatura: {
        numero: true,
        required: true,
        minlength: 2
      },
      peso: {
        numero: true,
        required: true,
        minlength: 2
      },
      departamento:{
        required: true,
        number: true
      },
      municipio:{
        required: true,
        number: true
      },
      dui: {
        numero: true,
        required: true,
        minlength: 10,
        maxlength: 10
      },
      nit: {
        numero: true,
        required: true,
        minlength: 17,
        maxlength: 17
      },
      telefono: {
        numero: true,
        required: true,
        minlength: 9,
        maxlength: 9
      },
      correo: {
        correo: true,
        required: true,
        minlength: 8
      },
      tipo_discapacidad:{
        alfanumOespacio: true,
        required: true,
        minlength: 6
      },
      num_per_dep_ust: {
        numero: true,
        required: true,
        minlength: 1
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
      },
      observaciones: {
        alfanumOespacio: true,
        required: true,
        minlength: 6
      },
      experiencia: {
        alfanumOespacio: true,
        required: true,
        minlength: 1
      }
    },
    messages: {
      nombre: {
        required: "Por favor, ingrese nombre completo.",
        minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
      },
      ocupacion: {
        required: "Por favor, ingrese ocupación.",
        minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
      },
      fecha: {
        required: "Por favor, ingrese fecha de nacimiento.",
      },
      lugar_nacimiento: {
        required: "Por favor, ingrese lugar de nacimiento.",
        minlength: "Debe ingresar m&iacute;nimo 4 carácteres."
      },
      nacionalidad: {
        required: "Por favor, ingrese nacionalidad.",
        minlength: "Debe ingresar m&iacute;nimo 4 carácteres."
      },
      estado_familiar: {
        required: "Por favor, seleccione estado familiar."
      },
      direccion: {
        required: "Por favor, ingrese dirección.",
        minlength: "Debe ingresar m&iacute;nimo 8 carácteres."
      },
      zona: {
        required: "Por favor, seleccione zona."
      },
      detalle_vp: {
        required: "Por favor, ingrese detalle.",
        minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
      },
      estatura: {
        required: "Por favor, ingrese estatura.",
        minlength: "Debe ingresar m&iacute;nimo 2 carácteres."
      },
      peso: {
        required: "Por favor, ingrese peso.",
        minlength: "Debe ingresar m&iacute;nimo 2 carácteres."
      },
      departamento: {
        required: "Por favor, seleccione departamento."
      },
      municipio: {
        required: "Por favor, seleccione municipio."
      },
      dui: {
        required: "Por favor, digite DUI.",
        maxlength: "Debe ingresar m&aacute;ximo 10 dígitos.",
        minlength: "Debe ingresar m&iacute;nimo 10 dígitos."
      },
      nit: {
        required: "Por favor, digite NIT.",
        maxlength: "Debe ingresar m&aacute;ximo 17 dígitos.",
        minlength: "Debe ingresar m&iacute;nimo 17 dígitos."
      },
      telefono: {
        required: "Por favor, digite teléfono.",
        maxlength: "Debe ingresar m&aacute;ximo 9 dígitos.",
        minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
      },
      correo: {
        required: "Por favor, ingrese correo electrónico.",
        minlength: "Debe ingresar m&iacute;nimo 8 carácteres."
      },
      tipo_discapacidad: {
        required: "Por favor, ingrese tipo discapacidad.",
        minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
      }, 
      num_per_dep_ust: {
        required: "Por favor, ingrese número de personas.",
        minlength: "Debe ingresar m&iacute;nimo 1 carácter."
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
      },
      observaciones: {
        required: "Por favor, ingrese observaciones.",
        minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
      },
      experiencia: {
        required: "Por favor, ingrese experiencia.",
        minlength: "Debe ingresar m&iacute;nimo 1 carácter."
      }
    }
  });
  


     function calculateAge(birthday) {
      var birthday_arr = birthday.split("/");
      var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
      var ageDifMs = Date.now() - birthday_date.getTime();
      var ageDate = new Date(ageDifMs);
      return Math.abs(ageDate.getUTCFullYear() - 1970);
    }
 

    $('#fecha').on('change', function(){
      var fecha=$('#fecha').val();
      if(fecha != ""){
        
        var ed = calculateAge(fecha);
        if(ed>=14 && ed<=100){
          $(".edad").text(ed + " años");
          $("#error").text("");
          $('#error_e').removeClass('has-error').addClass('has-success');
        }else{
            $(".edad").text("");
            $("#fecha").val("")
            $("#error").text("Fecha Incorrecta");
            $('#error_e').removeClass('has-success').addClass('has-error');
        }  
      }  
    });

    if($('#fecha').val()!=""){
      var fecha=$('#fecha').val();
      var ed = calculateAge(fecha);
        if(ed>=14 && ed<=100){
          $(".edad").text(ed + " años");
          $("#error").text("");
          $('#error_e').removeClass('has-error').addClass('has-success');
        }else{
            $(".edad").text("");
            $("#fecha").val("")
            $("#error").text("Fecha Incorrecta");
            $('#error_e').removeClass('has-success').addClass('has-error');
        }  
    }

    if($('#detalle_vp').val()!="No"){
      $("#div_vp").show();
    }


      if($('#tipo_discapacidad').val()!="No"){
        $("#div_d").show();
      }

    

     $.ajax({
      type: 'POST',
      url: '../build/sql/lista_departamentos.php'
      })
      .done(function(lista_departamentos){
        $('#departamento').html(lista_departamentos)
      })
      .fail(function(){
        alert('Error al cargar la Pagina')
      })

      $('#departamento').on('change', function(){
        var id = $('#departamento').val()
        $.ajax({
          type: 'POST',
          url: '../build/sql/lista_municipios.php',
          data: {'id': id}
        })
        .done(function(lista_municipios){
          $('#municipio').html(lista_municipios)
        })
        .fail(function(){
          alert('Error al cargar la Pagina')
        })
      });


     $("input[id='discapacidades']").on("change", function() {
      if ($(this).is(':checked') && $(this).val()=="Si") {
        $("#div_d").show();
      } else {
        $("#div_d").hide();
        $("#tipo_discapacidad").val("");
      }
    });

    $("input[id='vinculo_plan']").on("change", function() {
      if ($(this).is(':checked') && $(this).val()=="Si") {
        $("#div_vp").show();
      } else {
        $("#div_vp").hide();
        $("#detalle_vp").val("");
      }
    });

    $('input[id=depto]').on('change', function() {
      if ($(this).is(':checked') ) {
          $("#div_depto").show();
      } else {
          $("#div_depto").hide();
          $("#departamento").val("");
          $("#municipio").val("");
      }
    });


     $("#btnguardar").click(function(){
      if($("#form_demandante").valid()){
          $("#bandera").val("add");
          var formData = new FormData($("#form_demandante")[0]);
          $.ajax({
            type: 'POST',
            url: '../build/sql/crud_demandantes.php',
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
          })
          .done(function(resultado_ajax){
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
                        location.href='../production/ingreso_demandante.php';
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
                        location.href='../production/ingreso_demandante.php';
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
          if($("#form_demandante").valid()){
          $("#bandera").val("edit");
          var formData = new FormData($("#form_demandante")[0]);
          $.ajax({
            type: 'POST',
            url: '../build/sql/crud_demandantes.php',
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
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
                        location.href='../production/lista_demandantes.php';
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
                      location.href='../production/lista_demandantes.php';
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
});


