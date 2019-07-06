$(document).ready(function(){  //js que a partir de un codigo puesto en el input codigo va a getDetails hace la consulta y 
    //devuelve un objeto json en array y a partir de esos datos los rellena en los input restantes
 
 $(document).on('keydown', '.codigo', function() {
     
    
 
  var id = this.id;
  var splitid = id.split('_');
  var index = 1;

    //en caso de que se cambie el codigo todo lo demas de borra :)
    borrado=function(){
    document.getElementById('contenido').value = "";
    document.getElementById('material').value = "";
    document.getElementById('ancho').value = "";
    document.getElementById('profundidad').value = "";
    document.getElementById('alto').value = "";
    document.getElementById('estanteria').value = "";
    document.getElementById('leja').value = "";
}
borrado();


  // Initialize jQuery UI autocomplete
  $( '#'+id ).autocomplete({
   source: function( request, response ) {
    $.ajax({
     url: "../CONTROLADORES/getDetails.php",
     type: 'post',
     dataType: "json",
     data: {
      search: request.term,request:1
     },
     success: function( data ) {
      response( data );
     }
    });
   },
   select: function (event, ui) {
    $(this).val(ui.item.label); // display the selected text
    var userid = ui.item.value; // selected value
    
    var contenido = ui.item.contenido;
    var material = ui.item.material;
    var ancho = ui.item.ancho;
    var profundidad = ui.item.profundidad;
    var alto = ui.item.alto;
    var color = ui.item.color;
    var leja = ui.item.leja;
    var estanteria = ui.item.estanteria;
    
    document.getElementById('contenido').value = contenido;
    document.getElementById('material').value = material;
    document.getElementById('ancho').value = ancho;
    document.getElementById('profundidad').value = profundidad;
    document.getElementById('alto').value = alto;
    document.getElementById('color').value = "#"+color;
    document.getElementById('estanteria').value = estanteria;
    document.getElementById('leja').value = leja;
    
//    document.getElementById('leja').value = "leja";
//var todo=function(){
//        borrado();};
    
//    todo(); //mejorar que al darle sobre el displa enter se ponga y no tener que darle 2 veces. poner keypress sobre codigo
//    $(this).val(ui.item.label).keypress(function() {
//        borrado();
//        todo();
//    });


    return false;
   }
  });
 });
});