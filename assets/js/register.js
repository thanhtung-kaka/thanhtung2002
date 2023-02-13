// click span(eye) view password văn 
$(document).on('click', '.toggle-password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash"); //.toggleClass(): Thêm hoặc loại bỏ một hoặc nhiều class của thành phần.
    var input = $("#pass_log_id1");
    input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
});
// 
$(document).on('click', '.toggle-passwordReturn', function() {
    $(this).toggleClass("fa-eye fa-eye-slash"); //.toggleClass(): Thêm hoặc loại bỏ một hoặc nhiều class của thành phần.
    var input = $("#pass_log_id2");
    input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
});
