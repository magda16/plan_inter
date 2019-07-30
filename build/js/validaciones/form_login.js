$(document).ready(function(){

    $.validator.addMethod("alfanumOespacio", function(value, element) {
        return /^[ a-z0-9áéíóúüñ.,]*$/i.test(value);
    }, "Ingrese sólo letras, números o espacios.");

    $("#form_login").validate({
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
        usuario: {
          alfanumOespacio: true,
          required: true,
          minlength: 5,
          maxlength: 100
        },
        clave: {
          alfanumOespacio: true,
          required: true,
          minlength: 5,
          maxlength: 100
        }
      },
      messages: {
        usuario: {
            required: "Por favor, ingrese usuario.",
            maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 5 carácteres."
        },
        clave: {
          required: "Por favor, ingrese contraseña.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 5 carácteres."
        }
      }
    });


  $("#btningresar").click(function(){
    if($("#form_login").valid()){
      var usuario = $("#usuario").val();
      var clave = $("#clave").val();
          $.ajax({
            type: 'POST',
            url: '../build/sql/validar_usuario.php',
            data: {'usuario': usuario, 'clave': clave}
          })
          .done(function(resultado_ajax){
            if(resultado_ajax===""){
              $("#usuario").val("");
              $("#clave").val("");
              $('#result_clave_error').text("Datos erróneos");
              $('#result_usuario').removeClass('has-success').addClass('has-error');
              $('#result_clave').removeClass('has-success').addClass('has-error');
            }else{
              $("#form_login").submit();
            }
          })
          .fail(function(){
            alert('Error al cargar la página')
          })
        }
 });

});