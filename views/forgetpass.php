<div class="container">
    <div class="card border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row" style="display:flex;justify-content: space-evenly;">
                <div class="col-lg-6 text-center">
                    <div class="p-5 text-center">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                            <p class="mb-4">Chỉ cần nhập địa chỉ email của bạn vào bên dưới 
                                và chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu của bạn!
                            </p>
                        </div>
                        <form action="index.php?action=forgetpass&act=forgetpass_action" class="login-form" method="post" class="form mt-5 mb-5">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Enter Email Address...">
                            </div>
                            <input class="btn btn-primary btn-user mt-2 btn-block" type="submit" name="submit_email" value="Reset Password"> 
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="index.php?action=login">Tôi đã có tài khoản? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>