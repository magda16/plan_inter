$(document).ready(function(){
  

     $.validator.addMethod("letrasOespacio", function(value, element) {
         return /^[ a-záéíóúüñ]*$/i.test(value);
     }, "Ingrese sólo letras o espacios.");
 
     $.validator.addMethod("numero", function(value, element) {
         return /^[ 0-9-()]*$/i.test(value);
     }, "Ingrese sólo números");
 
     $.validator.addMethod("correo", function(value, element) {
         return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i.test(value);
     }, "Ingrese un correo válido.");

     $.validator.addMethod("mvdireccion", function(value, element) {
      return /^[ a-z0-9áéíóúüñ.,#]*$/i.test(value);
     }, "Carácter Inválido.");
 
 
     $("#form_oficina").validate({
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
           minlength: 5
         },
         direccion: {
           mvdireccion: true,
           required: true,
           minlength: 8
         }, 
         responsable: {
            letrasOespacio: true,
            required: true,
            minlength: 7
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
         nombre: {
           required: "Por favor, ingrese nombre.",
           minlength: "Debe ingresar m&iacute;nimo 5 carácteres."
         },
         direccion: {
           required: "Por favor, ingrese dirección.",
           minlength: "Debe ingresar m&iacute;nimo 8 carácteres."
         },
         responsable: {
            required: "Por favor, ingrese responsable.",
            minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
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
  if($("#form_oficina").valid()){
   $('#bandera').val("add");
   $.ajax({
     type: 'POST',
     url: '../build/sql/crud_oficinas.php',
     data: $("#form_oficina").serialize()
   })
   .done(function(resultado_ajax){
     if(resultado_ajax === "Exito"){
        $("#form_oficina")[0].reset();
        $(".form-group").removeClass("has-success").addClass("");
        PNotify.success({
          title: 'Éxito',
          text: 'Registro almacenado.',
          styling: 'bootstrap3',
          icons: 'bootstrap3'
        });
     }
     if(resultado_ajax === "Error"){
      $("#form_oficina")[0].reset();
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

function mostrar_oficina(id){
  $("#mostrar").val(id);
  $("#from_mostrar_oficina").submit();
}

function editar_oficina(id){
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
    $("#from_editar_oficina").submit();
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

function eliminar_oficina(id){

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
       url: '../build/sql/crud_oficinas.php',
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