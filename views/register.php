    <!--đăng ký văn 22/06  -->
    <div class="text-center mt-5 mb-5">
        <h3 class="title_sp ">
            <span class="bg bg-white text-danger">
                <img src="assets/images/—Pngtree—vector add user icon_4102537.png" height="40px" width="40px" alt="">
                Đăng ký tài khoản
            </span>
        </h3>
    </div>
    <section class="vh-200 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp'); width:100%;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container ">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div style="border-radius: 225px;">
                            <div class="card-body p-4">
                                <h2 class="text-uppercase text-center mb-3">Tạo tài khoản</h2>
                                <form action="index.php?action=register&act=submit_register"  method="POST">
                                    <div class="form-outline mb-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label">Họ & tên* :</label>
                                        <input type="text" id="ten_kh" name="ten_kh" class="form-control form-control-lg" value="<?php if (isset($ten_kh)) echo $ten_kh; ?>" placeholder="nhập họ và tên của bạn" />
                                        <span class="error"><?php if (isset($ten_khErr)) echo $ten_khErr; ?> </span>
                                    </div>
                                        <label class="form-label">Tên đăng nhập* :</label>
                                        <input type="text" id="ten_dn" name="ten_dn" class="form-control form-control-lg" value="<?php if (isset($ten_dn)) echo $ten_dn; ?>" placeholder="nhập tên đăng nhập của bạn" />
                                        <span class="error"><?php if (isset($ten_dnErr)) echo $ten_dnErr; ?> </span>
                                    </div>
                                    <div class="form-outline mb-4 register_form">
                                        <label class="form-label">Mật khẩu* :</label>
                                        <input type="password" id="pass_log_id1" name="pass_dn" class="form-control form-control-lg" placeholder="nhập mật khẩu của bạn" />
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>
                                        <label class="error"><?php if (isset($pass_dnErr)) echo $pass_dnErr ?></label>
                                    </div>
                                    <div class=" d-flex justify-content-center mb-5">
                                        <label class="form-check-label">
                                            vui lòng liên hệ nếu cần <a href="mailto:levan.002002@gmail.com" class="text-body"><u style="color:red"> @hỗ trợ</u></a>
                                        </label>
                                    </div>
                                    <div class="row">
                                    <div class="d-flex justify-content-center">
                                        <input type="submit" class="btn" value="Đăng ký" style="font-size: 16px">
                                    </div>
                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="index.php?action=login" class="fw-bold text-body"><u>Login here</u></a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
    .error{
        color: red;
    }
</style>
  