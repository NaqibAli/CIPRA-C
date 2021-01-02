function getcompanies(){
    let companies="";
    $.ajax({
        url: "./api/api.php", 
        method:"POST",
        dataType:"Json",
        data:{method:"getCompanies"},
   
        success: function(result){
         let status=result.status;
         let data =result.data;
         if(status){
            data.forEach(company => {
               companies+=`
               <tr role="row" data-id="${company.id}">
                          <td class="table-plus sorting_1" tabindex="0">
                          ${company.companyid}
                          </td>
                          <td>${company.C_name}</td>
                          <td>${company.city}</td>
                          <td>
                          ${company.contactnumber}
                          </td>
                          <td>${company.fullname}</td>
                          <td>${company.issuedate}</td>
                          <td>${company.expiredate}</td>
                          <td><span class="${(company.pending==1)? "waiting" : "active-c" }">${(company.pending==1)?"Waiting":"Active"}</span></td>
                          <td>
                            <div class="dropdown">
                              <a
                                class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                href="#"
                                role="button"
                                data-toggle="dropdown"
                                aria-expanded="false"
                              >
                                <i class="dw dw-more"></i>
                              </a>
                              <div
                                class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                style=""
                              >
                              
                                <a class="dropdown-item" href="#"
                                  ><i class="dw dw-edit2"></i> Edit</a
                                >
                                <a class="dropdown-item" href="#"
                                  ><i class="dw dw-delete-3"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
               `; 
            });
            $("#company-tbl").html(companies);
         }
         else{
             alert(data);
         }
      
      }});
}
function getcApplications(){
    let getcApplications="";
    $.ajax({
        url: "./api/api.php", 
        method:"POST",
        dataType:"Json",
        data:{method:"getApplications"},
   
        success: function(result){
         let status=result.status;
         let data =result.data;
         if(status){
            data.forEach(company => {
               getcApplications+=`
               <tr role="row">
                          <td>${company.C_name}</td>
                          <td>${company.city}</td>
                          <td>
                          ${company.contactnumber}
                          </td>
                          <td>${company.Fullname}</td>
                          <td>${company.fullname}</td>
                          <td>${company.dateApp}</td>
                          <td><span class="${(company.pending==1)? "waiting" : "active-c" }">${(company.pending==1)?"Waiting":"Active"}</span></td>
                          <td>
                            <div class="dropdown">
                              <a
                                class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                href="#"
                                role="button"
                                data-toggle="dropdown"
                                aria-expanded="false"
                              >
                                <i class="dw dw-more"></i>
                              </a>
                              <div
                                class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                style=""
                              >
                              <a class="dropdown-item " id="aprove-btn" href="#" data-id="${company.id}"
                              ><i class="dw dw-checked" ></i> Aprove</a
                            >
                            <a class="dropdown-item " id="view-btn" href="./company.php?yc=${company.id}" data-id="${company.id}"
                            ><i class="dw dw-eye" ></i> View</a
                          >
                           <a class="dropdown-item " id="edit-btn" href="./documents.php?yc=${company.id}&ty=1&cm=${company.C_name}" data-id="${company.id}"
                                  ><i class="dw dw-file" ></i> Documents</a
                                > 
                                <a class="dropdown-item" id="delete-btn" href="#"  data-id="${company.id}"
                                  ><i class="dw dw-delete-3"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
               `; 
            });
            $("#appl-tbl").html(getcApplications);
         }
         else{
             alert(data);
         }
      
      }});
}

function gettrademark(){
  let trademark="";
  $.ajax({
      url: "./api/api.php", 
      method:"POST",
      dataType:"Json",
      data:{method:"gettrademark"},
 
      success: function(result){
       let status=result.status;
       let data =result.data;
       if(status){
          data.forEach(company => {
             trademark+=`
             <tr role="row" data-id="${company.id}">
                        <td class="table-plus sorting_1" tabindex="0">
                        ${company.aplicationnumber}
                        </td>
                        <td>${company.C_name}</td>
                        <td>${company.applicationtype}</td>
                        <td>
                        ${company.titleofwork}
                        </td>
                        <td>${company.issuedate}</td>
                        <td>${(company.licenno=="")?"Waiting":company.licenno}</td>
                        <td><span class="${(company.pending==1)? "waiting" : "active-c" }">${(company.pending==1)?"waiting":"active"}</span></td>
                        <td>
                          <div class="dropdown">
                            <a
                              class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                              href="#"
                              role="button"
                              data-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="dw dw-more"></i>
                            </a>
                            <div
                              class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                              style=""
                            >
                              <a class="dropdown-item" href="#"
                                ><i class="dw dw-edit2"></i> Edit</a
                              >
                              <a class="dropdown-item" href="#"
                                ><i class="dw dw-delete-3"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
             `; 
          });
          $("#trademar-tbl").html(trademark);
       }
       else{
           alert(data);
       }
    
    }});
}

function patent(){
  let patent="";
  $.ajax({
      url: "./api/api.php", 
      method:"POST",
      dataType:"Json",
      data:{method:"getpatent"},
 
      success: function(result){
       let status=result.status;
       let data =result.data;
       if(status){
          data.forEach(company => {
             patent+=`
             <tr role="row" data-id="${company.id}">
                        <td class="table-plus sorting_1" tabindex="0">
                        ${company.aplicationnumber}
                        </td>
                        <td>${company.C_name}</td>
                        <td>${company.applicationtype}</td>
                        <td>
                        ${company.titleofwork}
                        </td>
                        <td>${company.issuedate}</td>
                        <td>${company.licenno}</td>
                        <td><span class="${(company.pending==1)? "waiting" : "active-c" }">${(company.pending==1)?"waiting":"active"}</span></td>
                        <td>
                          <div class="dropdown">
                            <a
                              class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                              href="#"
                              role="button"
                              data-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="dw dw-more"></i>
                            </a>
                            <div
                              class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                              style=""
                            >
                              <a class="dropdown-item" href="#"
                                ><i class="dw dw-edit2"></i> Edit</a
                              >
                              <a class="dropdown-item" href="#"
                                ><i class="dw dw-delete-3"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
             `; 
          });
          $("#patent-tbl").html(patent);
       }
       else{
           alert(data);
       }
    
    }});
}

function copyright(){
  let copyrightlist="";
  $.ajax({
      url: "./api/api.php", 
      method:"POST",
      dataType:"Json",
      data:{method:"getcopyright"},
 
      success: function(result){
       let status=result.status;
       let data =result.data;
       if(status){
          data.forEach(company => {
             copyrightlist+=`
             <tr role="row">
                        <td class="table-plus sorting_1" tabindex="0">
                        ${company.aplicationnumber}
                        </td>
                        <td>${company.C_name}</td>
                        <td>${company.applicationtype}</td>
                        <td>
                        ${company.titleofwork}
                        </td>
                        <td>${company.issuedate}</td>
                        <td>${company.licenno}</td>
                        <td><span class="${(company.pending==1)? "waiting" : "active-c" }">${(company.pending==1)?"waiting":"active"}</span></td>
                        <td>
                          <div class="dropdown">
                            <a
                              class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                              href="#"
                              role="button"
                              data-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="dw dw-more"></i>
                            </a>
                            <div
                              class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                              style=""
                            >
                              <a class="dropdown-item" href="#" id="edit-btn" data-id="${company.id}"
                                ><i class="dw dw-edit2"></i> Edit</a
                              >
                              <a class="dropdown-item" href="#" id="delete-btn" data-id="${company.id}"
                                ><i class="dw dw-delete-3"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
             `; 
          });
          $("#copyright-tbl").html(copyrightlist);
       }
       else{
           alert(data);
       }
    
    }});
}

function getCompanyNames(){
  let opt="";
    $.ajax({
        url: "./api/api.php", 
        method:"POST",
        dataType:"Json",
        data:{method:"getcompanyname"},
   
        success: function(result){
         let status=result.status;
         let data =result.data;
         if(status){
            data.forEach(company => {
              opt+=`
               <option value="${company.id}">${company.C_name}</option>
               `; 
            });
            $(".companies").html(opt);
         }
         else{
             alert(data);
         }
      
      }});

}

function getips(type){
  let copyrightlist="";
  $.ajax({
      url: "./api/api.php", 
      method:"POST",
      dataType:"Json",
      data:{method:"AdminGetIp",opt:type},
 
      success: function(result){
       let status=result.status;
       let data =result.data;
       if(status){
          data.forEach(company => {
             copyrightlist+=`
             <tr role="row">
                        <td class="table-plus sorting_1" tabindex="0">
                        ${company.applicationtype}
                        </td>
                        <td>${company.type}</td>
                        <td>${company.C_name}</td>
                        <td>${company.Fullname}</td>
                        <td>${company.dateofapplication}</td>
                        <td>${company.titleofwork}</td>
                        <td><span class="${(company.pending==1)? "waiting" : "active-c" }">${(company.pending==1)?"waiting":"active"}</span></td>
                        <td>
                          <div class="dropdown">
                            <a
                              class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                              href="#"
                              role="button"
                              data-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="dw dw-more"></i>
                            </a>
                            <div
                              class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                              style=""
                            >
                            <a class="dropdown-item " id="aprove-btn" href="#" data-id="${company.id}"
                              ><i class="dw dw-checked" ></i> Aprove</a>
                             <!-- <a class="dropdown-item" href="#" id="edit-btn" data-id="${company.id}"
                                ><i class="dw dw-edit2"></i> Edit</a
                              > -->
                              <a class="dropdown-item" href="#" id="delete-btn" data-id="${company.id}"
                                ><i class="dw dw-delete-3"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
             `; 
          });
          $("#admin_ip_tbl").html(copyrightlist);
       }
       else{
           alert(data);
       }
    
    }});
}

function getDirectorCompany(){
    $.ajax({
        url: "./api/api.php", 
        method:"POST",
        dataType:"Json",
        data:{method:"getDirectorCompanies"},
   
        success: function(result){
         let status=result.status;
         let data =result.data;
         if(status){
           console.log(data)
           $("#profile_name").text(data['C_name']);
           $("#ctype").text(data['c_type']);
           $("#ownername").text(data['Fullname']);
           $("#e-number").text(data['enitity_number']);
           $("#phone").text(data['contactnumber']);
           $("#email").text(data['email']);
           $("#address").text(data['streetaddress']+" - "+data['state']);
           $("#passcode").text(data['passcode']);
           $("#issuedate").text(data['issuedate']);
           $("#expiredate").text(data['expiredate']);
           if (data['pending']==0) {
             $("#status").addClass("active-c");
             $("#status").text("Active");
           }
           $(".logo").attr("src",'./uploads/logos/'+data['logo']);
         }
         else{
             alert(data);
         }
      
      }});
}


function getUser(){
  let users="";
  $.ajax({
      url: "./api/api.php", 
      method:"POST",
      dataType:"Json",
      data:{method:"ReadUser"},
 
      success: function(result){
       let status=result.status;
       let data =result.data;
       if(status){
          data.forEach(user => {
             users+=`
             <tr role="row" >
                      <td><img src='./uploads/profile_images/${user.profileimage}' class='user-image' /></td>
                        <td>${user.Name}</td>
                        <td>${user.email}</td>
        
                        <td><span class="${(user.status==0)? "waiting" : "active-c" }">${(user.status==1)?"Active":"In Active"}</span></td>
                        <td>
                          <div class="dropdown">
                            <a
                              class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                              href="#"
                              role="button"
                              data-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="dw dw-more"></i>
                            </a>
                            <div
                              class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                              style=""
                            >
                              <a class="dropdown-item" href="#" id="edit-btn" data-id="${user.id}" 
                                ><i class="dw dw-edit2"></i> Edit</a
                              >
                              <a class="dropdown-item" href="#"id="delete-btn" data-id="${user.id}"
                                ><i class="dw dw-delete-3" ></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
             `; 
          });
          $("#user-Table").html(users);
       }
       else{
           console.log(data);
       }
    
    }});
}

function getCompany(id){
  $.ajax({
    url: "./api/api.php", 
    method:"POST",
    dataType:"Json",
    data:{method:"getCompany",id:id},

    success: function(result){
     let status=result.status;
     let data =result.data;
     if(status){
       console.log(data)
       $("#profile_name").text(data['C_name']);
       $("#ctype").text(data['c_type']);
       $("#ownername").text(data['Fullname']);
       $("#e-number").text(data['enitity_number']);
       $("#phone").text(data['contactnumber']);
       $("#email").text(data['email']);
       $("#address").text(data['streetaddress']+" - "+data['state']);
       $("#passcode").text(data['passcode']);
       $("#issuedate").text(data['issuedate']);
       $("#expiredate").text(data['expiredate']);
       if (data['pending']==1) {
         $("#status").addClass("waiting");
         $("#status").text("Waiting");
       }
       $(".logo").attr("src",'./uploads/logos/'+data['logo']);
     }
     else{
         alert(data);
     }
  
  }});
}


function getCompanydata(){
  $.ajax({
      url: "./api/api.php", 
      method:"POST",
      dataType:"Json",
      data:{method:"getDirectorCompanies"},
 
      success: function(result){
       let status=result.status;
       let data =result.data;
       if(status){
         console.log(data);
         $("#id").val(data['id']);
         $("#previouslogo").val(data['logo']);

         $("#compnayname").val(data['C_name']);
         $("#companyType").val(data['c_type']);
         $("#enitiynum").val(data['enitity_number']);
         $("#Contnum").val(data['contactnumber']);
         $("#Email").val(data['email']);
         $("#Stadd").val(data['streetaddress']);
         $("#state").val(data['state']);
         $("#passcode1").val(data['passcode']);
         $("#city").val(data['city']);
     
       }
       else{
           alert(data);
       }
    
    }});
}

function getDocs(id,type){
  let docs="";
  $.ajax({
      url: "./api/api.php", 
      method:"POST",
      dataType:"Json",
      data:{method:"getDocs",id:id,type:type},
 
      success: function(result){
       let status=result.status;
       let data =result.data;
       if(status){
          data.forEach(doc => {
             docs+=`
             <tr role="row">
             <td><img src='./filelogos/${getlogo(doc.documetnname)}' style="width:40px;"/></td>
                        <td>${getdocname(doc.documetnname)}</td>
                        <td>${doc.uploaddate}</td>
                        <td>
                        ${doc.modifieddate}
                        </td>
                        
                        <td class="text-center">
                        <a href="./uploads/documents/${doc.documetnname}" class="btn btn-primary"><i class="icon-copy fa fa-download" aria-hidden="true"></i> </a>
                        <a href="#" class="btn btn-info" doc-name='${doc.documetnname}' data-id=${doc.id} id="deditbtn"><i class="icon-copy fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger" doc-name='${doc.documetnname}' data-id=${doc.id} id="ddeletebtn"><i class="icon-copy fa fa-remove" aria-hidden="true"></i></a>
                        </td>
                        
                      </tr>
             `; 
          });
          $("#documentsTbl").html(docs);
       }
       else{
           alert(data);
       }
    
    }});
}
function getCDocs(type){
  let docs="";
  $.ajax({
      url: "./api/api.php", 
      method:"POST",
      dataType:"Json",
      data:{method:"getDocs",type:type,isd:1},
 
      success: function(result){
       let status=result.status;
       let data =result.data;
       if(status){
          data.forEach(doc => {
             docs+=`
             <tr role="row">
             <td><img src='./filelogos/${getlogo(doc.documetnname)}' style="width:40px;"/></td>
                        <td>${getdocname(doc.documetnname)}</td>
                        <td>${doc.uploaddate}</td>
                        <td>
                        ${doc.modifieddate}
                        </td>
                        
                        <td class="text-center">
                        <a href="./uploads/documents/${doc.documetnname}" class="btn btn-primary"><i class="icon-copy fa fa-download" aria-hidden="true"></i> </a>
                        <a href="#" class="btn btn-info" doc-name='${doc.documetnname}' data-id=${doc.id} id="deditbtn"><i class="icon-copy fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger" doc-name='${doc.documetnname}' data-id=${doc.id} id="ddeletebtn"><i class="icon-copy fa fa-remove" aria-hidden="true"></i></a>
                        </td>
                        
                      </tr>
             `; 
          });
          $("#documentsTbl").html(docs);
       }
       else{
           alert(data);
       }
    
    }});
}

function getdocname(docname){
  let index=docname.indexOf("-");
  return docname.substring(0,index)+"."+docname.substring(docname.lastIndexOf(".")+1);
}
function getlogo(name){
  var logo="";
  var ext = name.substring(name.lastIndexOf(".")+1);
  switch (ext) {
    case 'xlsx':
      logo="excel.png";
      break;
    case 'pdf':
      logo="pdf.png";
      break;
    case 'pptx':
      logo="pptx.png";
      break;
    case 'ppt':
      logo="pptx.png";
      break;
    case 'docx':
      logo="word.png";
      break;
    case 'doc':
      logo="word.png";
      break;

    case 'zip' ||'rar'||'tar':
      logo="zip.png";
      break;
    default:
      logo="file.png";
      break;
  }
  return logo;
}