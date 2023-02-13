<?php
//upload hình văn(27/06/2022)
    // function uploadhinh(){
       
            if(!empty($_FILES['file'])){
                // $error=array();
        
                //đường link chứa ảnh
                $target_dir="../assets/images/avatar_img/";
                //lấy tên hình
                $target_file=$target_dir.basename(time().'_'.$_FILES['file']["name"]);
                //biến phần mở rộng của file thành chữ thường

                $imageFileType=strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));
                //type file allow
                
                $type_fileAllow=array('png','jpg','jpeg','gif');
                //kích thước file
                $size_file=$_FILES['file']['size'];
                //kiểm tra type file
                if(in_array($imageFileType,$type_fileAllow)){
                    if($size_file<=5542880){
                        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){

                            $res['status'] = 200;
                            $res['message'] = 'Upload thành công!!!';
                            $res['data'] = '../assets/images/avatar_img/'.time().'_'.$_FILES['file']['name'];

                            echo json_encode($res);
                        }else{
                            $res['status'] = 403;
                            $res['message'] = 'Upload file thất bại';
                            $res['data'] = Null;
                            echo json_encode($res);
                            // die('upload thất bại');
                        }
                    }
                    else{
                        // echo 'assets/images/image.jpg';
                        $res['status'] = 403;
                        $res['message'] = 'File được chọn không được quá 5MB';
                        $res['data'] = Null;
                        echo json_encode($res);
                    }
                }else{
                        $res['status'] = 403;
                        $res['message'] = 'File này không được hỗ trợ, bạn vui lòng chọn hình ảnh';
                        $res['data'] = Null;
                        echo json_encode($res);
                }

                }

        // }
?>
