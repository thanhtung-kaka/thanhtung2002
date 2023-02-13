$(document).ready(function(){
    $(document).on('click','.column_sort_loai',function(){
        var column_name=$(this).attr('id');
        var sort=$(this).data('sort');
        var arrow='&nbsp;<i class="fas fa-arrow-down"></i>';
        if(sort=='desc'){
            arrow='&nbsp;<i class="fas fa-arrow-down"></i>';
        }else{
            arrow='&nbsp;<i class="fas fa-arrow-up"></i>'
        }
        $.ajax({
            url:'models/sort_loai.php',
            method:'POST',
            data:{column_name:column_name,sort:sort},
            success:function(data){
                $('#loai_sp').html(data);
                $('#'+column_name+' ').append(arrow);
            }
        })
    })
})