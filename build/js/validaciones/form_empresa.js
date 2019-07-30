$(document).ready(function(){

    $.validator.addMethod("letrasOespacio", function(value, element) {
        return /^[ a-záéíóúüñ]*$/i.test(value);
    }, "Ingrese sólo letras o espacios.");

    $.validator.addMethod("alfanumOespacio", function(value, element) {
        return /^[ a-z0-9áéíóúüñ.,]*$/i.test(value);
    }, "Ingrese sólo letras, números o espacios.");

    $.validator.addMethod("numero", function(value, element) {
        return /^[ 0-9-()]*$/i.test(value);
    }, "Ingrese sólo números");

    $.validator.addMethod("correo", function(value, element) {
        return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i.test(value);
    }, "Ingrese un correo v&aacute;lido.");

    $.validator.addMethod("mvdireccion", function(value, element) {
      return /^[ a-z0-9áéíóúüñ.,#]*$/i.test(value);
    }, "Carácter Inválido.");

    $.validator.addMethod("mvnomemp", function(value, element) {
      return /^[ a-z0-9áéíóúüñ.,#-+©*]*$/i.test(value);
  }, "Ingrese sólo letras, números o espacios.");


    $("#form_empresa").validate({
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
        razon_social: {
          mvnomemp: true,
          required: true,
          minlength: 3
        },
        nombre_comercial: {
          mvnomemp: true,
          required: true,
          minlength: 3
        },
        nit: {
          numero: true,
          required: true,
          minlength: 17,
          maxlength: 17
        },
        numero_patronal: {
          numero: true,
          required: true,
          minlength: 3
        },
        numero_contribuyente: {
          numero: true,
          required: true,
          minlength: 3
        },
        descrip_gral_act_econo: {
          alfanumOespacio: true,
          required: true,
          minlength: 8
        },
        descrip_espec_act_econo: {
          alfanumOespacio: true,
          required: true,
          minlength: 8
        },
        total_empleados: {
          numero: true,
          required: true,
          minlength: 1
        },
        direccion: {
          mvdireccion: true,
          required: true,
          minlength: 8
        }, 
        zona: {
          alfanumOespacio: true,
          required: true,
          minlength: 3
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
        }
      },
      messages: {
        razon_social: {
          required: "Por favor, ingrese razón social.",
          minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
        },
        nombre_comercial: {
          required: "Por favor, ingrese nombre comercial.",
          minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
        },
        nit: {
          required: "Por favor, digite NIT.",
          maxlength: "Debe ingresar m&aacute;ximo 17 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 17 dígitos."
        },
        numero_patronal: {
          required: "Por favor, ingrese número patronal.",
          minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
        },
        numero_contribuyente: {
          required: "Por favor, ingrese número contribuyente.",
          minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
        },
        descrip_gral_act_econo: {
          required: "Por favor, ingrese descrip. general de act. económica.",
          minlength: "Debe ingresar m&iacute;nimo 8 carácteres."
        },
        descrip_espec_act_econo: {
          required: "Por favor, ingrese descrip. específica de act. económica.",
          minlength: "Debe ingresar m&iacute;nimo 8 carácteres."
        },
        total_empleados: {
          required: "Por favor, ingrese total empleados.",
          minlength: "Debe ingresar m&iacute;nimo 1 carácteres."
        },
        direccion: {
          required: "Por favor, ingrese dirección.",
          minlength: "Debe ingresar m&iacute;nimo 8 carácteres."
        },     
        zona: {
          required: "Por favor, ingrese zona.",
          minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
        },
        telefono: {
          required: "Por favor, digite teléfono.",
          maxlength: "Debe ingresar m&aacute;ximo 9 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
        },
        correo: {
          required: "Por favor, ingrese correo electrónico.",
          minlength: "Debe ingresar m&iacute;nimo 8 carácteres."
        }
      }
    });
   


  $("#btnguardar").click(function(){
    if($("#form_empresa").valid()){
      $('#bandera').val("add");
      $.ajax({
        type: 'POST',
        url: '../build/sql/crud_empresas.php',
        data: $("#form_empresa").serialize()
      })
      .done(function(resultado_ajax){
        if(resultado_ajax === "Exito"){
          $("#form_empresa")[0].reset();
          $(".form-group").removeClass("has-success").addClass("");
          PNotify.success({
            title: 'Éxito',
            text: 'Registro almacenado.',
            styling: 'bootstrap3',
            icons: 'bootstrap3'
          });
        }
        if(resultado_ajax === "Error"){
          $("#form_empresa")[0].reset();
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
        alert('Error al cargar la página')
      })
        

    }
  
 });

 $("#btneditar").click(function(){
  if($("#form_empresa").valid()){
   $('#bandera').val("edit");
   $.ajax({
     type: 'POST',
     url: '../build/sql/crud_empresas.php',
     data: $("#form_empresa").serialize()
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
                location.href='../production/lista_empresas.php';
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
              location.href='../production/lista_empresas.php';
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

function mostrar_empresa(id){
  $("#mostrar").val(id);
  $("#from_mostrar_empresa").submit();
}

function editar_empresa(id){
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
    $("#from_editar_empresa").submit();
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

function eliminar_empresa(id){

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
         url: '../build/sql/crud_empresas.php',
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
                      location.href='../production/lista_empresas.php';
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