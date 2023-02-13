<!-- văn văn -->
<div class="text-center mt-4 ">
    <h3 class="title_contact">
        <span class="bg bg-light text-dark">Liên Hệ</span>
    </h3>
</div>
<section class="section2 ">
    <div class="col2 column1 first">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.000812078881!2d106.69171101447488!3d10.811248992297868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528c2000e008d%3A0x93da56acbf24c7bf!2zMjhFIFTEg25nIELhuqF0IEjhu5UsIFBoxrDhu51uZyAxMSwgQsOsbmggVGjhuqFuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1654849931777!5m2!1svi!2s" width="570" height="677" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="col2 column2 last">
        <div class="text-contact">
            <div class="sec2addr">
                <p><i class="fas fa-map-marker-alt rounded-circle"></i> 28E Tăng Bạt Hổ, phường 11, Bình Thạnh, Thành phố Hồ Chí Minh</p>
                <p> <i class="fas fa-phone rounded-circle"></i> <span class="collig">Phone :</span> <a href="tel:+84 000 0099">+84 000 0099</a></p>
                <p><i class="fas fa-envelope-open rounded-circle"></i> <span class="collig">Email :</span> <a href="mailto:vinateks@gmail.com">vinateks@gmail.com</a></p>
            </div>
        </div>
        <div class="contacform">
            <h3>Gửi thông tin liên hệ của bạn </h3>
            <form class="form" action="index.php?action=contact&act=addcontact" method="POST">
                <div>
                    <input class="contactStyle" type="text" id="hoten" name="hoten" value="<?php if (isset($hoten)) echo $hoten; ?>" placeholder="Họ & Tên *">
                    <!-- nếu nhập ssai thì show lỗi ra -->
                    <span class="error"><?php if (isset($hotenErr)) echo $hotenErr; ?></span>
                </div>
                <div>
                    <input class="contactStyle" type="number" id="sdt" name="sdt" value="<?php if (isset($sdt)) echo $sdt; ?>" placeholder="Số Điện Thoại *">
                    <span class="error"><?php if (isset($sdtErr)) echo $sdtErr; ?></span>
                </div>
                <div>
                    <input class="contactStyle" type="Email" id="email" name="email" value="<?php if (isset($email)) echo $email; ?>" placeholder="Email *">
                    <span class="error"><?php if (isset($emailErr)) echo $emailErr; ?></span>
                </div>
                <div></div>
                <div>
                    <textarea id="noidung" name="noidung" id="" cols="25" rows="7" value="<?php if (isset($noidung)) echo $noidung; ?>" placeholder="nội dung *"></textarea>
                    <span class="error"><?php if (isset($noidungErr)) echo $noidungErr; ?></span>
                </div>
                <div><input type="submit" value="Gửi"></div>
            </form>
        </div>
    </div>
    <p style="text-align: left;">
        <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
            <strong> Gọi</strong>:&nbsp;1900 8888 -&nbsp;<strong>Email</strong>:&nbsp;<a href="mailto:levan.092002@gmail.com">levan.092002@gmail.com</a>
        </span>
    </p>
</section>
<style>
    .error {
        color: red;
    }
    .textcenter {
        text-align: center;
    }

    .section1 {
        text-align: center;
        display: table;
        width: 100%;
    }

    .section1 .shtext {
        display: block;
        margin-top: 20px;
    }

    .section1 .seperator {
        border-bottom: 1px solid #a2a2a2;
        width: 35px;
        display: inline-block;
        margin: 20px;
    }

    .section1 h1 {
        font-size: 40px;
        color: #1b181d;
        font-weight: normal;
    }

    .section2 {
        width: 1200px;
        margin: 25px auto;
    }

    .section2 .col2 {
        width: 48.71%;
    }

    .section2 .col2.first {
        float: left;
    }

    .section2 .col2.last {
        float: right;
    }

    .section2 .sec2addr {
        display: block;
        line-height: 26px;
    }

    .contactStyle {
        width: 583px;
    }

    .section2 .sec2addr p:first-child {
        margin-right: 10px;
    }

    .section2 .contacform input[type="text"],
    .section2 .contacform input[type="email"],
    .section2 .contacform input[type="number"],
    .section2 .contacform textarea {
        padding: 17px;
        border: 0;
        background: #fdf4f4;
        margin: 7px 0;
    }

    .section2 .contacform textarea {
        width: 100%;
        display: block;
        color: #666;
        resize: none;
    }

    .section2 .contacform input[type="submit"] {
        padding: 15px 20px;
        color: #fff;
        border: 0;
        background: #f4ac5e;
        font-size: 13px;
        text-transform: uppercase;
        margin: 7px 0;
        cursor: pointer;
        width: 583px;
    }

    .section2 .contacform h3 {
        font-weight: normal;
        margin: 20px 0;
        margin-top: 30px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 19px;
        color: #171618;
    }

    .hr-line {
        display: flex;
        margin-bottom: -100px;
    }

    .title::before {
        content: '';
        position: absolute;
        width: 100%;
        background: rgb(116, 48, 48);
        height: 1.5px;
        left: 0;
        top: 17px;
        z-index: -1;
    }

    .title span {
        background: #eee;
        padding: 5px 10px;
    }
</style>