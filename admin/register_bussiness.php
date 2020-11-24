<!DOCTYPE html>
<html>
  <head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>
      CIPRA - Companies And Intellectual Property Registration Agency
    </title>

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
      href="src/plugins/jquery-steps/jquery.steps.css"
    />
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
    <!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="vendors/images/deskapp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

       <!--Top bar include here -->
<?php
    include("include/Topheader.php");
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

   <!--pages included here-->
   <?php

   include("include/pages.php");
   
     ?>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
      <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
          <!-- <div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form Wizards</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Form Wizards</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div> -->

          <div class="pd-20 card-box mb-30">
            <div class="clearfix">
              <h4 class="text-blue h4">Bussiness Registration Section</h4>
              <p class="mb-30">Fill form to register new bussiness</p>
            </div>
            <div class="wizard-content">
              <form class="tab-wizard wizard-circle wizard" id="reg_business">
                <h5>Business Information</h5>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Company Name :</label>
                        <input type="text" class="form-control " name="comp_name" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Company Type :</label>
                        <input type="text" class="form-control" name="comp_type" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Enitity Number :</label>
                        <input type="text" class="form-control" name="enit_num" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Contact Number :</label>
                        <input type="text" class="form-control" name="cont_num"/>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email :</label>
                        <input type="email" class="form-control" name=" com_email" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Comapny Logo :</label>

                        <img
                          src="../assets/img/patent2.jpg"
                          class="rounded-circle"
                          width="100"
                          height="200"
                        />

                        <input
                          type="file"
                          name="logo"
                          id="company-logo"
                          class="form-control custom d-none"
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label
                          >Upload Files(Notary,Company Profile,Company Policy)
                          :</label
                        >
                        <div class="custom-file">
                          <input
                            type="file"
                            multiple
                            class="custom-file-input"
                            name="file"
                          />
                          <label class="custom-file-label">Choose files</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <h5>Contact Address</h5>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Street Address :</label>
                        <input type="text" class="form-control" name="stree_add" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>City :</label>
                        <input type="text" class="form-control" name="city" />
                      </div>
                    </div>

                    <div class="col-6 form-group">
                      <label>State :</label>
                      <input type="text" class="form-control" name="state" />
                    </div>
                    <div class="col-6 form-group">
                      <label>Passcode :</label>
                      <input type="text" class="form-control" name=passconde />
                    </div>
                  </div>
                </section>
                <!-- Step 3 -->
                <h5>Company Director</h5>
                <section>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Director Name:</label>
                        <input type="text" class="form-control" name="dire_name" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>ID Number:</label>
                        <input
                          class="form-control"
                          type="text"
                          name="id_num"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Profesion:</label>
                        <input
                          class="form-control"
                          type="text"
                          name="profes"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Academy Level:</label>
                        <input
                          class="form-control"
                          type="text"
                          name="aca_level"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Email</label>
                        <input
                          type="email"
                          name="dir_email"
                          class="form-control"
                          placeholder="Example@example.com"
                        />
                      </div>
                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Password:</label>
                        <input
                          class="form-control"
                          name="Pass"
                          placeholder="**********"
                          type="password"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input
                          class="form-control"
                          placeholder="*********"
                          type="password"
                          name=conf_pass
                        />
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Step 4 -->
              </form>
            </div>
          </div>

          <!-- success Popup html Start -->
          <div
            class="modal fade"
            id="success-modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body text-center font-18">
                  <h3 class="mb-20">Company Registration Completed!</h3>
                  <div class="mb-30 text-center">
                    <img src="vendors/images/success.png" />
                  </div>
                  Confirmination Email Was Sent to Director Email
                </div>
                <div class="modal-footer justify-content-center">
                  <button
                    type="button"
                    class="btn btn-primary w-50"
                    data-dismiss="modal"
                  >
                    Done
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- success Popup html End -->
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
  </body>
</html>
