$("#profile").on("submit",(e)=>{
    e.preventDefault();
    var formdata = new FormData($("#profile")[0]);

    formdata.append("method","Profile");


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
            //  window.location.href="./index.php";
            alert("profile  is completed");
         }
         else{
             alert("Error");
         }
      
      }});
})
