
  $(document).ready(function() {
  	$('#sltMonhoc').on('change',  function() {
       var MonhocID = $(this).val();
  		         if(MonhocID) {
                    $.ajax({
                    url: 'myform/ajax/'+MonhocID,
                    type: "GET",
                    dataType: "json",

                    success:function(monhoc) {

                        $('#sltLophoc').empty();
                        $.each(data, function(i, data) {
                            var bangdiem = data.lophoc; 
                            $.each(lophoc, function(x, lophoc) {
                             $('#sltLophoc').append('<option value="'+ lophoc.id +'">'+lophoc.mieng1+'</option>');
                            });
                        });
                    }
                });
            }else{
                $('#sltLophoc').empty();
            }
        });
    
    });
