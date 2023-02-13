
$(document).ready(function () {
    $(document).on('click','#save-product', function () {
        var action=$(this).data('action');
        if(action=='add_product'){
            // alert(action)
            //mã sản phẩm
            var masp='';
            //id của tên sản phẩm
            var id_tensp=('#tensp');
            //id của loại sản phẩm
            var id_loaisp=('#loaisp');
            //tên sản phẩm
            var tensp = $('#tensp').val()
            // alert(tensp)
            //loại sản phẩm
            var loaisp = $('#loaisp').val()
            // alert(loaisp)
            //status của sản phẩm
            var status = $('#status_sp').val()
            // alert(status)
            //mô tả
            var mota = $('#mota').val()
            // alert(mota)
            //url thêm sản phẩm
            var url = './index.php?action=sanpham&act=themsp';
        }else{
            // alert(action)
            //mã sản phẩm
            var masp=$(this).data('masp');
            // alert(masp)
            //id tên sản phẩm
            var id_tensp=('#tensp'+masp);
            //id loại sản phẩm
            var id_loaisp=('#loaisp'+masp);
            //tên sản phẩm
            var tensp = $(id_tensp).val()
            // alert(tensp)
            // alert(id_status)
            //loại sản phẩm
            var loaisp = $(id_loaisp).val()
            // alert(loaisp)
            //status của sản phẩm
            var status = $('#status_sp'+masp).val()
            // alert(status)
            //mô tả của sản phẩm
            var mota = $('#mota'+masp).val()
            // alert(mota)
            //url update sản phẩm
            var url = './index.php?action=sanpham&act=updatesp';
        }
        
        var flag = false;

        $('.error').remove();
        if (tensp == '') {
            flag = true;
            $(id_tensp).after('<span class="error">* Tên sản phẩm không được trống</span>');
        }
        if (loaisp == '') {
            flag = true;
            $(id_loaisp).after('<span class="error">* Vui lòng chọn loại sản phẩm</span>');
        }
        if (flag) {
            return false;
        } else {
            var form_data = new FormData();
            form_data.append('masp', masp);
            form_data.append('tensp', tensp);
            form_data.append('loaisp', loaisp);
            form_data.append('status', status);
            form_data.append('mota', mota);
            
            $.ajax({
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    var myarr = res.split('####');
                    var data = JSON.parse(myarr['1']);
                    if (data.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: data.message,
                          }).then((result)=>{
                            if(result.isConfirmed){
                                location.href="./index.php?action=sanpham&act=sanpham";
                            }
                          })
                    }
                    if (data.status == 403) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Errors...',
                            text: data.message,
                          }).then((result)=>{
                            if(result.isConfirmed){
                                location.href="./index.php?action=sanpham&act=sanpham";
                            }
                          })
                    }

                }
            })

        }

    })
})
//danh mục sản phẩm
$(document).ready(function () {
    $(document).on('click', '#save_danhmuc_sp', function () {
        var action = $(this).data('action');
        if (action == 'add_danhmuc') {
            var madm_sp ='';
            var id_tendm=('#tendm');
            var tendm = $(id_tendm).val();
            var url = "index.php?action=sanpham&act=themdm";
            
        }else{
            var madm_sp=$(this).data('madm');
            var id_tendm=('#tendm'+madm_sp);
            var tendm = $(id_tendm).val();
            var url = "index.php?action=sanpham&act=update_dmsp"
        }
        var flag = false;

        $('.error').remove();
        if (tendm == '') {
            flag = true;
            $(id_tendm).after('<span class="error mt-3">* Tên danh mục không được trống</span>');
        }
        if (flag) {
            return false;
        } else {
            var form_data = new FormData();
            form_data.append('madm_sp', madm_sp);
            form_data.append('tendm', tendm);
            $.ajax({
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    var myarr = res.split('####');
                    var data = JSON.parse(myarr['1']);
                    if (data.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: data.message,
                          }).then((result)=>{
                            if(result.isConfirmed){
                                location.href="./index.php?action=sanpham&act=danhmuc";
                            }
                          })

                    }
                    if (data.status == 403) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Errors...',
                            text: data.message,
                          }).then((result)=>{
                            if(result.isConfirmed){
                                location.href="./index.php?action=sanpham&act=danhmuc";
                            }
                          })
                        
                    }

                }
            })

        }

    })
})
//màu sắc của sản phẩm
$(document).ready(function () {
    $(document).on('click', '#save_color', function () {
        var action = $(this).data('action');
        if (action == 'add_color') {
            var mamau ='';
            var id_tenmau=('#tenmau');
            var tenmau = $(id_tenmau).val();
            var url = "index.php?action=sanpham&act=themmau";
            
        }else{
            var mamau=$(this).data('mamau');
            var id_tenmau=('#tenmau'+mamau);
            var tenmau = $(id_tenmau).val();
            var url = "index.php?action=sanpham&act=update_mausac"
        }
        var flag = false;

        $('.error').remove();
        if (tenmau == '') {
            flag = true;
            $(id_tenmau).after('<span class="error mt-3">* Tên màu sắc không được trống</span>');
        }
        if (flag) {
            return false;
        } else {
            var form_data = new FormData();
            form_data.append('mamau', mamau);
            form_data.append('tenmau', tenmau);
            $.ajax({
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    var myarr = res.split('####');
                    var data = JSON.parse(myarr['1']);
                    if (data.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: data.message,
                          }).then((result)=>{
                            if(result.isConfirmed){
                                location.href="./index.php?action=sanpham&act=mausac";
                            }
                          })

                    }
                    if (data.status == 403) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Errors...',
                            text: data.message,
                          }).then((result)=>{
                            if(result.isConfirmed){
                                location.href="./index.php?action=sanpham&act=mausac";
                            }
                          })
                        
                    }

                }
            })

        }

    })
})
//size của sản phẩm
$(document).ready(function () {
    $(document).on('click', '#save_size', function () {
        var action = $(this).data('action');
        if (action == 'add_size') {
            var ma_size ='';
            var id_sosize=('#so_size');
            var so_size = $(id_sosize).val();
            var url = "index.php?action=sanpham&act=themsize";
            
        }else{
            var ma_size=$(this).data('ma_size');
            var id_sosize=('#so_size'+ma_size);
            var so_size = $(id_sosize).val();
            var url = "index.php?action=sanpham&act=update_size"
        }
        var flag = false;

        $('.error').remove();
        if (so_size == '') {
            flag = true;
            $(id_sosize).after('<span class="error mt-3">* Số size không được trống</span>');
        }
        if (flag) {
            return false;
        } else {
            var form_data = new FormData();
            form_data.append('ma_size', ma_size);
            form_data.append('so_size', so_size);
            $.ajax({
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    var myarr = res.split('####');
                    var data = JSON.parse(myarr['1']);
                    if (data.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: data.message,
                          }).then((result)=>{
                            if(result.isConfirmed){
                                location.href="./index.php?action=sanpham&act=size";
                            }
                          })

                    }
                    if (data.status == 403) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Errors...',
                            text: data.message,
                          }).then((result)=>{
                            if(result.isConfirmed){
                                location.href="./index.php?action=sanpham&act=size";
                            }
                          })
                        
                    }

                }
            })

        }

    })
})
//loại sản phẩm
$(document).ready(function () {
    $(document).on('click', '#save_loaisp', function () {
        var action = $(this).data('action');
        if (action == 'add_loaisp') {
            // alert(action)
            //mã loại sản phẩm
            var ma_loai ='';
            //id danh mục sản phẩm
            var id_madm_sp=('#madm_sp');
            //id tên loại sản phẩm
            var id_tenloai=('#tenloai');
            //mã danh mục của sản phẩm
            var madm_sp = $(id_madm_sp).val();
            // alert(madm_sp)
            //tên loại của sản phẩm
            var tenloai = $(id_tenloai).val();
            // alert(tenloai)
            //url khi thêm loại sản phẩm
            var url = "index.php?action=sanpham&act=themloai";
            
        }else{
            // alert(action)
            //mã loại sản phẩm khi update
            var ma_loai=$(this).data('maloai');
            // alert(ma_loai)
            //id của danh mục sản phẩm
            var id_madm_sp=('#madm_sp'+ma_loai);
            //id của tên loại sản phẩm
            var id_tenloai=('#tenloai'+ma_loai);
            //mã danh mục sản phẩm
            var madm_sp = $(id_madm_sp).val();
            // alert(madm_sp)
            //tên loại sản phẩm
            var tenloai = $(id_tenloai).val();
            // alert(tenloai)
            //url khi update loại sản phẩm
            var url = "index.php?action=sanpham&act=update_loaisp"
        }
        var flag = false;

        $('.error').remove();
        if (madm_sp == '') {
            flag = true;
            $(id_madm_sp).after('<span class="error mt-3">* Vui lòng chọn danh mục sản phẩm</span>');
        }
        if(tenloai==''){
            flag=true;
            $(id_tenloai).after('<span class="error mt-3">* Tên loại không được trống</span>');
        }
        if (flag) {
            return false;
        } else {
            var form_data = new FormData();
            form_data.append('ma_loai', ma_loai);
            form_data.append('madm_sp', madm_sp);
            form_data.append('tenloai', tenloai);
            $.ajax({
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    var myarr = res.split('####');
                    var data = JSON.parse(myarr['1']);
                    if (data.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: data.message,
                          }).then((result)=>{
                            if(result.isConfirmed){
                                location.href="./index.php?action=sanpham&act=loaisp";
                            }
                          })

                    }
                    if (data.status == 403) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Errors...',
                            text: data.message,
                          }).then((result)=>{
                            if(result.isConfirmed){
                                location.href="./index.php?action=sanpham&act=loaisp";
                            }
                          })
                        
                    }

                }
            })

        }

    })
})
//loại sản phẩm
$(document).ready(function () {
    $(document).on('click', '#save_attr', function () {
        
        alert('hi')
        // var url='index.php?action=sanpham&act=add_attr_sp';
        var masp=$('#masp').val()
        alert(masp)
        var khuyenmai=$('#khuyenmai').val()
        alert(khuyenmai)
        var dongia=$('#dongia').val()
        alert(dongia)
        var soluongton=$('#soluongton').val()
        alert(soluongton)
        var size=$('#size').val()
        alert(size)
        var mausac=$('#mausac').val()
        alert(mausac)
        var status=$('#status').val()
        alert(status)
        var link_url=$('#link_url').val()
        alert(link_url)
        // var flag = false;

        // $('.error').remove();
        // if (madm_sp == '') {
        //     flag = true;
        //     $(id_madm_sp).after('<span class="error mt-3">* Vui lòng chọn danh mục sản phẩm</span>');
        // }
        // if(tenloai==''){
        //     flag=true;
        //     $(id_tenloai).after('<span class="error mt-3">* Tên loại không được trống</span>');
        // }
        // if (flag) {
        //     return false;
        // } else {
        //     var form_data = new FormData();
        //     form_data.append('ma_loai', ma_loai);
        //     form_data.append('madm_sp', madm_sp);
        //     form_data.append('tenloai', tenloai);
        //     $.ajax({
        //         url: url,
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         data: form_data,
        //         type: 'post',
        //         success: function (res) {
        //             var myarr = res.split('####');
        //             var data = JSON.parse(myarr['1']);
        //             if (data.status == 200) {
        //                 Swal.fire({
        //                     icon: 'success',
        //                     title: 'Successfully',
        //                     text: data.message,
        //                   }).then((result)=>{
        //                     if(result.isConfirmed){
        //                         location.href="./index.php?action=sanpham&act=loaisp";
        //                     }
        //                   })

        //             }
        //             if (data.status == 403) {
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Errors...',
        //                     text: data.message,
        //                   }).then((result)=>{
        //                     if(result.isConfirmed){
        //                         location.href="./index.php?action=sanpham&act=loaisp";
        //                     }
        //                   })
                        
        //             }

        //         }
        //     })

        // }

    })
})
