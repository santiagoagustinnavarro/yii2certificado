
$(document).ready(function () {






    $('#add').click( function() {
       var add=  $('#add').val()

        if(add!='' & add!="0.00" & add!=null){
         actualizar()
        }
    })


    $('#lejos_derecho_esferico').click( function() {
       var add=  $('#add').val()

        if(add!='' & add!="0.00" & add!=null){
         actualizar()
        }
    })


    $('#lejos_derecho_cilindrico').click( function(link) {
       var add=  $('#add').val()

        if(add!='' & add!="0.00" & add!=null){
         actualizar()
        }
    })

      $('#lejos_derecho_grado').click( function(link) {
       var add=  $('#add').val()

        if(add!='' & add!="0.00" & add!=null){
         actualizar()
        }    })


    $('#lejos_izquierdo_esferico').click( function(link) {
       var add=  $('#add').val()

        if(add!='' & add!="0.00" & add!=null){
         actualizar()
        }
    })


    $('#lejos_izquierdo_cilindrico').click( function(link) {
       var add=  $('#add').val()

        if(add!='' & add!="0.00" & add!=null){
         actualizar()
        }
   })

    $('#lejos_izquierdo_grado').click( function(link) {
       var add=  $('#add').val()

        if(add!='' & add!="0.00" & add!=null){
         actualizar()
        }
    })





    function actualizar() {

       var add= parseFloat( $('#add').val() )  ;

       var lejos_derecho_esferico= parseFloat( $('#lejos_derecho_esferico').val() );
       var lejos_derecho_cilindrico=  parseFloat( $('#lejos_derecho_cilindrico').val() );
       var lejos_derecho_grado=  parseFloat( $('#lejos_derecho_grado').val() );



       var lejos_izquierdo_esferico= parseFloat( $('#lejos_izquierdo_esferico').val());
       var lejos_izquierdo_cilindrico= parseFloat(  $('#lejos_izquierdo_cilindrico').val() );
       var lejos_izquierdo_grado= parseFloat(  $('#lejos_izquierdo_grado').val() );






       $('#cerca_derecho_esferico').val( lejos_derecho_esferico + add );
	   $('#cerca_derecho_cilindrico').val(  lejos_derecho_cilindrico);
       $('#cerca_derecho_grado').val(  lejos_derecho_grado  );


       $('#cerca_izquierdo_esferico').val(  lejos_izquierdo_esferico + add );
	   $('#cerca_izquierdo_cilindrico').val(  lejos_izquierdo_cilindrico );
       $('#cerca_izquierdo_grado').val(  lejos_izquierdo_grado );



    }





})
