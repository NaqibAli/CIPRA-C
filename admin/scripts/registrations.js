$("#submitcopyright").click(() => {
  var copyrightdata = new FormData($("#copyright")[0]);
  var proctype = $("#comp_form").val();
  if (proctype != 0) {
    copyrightdata.append("proc_type", proctype);
  } else {
    alert("please select company form");
    return;
  }
  copyrightdata.append("method", "newIp");
  copyrightdata.append("type", "copyright");

  $.ajax({
    url: "./api/api.php",
    method: "POST",
    dataType: "Json",
    data: copyrightdata,
    processData: false,
    contentType: false,
    success: function (result) {
      let status = result.status;
      let data = result.data;

      if (status) {
        swal({
          position: "center",
          type: "success",
          title: data,
          showConfirmButton: false,
          timer: 2000,
        });

        $("#cregisterModal").modal("hide");
        $("#copyright")[0].reset();
      } else {
        swal({
          position: "center",
          type: "info",
          title: data,
          showConfirmButton: true,
        });
      }
    },
  });
});

$("#Trademark").click(() => {
  var copyrightdata = new FormData($("#tradeRegis")[0]);
  var proctype = $("#comp_form").val();
  if (proctype != 0) {
    copyrightdata.append("proc_type", proctype);
  } else {
    alert("please select company form");
  }
  copyrightdata.append("method", "newIp");
  copyrightdata.append("type", "trademark");

  $.ajax({
    url: "./api/api.php",
    method: "POST",
    dataType: "Json",
    data: copyrightdata,
    processData: false,
    contentType: false,
    success: function (result) {
      let status = result.status;
      let data = result.data;

      if (status) {
        swal({
          position: "center",
          type: "success",
          title: data,
          showConfirmButton: false,
          timer: 2000,
        });
        $("#tradeRegis")[0].reset();
        $("#registerModal").modal("hide");
      } else {
        alert("Error");
      }
    },
  });
});
$("#patentregistration").click(() => {
  var copyrightdata = new FormData($("#patentform")[0]);
  var proctype = $("#comp_form").val();
  if (proctype != 0) {
    copyrightdata.append("proc_type", proctype);
  } else {
    alert("please select company form");
  }
  copyrightdata.append("method", "newIp");
  copyrightdata.append("type", "patent");

  $.ajax({
    url: "./api/api.php",
    method: "POST",
    dataType: "Json",
    data: copyrightdata,
    processData: false,
    contentType: false,
    success: function (result) {
      let status = result.status;
      let data = result.data;

      if (status) {
        swal({
          position: "center",
          type: "success",
          title: data,
          showConfirmButton: false,
          timer: 2000,
        });
        $("#patentform")[0].reset();
        $("#registerModal").modal("hide");
      } else {
        alert("Error");
      }
    },
  });
});

$("#reg_business").on("submit", function (e) {
  e.preventDefault();

  var formdata = new FormData($("#reg_business")[0]);
  formdata.append("method", "registerCompany");
  $.ajax({
    url: "./Api/api.php",
    method: "POST",
    dataType: "JSON",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (formdata) {
      let status = formdata.status;
      let message = formdata.Message;

      if (status == true) {
        swal({
          position: "center",
          type: "success",
          title: message,
          showConfirmButton: false,
          timer: 2000,
        });
        $("#reg_business")[0].reset();
      } else
        swal({
          position: "top-end",
          type: "error",
          title: message,
          showConfirmButton: false,
          timer: 2000,
        });
    },
  });
});

$("#appl-tbl").on("click", "td #delete-btn", (e) => {
  console.log($(e.target).attr("data-id"));
  if (confirm("Company Application Will be Deleted")) {
    alert("Deleted");
  }
});
$("#copyright-tbl").on("click", "td #delete-btn", (e) => {
  console.log($(e.target).attr("data-id"));
  if (confirm("Company Application Will be Deleted")) {
    var data = {
      method: "modip",
      mode: "delete",
      id: $(e.target).attr("data-id"),
      ip_type: "copyright",
    };

    $.ajax({
      url: "./api/api.php",
      method: "POST",
      dataType: "Json",
      data: data,
      success: function (result) {
        let status = result.status;
        let data = result.data;

        if (status) {
          swal({
            position: "center",
            type: "success",
            title: "Copyright Application Deleted",
            showConfirmButton: false,
            timer: 2000,
          });
          $("#copyrightList table").DataTable().destroy();
          copyright();
        } else {
          alert("Error");
        }
      },
    });
  }
});
$("#copyright-tbl").on("click", "td #edit-btn", (e) => {
  console.log($(e.target).attr("data-id"));
  $("#cregisterModal").modal("show");
});
$("#appl-tbl").on("click", "td #aprove-btn", (e) => {
  console.log($(e.target).attr("data-id"));
  $("#cid").text($(e.target).attr("data-id"));
  $("#approve-modal").modal("show");
  // if (confirm("Company Application Will be Deleted")) {
  //   var data={
  //       method:"modip",
  //       mode:"delete",
  //       id:$(e.target).attr("data-id"),
  //       ip_type:"copyright"
  //   }

  // $.ajax({
  //   url: "./api/api.php",
  //   method: "POST",
  //   dataType: "Json",
  //   data: data,
  //   success: function (result) {
  //     let status = result.status;
  //     let data = result.data;

  //     if (status) {
  //       swal({
  //         position: "center",
  //         type: "success",
  //         title: "Copyright Application Deleted",
  //         showConfirmButton: false,
  //         timer: 2000,
  //       });
  //       $("#copyrightList table").DataTable().destroy();
  //       copyright();
  //     } else {
  //       alert("Error");
  //     }
  //   },
  // });

  // }
});

$("#aproveform").on("submit", (e) => {
  e.preventDefault();
  var formdata = new FormData($("#aproveform")[0]);
  formdata.append("method", "approve");
  formdata.append("type", "company");
  console.log($("#cid").text());
  formdata.append("id", $("#cid").text());

  $.ajax({
    url: "./api/api.php",
    method: "POST",
    dataType: "Json",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (result) {
      let status = result.status;
      let data = result.data;

      if (status) {
        swal({
          position: "center",
          type: "success",
          title: "Application Approved",
          showConfirmButton: false,
          timer: 2000,
        });
        $("#aproveform")[0].reset();
        $("#approve-modal").modal("hide");
        getcApplications();
      } else {
        alert("Error");
      }
    },
  });
});

$("#admin_ip_tbl").on("click", "td #aprove-btn", (e) => {
  console.log($(e.target).attr("data-id"));
  $("#ipid").text($(e.target).attr("data-id"));
  $("#approve-ip").modal("show");
});

$("#aproveform_ip").on("submit", (e) => {
  e.preventDefault();
  var formdata = new FormData($("#aproveform_ip")[0]);
  formdata.append("method", "approve");
  var url_string = window.location.href;
  var url = new URL(url_string);
  var c = url.searchParams.get("type");
  formdata.append("type", c);
  formdata.append("id", $("#ipid").text());

  $.ajax({
    url: "./api/api.php",
    method: "POST",
    dataType: "Json",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (result) {
      let status = result.status;
      let data = result.data;

      if (status) {
        swal({
          position: "center",
          type: "success",
          title: c + " Application Approved",
          showConfirmButton: false,
          timer: 2000,
        });
        $("#aproveform_ip")[0].reset();
        $("#approve-ip").modal("hide");
        getips(c);
      } else {
        swal({
          position: "center",
          type: "error",
          title: data,
          showConfirmButton: true,
          buttonStyling: false,
          ConfirmButtonClass: "btn btn-danger",
        });
      }
    },
  });
});

$("#admin_ip_tbl").on("click", "td #delete-btn", (e) => {
  let id = $(e.target).attr("data-id");
  var url_string = window.location.href;
  var url = new URL(url_string);
  var c = url.searchParams.get("type");
  if (confirm("This " + c + " Application Will be Deleted")) {
    var data = {
      method: "modip",
      mode: "delete",
      id: id,
      ip_type: c,
    };

    $.ajax({
      url: "./api/api.php",
      method: "POST",
      dataType: "Json",
      data: data,
      success: function (result) {
        let status = result.status;
        let data = result.data;

        if (status) {
          swal({
            position: "center",
            type: "success",
            title: c + " Application Deleted",
            showConfirmButton: false,
            timer: 2000,
          });
          getips(c);
        } else {
          alert("Error");
        }
      },
    });
  }
});

$("#userRegistrationbtn").on("click", (e) => {
  e.preventDefault();

  var formdata = new FormData($("#userRegistrationForm")[0]);
  formdata.append("method", "userRegistration");

  $.ajax({
    url: "./Api/api.php",
    method: "POST",
    dataType: "JSON",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (formdata) {
      let status = formdata.status;
      let message = formdata.Message;

      if (status == true) {
        swal({
          position: "center",
          type: "success",
          title: message,
          showConfirmButton: false,
          timer: 2000,
        });
        $("#userRegistrationForm")[0].reset();
        $("#registerModal").modal("hide");
        getUser();
      } else
        swal({
          position: "top-end",
          type: "error",
          title: message,
          showConfirmButton: false,
          timer: 2000,
        });
      $("#userRegistrationForm")[0].reset();
    },
  });
});
$("#userupdate-btn").on("click", function (e) {
  e.preventDefault();

  var formdata = new FormData($("#userupdateForm")[0]);
  formdata.append("method", "updateUser");
  $.ajax({
    url: "./Api/api.php",
    method: "POST",
    dataType: "JSON",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (formdata) {
      let status = formdata.status;
      let message = formdata.Message;

      if (status == true) {
        swal({
          position: "center",
          type: "success",
          title: message,
          showConfirmButton: false,
          timer: 2000,
        });
        $("#userupdateForm")[0].reset();
        $("#userUpdateModel").modal("hide");
        getUser();
      } else
        swal({
          position: "center",
          type: "error",
          title: message,
          showConfirmButton: false,
          timer: 2000,
        });
    },
  });
});

$("#user-Table").on("click", "td #edit-btn", (e) => {
  var uid = $(e.target).attr("data-id");
  $("#userUpdateModel").modal("show");
  e.preventDefault();

  $.ajax({
    url: "./Api/api.php",
    method: "POST",
    dataType: "JSON",
    data: { method: "ReadUser", opt: "single", id: uid },

    success: function (data) {
      let status = data.status;
      let message = data.data;
      if (status == true) {
        $("#id").val(uid);
        $("input[name=name2]").val(message[0]["Name"]);
        $("input[name=email2]").val(message[0]["email"]);
        $("select[name=status2]").val(message[0]["status"]);
        $("#prevlogo").val(message[0]["profileimage"]);
      } else
        swal({
          position: "top-end",
          type: "error",
          title: message,
          showConfirmButton: false,
          timer: 2000,
        });
    },
  });
});

$("#user-Table").on("click", "td #delete-btn", (e) => {
  var uid = $(e.target).attr("data-id");
  e.preventDefault();

  if (confirm("Delete User")) {
    $.ajax({
      url: "./Api/api.php",
      method: "POST",
      dataType: "JSON",
      data: { method: "deleteUser", id: uid },

      success: function (data) {
        let status = data.status;
        let message = data.data;
        if (status == true) {
          swal({
            position: "center",
            type: "success",
            title: message,
            showConfirmButton: false,
            timer: 2000,
          });
          getUser();
        } else
          swal({
            position: "top-end",
            type: "error",
            title: message,
            showConfirmButton: false,
            timer: 2000,
          });
      },
    });
  }
});

$("#updatecompanybtn").click(()=>{
  getCompanydata(); 
  $("#updatecompany").modal("show");
});

$("#company-btn").click(() => {
  var copyrightdata = new FormData($("#updateCompan")[0]);
  
  copyrightdata.append("method", "updatecompany");
  copyrightdata.append("previouslogo", $("#previouslogo").val());


  $.ajax({
    url: "./api/api.php",
    method: "POST",
    dataType: "Json",
    data: copyrightdata,
    processData: false,
    contentType: false,
    success: function (result) {
      let status = result.status;
      let data = result.data;

      if (status) {
        swal({
          position: "center",
          type: "success",
          title: "Company Data Updated",
          showConfirmButton: false,
          timer: 2000,
        });

        $("#updatecompany").modal("hide");
        $("#updateCompan")[0].reset();
        getDirectorCompany();
      } else {
        swal({
          position: "center",
          type: "error",
          title:"Error Occured",
          showConfirmButton: false,
          timer: 2000,
        });
      }
    },
  });
});

$("#documentsTbl").on("click", "td #ddeletebtn", (e) => {
  console.log($(e.target).attr("data-id"));
  
  if (!($(e.target).attr("data-id")==undefined)) {
  if (confirm("This Document Will be compeletely Deleted")) {
   var postdata ={
    method:"updateDoc",
    type:2,
    docid:$(e.target).attr("data-id"),
    odocname:$(e.target).attr("doc-name")
   }
    $.ajax({
      url: "./api/api.php",
      method: "POST",
      dataType: "Json",
      data: postdata,
      success: function (result) {
        let status = result.status;
        let data = result.data;
  
        if (status) {
          swal({
            position: "center",
            type: "success",
            title: data,
            showConfirmButton: false,
            timer: 2000,
          });
          setTimeout(() => {
            window.location.reload();
          }, 2000);
          $("#updateDocm")[0].reset();
          $("#updatedoc").modal("hide");
        } else {
          swal({
            position: "center",
            type: data,
            title: data,
            showConfirmButton: true,
            buttonStyling: false,
            ConfirmButtonClass: "btn btn-danger",
          });
        }
      },
    });
  }
}
});
$("#documentsTbl").on("click", "td #deditbtn", (e) => {
  console.log($(e.target).attr("data-id"));
  if (!($(e.target).attr("data-id")==undefined)) {
    $("#docid").val($(e.target).attr("data-id"));

    $("#odocname").val($(e.target).attr("doc-name"));
    $("#updatedoc").modal("show");
  }
 
});

$("#docupdate-btn").on("click", (e) => {
  e.preventDefault();
  var formdata = new FormData($("#updateDocm")[0]);
  formdata.append("method", "updateDoc");
  formdata.append("type", 1);
  var url_string = window.location.href;
  var url = new URL(url_string);
  var cname = url.searchParams.get("cm");
  formdata.append("c_name",cname);
  formdata.append("odocname",$("#odocname").val());
  $.ajax({
    url: "./api/api.php",
    method: "POST",
    dataType: "Json",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (result) {
      let status = result.status;
      let data = result.data;

      if (status) {
        swal({
          position: "center",
          type: "success",
          title: data,
          showConfirmButton: false,
          timer: 2000,
        });
        setTimeout(() => {
          window.location.reload();
        }, 2000);
        $("#updateDocm")[0].reset();
        $("#updatedoc").modal("hide");
      } else {
        swal({
          position: "center",
          type: data,
          title: data,
          showConfirmButton: true,
          buttonStyling: false,
          ConfirmButtonClass: "btn btn-danger",
        });
      }
    },
  });
});