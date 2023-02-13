
$(document).ready(function(){
    $(document).on('change','#mausac',function(){
        var mausac=$(this).val();
        var masp=$(this).data('masp');
        // alert(masp)
        $.ajax({
            url:'models/chon_mau.php',
            method:'post',
            data:{mausac:mausac,masp:masp},
            success:function(data){
                $('#'+'attr_sp').html(data);
            }
        })
    })
})
$(document).ready(function(){
    $(document).on('change','[name="size"]',function(){
        var size=document.querySelector('input[name="size"]:checked').value;
        // alert(size)
        var masp=$(this).data('masp');
        $.ajax({
            url:'models/chon_size.php',
            method:'post',
            data:{size:size,masp:masp},
            success:function(data){
                $('#'+'attr_sp').html(data);
            }
        })
    })
})

$(document).ready(function() {
    $(document).on('change', 'input#quantity', function() {
        var qty = Number($(this).val());
        var min = Number($(this).attr('min'));
        var max = Number($(this).attr('max'));
        if (qty < min) {
            qty = min;
        } else if (qty > max) {
            qty = max;
        }
        $(this).attr('value', qty).val(qty)


    })
    $(document).on('click', '.plus', function() {
        var quantity = Number($('#quantity').val());
        var max = Number($('#quantity').attr('max'));
        var qty = quantity;
        $('#quantity').each(function() {
            if (qty < max) {
                qty += 1;
                $(this).attr('value', qty).val(qty)
            }
        })
    })
    $(document).on('click', '.minus', function() {
        var quantity = Number($('#quantity').val());
        var min = Number($('#quantity').attr('min'));
        var qty = quantity;
        $('#quantity').each(function() {
            if (qty > min) {
                qty += -1;
                $(this).attr('value', qty).val(qty)
            }
        })
    })
})