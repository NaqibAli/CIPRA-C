$("#user-registration").on("submit",(e)=>{
e.preventDefault();
    var userinfo = new FormData($("#user-registration")[0]);
    userinfo.append("method","OwnerReg");

    $.ajax({
        url: "./api/api.php", 
        method:"POST",
        dataType:"Json",
        data:userinfo,
        processData:false,
        contentType: false,
        success: function(result){
         let status=result.status;
         let data =result.data;
         if(status){
             window.location.href="./register.php?action=verify";
         }
         else{
             alert("Error");
         }
      
      }});


})

$("#verification").on("submit",(e)=>{
    e.preventDefault();
    let email=$("#v-email").text()
    let code=$("#verification_code").val()

    var pdata={
        email:email,
        code:code,
        method:"verifyemail"
    }
    console.log(pdata);
    $.ajax({
        url: "./api/api.php", 
        method:"POST",
        dataType:"Json",
        data:pdata,
        success: function(result){
         let status=result.status;
         let data =result.data;
         console.log(data)
         if(status){
             if(data=="verified"){
                alert("your account is verified"); 
                setTimeout(() => {
                    window.location.href="./index.php";
                }, 1000);

             }
             else{

             }
            
         }
         else{
             alert("Verification Code Error");
         }
      
      }});

})