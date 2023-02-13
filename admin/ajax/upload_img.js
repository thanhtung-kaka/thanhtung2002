//xử lý khi có sự kiện click thằng an làm

$('#upload_img').on('click', function () {
    //Lấy ra files
    var file_data = $('#file').prop('files')[0];
    // alert(file_data);
    //lấy ra kiểu file
    var type = file_data.type;
    //Xét kiểu file được upload
    var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];
    //kiểm tra kiểu file
    if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {
        //khởi tạo đối tượng form data
        var form_data = new FormData();
        //thêm files vào trong form data
        form_data.append('file', file_data);
        //sử dụng ajax post
        $.ajax({
            url: 'models/uploadhinh.php',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (res) {
                var data = JSON.parse(res);
                if (data.status == 200) {
                    //gán src  
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully',
                        text: data.message,
                    })
                    document.getElementById('link_url').setAttribute('value', data.data);
                    document.getElementById('image_url').setAttribute('src', data.data);
                    // console.log(res);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Errors...',
                        text: data.message,
                      })
                }

            }

        });
    } else {
        $('.status').text('Chỉ được upload file ảnh');
        $('#file').val('');
    }
    return false;
});