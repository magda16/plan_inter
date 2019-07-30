function ver_oferta(id){
      $("#id").val(id);
      $("#from_ver_oferta").submit();
}


  function seleccion_aplicante(id){
      $("#id").val(id);
      $("#from_seleccion_aplicantes").submit();
  }


  function aplicar_oferta(id){
    var notice = PNotify.notice({
      title: 'Advertencia',
      text: '¿Esta seguro que desea aplicar?',
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
      var id_oferta = id;
      var id_demandante =$("#id_demandante").val();

      var bandera = "aplicacion_d";
          $.ajax({
           type: 'POST',
           url: '../build/sql/crud_aplicacion.php',
           data: {'bandera' : bandera, 'id_oferta' : id_oferta, 'id_demandante' : id_demandante}
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
                        location.href='../production/lista_demandantes_ofertas.php';
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

  function seleccionar(id){
    var notice = PNotify.notice({
      title: 'Advertencia',
      text: '¿Esta seguro que desea seleccionar candidato?',
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
      var id_demandante = id;
      var id_oferta =$("#id_oferta").val();

      var bandera = "seleccion_d";
          $.ajax({
           type: 'POST',
           url: '../build/sql/crud_aplicacion.php',
           data: {'bandera' : bandera, 'id_demandante' : id_demandante, 'id_oferta' : id_oferta}
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
                        location.href='../production/lista_aplicantes_oferta.php';
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