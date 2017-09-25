
  $(document).ready(function() {
    $('#sltMonhoc').on('change',  function() {
       var MonhocID = $(this).val();
               if(MonhocID) {
                    $.ajax({
                    url: 'myform/ajax/'+MonhocID,
                    type: "GET",
                    dataType: "json",

                    success:function(monhoc) {

                        $('#bangdiem_hctc').empty();
                        $.each(monhoc, function(i, monhoc) {
                            var bangdiem = monhoc.bangdiem; 
                            $.each(bangdiem, function(x, bangdiem) {
                             $('#bangdiem_hctc').append(
                                '<tr><td >'+bangdiem.id+'</td><td >'+bangdiem.monhoc.tenmonhoc+'</td><td >'+bangdiem.mieng1+'&nbsp;'+bangdiem.mieng1+'&nbsp;'+bangdiem.mieng1+'&nbsp;'+bangdiem.mieng1+'</td><td >'+bangdiem.d15phut1+'&nbsp;'+bangdiem.d15phut2+'&nbsp;'+bangdiem.d15phut3+'&nbsp;'+bangdiem.d15phut4+'</td><td >'+bangdiem.d1tiet1+'&nbsp;'+bangdiem.d1tiet2+'&nbsp;'+bangdiem.d1tiet3+'</td><td >'+bangdiem.diemthiHK+'</td><td >'+bangdiem.diemTBHK+'</td></tr>');
                            });
                        });
                    }
                });
            }else{
                $('#bangdiem_hctc').empty();
            }
        });
    
    });
