// delete contact Văn(15-06-2022) ...
function Delete_Contact(id) {
    Swal.fire({
      title: 'Bạn có chắc không?',
      text: "Bạn sẽ không thể hoàn nguyên điều này !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Đồng ý'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
        setTimeout(() => {
          location.href = "index.php?action=contact&act=delete_contact&id=" + id
        }, 1000);
      }
    })
  }
//   const myTimeout = setTimeout(myGreeting, 1000);
  //   ///  luu Văn(16-06-2022)
  function Save_Constact(id) {
    Swal.fire({
      title: 'Bạn chắc muốn lưu thay đổi ?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Cập nhật',
      denyButtonText: `Bỏ cập nhật`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        var form_data = new FormData();
        //thêm files vào trong form data
        form_data.append('hoten', $("#hoten").val());
        form_data.append('sdt', $("#sdt").val());
        form_data.append('email', $("#email").val());
        form_data.append('noidung', $("#noidung").val());
        // form_data.append('ngaysua', $("#ngaysua").val());
        //sử dụng ajax post
        $.ajax({
          url: './index.php?action=contact&act=update_contact&id=' + id, // gửi đến file cập nhật
          dataType: 'text',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function (res) {
            Swal.fire('Đã cập nhật !', '', 'success')
            setTimeout(() => {  
              document.location = "index.php?action=contact&act=contact"
            }, 1500);
          }
        });
      } else if (result.isDenied) {
        Swal.fire('Các thay đổi không được lưu', '', 'info')
        setTimeout(() => {
          document.location = "index.php?action=contact&act=contact"
        }, 1000);

      }
    })
  }
  function tai_lai_trang() {
    location.reload();
  }
  /// xóa khách hàng văn 23/06
  function Delete_Client(id) {
    Swal.fire({
      title: 'Bạn có chắc xóa khách hàng này không?',
      text: "Bạn sẽ không thể hoàn nguyên điều này !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Đồng ý'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
        setTimeout(() => {
          location.href = "index.php?action=client&act=delete_client&id=" + id
        }, 1000);
      }
    })
  }
// 
function Save_Client(id) {
  Swal.fire({
    title: 'Bạn chắc muốn lưu thay đổi ?',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: 'Cập nhật',
    denyButtonText: `Bỏ cập nhật`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      var form_data = new FormData();
      //thêm files vào trong form data
      form_data.append('ten_kh', $("#ten_kh").val());
      form_data.append('email_kh', $("#email_kh").val());
      form_data.append('sdt_kh', $("#sdt_kh").val());
      form_data.append('dia_chi_kh', $("#dia_chi_kh").val());
      form_data.append('gioi_tinh_kh', $("#gioi_tinh_kh").val());
      form_data.append('link_url', $("#link_url").val());
      // alert(('link_url', $("#link_url").val()));
      $.ajax({
        url: './index.php?action=client&act=update_client&id='+ id, // gửi đến file cập nhật
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (res) {
          Swal.fire('Đã cập nhật !', '', 'success')
          setTimeout(() => {  
            document.location = "index.php?action=client&act=get_client"
          }, 1500);
        }
      });
    } else if (result.isDenied) {
      Swal.fire('Các thay đổi không được lưu', '', 'info')
      setTimeout(() => {
        document.location = "index.php?action=client&act=get_client"
      }, 1000);

    }
  })
}
///
function update_pass(id) {
  Swal.fire({
    title: 'Bạn chắc muốn lưu thay đổi ?',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: 'Cập nhật',
    denyButtonText: `Bỏ cập nhật`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      var form_data = new FormData();
      //thêm files vào trong form data
      form_data.append('ten_dn', $("#ten_dn").val());
      form_data.append('pass_dn', $("#pass_dn").val());
      //sử dụng ajax post
      // print(form_data);
      // exit();
      $.ajax({
        url: './index.php?action=client&act=Update_Pass&id='+ id, // gửi đến file cập nhậtindex.php?action=client&act=update_pass&id=<?php echo $row['id']; ?>
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (res) {
          Swal.fire('Đã cập nhật !', '', 'success')
          setTimeout(() => {  
            document.location = "index.php?action=client&act=get_client"
          }, 1500);
        }
      });
    } else if (result.isDenied) {
      Swal.fire('Các thay đổi không được lưu', '', 'info')
      setTimeout(() => {
        document.location = "index.php?action=client&act=get_client"
      }, 1000);

    }
  })
}
// status tài khoản
$(document).ready(function() {
  $(document).on('click', '.status_client', function() {
      var id = $(this).data('id');
      var status = $(this).data('status');
      var id_name='status'+id;
      
      $.ajax({
          url: 'models/update_status_client.php',
          method: 'POST',
          data: {
              id: id,
              status: status
          },
          success: function(data) {
              console.log(data)
              $('#'+id_name).html(data);
          }
      })
  });
})

