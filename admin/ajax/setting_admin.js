// update_employee văn 
function update_employee(id) {
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
      form_data.append('hoten_nv', $("#hoten_nv").val());
      form_data.append('ngay_sinh', $("#ngay_sinh").val());
      form_data.append('gioi_tinh_nv', $("#gioi_tinh_nv").val());
      form_data.append('sdt_nv', $("#sdt_nv").val());
      form_data.append('email_nv', $("#email_nv").val());
      form_data.append('dia_chi_nv', $("#dia_chi_nv").val());
      form_data.append('link_url', $("#link_url").val());
      form_data.append('role', $("#role").val());
      form_data.append('status', $("#status").val());

      // alert(('link_url', $("#link_url").val()));
      // console.log (('gioi_tinh_nv', $("#gioi_tinh_nv").val()));
      // console.log (('ngay_sinh', $("#ngay_sinh").val()));
      // console.log (('hoten_nv', $("#hoten_nv").val()));
      // console.log (('email_nv', $("#email_nv").val()));
      // console.log (('dia_chi_nv', $("#dia_chi_nv").val()));
      // console.log (('email_nv', $("#email_nv").val()));
      // console.log (('pass_dn', $("#pass_dn").val()));
      // console.log (('role', $("#role").val()));
      // console.log (('status', $("#status").val()));
      // exit();

      $.ajax({
        url: './index.php?action=login&act=update_employee&id=' + id, // gửi đến file cập nhật
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (res) {
          Swal.fire('Đã cập nhật !', '', 'success')
          setTimeout(() => {
            document.location = "index.php?action=login&act=manage_employee"
          }, 1500);
        }
      });
    } else if (result.isDenied) {
      Swal.fire('Các thay đổi không được lưu', '', 'info')
      setTimeout(() => {
        document.location = "index.php?action=login&act=manage_employee"
      }, 1000);

    }
  })
}
///
/// xóa nhân viên văn 5/07
//  function Delete_Employee(id) {
//   Swal.fire({
//     title: 'Bạn có chắc xóa nhân viên này không?',
//     text: "Bạn sẽ không thể hoàn nguyên điều này !",
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Đồng ý'
//   }).then((result) => {
//     if (result.isConfirmed) {
//       Swal.fire(
//         'Deleted!',
//         'Your file has been deleted.',
//         'success'
//       )
//       setTimeout(() => {
//         document.location = "index.php?action=login&act=delete_employee&id=" + id
//       }, 1000);
//     }
//   })
// }
// 
$(document).ready(function () {
  $(document).on('click', '.status_account', function () {
    var id = $(this).data('id');
    var statusAcc = $(this).data('sos');
    // alert ( $(this).data('id'));
    // alert ($(this).data('sos'));
    var id_name = 'statusAcc' + id;

    $.ajax({
      url: 'models/update_statusAcc_employee.php',
      method: 'POST',
      data: {
        id: id,
        statusAcc: statusAcc
      },
      success: function (data) {
        console.log(data)
        $('#' + id_name).html(data);
      }
    })
  });
})

// update_profile

function update_profile(id) {
  /* Read more about isConfirmed, isDenied below */
  var form_data = new FormData();
  //thêm files vào trong form data
  form_data.append('hoten_nv', $("#hoten_nv").val());
  form_data.append('ngay_sinh', $("#ngay_sinh").val());
  form_data.append('gioi_tinh_nv', $("#gioi_tinh_nv").val());
  form_data.append('sdt_nv', $("#sdt_nv").val());
  form_data.append('email_nv', $("#email_nv").val());
  form_data.append('dia_chi_nv', $("#dia_chi_nv").val());
  form_data.append('link_url', $("#link_url").val());
  $.ajax({
    url: './index.php?action=login&act=update_profile&id=' + id, // gửi đến file cập nhật
    dataType: 'text',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    type: 'post',
    success: function (res) {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Các thay đổi đã cập nhật',
        showConfirmButton: false,
        timer: 1500
      })
      setTimeout(() => {
        document.location = "index.php?action=login&act=setting_profile&id=" + id
      }, 1500);
    }
  });

}