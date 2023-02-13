
$(document).ready(function () {
    $(document).on('click', '.column_sort_attr', function () {
        var column_name = $(this).attr("id");
        var sort = $(this).data('sort');
        var masp=$(this).data('masp');
        var arrow = '&nbsp;<i class="fas fa-arrow-down"></i>';
        if (sort == 'desc') {
            arrow = '&nbsp;<i class="fas fa-arrow-down"></i>'
        } else if(sort=='asc') {
            arrow = '&nbsp;<i class="fas fa-arrow-up"></i>'
        }
        $.ajax({
            url: 'models/sort_attr_sp.php',
            method: 'POST',
            data: { column_name: column_name, sort: sort,masp:masp},
            success: function (data) {
                $('#thuoctinh_table').html(data);
                $('#' + column_name + ' ').append(arrow);
                
            }
        })
    })
})