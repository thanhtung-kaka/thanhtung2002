<div class="container">
    <div class="card border-0 shadow-lg my-5 resetpass">
        <div class="card-body p-0">
            <div class="row" style="display:flex;justify-content: space-evenly;">
                <div class="col-lg-6 text-center">
                    <div class="p-5 text-center">
                        <?php
                            if(isset($_GET['key']) && isset($_GET['reset'])):
                                $email=$_GET['key'];
                                $pass=$_GET['reset'];
                                $ur=new User();
                                $result=$ur->getPassEmail($email,$pass);
                                if($result!=false):
                                $emailold=$result['email_kh']; 
                        ?>
                        <form action="index.php?action=forgetpass&act=updatepass" method="post" name='resetpass' class="form mt-5 mb-5">
                            <table align='center' class=" mt-md-4">
                                <tr class="text-md-center">
                                    <th colspan=2>
                                        <h2 class='mb-3'>Nhập Mật Khẩu Mới</h2>
                                    </th>
                                </tr>
                                <input type="hidden" name="email" value="<?php echo $emailold;?>">
                                <tr>
                                    <td>
                                        <input class="form-control" type="password" placeholder="Mật khẩu mới" name='password' id="input-pass">
                                        <span id="icon-pass"><i class="fas fa-eye-slash"></i></span>
                                    </td>
                                </tr>
                                <tr class="text-md-center">
                                    <td colspan=2>
                                        <input type="submit" name="submit_password" class="btn btn-primary mt-3" value="Save Password">
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <?php
                                endif;
                            endif; 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const inputElement = document.getElementById('input-pass')
    $(document).ready(function() {
        $(document).on('click', '#icon-pass', function() {
            const currentType = inputElement.getAttribute('type')
            if(currentType=='password'){
                inputElement.setAttribute('type','text')
                $('#icon-pass').html('<i class="fas fa-eye"></i>')
            }else{
                inputElement.setAttribute('type','password')
                $('#icon-pass').html('<i class="fas fa-eye-slash"></i>')
            }
        })
    });
</script>