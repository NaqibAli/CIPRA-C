$("#submitcopyright").click(()=>{
    var copyrightdata=new FormData($("#copyright")[0]);
    var proctype=$("#comp_form").val();
    if(proctype != 0){
        copyrightdata.append("proc_type",proctype);
        
    }
    else{
        alert("please select company form");
    }
    copyrightdata.append("method","newIp");
    copyrightdata.append("type","copyright");

    $.ajax({
        url: "./api/api.php", 
        method:"POST",
        dataType:"Json",
        data:copyrightdata,
        processData:false,
        contentType: false,
        success: function(result){
         let status=result.status;
         let data =result.data;

         
         if(status){
             alert(data);
             $("#cregisterModal").modal('hide');
             $("#copyright")[0].reset();
         }
         else{
             alert("Error");
         }
      
      }});
})

$("#Trademark").click(()=>{
    var copyrightdata=new FormData($("#tradeRegis")[0]);
    var proctype=$("#comp_form").val();
    if(proctype != 0){
        copyrightdata.append("proc_type",proctype);  
    }
    else{
        alert("please select company form");
    }
    copyrightdata.append("method","newIp");
    copyrightdata.append("type","trademark");

    $.ajax({
        url: "./api/api.php", 
        method:"POST",
        dataType:"Json",
        data:copyrightdata,
        processData:false,
        contentType: false,
        success: function(result){
         let status=result.status;
         let data =result.data;

         
         if(status){
             alert(data);
             $("#cregisterModal").modal('hide');
             $("#copyright")[0].reset();
         }
         else{
             alert("Error");
         }
      
      }});
})
$("#patentregistration").click(()=>{
    var copyrightdata=new FormData($("#patentform")[0]);
    var proctype=$("#comp_form").val();
    if(proctype != 0){
        copyrightdata.append("proc_type",proctype);  
    }
    else{
        alert("please select company form");
    }
    copyrightdata.append("method","newIp");
    copyrightdata.append("type","patent");

    $.ajax({
        url: "./api/api.php", 
        method:"POST",
        dataType:"Json",
        data:copyrightdata,
        processData:false,
        contentType: false,
        success: function(result){
         let status=result.status;
         let data =result.data;

         
         if(status){
             alert(data);
             $("#cregisterModal").modal('hide');
             $("#copyright")[0].reset();
         }
         else{
             alert("Error");
         }
      
      }});
})

$("#reg_business").on('submit', function (e) {

    e.preventDefault();

    var formdata=new FormData($("#reg_business")[0]);
    formdata.append("method","registerCompany");
        $.ajax({
            url: "./Api/api.php",
            method: "POST",
            dataType: "JSON",
            data: formdata,
            processData:false,
            contentType:false,
            success: function (formdata) {
    
                let status = formdata.status;
                let message = formdata.Message;
    
                if (status == true) {
                   
                    swal(
                        {
                            position: 'center',
                            type: 'success',
                            title: message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    $(this)[0].reset();
                }
                else
                swal(
                    {
                        position: 'top-end',
                        type: 'error',
                        title: message,
                        showConfirmButton: false,
                        timer: 2000
                    }); 
            }
            
            });
})
