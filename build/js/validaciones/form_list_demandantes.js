function mostrar_demandante(id){
  $("#mostrar").val(id);
  $("#from_mostrar_demandante").submit();
}

function editar_demandante(id){
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
      $("#from_editar_demandante").submit();
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
  
  function eliminar_demandante(id, url){
  
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
           url: '../build/sql/crud_demandantes.php',
           data: {'bandera' : bandera, 'id' : id, 'url' : url}
          })
          .done(function(resultado_ajax){
    
           if(resultado_ajax === "Exito"){
              alert(resultado_ajax);
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
  