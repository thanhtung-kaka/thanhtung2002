$(document).ready(function () {
    $('#add-to-cart').on('click', function () {
        var masp = Number($('#masp').val())
        var mausac = Number($('.mausac').val())
        var size = Number($('input.sizesp:checked').val());
        var qty = Number($('#quantity').val())
        var form_data = new FormData();
        form_data.append('masp', masp);
        form_data.append('mausac', mausac);
        form_data.append('size', size);
        form_data.append('qty', qty);
        $.ajax({
            url: './index.php?action=cart&act=add_cart',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (res) {
                var myarr = res.split('####');
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: '<div style="font-size:18px">'+myarr[1]+'</div>',
                    showConfirmButton: false,
                    timer: 1500
                })
                // window.location="./index.php?action=cart&act=cart";
            }
        })
    })
})
$(document).ready(function () {
    $(document).on('click', '.quantity', function () {
        var id = $(this).attr('id');
        $(document).on('change', '#' + id, function () {
            var matt = $(this).data('matt')
            var qty = Number($(this).val());
            var min = Number($(this).attr('min'));
            var max = Number($(this).attr('max'));
            var form_data=new FormData();
            
            if (qty < min) {
                qty = min;
            } else if (qty > max) {
                qty = max;
            }
            $(this).attr('value', qty).val(qty);
            form_data.append('matt',matt);
            form_data.append('qty',qty);
            $.ajax({
                url: './index.php?action=cart&act=update_cart',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success:function(res){
                    
                }
            })

        })
    })

    $(document).on('click', '.plus', function () {
        var matt = $(this).data('matt');
        var quantity = Number($('#quantity' + matt).val());
        var max = Number($('#quantity' + matt).attr('max'));
        var qty = quantity;
        var form_data=new FormData();
        $('#quantity' + matt).each(function () {
            if (qty < max) {
                qty += 1;
                $(this).attr('value', qty).val(qty)
            }
            form_data.append('matt',matt);
            form_data.append('qty',qty);
            $.ajax({
                url: './index.php?action=cart&act=update_cart',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success:function(res){
                    
                }
            })
        })
    })
    $(document).on('click', '.minus', function () {
        var matt = $(this).data('matt');
        var quantity = Number($('#quantity' + matt).val());
        var min = Number($('#quantity' + matt).attr('min'));
        var qty = quantity;
        var form_data=new FormData();
        $('#quantity' + matt).each(function () {
            if (qty > min) {
                qty += -1;
                $(this).attr('value', qty).val(qty)
            }
            form_data.append('matt',matt);
            form_data.append('qty',qty);
            $.ajax({
                url: './index.php?action=cart&act=update_cart',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success:function(res){
                    
                }
            })
        })
    })
})