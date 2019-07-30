$(document).ready(function(){
      $("#div_o").hide();
      $("#div_em").hide();
      $("#div_emp").hide();
      $("#div_empre").hide();
  
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

       $.validator.addMethod("mvclave", function(value, element) {
           return /^[ a-z0-9áéíóúüñ]*$/i.test(value);
       }, "Ingrese sólo letras, números o espacios.");
   
       $("#form_usuario").validate({
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
             minlength: 3,
             maxlength: 100
           },
           apellido: {
            letrasOespacio: true,
            required: true,
            minlength: 4,
            maxlength: 100
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
           usuario: {
             alfanumOespacio: true,
             required: true,
             minlength: 5,
             maxlength: 100
           }, 
           nivel:{
            required: true
          },
          empresa:{
            required: true
          },
          oficina:{
            required: true
          },
           correo: {
            correo: true,
            required: true,
            minlength: 10,
            maxlength: 80
          },
          clave: {
            mvclave: true,
            required: true,
            minlength: 5,
            maxlength: 30
          },
          confirmar_clave: {
            required:true,
            equalTo: "#clave"
          }
         },
         messages: {
          nombre: {
            required: "Por favor, ingrese nombre.",
            maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
          },
          apellido: {
            required: "Por favor, ingrese apellido.",
            maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 4 carácteres."
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
            usuario: {
             required: "Por favor, ingrese usuario.",
             maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
             minlength: "Debe ingresar m&iacute;nimo 5  carácteres."
           },
          nivel: {
            required: "Por favor, seleccione nivel."
          },
          empresa:{
            required: "Por favor, seleccione empresa."
          },
          oficina: {
            required: "Por favor, seleccione oficina."
          },
           correo: {
            required: "Por favor, ingrese correo electrónico.",
            maxlength: "Debe ingresar m&aacute;ximo 80 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 10 carácteres."
          },
           clave: {
              required: "Por favor, ingrese contraseña.",
              maxlength: "Debe ingresar m&aacute;ximo 30 carácteres.",
              minlength: "Debe ingresar m&iacute;nimo 5 carácteres."
           },         
           confirmar_clave: {
             required: "Por favor, ingrese contraseña.",
             equalTo: "Contrase&ntilde;a no coincide"
           }
         }
       });

       $.ajax({
        type: 'POST',
        url: '../build/sql/lista_oficinas.php'
        })
        .done(function(lista_oficinas){
          $('#oficina').html(lista_oficinas)
        })
        .fail(function(){
          alert('Error al cargar la Pagina')
        })
  
        $('input[id=of]').on('change', function() {
          if ($(this).is(':checked') ) {
              $("#div_o").show();
          } else {
              $("#div_o").hide();
              $("#oficina").val("");
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
        
        
        $("#nivel").on("change", function(){
          if($("#nivel").val()==="Gestor Empleo Plan"){
            $("#div_em").show();
          }else if($("#nivel").val()==="Empresa"){
              $("#div_em").show();
          }else{
            $("#div_em").hide();
            $("#empresa").val("");
          }
        });


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
   
  
    $("#btnguardar").click(function(){
    if($("#form_usuario").valid()){
     $('#bandera').val("add");
  
     $.ajax({
       type: 'POST',
       url: '../build/sql/crud_usuarios.php',
       data: $("#form_usuario").serialize()
     })
     .done(function(resultado_ajax){
       if(resultado_ajax === "Exito"){
          $("#form_usuario")[0].reset();
          $(".form-group").removeClass("has-success").addClass("");
          PNotify.success({
            title: 'Éxito',
            text: 'Registro almacenado.',
            styling: 'bootstrap3',
            icons: 'bootstrap3'
          });
       }
       if(resultado_ajax === "Error"){
        $("#form_usuario")[0].reset();
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

      if($("#form_usuario").valid()){
       $('#bandera').val("edit");
       $.ajax({
         type: 'POST',
         url: '../build/sql/crud_usuarios.php',
         data: $("#form_usuario").serialize()
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
                    location.href='../production/lista_usuarios.php';
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
                  location.href='../production/lista_usuarios.php';
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
  
  function mostrar_usuario(id){
    $("#mostrar").val(id);
    $("#from_mostrar_usuario").submit();
  }

  function editar_usuario(id){

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
      $("#from_editar_usuario").submit();
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
  
  function eliminar_usuario(id){

    var notice = PNotify.notice({
      title: 'Advertencia',
      text: '¿Esta seguro que desea eliminar el registro?',
      styling: 'bootstrap3',
      icons: 'bootstrap3',
      addclass: 'dark',
      icon: true,
      hide: false,
      stack: {
        'dir1': 'down',
        'modal': true,
        'firstpos1': 25
      },
      modules: {
        Confirm: {
          confirm: true,
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
         url: '../build/sql/crud_usuarios.php',
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
                      location.href='../production/lista_usuarios.php';
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