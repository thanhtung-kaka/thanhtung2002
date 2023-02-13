$(document).ready(function() {
    $(document).on('click', '.status', function() {
        var masp = $(this).data('masp');
        var status = $(this).data('status');
        var id_name='status'+masp;
        
        $.ajax({
            url: 'models/update_status.php',
            method: 'POST',
            data: {
                masp: masp,
                status: status
            },
            success: function(data) {
                console.log(data)
                $('#'+id_name).html(data);
            }
        })
    });
    
})

$(document).ready(function() {
    $(document).on('click', '.status-news', function() {
        var tintuc_id = $(this).data('newsid');
        var status=$(this).data('status');
        $.ajax({
            url:'index.php?action=manage_news&act=status',
            method: 'post',
            data:{
                tintuc_id: tintuc_id,
                status: status
            },
            success: function(res) {
                // alert('a');   
                var myarr = res.split("##-##");
                var data = JSON.parse(myarr['1']);
                // console.log(res);
                console.log(data.data);

                $('#status-news'+tintuc_id).html(data.data);
            }
        })
    })

});
$(document).ready(function() {
    $(document).on('click', '.status_attr', function() {
        var matt = $(this).data('matt');
        var status = $(this).data('status');
        var id_name='status_attr' + matt;
        
        $.ajax({
            url: 'index.php?action=sanpham&act=update_status_attr',
            method: 'POST',
            data: {
                matt: matt,
                status: status
            },
            success: function(res) {
                var myarr=res.split("####");
                var data=JSON.parse(myarr[1])
                $('#'+id_name).html(data.data);
                
            }
        })
    });
})