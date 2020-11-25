<?php 

session_start();

if(!$_SESSION['isloged']==1)
{
  header("Location:./login.php");
}
else{
  if($_SESSION['usertype']==2){
    if ($_SESSION['isverified']==1) {
      if($_SESSION['iscompleted']==0){
        header("Location:./profile.php?action=completeprofile");
    }
  }  
  else{
    header("Location:./register.php?action=verify");
  }
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
      href="src/plugins/jvectormap/jquery-jvectormap-2.0.3.css"
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
	</div> --->

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

  <!--sidebar included here-->
  <?php

include("include/sidebar.php");

  ?>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
      <div class="xs-pd-20-10 pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
          <div class="row">
            <div class="col">
			<div class="row align-items-center">
            <div class="col-md-4">
              <img src="vendors/images/banner-img.png" alt="" />
            </div>
            <div class="col-md-8">
              <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back
                <div class="weight-600 font-30 text-blue" id="system_user" ><?php echo $_SESSION['name'] ?></div>
              </h4>
              <p class="font-18 max-width-600">
                CIPRA, Companies And Intellectual Property Registration Agency
              </p>
            </div>
          </div>	
			</div>
            <div class="col-auto">
              <div class="close">
                <i class="fa fa-close"></i>
              </div>
            </div>
          </div>
          
        </div>
        <!-- <div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Dashboard</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
        <div class="row clearfix progress-box">
          <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 height-100-p">
              <div class="progress-box text-center">
                <input
                  type="text"
                  class="knob dial1"
                  value="80"
                  data-width="120"
                  data-height="120"
                  data-linecap="round"
                  data-thickness="0.12"
                  data-bgColor="#fff"
                  data-fgColor="#1b00ff"
                  data-angleOffset="180"
                  readonly
                />
                <h5 class="text-blue padding-top-10 h5">My Earnings</h5>
                <span class="d-block"
                  >80% Average <i class="fa fa-line-chart text-blue"></i
                ></span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 height-100-p">
              <div class="progress-box text-center">
                <input
                  type="text"
                  class="knob dial2"
                  value="70"
                  data-width="120"
                  data-height="120"
                  data-linecap="round"
                  data-thickness="0.12"
                  data-bgColor="#fff"
                  data-fgColor="#00e091"
                  data-angleOffset="180"
                  readonly
                />
                <h5 class="text-light-green padding-top-10 h5">
                  Business Captured
                </h5>
                <span class="d-block"
                  >75% Average <i class="fa text-light-green fa-line-chart"></i
                ></span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 height-100-p">
              <div class="progress-box text-center">
                <input
                  type="text"
                  class="knob dial3"
                  value="90"
                  data-width="120"
                  data-height="120"
                  data-linecap="round"
                  data-thickness="0.12"
                  data-bgColor="#fff"
                  data-fgColor="#f56767"
                  data-angleOffset="180"
                  readonly
                />
                <h5 class="text-light-orange padding-top-10 h5">
                  Projects Speed
                </h5>
                <span class="d-block"
                  >90% Average <i class="fa text-light-orange fa-line-chart"></i
                ></span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 height-100-p">
              <div class="progress-box text-center">
                <input
                  type="text"
                  class="knob dial4"
                  value="65"
                  data-width="120"
                  data-height="120"
                  data-linecap="round"
                  data-thickness="0.12"
                  data-bgColor="#fff"
                  data-fgColor="#a683eb"
                  data-angleOffset="180"
                  readonly
                />
                <h5 class="text-light-purple padding-top-10 h5">
                  Panding Orders
                </h5>
                <span class="d-block"
                  >65% Average <i class="fa text-light-purple fa-line-chart"></i
                ></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 pt-10 height-100-p">
              <h2 class="mb-30 h4">Browser Visit</h2>
              <!-- <div class="browser-visits">
							<ul>
								<li class="d-flex flex-wrap align-items-center">
									<div class="icon"><img src="vendors/images/chrome.png" alt=""></div>
									<div class="browser-name">Google Chrome</div>
									<div class="visit"><span class="badge badge-pill badge-primary">50%</span></div>
								</li>
								<li class="d-flex flex-wrap align-items-center">
									<div class="icon"><img src="vendors/images/firefox.png" alt=""></div>
									<div class="browser-name">Mozilla Firefox</div>
									<div class="visit"><span class="badge badge-pill badge-secondary">40%</span></div>
								</li>
								<li class="d-flex flex-wrap align-items-center">
									<div class="icon"><img src="vendors/images/safari.png" alt=""></div>
									<div class="browser-name">Safari</div>
									<div class="visit"><span class="badge badge-pill badge-success">40%</span></div>
								</li>
								<li class="d-flex flex-wrap align-items-center">
									<div class="icon"><img src="vendors/images/edge.png" alt=""></div>
									<div class="browser-name">Microsoft Edge</div>
									<div class="visit"><span class="badge badge-pill badge-warning">20%</span></div>
								</li>
								<li class="d-flex flex-wrap align-items-center">
									<div class="icon"><img src="vendors/images/opera.png" alt=""></div>
									<div class="browser-name">Opera Mini</div>
									<div class="visit"><span class="badge badge-pill badge-info">20%</span></div>
								</li>
							</ul>
						</div> -->
            </div>
          </div>
          <div class="col-lg-8 col-md-6 col-sm-12 mb-30">
            <div class="card-box pd-30 pt-10 height-100-p">
              <h2 class="mb-30 h4">World Map</h2>
              <!-- <div id="browservisit" style="width:100%!important; height:380px"></div> -->
            </div>
          </div>
        </div>
        <!-- <div class="row">
				<div class="col-lg-7 col-md-12 col-sm-12 mb-30">
					<div class="card-box pd-30 height-100-p">
						<h4 class="mb-30 h4">Compliance Trend</h4>
						<div id="compliance-trend" class="compliance-trend"></div>
					</div>
				</div>
				<div class="col-lg-5 col-md-12 col-sm-12 mb-30">
					<div class="card-box pd-30 height-100-p">
						<h4 class="mb-30 h4">Records</h4>
						<div id="chart" class="chart"></div>
					</div>
				</div>
			</div> -->
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
    <script src="src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
    <script src="src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
    <script src="src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
    <script src="src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="vendors/scripts/dashboard2.js"></script>
  </body>
</html>
