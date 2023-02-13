// văn 11-7
// $(document).ready(function(){
//     $('#import_excel_form').on('submit',function(event){
//         event.preventDefault();
//         $.ajax({
//             url:"./import/import_contact.php",
//             method:"POST",
//             data:new FormData(this),
//             contentType:false,
//             cache:false,
//             processData:false,
//             beforeSend:function(){
//                 $('#import').attr('disabled', 'disabled');
//                 $('#import').val('Importing...');
//             },
//             success:function(data)
//             {
//                 $('#message').html(data);
//                 $('#import_excel_form')[0].reset();
//                 $('#import').attr('disabled', false);
//                 $('#import').val('import');
//             }
//         })
//     });
//     });
//////////////
    $(document).ready(function(){
        $(document).on('change','#file',function(){
            var file=$(this).prop('files')[0];
            $('#tenFile').attr('value',file.name).val(file.name)
        })
        $(document).on('click','#save-files_contact',function(){
            // var tenFile=$('#tenFile').val();
            // alert(tenFile)
            var file=$('#file').prop('files')[0];
            // console.log(file.name)
           var form_data=new FormData();
           form_data.append('file',file)
           $.ajax({
             url: 'import/import_contact.php',
             cache:false,
             contentType:false,
             processData:false,
             data:form_data,
             type:'post',
             success:function(res){
                //  alert (res);
                alert ('import thành công bảng liên hệ');
                location.href="./index.php?action=contact&act=contact";
             }
           })
        })
    })
////////////
$(document).ready(function(){
    $(document).on('change','#file',function(){
        var file=$(this).prop('files')[0];
        $('#tenFile').attr('value',file.name).val(file.name)
    })
    $(document).on('click','#save-files_client',function(){
        // var tenFile=$('#tenFile').val();
        // alert(tenFile)
        var file=$('#file').prop('files')[0];
        // console.log(file.name)
       var form_data=new FormData();
       form_data.append('file',file)
       $.ajax({
         url: 'import/import_client.php',
         cache:false,
         contentType:false,
         processData:false,
         data:form_data,
         type:'post',
         success:function(res){
            //  alert (res);
            alert ('import thành công bảng khách hàng ');
            location.href="./index.php?action=client&act=get_client";
         }
       })
    })
})
/////
$(document).ready(function(){
    $(document).on('change','#file',function(){
        var file=$(this).prop('files')[0];
        $('#tenFile').attr('value',file.name).val(file.name)
    })
    $(document).on('click','#save-files_employee',function(){
        // var tenFile=$('#tenFile').val();
        // alert(tenFile)
        var file=$('#file').prop('files')[0];
        // console.log(file.name)
       var form_data=new FormData();
       form_data.append('file',file)
       $.ajax({
         url: 'import/import_employee.php',
         cache:false,
         contentType:false,
         processData:false,
         data:form_data,
         type:'post',
         success:function(res){
            //  alert (res);
            alert ('import thành công bảng nhân viên ');
            location.href="./index.php?action=employee&act=manage_employee";
         }
       })
    })
})
