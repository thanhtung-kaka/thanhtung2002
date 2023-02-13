$(document).ready(function(){
    $(document).on('change','#files',function(){
        var file=$(this).prop('files')[0];
        $('#tenFile').attr('value',file.name).val(file.name)
    })
    $(document).on('click','#save-files',function(){
        var tenFile=$('#tenFile').val();
        // alert(tenFile)
        var file=$('#files').prop('files')[0];
    //    console.log(file.name)
       var form_data=new FormData();
       form_data.append('file',file)
       $.ajax({
         url: 'models/import.php',
         cache:false,
         contentType:false,
         processData:false,
         data:form_data,
         type:'post',
         success:function(res){
            var myarr=res.split('####');
            var data=JSON.parse(myarr['1']);
            if (data.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully',
                    text: data.message,
                  }).then((result)=>{
                    if(result.isConfirmed){
                        location.href="./index.php?action=sanpham&act=sanpham";
                    }
                  })
            }
            if (data.status == 403) {
                Swal.fire({
                    icon: 'error',
                    title: 'Errors...',
                    text: data.message,
                  }).then((result)=>{
                    if(result.isConfirmed){
                        location.href="./index.php?action=sanpham&act=sanpham";
                    }
                  })
            }
         }
       })
    })
})