$(document).ready(function(){

    $("#add_demandante").click(function(){
     // alert("entro add demandantes");
      $("#panel_inicio").remove();
     // $("#forms_demandante").load('form_add_demandantes.php');
      $.post("form_add_demandantes.php", function(htmlexterno){
        $("#forms_demandante").html(htmlexterno);
      });
      
    });

    $("#add_oficina").click(function(){
       $("#panel_inicio").remove();
       $("#forms_demandante").remove();
       $("#forms_oficinas").load("ingreso_oficina.php", function(html) {
        alert('Contenido actualizado');
      });
      /* $.post("ingreso_oficina.php", function(htmlexterno){
         $("#forms_oficinas").html(htmlexterno);
       });*/
       
     });

     
   
     
});
$("#btnguardar").click(function(){
  alert("entro");
});