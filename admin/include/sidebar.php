<?php
$usertype = $_SESSION['usertype'];
?>

    <div class="left-side-bar">
      <div class="brand-logo my-3">
        <a href="./index2.php">
          <img src="../assets/img/logo.png" alt="" class="dark-logo" />
          <img src="../assets/img/logo.png" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
          <i class="ion-close-round"></i>
        </div>
      </div>
      <div class="menu-block customscroll">
        <div class="sidebar-menu icon-style-1 icon-list-style-1">
          <ul id="accordion-menu">
            <li>
              <a href="./index.php" class="dropdown-toggle no-arrow">
                <span class="micon dw dw-house-1"></span
                ><span class="mtext">Home</span>
              </a>
            </li>
            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle">
                <span class="micon dw dw-edit2"></span
                ><span class="mtext">Companies</span>
              </a>
              <ul class="submenu">
                <li>
                  <a href="./register_bussiness.php">Register New Company</a>
                </li>
                <li><a href="./Edit_business.php">Edit Company</a></li>
              </ul>
            </li>
            <?php if($usertype == 1){?>
            <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle" data-option="off">
							<span class="micon dw dw-list3"></span><span class="mtext">Applications</span>
						</a>
						<ul class="submenu">
							<li><a href="javascript:;">Companies</a></li>
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle" data-option="off">
                <span class="micon dw dw-building"></span><span class="mtext">Intellectual Property</span>
								</a>
								<ul class="submenu child">
									<li><a href="javascript:;">Trademark</a></li>
									<li><a href="javascript:;">Copyright</a></li>
									<li><a href="javascript:;">Patent</a></li>
								</ul>
							</li>
						</ul>
          </li>
            <?php } ?>
            <!-- <li>
						<a href="javascript:" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-list"></span><span class="mtext">My bussiness</span>
						</a>
          </li> -->
          <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle">
              <span class="micon dw dw-building"></span
              ><span class="mtext">Intellectual Property</span>
            </a>
            <ul class="submenu">
              <li><a href="./trademark.php">Trade Mark</a></li>
              <li><a href="./patent.php">Patent</a></li>
              <li><a href="./copyright.php">Copyright</a></li>
            </ul>
          </li>
            <li>
              <a href="./search_registry.php" class="dropdown-toggle no-arrow">
                <span class="micon dw dw-search2"></span
                ><span class="mtext">Search Company</span>
              </a>
            </li>
            <li>
              <a href="./logout.php" class="dropdown-toggle no-arrow">
                <span class="micon dw dw-logout"></span
                ><span class="mtext">Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
