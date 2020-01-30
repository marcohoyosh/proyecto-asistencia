$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'cargar_listas.php'
  })
  .done(function(listas_rep){
    $('#lista_reproduccion').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las listas_rep')
  })

  $('#lista_reproduccion').on('change', function(){
    var id = $('#lista_reproduccion').val()
    $.ajax({
      type: 'POST',
      url: 'cargar_videos.php',
      data: {'idpadre': id}
    })
    .done(function(listas_rep){
      $('#videos').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los vídeos')
    })
  })

  $('#videos').on('change', function(){
    var id = $('#videos').val()
    $.ajax({
      type: 'POST',
      url: 'cargar_nieto.php',
      data: {'idhijo': id}
    })
    .done(function(listas_rep){
      $('#nietos').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los vídeos')
    })
  })


 


  $('#enviar').on('click', function(e) {
    e.preventDefault();
    var id = $('#nietos').val();
    var fecha1 =$('#fecha1').val();
    var fecha2= $('#fecha2').val();
    //console.log(id);
    //console.log(fecha1);
    //console.log(fecha2);
    if(id==0 || fecha1=='' || fecha2==''){
      alert('Uno de los campos esta vacio');
      $('#resultSearch').html('');
    }else{
      $.ajax({
        type: 'POST',
        url: 'procesar2.php',
        data: {'idnieto': id, 'fecha1' : fecha1, 'fecha2' : fecha2}
      })
      
      .done(function(listas_rep){
        //$('#fecha1').val('');
        //$('#fecha2').val('');
        //console.log(listas_rep);
        $('#resultSearch').html(listas_rep);
      })
    }
  })


})