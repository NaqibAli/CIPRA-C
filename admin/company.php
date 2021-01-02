<?php 

session_start();

if(!$_SESSION['isloged']==1)
{
  header("Location:./login.php");
}
else{
  if(!($_SESSION['usertype']==3 || $_SESSION['usertype']==1 || $_SESSION['usertype']==4)){
    header("Location:./index.php");
  }



}


?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>
        CIPRA - Companies And Intellectual Property Registration Agency
    </title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
    <link rel="stylesheet" type="text/css" href="src/plugins/sweetalert2/sweetalert2.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "UA-119386393-1");
    </script>
</head>

<body>
    

    <!--Top bar include here -->
    <?php
    include("include/Topheader.php");
  ?>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-1" checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i
                                class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-1" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i
                                class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-4" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i
                                class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i
                                class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-6" />
                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">
                        Reset Settings
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--sidebar included here-->
    <?php

   include("include/sidebar.php");
   
     ?>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <div class="pd-20 card-box mb-20">
                    <div class="text-center mb-3">

                        <img src="" alt="" class="logo border-0">

                    </div>
                    <h4 class="text-center h4 mb-0 text-uppercase" id="profile_name"></h4>
                    <p class="text-center text-muted font-16" id="ctype">

                    </p>
                    <div class="profile-info">
                        <ul class="row">
                            <div class="col-3 my-3">
                                <li>
                                    <span class="font-weight-bold">Owner Name:</span>
                                    <info id="ownername"></info>
                                </li>
                            </div>
                            <div class="col-3 my-3">
                                <li>
                                    <span class="font-weight-bold">Enitity Number:</span>
                                    <info id="e-number"></info>
                                </li>
                            </div>
                            <div class="col-3 my-3">
                                <li>
                                    <span class="font-weight-bold">Contact Number:</span>
                                    <info id="phone"></info>
                                </li>
                            </div>
                            <div class="col-3 my-3">
                                <li>
                                    <span class="font-weight-bold">Email Address:</span>
                                    <info id="email"></info>
                                </li>
                            </div>
                            <div class="col-3 my-3">
                                <li>
                                    <span class="font-weight-bold">Address/Location:</span>
                                    <info id="address"></info>
                                </li>
                            </div>
                            <div class="col-3 my-3">
                                <li>
                                    <span class="font-weight-bold">Passcode:</span>
                                    <info id="passcode"></info>
                                </li>
                            </div>
                            <div class="col-3 my-3">
                                <li>
                                    <span class="font-weight-bold">Issue Date:</span>
                                    <info id="issuedate"></info>
                                </li>
                            </div>
                            <div class="col-3 my-3">
                                <li>
                                    <span class="font-weight-bold">Expire Date:</span>
                                    <info id="expiredate"></info>
                                </li>
                            </div>
                            <div class="col-3 my-3">
                                <li>
                                    <span class="font-weight-bold">Status:</span>
                                    <info id="status"></info>
                                </li>
                            </div>

                            <!-- when Completed Profile it will Add This -->
                        </ul>
                        <?php if($_SESSION['usertype']==3){?>
                        <button class="btn btn-success mt-3" id="updatecompanybtn"> <i class="dw dw-edit-1"></i> Update Information</button>
                        <a href="./documents.php?ty=1" class="btn btn-primary mt-3 ml-2" id="updatecompanybtn"> <i class="m-icon dw dw-file"></i> View Documents</a>
                        <?php } ?>
                    </div>


                </div>
            </div>

        </div>
        <div class="modal fade" id="updatecompany" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myLargeModalLabel">Company Information </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                  <div class="p-1">
                    <form class="" id="updateCompan" enctype="multipart/form-data">

                      <input type="hidden" name="id" id="id">
                      <input type="hidden" name="previouslogo" id="previouslogo">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>CompanyName:</label>
                              <input type="text" class="form-control"  name="compnayname" id="compnayname" />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>CompanyType :</label>
                              <input type="text" class="form-control " name="companyType" id="companyType">
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Enitity Number :</label>
                              <input type="text" class="form-control " name="enitiynum" id="enitiynum">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Contact Number :</label>
                              <input type="text" class="form-control " name="Contnum" id="Contnum">
                            </div>
                          </div>  

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>street Address :</label>
                              <input type="text" class="form-control " name="Stadd" id="Stadd">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>city :</label>
                              <input type="text" class="form-control " name="city" id="city">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>state :</label>
                              <input type="text" class="form-control " name="state" id="state">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>passcode :</label>
                              <input type="text" class="form-control " name="passcode" id="passcode1">
                            </div>
                          </div>
                      

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Email :</label>
                              <input type="text" class="form-control " name="Email" id= "Email" >
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>logo :</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" accept="image/*" name="logo" id="logo">
                                <label class="custom-file-label">Choose files</label>
                              </div>
                            </div>
                           
                        </div>
                      <!-- <button type="submit" class="btn btn-primary w-25">Submit Application</button> -->
                    </form>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button"  class="btn btn-outline-danger" data-dismiss="modal"> <i class="dw dw-cancel"></i> Close</button>
                  <button type="button" id="company-btn" class="btn btn-primary"><i class="dw dw-check"></i> Update Company</button>
                </div>
              </div>
            </div>
          </div>
      
        <div class="footer-wrap pd-20 mb-20 card-box">
            CIPRA - Companies And Intellectual Property Registration Agency,
            Developed by <a href="javascript:" target="_blank">HanTech</a>
        </div>
    </div>
    </div>
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="vendors/scripts/steps-setting.js"></script>
    <script src="./scripts/registrations.js"></script>
    <script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="./src/scripts/helper.js"></script>
    <script src="./scripts/jquery.validate.min.js"></script>
    <script src="./scripts/validations.js"></script>
    <script src="./scripts/get.js"></script>
    <script>
    <?php 
if(($_SESSION['usertype']==1 || $_SESSION['usertype']==4) && isset($_GET['yc'])){
 ?>
    var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("yc");
    getCompany(c);
    <?php }
else{ ?>
    getDirectorCompany();
    <?php 
}
?>
    </script>

</body>

</html>