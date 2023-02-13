function remove(link) {
    Swal.fire({
        title: 'Bạn có chắc muốn xóa không?',
        text: "Bạn sẽ không thể hoàn nguyên lại thao tác này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa !'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Đã xóa',
                'Dữ liệu của bạn đã được xóa.',
                'success'
            ).then((result)=>{
                if(result.isConfirmed){
                    document.location = link;
                }
            })
        }
    })


}

// function sa(id) {
//     Swal.fire({
//       title: 'Bạn chắc muốn lưu thay đổi ko ?',
//       showDenyButton: true,
//       showCancelButton: true,
//       confirmButtonText: 'Cập nhật',
//       denyButtonText: `Bỏ cập nhật`,
//     }).then((result) => {
//       /* Read more about isConfirmed, isDenied below */
//       if (result.isConfirmed) {
//         var form_data = new FormData();
//         //thêm files vào trong form data
//         form_data.append('hoten', $("#hoten").val());
//         form_data.append('sdt', $("#sdt").val());
//         form_data.append('email', $("#email").val());
//         form_data.append('noidung', $("#noidung").val());
//         //sử dụng ajax post
//         $.ajax({
//           url: 'index.php?action=contact&act=updatesp&masp=' + id, // gửi đến file cập nhật
//           dataType: 'text',
//           cache: false,
//           contentType: false,
//           processData: false,
//           data: form_data,
//           type: 'post',
//           success: function (res) {
//             Swal.fire('Đã lưu !', '', 'success')

//             setTimeout(() => {
//               document.location = "index.php?action=contact&act=sanpham"
//             }, 2000);
//           }
//         });
//       } else if (result.isDenied) {
//         Swal.fire('Các thay đổi không được lưu', '', 'info')
//         setTimeout(() => {
//           document.location = "index.php?action=contact&act=sanpham"
//         }, 1000);

//       }
//     })
//   }