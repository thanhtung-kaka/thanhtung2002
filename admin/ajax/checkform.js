$('#insert_news').on('click', function () {
  var loai = $("#loai").val();
  var tieude = $("#tieude").val();
  var mota_ngan = $("#mota_ngan").val();
  var noidung = tinymce.get("noi_dung").getContent();
  var link_url = $("#link_url").val();
  // alert(tieudeu+mota_ngan+noidung);
  var flag = false;
  $(".error").remove();

  if (tieude == '') {
    flag = true;
    $("#tieude").before('<span class="error form">Tiêu đề không được bỏ trống</span> ');
  }
  if (mota_ngan == '') {
    flag = true;
    $("#mota_ngan").before('<span class="error form">Mô tả ngắn không được bỏ trống</span> ');
  }
  if (noidung == '') {
    flag = true;
    $("#noidung").before('<span class="error form">Nội dung không được bỏ trống</span> ');
  }

  if (flag) {
    return false;
  } else {
    //khởi tạo đối tượng form data
    var form_data = new FormData();
    //thêm files vào trong form data
    form_data.append('tieude', tieude);
    form_data.append('mota_ngan', mota_ngan);
    form_data.append('noidung', noidung);
    form_data.append('loai', loai);
    form_data.append('link_url', link_url);

    $.ajax({
      url: './index.php?action=manage_news&act=insert_news',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function (res) {
        var myarr = res.split("#-#");
        var data = JSON.parse(myarr['1']);

        if(data.status==200){
          //gán src  
          alert(data.message);
          $("#insertNews").modal('hide');
          location.href='index.php?action=manage_news&act=manage_news';
        }
      }
    });
  }
});

$('#update_news').on('click', function () {
  var tintuc_id = $("#tintuc_id").val();
  var luotxem = $("#luotxem").val();
  var loai = $("#loai").val();
  var tieude = $("#tieude").val();
  var mota_ngan = $("#mota_ngan").val();
  var noidung = tinymce.get("noi_dung").getContent();
  var link_url = $("#link_url").val();
  var status = $("#status").val();
  var flag = false;
  $(".error").remove();

  if (tieude == '') {
    flag = true;
    $("#tieude").before('<span class="error form">Tiêu đề không được bỏ trống</span> ');
  }
  if (mota_ngan == '') {
    flag = true;
    $("#mota_ngan").before('<span class="error form">Mô tả ngắn không được bỏ trống</span> ');
  }
  if (noidung == '') {
    flag = true;
    $("#noidung").before('<span class="error form">Nội dung không được bỏ trống</span> ');
  }

  if (flag) {
    return false;
  } else {
    //khởi tạo đối tượng form data
    var form_data = new FormData();
    //thêm files vào trong form data
    form_data.append('luotxem', luotxem);
    form_data.append('loai', loai);
    form_data.append('tieude', tieude);
    form_data.append('mota_ngan', mota_ngan);
    form_data.append('noidung', noidung);
    form_data.append('link_url', link_url);
    form_data.append('status', status);

    $.ajax({
      url: './index.php?action=manage_news&act=update_news&id='+tintuc_id,
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function (res) {
        var myarr = res.split("##-##");
        var data = JSON.parse(myarr['1']);
        
        if(data.status==200){
          //gán src  
          alert(data.message);
          location.href='index.php?action=manage_news&act=manage_news';
        }
        if(data.status==403){
          alert(data.message);
          location.href='index.php?action=manage_news&act=update_news&id='+tintuc_id;
        }

      }
    });
  }
});
$('#update_order').on('click', function () {
  var mahd = $("#mahd").val();
  var sdt = $("#sdt").val();
  var diachi = $("#diachi").val();
  var trangthai = $("#trangthai").val();
  var flag = false;
  $(".error").remove();

  if (sdt == '') {
    flag = true;
    $("#sdt").before('<span class="error form">Số điện thoại không được bỏ trống</span> ');
  }
  if (diachi == '') {
    flag = true;
    $("#diachi").before('<span class="error form">Địa chỉ không được bỏ trống</span> ');
  }
  
  if (flag) {
    return false;
  } else {
    //khởi tạo đối tượng form data
    var form_data = new FormData();
    //thêm files vào trong form data
    form_data.append('mahd', mahd);
    form_data.append('sdt', sdt);
    form_data.append('diachi', diachi);
    form_data.append('trangthai', trangthai);

    $.ajax({
      url: './index.php?action=hoadon&act=update_hoadon',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function (res) {
        var myarr = res.split("##-##");
        var data = JSON.parse(myarr['1']);
        
        if(data.status==200){
          //gán src  
          alert(data.message);
          location.href='index.php?action=hoadon&act=hoadon';
        }
      }
    });
  }
});
