$(document).ready(function(){

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

    $.validator.addMethod("numero", function(value, element) {
        return /^[ 0-9-()]*$/i.test(value);
    }, "Ingrese sólo números");

    $.validator.addMethod("correo", function(value, element) {
        return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i.test(value);
    }, "Ingrese un correo v&aacute;lido.");


    $("#form_paso").validate({
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
          minlength: 7,
          maxlength: 100
        },
        fecha: {
            required: true
        },
        lugar_nacimiento: {
          letrasOespacio: true,
          required: true,
          minlength: 7,
          maxlength: 100
        },
        nacionalidad: {
          letrasOespacio: true,
          required: true,
          minlength: 7,
          maxlength: 100
        },
        estado_familiar:{
          required: true,
          number: true
        },
        direccion: {
          letrasOespacio: true,
          required: true,
          minlength: 10,
          maxlength: 100
        }, 
        departamento:{
          required: true,
          number: true
        },
        municipio:{
          required: true,
          number: true
        },
        estatura: {
          required: true,
          minlength: 2,
          maxlength: 4
        },
        peso: {
          required: true,
          minlength: 2,
          maxlength: 4
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
          minlength: 10,
          maxlength: 80
        },
        tipo_discapacidad:{
          required: true,
          number: true
        },
        num_per_dep_ust: {
          numero: true,
          required: true,
          minlength: 2,
          maxlength: 2
        },
        ult_gra_apr: {
          letrasOespacio: true,
          required: true,
          minlength: 2,
          maxlength: 100
        },
        idioma: {
          letrasOespacio: true,
          required: true,
          minlength: 6,
          maxlength: 100
        },
        conocimientos: {
          letrasOespacio: true,
          required: true,
          minlength: 6,
          maxlength: 100
        }, 
        hab_des: {
          letrasOespacio: true,
          required: true,
          minlength: 6,
          maxlength: 100
        },
        experiencia: {
          numero: true,
          required: true,
          minlength: 1,
          maxlength: 4
        }
      },
      messages: {
        nombre: {
          required: "Por favor, ingrese nombre completo.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },
        fecha: {
          required: "Por favor, ingrese fecha de nacimiento.",
        },
        lugar_nacimiento: {
          required: "Por favor, ingrese lugar de nacimiento.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },
        nacionalidad: {
          required: "Por favor, ingrese nacionalidad.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },
        estado_familiar: {
          required: "Por favor, seleccione estado familiar."
        },
        direccion: {
          required: "Por favor, ingrese dirección.",
          maxlength: "Debe ingresar m&aacute;ximo 800 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 10  carácteres."
        },
        departamento: {
          required: "Por favor, seleccione departamento."
        },
        municipio: {
          required: "Por favor, seleccione municipio."
        },estatura: {
          required: "Por favor, ingrese estatura.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },
        peso: {
          required: "Por favor, ingrese peso.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },
        dui: {
          required: "Por favor, ingrese DUI.",
          maxlength: "Debe ingresar m&aacute;ximo 10 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 10 dígitos."
        },
        nit: {
          required: "Por favor, ingrese NIT.",
          maxlength: "Debe ingresar m&aacute;ximo 17 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 17 dígitos."
        },
        telefono: {
          required: "Por favor, ingrese teléfono.",
          maxlength: "Debe ingresar m&aacute;ximo 9 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
        },
        correo: {
          required: "Por favor, ingrese correo electrónico.",
          maxlength: "Debe ingresar m&aacute;ximo 80 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 10 carácteres."
        },
        tipo_discapacidad: {
          required: "Por favor, seleccione tipo de discapacidad."
        }, num_per_dep_ust: {
          required: "Por favor, ingrese número de personas que dependen de usted.",
          maxlength: "Debe ingresar m&aacute;ximo 2 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 2 carácteres."
        },
        ult_gra_apr: {
          required: "Por favor, ingrese último grado aprobado.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 2 carácteres."
        },
        idioma: {
          required: "Por favor, ingrese idioma.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
        },
        conocimientos: {
          required: "Por favor, ingrese conocimientos.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 6  carácteres."
        },
        hab_des: {
          required: "Por favor, ingrese habilidades y destrezas.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
        },
        experiencia: {
          required: "Por favor, ingrese experiencia.",
          maxlength: "Debe ingresar m&aacute;ximo 4 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 1  carácteres."
        }
      }
    });
    
  
    $("#form_paso1").validate({
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
          minlength: 7,
          maxlength: 100
        },
        fecha: {
            required: true
        },
        lugar_nacimiento: {
          letrasOespacio: true,
          required: true,
          minlength: 7,
          maxlength: 100
        },
        nacionalidad: {
          letrasOespacio: true,
          required: true,
          minlength: 7,
          maxlength: 100
        },
        estado_familiar:{
          required: true,
          number: true
        },
        direccion: {
          letrasOespacio: true,
          required: true,
          minlength: 10,
          maxlength: 100
        }, 
        departamento:{
          required: true,
          number: true
        },
        municipio:{
          required: true,
          number: true
        }
      },
      messages: {
        nombre: {
          required: "Por favor, ingrese nombre completo.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },
        fecha: {
          required: "Por favor, ingrese fecha de nacimiento.",
        },
        lugar_nacimiento: {
          required: "Por favor, ingrese lugar de nacimiento.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },
        nacionalidad: {
          required: "Por favor, ingrese nacionalidad.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },
        estado_familiar: {
          required: "Por favor, seleccione estado familiar."
        },
        direccion: {
          required: "Por favor, ingrese dirección.",
          maxlength: "Debe ingresar m&aacute;ximo 800 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 10  carácteres."
        },
        departamento: {
          required: "Por favor, seleccione departamento."
        },
        municipio: {
          required: "Por favor, seleccione municipio."
        } 
      }
    });

    $("#form_paso2").validate({
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
          estatura: {
            required: true,
            minlength: 2,
            maxlength: 4
          },
          peso: {
            required: true,
            minlength: 2,
            maxlength: 4
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
            minlength: 10,
            maxlength: 80
          },
          tipo_discapacidad:{
            required: true,
            number: true
          }
        },
        messages: {
          estatura: {
            required: "Por favor, ingrese estatura.",
            maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
          },
          peso: {
            required: "Por favor, ingrese peso.",
            maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
          },
          dui: {
            required: "Por favor, ingrese DUI.",
            maxlength: "Debe ingresar m&aacute;ximo 10 dígitos.",
            minlength: "Debe ingresar m&iacute;nimo 10 dígitos."
          },
          nit: {
            required: "Por favor, ingrese NIT.",
            maxlength: "Debe ingresar m&aacute;ximo 17 dígitos.",
            minlength: "Debe ingresar m&iacute;nimo 17 dígitos."
          },
          telefono: {
            required: "Por favor, ingrese teléfono.",
            maxlength: "Debe ingresar m&aacute;ximo 9 dígitos.",
            minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
          },
          correo: {
            required: "Por favor, ingrese correo electrónico.",
            maxlength: "Debe ingresar m&aacute;ximo 80 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 10 carácteres."
          },
          tipo_discapacidad: {
            required: "Por favor, seleccione tipo de discapacidad."
          } 
        }
    });

    $("#form_paso3").validate({
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
        num_per_dep_ust: {
          numero: true,
          required: true,
          minlength: 2,
          maxlength: 2
        },
        ult_gra_apr: {
          letrasOespacio: true,
          required: true,
          minlength: 2,
          maxlength: 100
        },
        idioma: {
          letrasOespacio: true,
          required: true,
          minlength: 6,
          maxlength: 100
        },
        conocimientos: {
          letrasOespacio: true,
          required: true,
          minlength: 6,
          maxlength: 100
        }, 
        hab_des: {
          letrasOespacio: true,
          required: true,
          minlength: 6,
          maxlength: 100
        },
        experiencia: {
          numero: true,
          required: true,
          minlength: 1,
          maxlength: 2
        }
      },
      messages: {
        num_per_dep_ust: {
          required: "Por favor, ingrese número de personas que dependen de usted.",
          maxlength: "Debe ingresar m&aacute;ximo 2 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 2 carácteres."
        },
        ult_gra_apr: {
          required: "Por favor, ingrese último grado aprobado.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 2 carácteres."
        },
        idioma: {
          required: "Por favor, ingrese idioma.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
        },
        conocimientos: {
          required: "Por favor, ingrese conocimientos.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 6  carácteres."
        },
        hab_des: {
          required: "Por favor, ingrese habilidades y destrezas.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
        },
        experiencia: {
          required: "Por favor, ingrese experiencia.",
          maxlength: "Debe ingresar m&aacute;ximo 2 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 1  carácteres."
        }
      }
    });



    $("#btnguardar").click(function(){
      alert("hi");
      if($("#form_paso3").valid()){
        alert("entro");
        $("#bandera").val("add");
        $("#form_paso3").submit();
        $("#form_paso2").submit();
        $("#form_paso1").submit();
       
       



      // $('#bandera').val("add");
      /* var data = $('#form_paso3').serializeArray();
       data.push({name: 'tipo_discapacidad', value: $("#tipo_discapacidad").va()});
       data.push({name: 'correo', value: $("#correo").va()});
       data.push({name: 'telefono', value: $("#telefono").va()});
       data.push({name: 'nit', value: $("#nit").va()});
       data.push({name: 'dui', value: $("#dui").va()});
       data.push({name: 'peso', value: $("#peso").va()});
       data.push({name: 'estatura', value: $("#estatura").va()});

       data.push({name: 'municipio', value: $("#municipio").va()});
       data.push({name: 'departamento', value: $("#departamento").va()});
       data.push({name: 'direccion', value: $("#direccion").va()});
       data.push({name: 'estado_familiar', value: $("#estado_familiar").va()});
       data.push({name: 'nacionalidad', value: $("#nacionalidad").va()});
       data.push({name: 'lugar_nacimiento', value: $("#lugar_nacimiento").va()});
       data.push({name: 'fecha', value: $("#fecha").va()});
       data.push({name: 'nombre', value: $("#nombre").va()});*/
       
      /* data1= $('#form_paso1').serialize();
       data2= $('#form_paso2').serialize();
       data3= $('#form_paso3').serialize();
       
 
       $("#bandera").val("add");
          var formData1 = new FormData($("#form_paso1")[0]);
          var formData2 = new FormData($("#form_paso2")[0]);
          var formData3 = new FormData($("#form_paso3")[0]);
          formData1.append('bandera', 'add');*/

         // $("#bandera").val("add");

         /*var idioma = $("#idioma").va();
         alert(idioma);


         var tipo_discapacidad = $("#tipo_discapacidad").va();
          var discapacidades = $("#discapacidades").va();
          var curso_ansp = $("#curso_ansp").va();
          var correo = $("#correo").va();
          var telefono = $("#telefono").va();
          var nit = $("#nit").va();
          var dui = $("#dui").va();
          var peso = $("#peso").va();
          var estatura = $("#estatura").va();
          var genero = $("#genero").va();

          var municipio = $("#municipio").va();
          var departamento =  $("#departamento").va();
          var direccion =  $("#direccion").va();
          var estado_familiar =  $("#estado_familiar").va();
          var nacionalidad = $("#nacionalidad").va();
          var lugar_nacimiento = $("#lugar_nacimiento").va();
          var fecha =  $("#fecha").va();
          var nombre =  $("#nombre").va();

          
          alert(nombre);
          alert(aui);
          var formData = new FormData($("#form_paso3")[0]);

          
          formData.append("tipo_discapacidad", tipo_discapacidad);
          formData.append("discapacidades", discapacidades);
          formData.append("curso_ansp", curso_ansp);
          formData.append("correo", correo);
          formData.append("telefono", telefono);
          formData.append("nit", nit);
          formData.append("dui", dui);
          formData.append("peso", peso );
          formData.append("estatura", estatura);
          formData.append("genero", genero);

          formData.append("municipio",  municipio);
          formData.append("departamento",  departamento);
          formData.append("direccion",  direccion);
          formData.append("estado_familiar",  estado_familiar);
          formData.append("nacionalidad", nacionalidad);
          formData.append("lugar_nacimiento", lugar_nacimiento);
          formData.append("fecha", fecha);
          formData.append("nombre", nombre);
         // formData.append('bandera', 'add');
          
         

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
        alert(resultado_ajax);
         /*if(resultado_ajax === "Exito"){
            $("#form_paso3")[0].reset();
            $(".form-group").removeClass("has-success").addClass("");
            new PNotify({
              title: 'Éxito',
              text: 'Datos Almacenados',
              type: 'success',
              styling: 'bootstrap3'
            });
         }
         if(resultado_ajax === "Error"){
          $("#form_paso3")[0].reset();
          $(".form-group").removeClass("has-success").addClass("");
          new PNotify({
            title: 'Advertencia',
            text: 'Sin Conexión a la Base de Datos',
            type: 'info',
            styling: 'bootstrap3',
            addclass: 'dark'
          });
                 
         }          
       })
       .fail(function(){
         alert('Error al cargar la Pagina')
       })*/


      }
  
    
  });

});
   
  
 