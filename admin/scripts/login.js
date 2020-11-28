


$("#loginform").on("submit",(e)=>{
    e.preventDefault();
    var formdata = new FormData($("#loginform")[0]);

    formdata.append("method","login");


    $.ajax({
        url: "./api/api.php", 
        method:"POST",
        dataType:"Json",
        data:formdata,
        processData:false,
        contentType: false,
        success: function(result){
         let status=result.status;
         let data =result.data;
         if(status){
             window.location.href="./index.php";
         }
         else{
             swal(
                {
                    position: 'center',
                    type: 'error',
                    title: (data == 'invalid')?"Incorrect Credential":"You account Is Blocked, Please Contact System Administrator",
                    showConfirmButton: false,
                    timer: 2500
                }); 
         }
      
      }});
})
