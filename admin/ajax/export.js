$(document).ready(function () {
    $(document).on('click', '#export-data-product', function () {
        // var form_data=new FormData();
        // form_data.append('action','export-product')
        $.ajax({
            url: 'models/export.php',
            cache: false,
            contentType: false,
            processData: false,
            data: null,
            type: 'post',
            success:function(res){
                console.log(res)
            }
        })
    })
})