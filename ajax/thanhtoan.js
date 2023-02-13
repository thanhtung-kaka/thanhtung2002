$(document).ready(function () {
  $(document).on('click', '#submitthanhtoan', function () {
    var fullname = $("#fullname").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var address = $("#address").val();
    var payment = $("#payment").val();
    var note = $("#note").val();

    var flag = false;
    $(".error").remove();
    if (fullname == '') {
      flag = true;
      $("#fullname").before('<span class="error form">Họ tên không được bỏ trống</span> ');
    }
    if (email == '') {
      flag = true;
      $("#email").before('<span class="error form">Email không được bỏ trống</span> ');
    }
    if (phone == '') {
      flag = true;
      $("#phone").before('<span class="error form">Số điện thoại không được bỏ trống</span> ');
    }
    if (address == '') {
      flag = true;
      $("#address").before('<span class="error form">Địa không được bỏ trống</span> ');
    }
    if (flag) {
      return false;
    } else {
      var form_data = new FormData();
      form_data.append('fullname', fullname);
      form_data.append('email', email);
      form_data.append('phone', phone);
      form_data.append('address', address);
      form_data.append('payment', payment);
      form_data.append('note', note);

      $.ajax({
        url: './index.php?action=thanhtoan&act=thanhtoan',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (res) {
          var myarr = res.split("#-#");
          var data = JSON.parse(myarr['1']);
          if(data.status==200){
            alert(data.message);
            location.href='index.php?action=thanhtoan&act=bill&id='+data.data;
          }
        }
      })
    }
  });
})