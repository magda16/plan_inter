
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




$("#btnguardar").click(function(){
   
     $('#bandera').val("add");
     $.ajax({
       type: 'POST',
       url: '../build/sql/crud_add.php',
       data: $("#form_oficina").serialize()
     })
     .done(function(resultado_ajax){
        // alert(resultado_ajax);
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
     
    });