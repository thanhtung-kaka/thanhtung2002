<!-- đăng nhập văn 23/06 -->
<div class="text-center mt-5 mb-5">
    <h3 class="title_sp ">
        <span class="bg bg-white text-danger">
            <img src="assets/images/—Pngtree—log in login interface computer_3945571.png" height="40px" width="40px" alt="">
            Đăng nhập tài khoản
        </span>
    </h3>
</div>
<section class="vh-200 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp') ; width:100%;">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div style="border-radius: 225px;">
                        <div class="card-body p-4">
                            <h2 class="text-uppercase text-center mb-3">Đăng nhập</h2>
                            </h2>
                            <form action="index.php?action=login&act=submit_login" method="POST">
                                <div class="form-outline mb-4">
                                    <label class="form-label">Tên đăng nhập* :</label>
                                    <input type="text" id="txtten_dn" name="txtten_dn" value="<?php if (isset($ten_dn)) echo $ten_dn; ?>" class="form-control form-control-lg" placeholder="nhập tên đăng nhập của bạn" />
                                </div>
                                <div class="form-outline mb-4 register_form">
                                    <label class="form-label">Mật khẩu* :</label>
                                    <input type="password" id="pass_log_id1" name="txtpass_dn" value="<?php if (isset($ten_dn)) echo ''; ?>" class="form-control form-control-lg" placeholder="nhập mật khẩu đăng nhập của bạn" />
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>
                                </div>
                                <div class=" d-flex justify-content-center mb-5">
                                    <label class="form-check-label">
                                        <a href="index.php?action=forgetpass" class="text-body"><u style="color:red">Quên mật khẩu ?</u></a>
                                    </label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn" value="Đăng nhập" style="font-size: 16px">
                                </div>
                                <div class="wrapper">
                                    <div class="login_form is_closed">
                                        <div class="left_side" style="padding: 9% 2%;">
                                            <div class="content">
                                                <div class="login">
                                                    <div class="social_login">
                                                        <a href="https://accounts.google.com/Login?authuser=4&hl=vi" class="google">
                                                        <i class="fab fa-google"></i>
                                                            <span>Login with Google</span>
                                                        </a>
                                                        <a href="https://m.facebook.com/login/?locale=vi_VN" class="fb">
                                                        <i class="fab fa-facebook"></i>
                                                            <span>Login with Facebook</span>
                                                        </a>
                                                        <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoidmkifQ%3D%3D%22%7D" class="tw">
                                                        <i class="fab fa-twitter"></i>
                                                            <span>Login with Twitter</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .error {
        color: red;
    }
    *,
*:before,
*:after{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
.login_form,
.login_form *{
	display: flex;
}
.login_form.is_closed .left_side{
	transform: translateX(50%);
}
.login_form.is_closed .right_side{
	transform: translateX(-50.1%);
}
.left_side{
	
	padding: 8% 5%;
	z-index: 2;
	transition: all .35s;
}
.left_side:after{
	position: absolute;
	content: "";
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
.content{
	position: relative;
	z-index: 1;
	flex-direction: column;
	flex: 1;
	color: #fff;
}

.content h1{
	font-size: 90px;
	line-height: .9;
	margin-bottom: 20px;
}
.content p{
	font-size: 14px;
}
.social_login a{
	width: 80px;
	height: 40px;
	justify-content: center;
	align-items: center;
	text-decoration: none;
	color: #fff;
	border-radius: 40px;
	position: relative;
	overflow: hidden;
	box-shadow: 10px 10px 6px rgba(0,0,0,.3);
	transition: all .35s;
}
.social_login a.google{
	background-color: #ea4335;
}
.social_login a.google span{
	color: #ea4335;
}
.social_login a.fb{
	background-color: #3b5998;
}
.social_login a.fb span{
	color: #3b5998;
}
.social_login a.tw{
	background-color: #1da1f2;
}
.social_login a.tw span{
	color: #1da1f2;
}
.social_login a:nth-child(2){
	margin: 0 10px;
}
.social_login a span{
	font-size: 14px;
	position: absolute;
	background: #fff;
	top: 0;
	left: 0;
	width: 150px;
	height: 100%;
	border-radius: 40px;
	justify-content: center;
	align-items: center;
	transform: translateX(100%);
	transition: all .35s;
}
.social_login a:hover{
	width: 150px;
}

.social_login a:hover span{
	transform: translateX(0);
}
</style>
