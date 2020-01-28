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


 


  $('#enviar').on('click', function(){
    var id = $('#nietos').val()
    $.ajax({
      type: 'POST',
      url: 'procesar.php',
      data: {'idnieto': id}
    })
    
  })

})