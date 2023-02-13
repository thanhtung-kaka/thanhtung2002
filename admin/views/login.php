    <!-- văn  -->
    <div class="login-page ">
        <div class="formLogin">
            <form method="post" action="index.php?action=login&act=login_action" class="login_form">
                <input type="email" name="txtemail_nv" value="<?php if (isset($email_nv))  echo $email_nv ?>" required />
                <input type="password" name="txtpass_dn" id="pass_log_id" placeholder="password" required />
                <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password "></span>
                <button name="login" type="submit">login</button>
                <p class="message">Đăng nhập Admin <a href="mailto:levan.092002@gmail.com"> @hỗ trợ</a></p>
            </form>
        </div>
    </div>
    <script>
        $(document).on('click', '.toggle-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");//.toggleClass(): Thêm hoặc loại bỏ một hoặc nhiều class của thành phần.
            var input = $("#pass_log_id");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });
    </script>