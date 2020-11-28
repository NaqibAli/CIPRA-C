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
                          <td>${(company.pending==1)?"Waiting":"Active"}</td>
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
<<<<<<< HEAD
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
                        <td>${company.licenno}</td>
                        <td>${(company.pending==1)?"Waiting":"Active"}</td>
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
                        <td>${(company.pending==1)?"Waiting":"Active"}</td>
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
  let patent="";
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
                        <td>${(company.pending==1)?"Waiting":"Active"}</td>
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
=======
>>>>>>> 1560c5d76c0b1fdbeb23e2b47d36d8bec49f70b5
}