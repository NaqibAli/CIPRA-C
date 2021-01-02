<?php

session_start();

if (!$_SESSION['isloged'] == 1) {
    header("Location:./login.php");
} else {

    if (!($_SESSION['usertype'] == 1 || $_SESSION['usertype'] == 4)) {
        header("Location:./index.php");
    }
    if (!isset($_GET['type'])) {
        header("Location:./index.php");
    }

}

?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>CIPRA - Companies And Intellectual Property Registration Agency</title>

    <!-- Site favicon -->
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="../assets/img/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="../assets/img/favicon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/img/favicon.png"
	/>

    <!-- Mobile Specific Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="vendors/styles/icon-font.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="src/plugins/datatables/css/dataTables.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="src/plugins/datatables/css/responsive.bootstrap4.min.css"
    />

    <link rel="stylesheet" type="text/css" href="src/plugins/sweetalert2/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"
    ></script>
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
   <?php
include "include/Topheader.php";
?>
    <div class="right-sidebar">
      <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
          Layout Settings
          <span class="btn-block font-weight-400 font-12"
            >User Interface Settings</span
          >
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
          <i class="icon-copy ion-close-round"></i>
        </div>
      </div>
      <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
          <h4 class="weight-600 font-18 pb-10">Header Background</h4>
          <div class="sidebar-btn-group pb-30 mb-10">
            <a
              href="javascript:void(0);"
              class="btn btn-outline-primary header-white active"
              >White</a
            >
            <a
              href="javascript:void(0);"
              class="btn btn-outline-primary header-dark"
              >Dark</a
            >
          </div>

          <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
          <div class="sidebar-btn-group pb-30 mb-10">
            <a
              href="javascript:void(0);"
              class="btn btn-outline-primary sidebar-light"
              >White</a
            >
            <a
              href="javascript:void(0);"
              class="btn btn-outline-primary sidebar-dark active"
              >Dark</a
            >
          </div>

          <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
          <div class="sidebar-radio-group pb-10 mb-10">
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebaricon-1"
                name="menu-dropdown-icon"
                class="custom-control-input"
                value="icon-style-1"
                checked=""
              />
              <label class="custom-control-label" for="sidebaricon-1"
                ><i class="fa fa-angle-down"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebaricon-2"
                name="menu-dropdown-icon"
                class="custom-control-input"
                value="icon-style-2"
              />
              <label class="custom-control-label" for="sidebaricon-2"
                ><i class="ion-plus-round"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebaricon-3"
                name="menu-dropdown-icon"
                class="custom-control-input"
                value="icon-style-3"
              />
              <label class="custom-control-label" for="sidebaricon-3"
                ><i class="fa fa-angle-double-right"></i
              ></label>
            </div>
          </div>

          <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
          <div class="sidebar-radio-group pb-30 mb-10">
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-1"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-1"
                checked=""
              />
              <label class="custom-control-label" for="sidebariconlist-1"
                ><i class="ion-minus-round"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-2"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-2"
              />
              <label class="custom-control-label" for="sidebariconlist-2"
                ><i class="fa fa-circle-o" aria-hidden="true"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-3"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-3"
              />
              <label class="custom-control-label" for="sidebariconlist-3"
                ><i class="dw dw-check"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-4"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-4"
                checked=""
              />
              <label class="custom-control-label" for="sidebariconlist-4"
                ><i class="icon-copy dw dw-next-2"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-5"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-5"
              />
              <label class="custom-control-label" for="sidebariconlist-5"
                ><i class="dw dw-fast-forward-1"></i
              ></label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="sidebariconlist-6"
                name="menu-list-icon"
                class="custom-control-input"
                value="icon-list-style-6"
              />
              <label class="custom-control-label" for="sidebariconlist-6"
                ><i class="dw dw-next"></i
              ></label>
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
  <?php

include "include/sidebar.php";

?>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">

          <div class="card-box mb-30">
            <div class="pd-20">
              <h4 class="text-blue h4 text-capitalize"><?php echo $_GET['type'] ?> Applications</h4>
            </div>
            <div class="pb-20">
              <div
                id="DataTables_Table_0_wrapper"
                class="dataTables_wrapper dt-bootstrap4 no-footer table-responsive"
              >

                <div class="row">
                  <div class="col-sm-12">
                    <table
                      class="data-table table stripe hover nowrap dataTable no-footer dtr-inline"
                      id="DataTables_Table_0"
                      role="grid"
                      aria-describedby="DataTables_Table_0_info"
                    >
                      <thead>
                        <tr role="row">

                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="DataTables_Table_0"
                            rowspan="1"
                            colspan="1"
                            aria-label="Name"
                          >
                          Application Type
                          </th>
                          <th
                            class="sorting text-capitalize"
                            tabindex="0"
                            aria-controls="DataTables_Table_0"
                            rowspan="1"
                            colspan="1"
                            aria-label="location: activate to sort column ascending"
                          >
                            <?php echo $_GET['type'] ?> Type
                          </th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="DataTables_Table_0"
                            rowspan="1"
                            colspan="1"
                            aria-label="Phone: activate to sort column ascending"
                          >
                           Company Name
                          </th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="DataTables_Table_0"
                            rowspan="1"
                            colspan="1"
                            aria-label="directorname: activate to sort column ascending"
                          >
                            Owner Name
                          </th>


                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="DataTables_Table_0"
                            rowspan="1"
                            colspan="1"
                            aria-label="ExpireDate: activate to sort column ascending"
                          >
                            Application date
                          </th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="DataTables_Table_0"
                            rowspan="1"
                            colspan="1"
                            aria-label="ExpireDate: activate to sort column ascending"
                          >
                            Title Of Work
                          </th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="DataTables_Table_0"
                            rowspan="1"
                            colspan="1"
                            aria-label="ExpireDate: activate to sort column ascending"
                          >
                            Status
                          </th>
                          <th
                            class="datatable-nosort sorting_disabled"
                            rowspan="1"
                            colspan="1"
                            aria-label="Action"
                          >
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody id="admin_ip_tbl">

                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div
            class="modal fade"
            id="approve-ip"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
              <h5>Approve <?php echo $_GET['type'] ?></h5>
            </div>
                <div class="modal-body font-18">
<form id="aproveform_ip">
<span id="ipid"  class="d-none"></span>
    <div class="row">
    <div class="col-4">
                  <div class="form-group">
                  <label>Application No</label>
                  <input type="text" name="appno" class="form-control"  />
                  </div>
                  </div>
                  <div class="col-4">
                  <div class="form-group">
                  <label>Licence No</label>
                  <input type="text" name="lno" class="form-control" required />
                  </div>
                  </div>
                  <div class="col-4">
                  <div class="form-group">
                  <label>Issue Date</label>
                  <input type="text" name="issuedate" class="form-control date-picker" required />
                  </div>
                  </div>
                </div>
                <button
                    type="submit"
                    class="btn btn-success"
                  >
                  <i class="dw dw-checked"></i>
                    Approve <?php echo $_GET['type'] ?>
                  </button>
</form>


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
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <!-- buttons for Export datatable -->
    <script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
    <script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="src/plugins/datatables/js/buttons.print.min.js"></script>
    <script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
    <script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
    <script src="src/plugins/datatables/js/pdfmake.min.js"></script>
    <script src="src/plugins/datatables/js/vfs_fonts.js"></script>
    <!-- Datatable Setting js -->
    <script src="vendors/scripts/datatable-setting.js"></script>
    <script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="./scripts/get.js"></script>
    <script src="./scripts/registrations.js"></script>
    <script>
    var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("type");
    getips(c);
    </script>
  </body>
</html>
