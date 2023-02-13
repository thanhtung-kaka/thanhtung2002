// alert('chào mày sort_sp.js')
$(document).ready(function () {
    $(document).on('click', '.column_sort', function () {
        var column_name = $(this).attr("id");
        var sort = $(this).data('sort');
        var arrow = '&nbsp;<i class="fas fa-arrow-down"></i>';
        if (sort == 'desc') {
            arrow = '&nbsp;<i class="fas fa-arrow-down"></i>'
        } else if(sort=='asc') {
            arrow = '&nbsp;<i class="fas fa-arrow-up"></i>'
        }
        $.ajax({
            url: 'models/sort_dm.php',
            method: 'POST',
            data: { column_name: column_name, sort: sort },
            success: function (data) {
                $('#danhmuc_sp').html(data);
                $('#' + column_name + ' ').append(arrow);
                
            }
        })
    })
})