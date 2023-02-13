$(document).ready(function () {
    function filter_data() {
        $('.filter-data').html('<div id="loading" style=""></div>');
        var action = 'filter_product';
        var minimum_price = $('#hidden_minimum_price').val();
        // alert(minimum_price)
        var maximum_price = $('#hidden_maximum_price').val();
        // alert(maximum_price);
        var category = get_filter('category');
        var productType = get_filter('productType');
        var filterSize = get_filter('filterSize');
        var filterColor = get_filter('filterColor');
        $.ajax({
            url: 'models/filterProduct.php',
            method: 'POST',
            data: {
                action: action,
                minimum_price: minimum_price,
                maximum_price: maximum_price,
                category: category,
                productType: productType,
                filterSize: filterSize,
                filterColor: filterColor
            },
            success: function (data) {
                $('.filter-data').html(data)
            }
        })
    }
    function get_filter(class_name) {
        var filter = [];

        $('.' + class_name + ':checked').each(function () {
            // alert($(this).val())
            filter.push($(this).val())
        })
        return filter;
    }
    //when checked
    $('.common_selector').click(function () {
        filter_data();
    })

    //range price
    $('#slider-range').slider({
        range:true,
        min:1000,
        max:2000000,
        values:[1000,2000000],
        step:500,
        stop:function(event, ui)
        {
            // alert(formatNumber(ui.values[0], '.', ','))
            $('#price_show').html(formatNumber(ui.values[0], '.', ',')+'<sup>đ</sup>' + ' - ' + formatNumber(ui.values[1], '.', ',')+'<sup>đ</sup>');
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
    function formatNumber(nStr, decSeperate, groupSeperate) {
        nStr += '';
        x = nStr.split(decSeperate);
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
        }
        return x1 + x2;
    }
});