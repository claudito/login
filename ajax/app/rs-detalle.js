var objeto =  "rs-detalle";

function loadTabla(page,codigo){
    var parametros = {"action":"ajax","page":page,"codigo":codigo};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vista/modal/'+objeto+'/listar.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loader").html("<img src='../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tabla").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }
 
 function loadCab(page,codigo){
    var parametros = {"action":"ajax","page":page,"codigo":codigo};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vista/modal/'+objeto+'/cabecera.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loaderCab").html("<img src='../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tablaCab").html(data).fadeIn('slow');
        $("#loaderCab").html("");
      }
    })
  }

$( "#agregar" ).submit(function( event ) {
var parametros = $(this).serialize();
var idnumero   = $("#idnumero").val();
$.ajax({
  type: "POST",
  url:'../controlador/'+objeto+'/agregar.php',
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje 
  //$('#agregar').modal('hide'); // ocultar  formulario
  //$("#agregar")[0].reset();  //resetear inputs
  $('#newModal').modal('hide');  // ocultar modal
  loadTabla(1,idnumero);

  }
});
event.preventDefault();
});




$('#dataDelete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })



$( "#eliminarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
    var idnumero   = $("#idnumero").val();
       $.ajax({
          type: "POST",
          url:'../controlador/'+objeto+'/eliminar.php',
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $('#dataDelete').modal('hide');
          loadTabla(1,idnumero);

          }
      });
      event.preventDefault();
    });