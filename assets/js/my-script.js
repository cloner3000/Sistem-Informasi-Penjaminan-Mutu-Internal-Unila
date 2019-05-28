


$(document).ready(function() {
 
  $('#select22').select2({
    width: "100%",
    minimumInputLength: 4, 
  });
});

$(document).ready(function(){
  // Class adjip_ajax-url_trigger handler
  $( ".adjip_ajax-url_trigger" ).each(function(i, obj){
    var url_target = $(obj).attr('href').split("#");
    $(obj).click(function(){
      load_content(url_target);  
    })
  });
  // Prevent submit for by hitting 'enter'
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
  });
});









